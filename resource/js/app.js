$(document).ready(function () {
  AOS.init();

  gsap.registerPlugin(ScrollTrigger);

  window.addEventListener('resize', function () {
    ScrollTrigger.refresh();
  });

  //------------------------------------ header

  $('.current-box').on('click', function () {
    $(this).siblings('.area-list').slideToggle(200);
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > 80) {
      $('.no-header').addClass('scroll');
    } else {
      if (!$('.no-header').is(':hover') || $('.no-main').length == 1) {
        $('.no-header').removeClass('scroll');
      }
    }
  });

  if ($(window).scrollTop() > 80) {
    $('.no-header').addClass('scroll');
  }

  $('.no-header').mouseenter(function () {
    $('.no-header').addClass('active');
  });

  $('.no-header').mouseleave(function () {
    if (!$('.no-header').is(':hover') && $('.no-main').length == 1) {
      $('.no-header').removeClass('active');
    }
  });

  if (!$('.no-main').length) {
    $('.no-header').addClass('active');
  }

  //------------------------------------ header mobile animation

  //header mobile animation
  const m_btn = $('.no-header__btn');
  const m_search = $('.no-header__search');
  const m_menu = $('.no-header__m');
  const m_search_wrap = $('.no-header__search-wrap');
  const m_bg = $('.no-header__popup-bg');

  function disableScroll() {
    $('html, body').css({
      overflow: 'hidden',
      height: '100%',
    });
  }

  function enableScroll() {
    $('html, body').css({
      overflow: '',
      height: '',
    });
  }

  function closeHeader() {
    m_menu.removeClass('active');
    m_search_wrap.removeClass('active');
    m_bg.removeClass('active');
    enableScroll();
  }

  m_btn.click(function () {
    const isOpen = m_menu.hasClass('active');
    m_menu.toggleClass('active');
    m_bg.toggleClass('active');

    if (!isOpen) disableScroll();
    else enableScroll();
  });

  m_search.click(function () {
    const isOpen = m_search_wrap.hasClass('active');
    m_search_wrap.toggleClass('active');
    m_bg.toggleClass('active');

    if (!isOpen) disableScroll();
    else enableScroll();
  });

  $('.h-close, .no-header__popup-bg').click(closeHeader);


  const gnbItems = document.querySelectorAll('.no-header__m-gnb > li > a');
  const lnbItems = document.querySelectorAll('.no-header__m-lnb > li');

  gnbItems.forEach((gnb, index) => {
    gnb.addEventListener('click', (e) => {
      e.preventDefault();

      gnbItems.forEach((el) => el.classList.remove('active'));
      lnbItems.forEach((el) => el.classList.remove('active'));

      gnb.classList.add('active');
      lnbItems[index]?.classList.add('active');
    });
  });

  const $searchBox = $('.header-search-box input');

  $searchBox.on('focus', function () {
    $(this).closest('.header-search-box').addClass('active');
  });

  $searchBox.on('blur', function () {
    $(this).closest('.header-search-box').removeClass('active');
  });

  //------------------------------------ gsap fade-up

  if (document.querySelectorAll('.fade-up').length > 0) {
    document.querySelectorAll('.fade-up').forEach((item) => {
      gsap.fromTo(
        item,
        { opacity: 0, y: 25 },
        {
          opacity: 1,
          y: 0,
          duration: 0.9,
          clearProps: 'y',
          scrollTrigger: {
            trigger: item,
            start: 'top 80%',
            end: 'bottom 20%',
          },
        }
      );
    });
  }

  //------------------------------------ gsap blur

  if (document.querySelectorAll('.blur-js').length > 0) {
    document.querySelectorAll('.blur-js').forEach((item) => {
      gsap.fromTo(
        item,
        { opacity: 0, filter: 'blur(8px)' },
        {
          opacity: 1,
          filter: 'blur(0px)',
          duration: 1.2,
          ease: 'power2.out',
          scrollTrigger: {
            trigger: item,
            start: 'top 80%',
            end: 'bottom 20%',
          },
        }
      );
    });
  }

  //------------------------------------ gsap list-up

  if (document.querySelectorAll('.list-js').length > 0) {
    document.querySelectorAll('.list-js').forEach((list) => {
      let mainItems = list.querySelectorAll(':scope > li');

      gsap.fromTo(
        mainItems,
        { opacity: 0, y: 25 },
        {
          opacity: 1,
          y: 0,
          duration: 0.9,
          stagger: 0.1,
          clearProps: 'y',
          scrollTrigger: {
            trigger: list,
            start: 'top 80%',
            end: 'bottom 20%',
          },
        }
      );
    });
  }

  //------------------------------------ gsap scroll-img

  const images = document.querySelectorAll('.move-img img');

  if (images.length > 0) {
    gsap.set(images, {
      scale: 1.1,
    });

    images.forEach((image) => {
      gsap.fromTo(
        image,
        { yPercent: -10 },
        {
          yPercent: 10,
          scrollTrigger: {
            trigger: image,
            start: 'top bottom',
            end: 'bottom top',
            scrub: 1,
          },
        }
      );
    });
  }

  //------------------------------------ gsap clipPath-img

  document.querySelectorAll('.clip-down-up').forEach((img) => {
    gsap.fromTo(
      img,
      {
        clipPath: 'inset(100% 0 0 0)',
      },
      {
        clipPath: 'inset(0% 0 0 0)',
        duration: 1.2,
        scrollTrigger: {
          trigger: img,
          start: 'top 80%',
        },
      }
    );
  });

  document.querySelectorAll('.scale-img img').forEach((img) => {
    gsap.fromTo(
      img,
      {
        scale: 1.3,
      },
      {
        scale: 1,
        duration: 0.9,
        scrollTrigger: {
          trigger: img,
          start: 'top 80%',
        },
      }
    );
  });

  //------------------------------------ gsap word-reveal

  $('.reveal span').each(function () {
    gsap.fromTo(
      $(this),
      { y: '100%' },
      {
        y: 0,
        duration: 1.2,
        ease: 'power2.out',
        scrollTrigger: {
          trigger: $(this),
          start: 'top 100%',
          end: 'bottom 20%',
        },
      }
    );
  });

  document.querySelectorAll('.reveal-word').forEach((el) => {
    const rawText = el.innerHTML
      .replace(/\n/g, ' ')
      .replace(/<br\s*\/?>/gi, ' <br> ')
      .split(' ')
      .map((word) => {
        if (word === '<br>') return '<br>';
        return `<span class="word-wrap"><span class="word">${word}</span></span>`;
      })
      .join(' ');
    el.innerHTML = rawText;

    const words = el.querySelectorAll('.word');
    gsap.set(words, {
      y: '150%',
      opacity: 0,
      rotate: 3,
    });

    gsap.to(words, {
      y: '0%',
      opacity: 1,
      rotate: 0,
      duration: 0.9,
      ease: 'power2.out',
      stagger: 0.12,
      scrollTrigger: {
        trigger: el,
        start: 'top 80%',
      },
    });
  });

  document.querySelectorAll('.reveal-char').forEach((el) => {
    const originalHTML = el.innerHTML.replace(/\n/g, ' ').replace(/<br\s*\/?>/gi, ' <br> ');

    let resultHTML = '';
    for (let i = 0; i < originalHTML.length; i++) {
      const char = originalHTML[i];
      if (char === '<') {
        if (originalHTML.slice(i, i + 4).toLowerCase() === '<br>') {
          resultHTML += '<br>';
          i += 3;
        }
      } else if (char === ' ') {
        resultHTML += ' ';
      } else {
        resultHTML += `<span class="char-wrap"><span class="char">${char}</span></span>`;
      }
    }

    el.innerHTML = resultHTML;

    const chars = el.querySelectorAll('.char');
    gsap.set(chars, {
      y: '150%',
      opacity: 0,
      rotate: 5,
    });

    gsap.to(chars, {
      y: '0%',
      opacity: 1,
      rotate: 0,
      duration: 0.9,
      ease: 'power2.out',
      stagger: 0.09,
      scrollTrigger: {
        trigger: el,
        start: 'top 80%',
        toggleActions: 'play none none none',
      },
    });
  });

  //------------------------------------ other

  let marquee = $('.no-marquee').marquee({
    duration: 50000,
    direction: 'left',
    startVisible: true,
    duplicated: true,
    gap: 16,
  });


  // basic-slider
  document.querySelectorAll('.basic-slider').forEach((el) => {
    const isV3 = el.classList.contains('v3');

    const options = {
      slidesPerView: 1.2,
      spaceBetween: 16,
      centeredSlides: true,
      slideToClickedSlide: false,
      freeMode: !isV3,
    };

    if (isV3) {
      options.pagination = {
        el: el.querySelector('.swiper-pagination'),
        clickable: true,
      };
    }

    new Swiper(el, options);
  });

  // left-slider
  document.querySelectorAll('.left-slider').forEach((el) => {
    new Swiper(el, {
      slidesPerView: el.classList.contains('viewdb') ? 2.2 : 1.2,
      spaceBetween: 8,
      freeMode: true,
    });
  });

  // nav-slider
  document.querySelectorAll('.sub-nav-slider').forEach((el) => {
    const instance = new Swiper(el, {
      slidesPerView: 'auto',
      spaceBetween: 0,
      freeMode: true,
      slideToClickedSlide: false,
    });

    const activeSlide = el.querySelector('.swiper-slide.active');
    if (activeSlide) {
      const index = [...el.querySelectorAll('.swiper-slide')].indexOf(activeSlide);
      if (index !== -1) {
        instance.slideTo(index, 0);
      }
    }
  });

  // modal-slider
  const modalSwipers = new Map();

  document.querySelectorAll('.mini-modal-wrap').forEach((wrapEl, index) => {
    const sliderEl = wrapEl.querySelector('.modal-slider');
    const nextBtn = wrapEl.querySelector('.swiper-button-next');
    const prevBtn = wrapEl.querySelector('.swiper-button-prev');
    const paginationEl = wrapEl.querySelector('.swiper-pagination-custom');
    const currentEl = paginationEl?.querySelector('.current');
    const totalEl = paginationEl?.querySelector('.total');

    if (!sliderEl) return;

    const swiper = new Swiper(sliderEl, {
      slidesPerView: 1,
      spaceBetween: 0,
      allowTouchMove: false,
      speed: 500,
      navigation: {
        nextEl: nextBtn,
        prevEl: prevBtn,
      },
      on: {
        init() {
          const realSlides = sliderEl.querySelectorAll('.swiper-slide');
          if (totalEl) totalEl.textContent = realSlides.length;
          if (currentEl) currentEl.textContent = this.realIndex + 1;
        },
        slideChange() {
          if (currentEl) currentEl.textContent = this.realIndex + 1;
        },
      },
    });

    // 모달 element를 key로 swiper 저장
    modalSwipers.set(wrapEl, swiper);
  });

  document.querySelectorAll('.mini-modal').forEach((modalItem) => {
    const trigger = modalItem.querySelector('a');
    const modalWrap = modalItem.querySelector('.mini-modal-wrap');
    const closeBtn = modalItem.querySelector('.modal-close');
    const popupBg = document.querySelector('.modal-popup-bg');

    if (!trigger || !modalWrap || !closeBtn) return;

    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      modalWrap.classList.add('active');
      popupBg?.classList.add('active');
    });

    const closeModal = () => {
      modalWrap.classList.remove('active');
      popupBg?.classList.remove('active');

      // 슬라이더 1번째로 초기화
      const swiper = modalSwipers.get(modalWrap);
      if (swiper) swiper.slideTo(0, 0); // 즉시 0번째 슬라이드로 이동 (duration 0)
    };

    closeBtn.addEventListener('click', closeModal);
    popupBg?.addEventListener('click', closeModal);
  });

  // count up
  if ($('.counter').length > 0) {
    ScrollTrigger.create({
      trigger: '.counter',
      start: 'top 80%',
      once: true,
      onEnter: function () {
        $('.counter').each(function () {
          var count = $(this);
          var countTo = parseFloat(count.attr('data-count').replace(/,/g, ''));
          var isDecimal = count.attr('data-count').includes('.');

          $({ countNum: 0 }).animate(
            {
              countNum: countTo,
            },
            {
              duration: 2000,
              easing: 'easeOutCirc',
              step: function () {
                count.text(isDecimal ? this.countNum.toFixed(1) : Math.floor(this.countNum));
              },
              complete: function () {
                count.text(isDecimal ? this.countNum.toFixed(1) : Math.floor(this.countNum));
              },
            }
          );
        });
      },
    });
  }

});

// check

$('.check-wrap a').on('click', function (e) {
  e.preventDefault();

  const target = $(this).data('target');
  if (!target) return;

  $('.form-popup').hide();
  $(target).fadeIn();
  $('.popup-bg').addClass('active');
  $('html, body').addClass('lock');
});

$('.p-close').on('click', function () {
  $(this).closest('.form-popup').fadeOut();
  $('.popup-bg').removeClass('active');
  $('html, body').removeClass('lock');
});

// integrate-link
document.addEventListener('DOMContentLoaded', function () {
  const integrateSection = document.querySelector('.integrate-link');
  if (!integrateSection) return;

  let prevSection = integrateSection.previousElementSibling;
  while (prevSection && prevSection.tagName !== 'SECTION') {
    prevSection = prevSection.previousElementSibling;
  }
  if (!prevSection) return;

  const computedStyle = window.getComputedStyle(prevSection);
  const bgColor = computedStyle.backgroundColor;
  const hasBg = computedStyle.getPropertyValue('background-color');

  const isNoBg =
    !hasBg ||
    bgColor === 'rgba(0, 0, 0, 0)' ||
    bgColor === 'transparent' ||
    bgColor === 'rgb(255, 255, 255)' ||
    bgColor === '#ffffff';

  if (isNoBg) {
    integrateSection.style.borderTop = '1rem solid var(--clr-primary-50)';
  }
});

// top-btn
$('.top_btn, .top_btn_scroll').click(function () {
  $('html, body').animate({ scrollTop: 0 }, 1200);
});

document.addEventListener('DOMContentLoaded', () => {
  const topBtn = document.querySelector('.top_btn');
  const topBtnScroll = document.querySelector('.top_btn_scroll');

  if (!topBtn || !topBtnScroll) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          topBtnScroll.style.display = 'none';
        } else {
          topBtnScroll.style.display = 'flex';
        }
      });
    },
    {
      root: null,
      threshold: 0,
    }
  );

  observer.observe(topBtn);
});


// visual-slider
  document.addEventListener('DOMContentLoaded', function () {
  const visualEl = document.querySelector('.visual-slider');
  if (!visualEl) return;

  const progress = document.querySelector('.progress-fill');
  const playBtn = document.querySelector('.swiper-control.play');
  const pauseBtn = document.querySelector('.swiper-control.pause');
  if (!progress || !playBtn || !pauseBtn) return;

  const rollingTime = visualEl.dataset.rolling
    ? parseInt(visualEl.dataset.rolling, 10)
    : 5000;

  let startTime = null;
  let elapsed = 0;
  let rafId = null;

  function startProgress() {
    startTime = performance.now();
    progress.style.transition = 'none';
    progress.style.width = '0%';
    cancelAnimationFrame(rafId);
    rafId = requestAnimationFrame(animateProgress);
  }

  function animateProgress(timestamp) {
    elapsed = timestamp - startTime;
    const progressPercent = (elapsed / rollingTime) * 100;
    progress.style.width = Math.min(progressPercent, 100) + '%';
    if (elapsed < rollingTime) {
      rafId = requestAnimationFrame(animateProgress);
    }
  }

  function pauseProgress() {
    cancelAnimationFrame(rafId);
  }

  function resumeProgress() {
    startTime = performance.now() - elapsed;
    rafId = requestAnimationFrame(animateProgress);
  }

  const swiper = new Swiper('.visual-slider', {
    loop: true,
    autoplay: {
      delay: rollingTime,
      disableOnInteraction: false
    },
    on: {
      slideChangeTransitionStart() {
        elapsed = 0;
        startProgress();
      }
    }
  });

  startProgress();

  pauseBtn.addEventListener('click', () => {
    swiper.autoplay.stop();
    pauseProgress();
  });

  playBtn.addEventListener('click', () => {
    swiper.autoplay.start();
    resumeProgress();
  });
});