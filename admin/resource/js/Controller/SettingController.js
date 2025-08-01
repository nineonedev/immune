import { fetcher } from "../Core/fetcher.js";
import { API } from "../core/apiRoutes.js";

export class SettingController {
  constructor(
    formSelector = "#frm",
    insertBtnSelector = "#submitBtn",
    updateBtnSelector = "#editBtn",
    deleteBtnSelector = ".delete-btn"
  ) {
    this.form = document.querySelector(formSelector);
    this.insertBtn = document.querySelector(insertBtnSelector);
    this.updateBtn = document.querySelector(updateBtnSelector);
    this.deleteButtons = document.querySelectorAll(deleteBtnSelector);
  }

  init() {
    console.log("[SettingController.js] 초기화됨");

    if (this.form && this.insertBtn) {
      this.insertBtn.addEventListener("click", this.insert.bind(this));
    }

    if (this.form && this.updateBtn) {
      this.updateBtn.addEventListener("click", this.update.bind(this));
    }

    this.attachDeleteEvents();
  }

  async insert(e) {
    e.preventDefault();
    const formData = new FormData(this.form);
    formData.set("mode", "insert");

    await this.sendRequest(formData, "등록되었습니다.");
  }

  async update(e) {
    e.preventDefault();
    const formData = new FormData(this.form);
    formData.set("mode", "update");

    await this.sendRequest(formData, "수정되었습니다.");
  }

  attachDeleteEvents() {
    this.deleteButtons.forEach((btn) => {
      btn.addEventListener("click", async () => {
        const id = btn.dataset.id;
        if (!id) return;
        if (!confirm("정말 삭제하시겠습니까?")) return;

        const formData = new FormData();
        formData.set("mode", "delete");
        formData.set("id", id);

        await this.sendRequest(formData, "삭제되었습니다.");
      });
    });
  }

  async sendRequest(formData, successMessage) {
    try {
      const res = await fetcher(API.SETTING, formData);
      alert(res.message || successMessage);

      const mode = formData.get("mode");
      if (mode === "delete") {
        location.reload();
      } else {
        location.href = "/admin/pages/setting/external.tag.php";
      }
    } catch (err) {
      alert(err.message || "처리 중 오류가 발생했습니다.");
    }
  }
}
