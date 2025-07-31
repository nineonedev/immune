import { AccountController } from "./Controller/account.js";

document.addEventListener("DOMContentLoaded", () => {
  const controller = new AccountController();
  controller.init();
});
