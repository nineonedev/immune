import { AccountController } from "./Controller/AccountController.js";
import { MemberController } from "./Controller/MemberController.js";
import { SettingController } from "./Controller/SettingController.js"; // ✅ 추가
import { SeoController } from "./Controller/SeoController.js";
import { FaqController } from "./Controller/FaqController.js";
import { NonPayController } from "./Controller/NonPayController.js";
import { DoctorController } from "./Controller/DoctorController.js";
import { previewImage } from "./Core/previewImage.js";
import { FacilityController } from "./Controller/FacilityController.js";
import { BannerController } from "./Controller/BannerController.js";

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

    case "setting":
      const settingController = new SettingController();
      settingController.init();
      break;

    case "seo":
      const seoController = new SeoController();
      seoController.init();
      break;

    case "faq":
      const faqController = new FaqController();
      faqController.init();
      break;

    case "nonpay":
      const nonPayController = new NonPayController();
      nonPayController.init();
      break;

    case "doctor":
      const doctorController = new DoctorController();
      doctorController.init();
      break;

    case "facility":
      const facilityController = new FacilityController();
      facilityController.init();

    case "banner":
      const bannerController = new BannerController();
      bannerController.init();

    default:
      break;
  }
});
