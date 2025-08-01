import { AccountController } from "./Controller/AccountController.js";
import { MemberController } from "./Controller/MemberController.js";
import { SettingController } from "./Controller/SettingController.js"; // ✅ 추가

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

    case "setting": // ✅ setting 페이지용 컨트롤러 등록
      const settingController = new SettingController();
      settingController.init();
      break;

    default:
      // 페이지 매칭 안 될 경우 아무 처리 안 함
      break;
  }
});
