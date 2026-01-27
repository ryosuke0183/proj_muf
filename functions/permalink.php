<?php
/* カスタム投稿のパーマリンク設定 */

function my_dynamic_rewrite_rules()
{
  // 公開されているカスタム投稿タイプ（組み込み以外）の一覧を取得
  $custom_post_types = get_post_types(array(
    'public'   => true,
    '_builtin' => false
  ), 'names');

  // 各カスタム投稿タイプについて処理
  foreach ($custom_post_types as $cpt) {
    // CPTオブジェクトからリライト設定があるか確認
    $cpt_object = get_post_type_object($cpt);
    $cpt_slug = (isset($cpt_object->rewrite['slug']) && $cpt_object->rewrite['slug'])
      ? $cpt_object->rewrite['slug']
      : $cpt;

    // 対象CPTに紐づくタクソノミーを取得
    $taxonomies = get_object_taxonomies($cpt, 'names');
    foreach ($taxonomies as $tax) {

      // タクソノミーオブジェクトからリライト設定を取得
      $tax_obj = get_taxonomy($tax);
      $tax_slug = (isset($tax_obj->rewrite['slug']) && $tax_obj->rewrite['slug'])
        ? $tax_obj->rewrite['slug']
        : $tax;

      // 例：タクソノミー（親ターム）一覧ページ
      add_rewrite_rule(
        $cpt_slug . '/([^/]+)/?$',
        'index.php?' . $tax . '=$matches[1]',
        'top'
      );

      // 子ターム一覧ページ(1階層目)
      add_rewrite_rule(
        $cpt_slug . '/([^/]+)/([^\/\d]+)/?$',
        'index.php?' . $tax . '=$matches[2]',
        'top'
      );

      // 子ターム一覧ページ(2階層目)
      add_rewrite_rule(
        $cpt_slug . '/([^/]+)/([^/]+)/([^\/\d]+)/?$',
        'index.php?' . $tax . '=$matches[3]',
        'top'
      );

      // ※必要に応じて子ターム用など、さらに追加できます。
    }
  }
}
add_action('init', 'my_dynamic_rewrite_rules');

// タームリンクからタクソノミー名を削除（こちらは元々汎用的なのでそのままでOK）
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy)
{
  return str_replace('/' . $taxonomy . '/', '/', $termlink);
}
add_filter('term_link', 'my_custom_post_type_permalinks_set', 11, 3);

// breadcrumb navxt
// カスタム投稿のルートカテゴリーのアーカイブページだけ日本語になってしまうので、英字に変更。
add_filter("bcn_breadcrumb_title", function ($title, $type, $id) {
  if (in_array("archive", $type)) {
    $post_type = get_query_var("post_type");
    $title = strtoupper($post_type);
  }
  return $title;
}, 3, 10);

// タクソノミーアーカイブページのリンクを変更。
// [変更前]domain/category_taxonomy/slug1/slug2...
// [変更前]domain/custom_post_type/slug1/slug2...
add_filter("bcn_breadcrumb_url", function ($url, $type, $id) {

  // リンクを変更する必要があるのは、タクソノミーアーカイブページに飛ぶぱんくずのみのため、それ以外は除外。
  if (!in_array("taxonomy", $type)) {
    return $url;
  }

  // ドメインを取得する。
  $target_domain = home_url("/");
  $post_type = "";

  // 現在表示されているページが、記事詳細ページのとき。
  if (is_single()) {
    $post_type = get_post_type();
  }

  // 現在表示されているページが、タクソノミーアーカイブのとき。
  if (is_tax()) {
    $taxonomy = get_query_var("taxonomy"); // 現在のタクソノミーを取得する。
    $taxonomy_obj = get_taxonomy($taxonomy);
    $assosiated_post_types = $taxonomy_obj->object_type; // 現在のタクソノミーと紐づけられているカスタム投稿タイプを取得する。 
    $post_type = $assosiated_post_types[0]; // 複数カスタム投稿タイプが設定されているかもしれないので、最初の要素を設定する。
  }

  if (strpos($url, $target_domain) === 0) {

    // preg_quote() を使って、正規表現内で安全なパターンに変換します。
    $escaped_domain = preg_quote($target_domain, '#');
    $url = preg_replace('#^(' . $escaped_domain . ')(.*)$#', '$1' . $post_type . '/$2', $url);
  }
  return $url;
}, 11, 3);
