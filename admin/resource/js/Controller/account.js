import { fetcher } from "../core/fetcher.js";
import { attachPhoneAutoHyphen } from "../core/formatter.js";

export class AccountController {
  constructor(formSelector = "#frm", submitBtnSelector = "#submitBtn") {
    this.form = document.querySelector(formSelector);
    this.submitBtn = document.querySelector(submitBtnSelector);
  }

  init() {
    if (!this.form || !this.submitBtn) return;

    attachPhoneAutoHyphen();
    this.submitBtn.addEventListener("click", this.handleSubmit.bind(this));
  }

  async handleSubmit(e) {
    e.preventDefault();
    const formData = new FormData(this.form);

    try {
      const res = await fetcher(
        "/admin/Controller/AccountController.php",
        formData
      );
      alert(res.message || "저장되었습니다.");
      location.href = "/admin/pages/account";
    } catch (err) {
      alert(err.message || "오류가 발생했습니다.");
    }
  }
}
