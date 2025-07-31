$(document).ready(function () {
  $('.floating-bottom.inquiry').on('click', function (e) {
    e.preventDefault();
    $('.herb-form.product-inquiry').addClass('active');
  });

  $('.herb-form .close').on('click', function () {
    $('.herb-form.product-inquiry').removeClass('active');
  });

  //

  $('.simple-inquiry-btn').on('click', function (e) {
    e.preventDefault();
    $('.herb-form.customized-inquiry').addClass('active');
  });

  $('.herb-form .close').on('click', function () {
    $('.herb-form.customized-inquiry').removeClass('active');
  });

  $('input[name="first_visit"]').on('change', function () {
    if ($(this).val() === '아니요(재구매)') {
      $('.spot-radio').slideDown();
    } else {
      $('.spot-radio').slideUp();
      $('input[name="spot"]').prop('checked', false);
    }
  });

  // 첫 방문 여부
  $('input[name="first_visit"]').on('change', function () {
    if ($(this).val() === '아니요(재구매)') {
      $('.spot-radio').css('display', 'block');
    } else {
      $('.spot-radio').css('display', 'none');
      $('input[name="spot"]').prop('checked', false);
    }
  });
});
