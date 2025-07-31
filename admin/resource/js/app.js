import { AccountController } from "./Controller/AccountController.js";

document.addEventListener("DOMContentLoaded", () => {
  const controller = new AccountController();
  controller.init();
});
