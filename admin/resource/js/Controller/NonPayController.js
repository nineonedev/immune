import { fetcher } from "../Core/fetcher.js";
import { API } from "../core/apiRoutes.js";
import { initCheckboxManager } from "../utils/initCheckboxManager.js";

export class NonPayController {
  constructor({
    formSelector = "#frm",
    insertBtnSelector = "#submitBtn",
    updateBtnSelector = "#editBtn",
    deleteBtnSelector = ".delete-btn",
    primaryCategorySelector = "#category_primary",
    secondaryCategorySelector = "#category_secondary",
  } = {}) {
    this.form = document.querySelector(formSelector);
    this.insertBtn = document.querySelector(insertBtnSelector);
    this.updateBtn = document.querySelector(updateBtnSelector);
    this.deleteButtons = document.querySelectorAll(deleteBtnSelector);
    this.primarySelect = document.querySelector(primaryCategorySelector);
    this.secondarySelect = document.querySelector(secondaryCategorySelector);
  }

  init() {
    console.log("[NonPayController] 초기화됨");

    if (this.form && this.insertBtn) {
      this.insertBtn.addEventListener("click", this.insert.bind(this));
    }

    if (this.form && this.updateBtn) {
      this.updateBtn.addEventListener("click", this.update.bind(this));
    }

    if (this.primarySelect && this.secondarySelect) {
      this.primarySelect.addEventListener(
        "change",
        this.handlePrimaryChange.bind(this)
      );
    }

    this.attachDeleteEvents();

    if (this.primarySelect?.value) {
      this.handlePrimaryChange();
    }

    initCheckboxManager(async (selectedIds) => {
      const formData = new FormData();
      formData.set("mode", "delete_array");
      formData.set("ids", JSON.stringify(selectedIds));
      await this.sendRequest(formData, "선택 항목이 삭제되었습니다.");
    });
  }

  handlePrimaryChange() {
    const selectedPrimary = this.primarySelect.value;
    const secondaryMap = window.nonpaySecondaryCategories || {};
    const secondaryList = secondaryMap[selectedPrimary] || {};

    const currentValue =
      this.secondarySelect.dataset.selected || this.secondarySelect.value;

    this.secondarySelect.innerHTML =
      '<option value="">2차 카테고리 선택</option>';

    Object.entries(secondaryList).forEach(([key, label]) => {
      const option = document.createElement("option");
      option.value = key;
      option.textContent = label;

      if (key === currentValue) {
        option.selected = true;
      }

      this.secondarySelect.appendChild(option);
    });
  }

  async insert(e) {
    e.preventDefault();
    const formData = new FormData(this.form);
    formData.set("mode", "insert");

    await this.sendRequest(formData, "비급여 항목이 등록되었습니다.");
  }

  async update(e) {
    e.preventDefault();
    const formData = new FormData(this.form);
    formData.set("mode", "update");

    await this.sendRequest(formData, "비급여 항목이 수정되었습니다.");
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
      const res = await fetcher(API.NONPAY, formData);
      alert(res.message || successMessage);

      const mode = formData.get("mode");
      if (mode === "delete" || mode === "delete_array") {
        location.reload();
      } else {
        location.href = "/admin/pages/nonpay/index.php";
      }
    } catch (err) {
      alert(err.message || "처리 중 오류가 발생했습니다.");
    }
  }
}
