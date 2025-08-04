import { AccountController } from "./Controller/AccountController.js";
import { MemberController } from "./Controller/MemberController.js";
import { SettingController } from "./Controller/SettingController.js"; // ✅ 추가
import { SeoController } from "./Controller/SeoController.js";
import { FaqController } from "./Controller/FaqController.js";
import { NonPayController } from "./Controller/NonPayController.js";

document.addEventListener("DOMContentLoaded", () => {
  const page = document.body.dataset.page;

  switch (page) {
    case "account":
      const accountController = new AccountController();
      accountController.init();
      break;

    case "member":
      const memberController = new MemberController();
      memberController.init();
      break;

    case "setting": // ✅
      const settingController = new SettingController();
      settingController.init();
      break;

    case "seo": // ✅
      const seoController = new SeoController();
      seoController.init();
      break;

    case "faq": // ✅
      const faqController = new FaqController();
      faqController.init();
      break;

    case "nonpay":
      const nonPayController = new NonPayController();
      nonPayController.init();

    default:
      // 페이지 매칭 안 될 경우 아무 처리 안 함
      break;
  }
});
