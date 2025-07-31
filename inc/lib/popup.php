<?php

// "오늘 하루 그만 보기" 쿠키 확인
$popupClosed = isset($_COOKIE['popupClosed']) && $_COOKIE['popupClosed'] === 'true';
$db = DB::getInstance(); 

if (!$popupClosed) {
    // 데이터베이스에서 팝업 데이터 가져오기
    $sql = "SELECT * FROM nb_popup WHERE p_view = 'Y' ORDER BY p_idx ASC"; 
    $stmt = $db->query($sql);
    $popups = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $popupCount = count($popups); // 팝업 개수 가져오기

	if (!empty($popups)) {
	?>
<div class="main-popup-wrap">
    <div class="main-popup">
        <div class="main-popup-top">

            <ul class="swiper-component">
                <li class="swiper-button-prev popup-prev arrow" data-index="prev">
                    <i class="fa-regular fa-angle-up fa-rotate-270 i-30"></i>
                </li>
                <li class="swiper-button-next popup-next arrow" data-index="next">
                    <i class="fa-regular fa-angle-up fa-rotate-90 i-30"></i>
                </li>
            </ul>
        </div>

        <div class="main-popup-mid main-popup-slide">
            <ul class="swiper-wrapper">
                <?php foreach ($popups as $index => $popup): ?>
                <li class="swiper-slide" data-index="<?= $index ?>">
                    <figure class="img-box">
                        <a href="<?= htmlspecialchars($popup['p_link'], ENT_QUOTES, 'UTF-8'); ?>"
                            target="<?= $popup['p_target'] === '_none' ? '_self' : '_self' ?>">
                            <img src="<?= htmlspecialchars('/uploads/popup/' . $popup['p_img'], ENT_QUOTES, 'UTF-8'); ?>"
                                alt="<?= htmlspecialchars($popup['p_title'], ENT_QUOTES, 'UTF-8'); ?>">
                        </a>
                    </figure>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="main-popup-bottom">
            <label for="closeCheck" id="toggleLabel" class="no-body-md fw300">
                <input type="checkbox" id="closeCheck">
                오늘 하루 그만 보기
            </label>
            <button type="button" class="popup-close no-body-md fw600" data-index="close">닫기
            </button>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</div>

<div class="main-popup-bg"></div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const mainPopup = document.querySelector(".main-popup-wrap");
    const popupBg = document.querySelector(".main-popup-bg");
    const closeButton = document.querySelector(".popup-close");
    const checkbox = document.getElementById("closeCheck");

    // Swiper
    const main_popup = new Swiper('.main-popup-slide', {
        pagination: {
            el: '.main-popup .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '[data-index="next"]',
            prevEl: '[data-index="prev"]',
        },
        speed: 0,
        spaceBetween: 15,
        slidesPerView: 1,
        allowTouchMove: false
    });

    // 닫기 버튼 클릭 → 팝업과 배경 모두 닫기
    if (closeButton && mainPopup && popupBg) {
        closeButton.addEventListener("click", () => {
            const currentIndex = main_popup.activeIndex;
            const totalSlides = main_popup.slides.length;

            if (currentIndex < totalSlides - 1) {
                main_popup.slideNext(); // 다음 슬라이드로
            } else {
                // 마지막 슬라이드면 팝업 닫기
                mainPopup.style.display = "none";
                popupBg.style.display = "none";

                // 체크되어 있으면 쿠키 설정
                if (checkbox && checkbox.checked) {
                    const expires = new Date();
                    expires.setHours(23, 59, 59, 999);
                    document.cookie = `popupClosed=true; expires=${expires.toUTCString()}; path=/`;
                }
            }
        });
    }

    // 체크박스 클릭 시 → 바로 닫고 쿠키 설정
    if (checkbox && mainPopup && popupBg) {
        checkbox.addEventListener("change", () => {
            if (checkbox.checked) {
                mainPopup.style.display = "none";
                popupBg.style.display = "none";
                const expires = new Date();
                expires.setHours(23, 59, 59, 999);
                document.cookie = `popupClosed=true; expires=${expires.toUTCString()}; path=/`;
            }
        });
    }
});
</script>

<?php
    }
}
?>