//------------------------로그인 페이지

$(function () {
  const $loginWrap = $('.no-member-login');
  if (!$loginWrap.length) return;

  const $id = $('#user_id');
  const $pw = $('#user_pwd');
  const $btn = $('.no-member-login .submit');

  function toggleLoginActive() {
    const idVal = $id.val().trim();
    const pwVal = $pw.val().trim();

    if (idVal && pwVal) {
      $btn.addClass('active');
    } else {
      $btn.removeClass('active');
    }
  }

  $id.on('input', toggleLoginActive);
  $pw.on('input', toggleLoginActive);
});

function doLogin() {
  if ($('#user_id').val() == '') {
    alert('아이디를 입력해주세요.');
    $('#user_id').focus();
    return;
  }

  if ($('#user_pwd').val() == '') {
    alert('비밀번호를 입력해주세요.');
    $('#user_pwd').focus();
    return;
  }
}

//------------------------회원가입 페이지

$(function () {
  const $signupWrap = $('.no-member-signup');
  if (!$signupWrap.length) return;

  const $userId = $signupWrap.find('#user_id');
  const $userPwd = $signupWrap.find('#user_pwd');
  const $userName = $signupWrap.find('#user_name');
  const $userPhone = $signupWrap.find('#user_phone');
  const $userEmail = $signupWrap.find('#user_email');
  const $checkBtn = $signupWrap.find('.check-btn');
  const $submitBtn = $signupWrap.find('.submit');

  // 아이디 입력 시 → 중복확인 버튼 활성화
  $userId.on('input', function () {
    if ($(this).val().trim()) {
      $checkBtn.addClass('active');
    } else {
      $checkBtn.removeClass('active');
    }
    toggleSignupActive();
  });

  // 나머지 필드들 입력 시 → 전체 입력 체크
  $userPwd.on('input', toggleSignupActive);
  $userName.on('input', toggleSignupActive);
  $userPhone.on('input', toggleSignupActive);
  $userEmail.on('input', toggleSignupActive);

  function toggleSignupActive() {
    const idVal = $userId.val().trim();
    const pwdVal = $userPwd.val().trim();
    const nameVal = $userName.val().trim();
    const phoneVal = $userPhone.val().trim();
    const emailVal = $userEmail.val().trim();

    if (idVal && pwdVal && nameVal && phoneVal && emailVal) {
      $submitBtn.addClass('active');
    } else {
      $submitBtn.removeClass('active');
    }
  }
});

function doSignUp() {
  if ($('#user_id').val() == '') {
    alert('아이디를 입력해주세요.');
    $('#user_id').focus();
    return;
  }

  if ($('#user_pwd').val() == '') {
    alert('비밀번호를 입력해주세요.');
    $('#user_pwd').focus();
    return;
  }

  if ($('#user_name').val() == '') {
    alert('이름을 입력해주세요.');
    $('#user_name').focus();
    return;
  }

  if ($('#user_phone').val() == '') {
    alert('연락처를 입력해주세요.');
    $('#user_phone').focus();
    return;
  }

  if ($('#user_email').val() == '') {
    alert('이메일을 입력해주세요.');
    $('#user_email').focus();
    return;
  }

  if (!$('#private_check').is(':checked')) {
    alert('개인정보 취급방침에 동의하셔야 합니다.');
    $('#private_check').focus();
    return;
  }

  if (!$('#terms_check').is(':checked')) {
    alert('이용약관에 동의하셔야 합니다.');
    $('#terms_check').focus();
    return;
  }
}

$('.check-list figure').each(function () {
  const $figure = $(this);
  const $checkbox = $figure.find('input[type="checkbox"]');
  const $icon = $figure.find('label i');

  $checkbox.on('change', function () {
    if (this.checked) {
      $icon.css('opacity', 1);
    } else {
      $icon.css('opacity', 0);
    }
  });
});

$('.private-btn').on('click', function (e) {
  e.preventDefault();
  const $btn = $(this);
  const $figure = $btn.closest('figure');
  const $box = $figure.next('.private-box');

  $box.stop(true, true).slideToggle(300, function () {
    const isVisible = $(this).is(':visible');
    $btn.text(isVisible ? '닫기' : '보기');
  });
});

//------------------------ 아이디찾기 페이지

$(function () {
  const $name = $('#find_user_name');
  const $email = $('#find_user_email');
  const $btn = $('.no-member-findid .submit');

  function toggleFindIdActive() {
    const nameVal = $name.val().trim();
    const emailVal = $email.val().trim();

    if (nameVal && emailVal) {
      $btn.addClass('active');
    } else {
      $btn.removeClass('active');
    }
  }

  $name.on('input', toggleFindIdActive);
  $email.on('input', toggleFindIdActive);
});

function doFindId() {
  if ($('#find_user_name').val() == '') {
    alert('이름을 입력해주세요.');
    $('#find_user_name').focus();
    return;
  }

  if ($('#find_user_email').val() == '') {
    alert('이메일을 입력해주세요.');
    $('#find_user_email').focus();
    return;
  }
}

//------------------------ 비밀번호찾기 페이지

$(function () {
  const $loginWrap = $('.no-member-findpwd');
  if (!$loginWrap.length) return;

  const $name = $('#user_name');
  const $id = $('#user_id');
  const $btn = $('.no-member-findpwd .submit');

  function toggleFindPwdActive() {
    const nameVal = $name.val().trim();
    const idVal = $id.val().trim();

    if (nameVal && idVal) {
      $btn.addClass('active');
    } else {
      $btn.removeClass('active');
    }
  }

  $name.on('input', toggleFindPwdActive);
  $id.on('input', toggleFindPwdActive);
});

function doFindPwd() {
  if ($('#user_name').val() == '') {
    alert('이름을 입력해주세요.');
    $('#user_name').focus();
    return;
  }

  if ($('#user_id').val() == '') {
    alert('아이디를 입력해주세요.');
    $('#user_id').focus();
    return;
  }
}

//------------------------ 프로필정보 페이지

$(function () {
  const $wrap = $('.no-member-profile');
  if (!$wrap.length) return;

  const $inputs = $wrap.find('#user_name, #user_phone, #user_email, #user_birth');
  const $btn = $wrap.find('.submit');

  function toggleProfileActive() {
    let isAnyFilled = false;

    $inputs.each(function () {
      if ($(this).val().trim()) {
        isAnyFilled = true;
        return false;
      }
    });

    if (isAnyFilled) {
      $btn.addClass('active');
    } else {
      $btn.removeClass('active');
    }
  }

  $inputs.on('input', toggleProfileActive);
});

function doProfile() {
  const name = $('#user_name').val().trim();
  const phone = $('#user_phone').val().trim();
  const email = $('#user_email').val().trim();
  const birth = $('#user_birth').val().trim();

  if (!name && !phone && !email && !birth) {
    alert('수정할 정보를 입력해주세요.');
    return;
  }
}

//------------------------ 비밀번호 수정 페이지

$(function () {
  const $wrap = $('.no-member-pwdchange');
  if (!$wrap.length) return;

  const $old = $('#pwd_old');
  const $new = $('#pwd_new');
  const $confirm = $('#pwd_new_confirm');
  const $btn = $wrap.find('.submit');

  function togglePwdActive() {
    const oldVal = $old.val().trim();
    const newVal = $new.val().trim();
    const confirmVal = $confirm.val().trim();

    const isAllFilled = oldVal.length > 0 && newVal.length > 0 && confirmVal.length > 0;

    $btn.toggleClass('active', isAllFilled);
  }

  $old.on('input', togglePwdActive);
  $new.on('input', togglePwdActive);
  $confirm.on('input', togglePwdActive);
});

function doPwdChange() {
  const oldVal = $('#pwd_old').val().trim();
  const newVal = $('#pwd_new').val().trim();
  const confirmVal = $('#pwd_new_confirm').val().trim();

  if (!oldVal || !newVal || !confirmVal) {
    alert('모든 항목을 입력해주세요.');
    return;
  }
}
