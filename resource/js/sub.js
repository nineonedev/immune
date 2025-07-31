$(document).ready(function () {
  if (document.querySelector('.no-rehab-sub-gyn-doctor')) {
    document.querySelectorAll('.integrate-link i').forEach(function (icon) {
      icon.style.color = '#D66F6F';
    });
  }

  if (document.querySelector('.no-facility')) {
    $('.integrate-link .facility-show').css('display', 'block');

    $('.integrate-link .link-list li').each(function () {
      const $h3 = $(this).find('h3');
      if ($h3.length && $h3.text().trim() === '시설 둘러보기') {
        $(this).remove();
      }
    });
  }

  if (document.querySelector('.no-location')) {
    $('.integrate-link .link-list li').each(function () {
      const $h3 = $(this).find('h3');
      if ($h3.length && $h3.text().trim() === '오시는 길') {
        $(this).remove();
      }
    });
  }

  if (document.querySelector('.no-review')) {
    $('.integrate-link .link-list li').each(function () {
      const $h3 = $(this).find('h3');
      if ($h3.length && $h3.text().trim() === '환자후기') {
        $(this).remove();
      }
    });
  }

  //-----------------------------------------------

  $('.updown-content > a').on('click', function () {
    const $this = $(this);
    const $content = $this.next('.content');

    $content.stop(true, true).slideToggle(300, function () {
      document.querySelectorAll('[data-aos]').forEach((el) => {
        const rect = el.getBoundingClientRect();
        const inView = rect.top < window.innerHeight && rect.bottom > 0;
        if (inView) el.classList.add('aos-animate');
      });

      AOS.refreshHard();
      ScrollTrigger.refresh();
    });

    $this.toggleClass('active');
  });

  const btns = document.querySelectorAll('.tabcontent .tab li');
  const items = document.querySelectorAll('.tabcontent .content > li');

  btns.forEach((btn, index) => {
    btn.addEventListener('click', function () {
      btns.forEach((b) => b.classList.remove('active'));
      btn.classList.add('active');

      items.forEach((item) => item.classList.remove('active'));
      if (items[index]) items[index].classList.add('active');
    });
  });

  $('.faq-list li .top').on('click', function () {
    const $li = $(this).closest('li');
    const $answer = $li.find('.answer');

    if ($li.hasClass('active')) {
      $li.removeClass('active');
      $answer.slideUp(300);
    } else {
      $('.faq-list li').removeClass('active').find('.answer').slideUp(300);
      $li.addClass('active');
      $answer.slideDown(300);
    }
  });

  const neuroWrap = document.querySelector('.neuro-animation-wrap');
  if (neuroWrap) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: '.neuro-animation-wrap',
        start: 'top 80%',
      },
    });

    tl.to(
      '.neuro-animation-wrap .cr1',
      {
        top: '30%',
        left: '50%',
        opacity: 1,
        duration: 1.2,
        ease: 'power2.out',
      },
      0
    );

    tl.to(
      '.neuro-animation-wrap .cr2',
      {
        top: '70%',
        left: '25%',
        opacity: 1,
        duration: 1.2,
        ease: 'power2.out',
      },
      0
    );

    tl.to(
      '.neuro-animation-wrap .cr3',
      {
        top: '70%',
        left: '75%',
        opacity: 1,
        duration: 1.2,
        ease: 'power2.out',
      },
      0
    );
  }

  // ------------------------

  const categoryLinks = document.querySelectorAll('.no-nonpayment .cartegory-wrap li a');
  const tableLists = document.querySelectorAll('.table-list');

  categoryLinks.forEach((link, index) => {
    link.addEventListener('click', function (event) {
      event.preventDefault();

      categoryLinks.forEach((link) => link.classList.remove('active'));

      link.classList.add('active');

      tableLists.forEach((table) => table.classList.remove('active'));

      const selectedTable = tableLists[index];
      selectedTable.classList.add('active');
    });
  });

  // ---------------------------

  const $groups = $('.radio-group-wrap');
  if (!$groups.length) return;

  $groups.each(function () {
    const $wrap = $(this);
    const $list = $wrap.find('.radio-list');
    const $text = $wrap.find('.radio-select p');

    $wrap.on('click', function (e) {
      e.stopPropagation();

      if ($wrap.hasClass('active')) {
        $wrap.removeClass('active');
        $list.stop(true, true).slideUp(0);
      } else {
        $('.radio-group-wrap.active').removeClass('active').find('.radio-list').slideUp(0);
        $wrap.addClass('active');
        $list.stop(true, true).slideDown(300);
      }
    });

    $list.find('label').on('click', function (e) {
      e.stopPropagation();
      const val = $(this).text().trim();
      $text.text(val);
      $wrap.removeClass('active');
      $list.stop(true, true).slideUp(0);
    });
  });

  $(document).on('click', function () {
    $('.radio-group-wrap.active').removeClass('active').find('.radio-list').slideUp(0);
  });

  // 체크박스 커스텀 체크 상태 처리
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

  // 개인정보처리방침 toggle
  $('.private-btn').on('click', function (e) {
    e.preventDefault();
    const $btn = $(this);
    const $box = $btn.closest('.check-list').find('.private-box');

    $box.stop(true, true).slideToggle(300, function () {
      const isVisible = $(this).is(':visible');
      $btn.text(isVisible ? '닫기' : '보기');
    });
  });

  const $name = $('#name');
  const $phone = $('#phone');
  const $private = $('#private_check');
  const $submit = $('.submit');

  function checkFormValidity() {
    const nameVal = $name.val().trim();
    const phoneVal = $phone.val().trim();
    const isPrivateChecked = $private.prop('checked');

    if (nameVal && phoneVal && isPrivateChecked) {
      $submit.addClass('active');
    } else {
      $submit.removeClass('active');
    }
  }

  $name.on('input', checkFormValidity);
  $phone.on('input', checkFormValidity);
  $private.on('change', checkFormValidity);
});
