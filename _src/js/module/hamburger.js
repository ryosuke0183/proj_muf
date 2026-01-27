/**
 * ハンバーガーに関するクラス
 */
export default class Hamburger {
  /**
   *
   * @param {node} hamburgerElement ハンバーガー
   */
  constructor(hamburgerElement) {
    try {
      if (!hamburgerElement) {
        throw new Error("ERROR: hamburger is null");
      }
    } catch (error) {
      console.log(error);
    }

    this.hamburger = hamburgerElement;
  }

  static className = "js-drawer-open";

  /**
   * ハンバーガーを開閉します。
   */
  toggleHamburger() {
    this.hamburger.addEventListener("click", function () {
      try {
        document.querySelector("html").classList.toggle(Hamburger.className);
      } catch (error) {
        console.log(error);
      }
    });
  }

  /**
   * 内部アンカーリンクをクリックしたら、ドロワーを閉じる。
   */
  clickAnchor() {
    const ANCHORS = document.querySelectorAll('.drawer a[href*="#"]');
    ANCHORS.forEach(function (anchor) {
      anchor.addEventListener("click", function () {
        try {
          document.querySelector("html").classList.remove(Hamburger.className);
        } catch (error) {
          console.log(error);
        }
      });
    });
  }
}
