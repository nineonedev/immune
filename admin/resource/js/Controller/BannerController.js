import { fetcher } from "../Core/fetcher.js";
import { API } from "../core/apiRoutes.js";
import { summernoteInit } from "../core/summernoteInit.js";
import { initCheckboxManager } from "../utils/initCheckboxManager.js";
import { attachRadioToggle } from "../utils/initRadioToggle.js";

export class BannerController {
  constructor({
    formSelector = "#frm",
    insertBtnSelector = "#submitBtn",
    updateBtnSelector = "#editBtn",
    deleteBtnSelector = ".delete-btn",
  } = {}) {
    this.form = document.querySelector(formSelector);
    this.insertBtn = document.querySelector(insertBtnSelector);
    this.updateBtn = document.querySelector(updateBtnSelector);
    this.deleteButtons = document.querySelectorAll(deleteBtnSelector);
  }

  init() {
    console.log("[BannerController] Initialized");

    this.bindFormEvents();
    this.attachDeleteEvents();
    this.initEditors();

    initCheckboxManager(async (selectedIds) => {
      const formData = new FormData();
      formData.set("mode", "delete_array");
      formData.set("ids", JSON.stringify(selectedIds));
      await this.sendRequest(formData, "선택된 배너가 삭제되었습니다.");
    });

    attachRadioToggle({
      radioName: "has_link",
      targetIds: ["link_url_block"],
      toggleOnValue: "1",
      mode: "visibility",
    });

    attachRadioToggle({
      radioName: "is_unlimited",
      targetIds: ["display_period"],
      toggleOnValue: "2",
      mode: "visibility",
    });
  }

  initEditors() {
    summernoteInit("#description");
  }

  bindFormEvents() {
    if (this.form && this.insertBtn) {
      this.insertBtn.addEventListener("click", this.insert.bind(this));
    }

    if (this.form && this.updateBtn) {
      this.updateBtn.addEventListener("click", this.update.bind(this));
    }
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
        await this.sendRequest(formData, "배너가 삭제되었습니다.");
      });
    });
  }

  async insert(e) {
    e.preventDefault();
    const formData = new FormData(this.form);
    formData.set("mode", "insert");
    await this.sendRequest(formData, "배너가 등록되었습니다.");
  }

  async update(e) {
    e.preventDefault();
    const formData = new FormData(this.form);
    formData.set("mode", "update");
    await this.sendRequest(formData, "배너가 수정되었습니다.");
  }

  async sendRequest(formData, successMessage) {
    try {
      const res = await fetcher(API.BANNER, formData);
      alert(res.message || successMessage);

      const mode = formData.get("mode");
      if (mode === "delete" || mode === "delete_array") {
        location.reload();
      } else {
        location.href = "/admin/pages/design/banner.list.php";
      }
    } catch (err) {
      alert(err.message || "처리 중 오류가 발생했습니다.");
    }
  }
}
