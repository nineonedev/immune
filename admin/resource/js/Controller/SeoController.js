import { fetcher } from "../Core/fetcher.js";
import { API } from "../core/apiRoutes.js";
import { initCheckboxManager } from "../utils/initCheckboxManager.js";

export class SeoController {
  constructor({
    formSelector = "#frm",
    insertBtnSelector = "#submitBtn",
    updateBtnSelector = "#editBtn",
    deleteBtnSelector = ".delete-btn",
    branchSelector = "#branch_id",
    pathSelector = "#path",
  } = {}) {
    this.form = document.querySelector(formSelector);
    this.insertBtn = document.querySelector(insertBtnSelector);
    this.updateBtn = document.querySelector(updateBtnSelector);
    this.deleteButtons = document.querySelectorAll(deleteBtnSelector);
    this.branchSelect = document.querySelector(branchSelector);
    this.pathSelect = document.querySelector(pathSelector);
  }

  init() {
    console.log("[SeoController.js] 초기화됨");

    if (this.form && this.insertBtn) {
      this.insertBtn.addEventListener("click", this.insert.bind(this));
    }

    if (this.form && this.updateBtn) {
      this.updateBtn.addEventListener("click", this.update.bind(this));
    }

    this.attachDeleteEvents();
    this.attachBranchChangeEvent();

    this.initSelectedBranchPaths();

    initCheckboxManager(async (selectedIds) => {
      const formData = new FormData();
      formData.set("mode", "delete_array");
      formData.set("ids", JSON.stringify(selectedIds));
      await this.sendRequest(formData, "선택 항목이 삭제되었습니다.");
    });
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
      const res = await fetcher(API.SEO, formData);
      alert(res.message || successMessage);

      const mode = formData.get("mode");
      if (mode === "delete" || mode === "delete_array") {
        location.reload();
      } else {
        location.href = "/admin/pages/setting/seo.php";
      }
    } catch (err) {
      alert(err.message || "처리 중 오류가 발생했습니다.");
    }
  }

  attachBranchChangeEvent() {
    if (!this.branchSelect || !this.pathSelect) return;

    this.branchSelect.addEventListener("change", async () => {
      const selectedOption =
        this.branchSelect.options[this.branchSelect.selectedIndex];
      const jsonUrl = selectedOption.getAttribute("data-json");

      this.pathSelect.innerHTML = '<option value="">페이지 경로 선택</option>';
      if (!jsonUrl) return;

      try {
        const res = await fetch(jsonUrl);
        if (!res.ok) throw new Error("JSON 불러오기 실패");

        const data = await res.json();
        const pages = [];

        if (Array.isArray(data.pages)) {
          this.extractPaths(data.pages, data.dirname || "", pages, []);
        }

        pages.forEach((item) => {
          const option = document.createElement("option");
          option.value = item.path;
          option.textContent = item.title;
          this.pathSelect.appendChild(option);
        });
      } catch (error) {
        console.warn("오류 발생:", error);
        alert("페이지 정보를 불러오는 데 실패했습니다.");
      }
    });
  }

  extractPaths(pages, baseDir, result, parentTitles = []) {
    pages.forEach((page) => {
      if (page.board_no) return;

      const dirname = page.dirname || baseDir;
      const filename = page.filename;
      const title = page.title || "";

      const fullTitle = [...parentTitles, title].join(" - ");

      if (filename && dirname) {
        result.push({
          path: `${dirname}/${filename}.php`,
          title: fullTitle,
        });
      }

      if (Array.isArray(page.pages)) {
        this.extractPaths(page.pages, dirname, result, [
          ...parentTitles,
          title,
        ]);
      }
    });
  }

  async initSelectedBranchPaths() {
    if (!this.branchSelect || !this.pathSelect) return;

    const selectedOption =
      this.branchSelect.options[this.branchSelect.selectedIndex];
    const jsonUrl = selectedOption.getAttribute("data-json");
    const currentSelectedPath = this.pathSelect.options[0]?.value || "";

    this.pathSelect.innerHTML = '<option value="">페이지 경로 선택</option>';
    if (!jsonUrl) return;

    try {
      const res = await fetch(jsonUrl);
      if (!res.ok) throw new Error("JSON 불러오기 실패");

      const data = await res.json();
      const pages = [];

      if (Array.isArray(data.pages)) {
        this.extractPaths(data.pages, data.dirname || "", pages, []);
      }

      pages.forEach((item) => {
        const option = document.createElement("option");
        option.value = item.path;
        option.textContent = item.title;
        if (item.path === currentSelectedPath) {
          option.selected = true;
        }
        this.pathSelect.appendChild(option);
      });
    } catch (error) {
      console.warn("초기 경로 로딩 오류:", error);
    }
  }
}
