import {
  toggleInputByCheckbox,
  toggleInputsByRadioMap,
  toggleInputByRadio,
} from "./helper.js";

$(document).ready(function () {
  $(".floating-bottom.inquiry").on("click", function (e) {
    e.preventDefault();

    $(".herb-form.product-inquiry").addClass("active");
  });

  $(".herb-form .close").on("click", function () {
    $(".herb-form.product-inquiry").removeClass("active");
  });

  $(".simple-inquiry-btn").on("click", function (e) {
    e.preventDefault();

    $(".herb-form.customized-inquiry").addClass("active");
  });

  $(".herb-form .close").on("click", function () {
    $(".herb-form.customized-inquiry").removeClass("active");
  });

  $('input[name="first_visit"]').on("change", function () {
    if ($(this).val() === "0") {
      $(".spot-radio").slideDown();
    } else {
      $(".spot-radio").slideUp();
      $('input[name="branch_id"]').prop("checked", false);
    }
  });

  toggleInputByRadio("birth_exp", "2", 'input[name="birth_count"]');

  toggleInputByRadio("miscarriage_exp", "2", 'input[name="miscarriage_count"]');

  toggleInputsByRadioMap("menstrual_status", {
    1: 'input[name="menstrual_cycle"]',
    3: 'input[name="menopause_age"]',
  });

  toggleInputByCheckbox(
    'input.etc-toggle[name="pain_menstrual[]"]',
    ".pain-mens-etc"
  );
});
