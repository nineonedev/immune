<?php
// popup.new.php

$branchId = $branchId ?? null;
$popupType = $popupType ?? 1;

$db = DB::getInstance();
$today = date('Y-m-d');

// 팝업 가져오기
$sql = "
    SELECT * FROM nb_popups
    WHERE is_active = 1
      AND popup_type = :popup_type
      AND (
          branch_id IS NULL
          OR branch_id = :branch_id
      )
      AND (
          is_unlimited = 1
          OR (start_at <= :today AND end_at >= :today)
      )
    ORDER BY sort_no ASC, id DESC
";

$stmt = $db->prepare($sql);

$stmt->execute([
    ':popup_type' => $popupType,
    ':branch_id' => $branchId,
    ':today' => $today
]);

$popups = $stmt->fetchAll(PDO::FETCH_ASSOC);

// show($popups);
// exit;

// 쿠키 기반 필터링
$visiblePopups = array_filter($popups, function ($popup) {
    return !isset($_COOKIE["popupClosed_{$popup['id']}"]);
});

if (empty($visiblePopups)) return; // 아무것도 출력하지 않음
?>

<!-- 팝업 HTML -->
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
                <?php foreach ($visiblePopups as $index => $popup): ?>
                <li class="swiper-slide" data-index="<?= $index ?>" data-popup-id="<?= $popup['id'] ?>">
                    <figure class="img-box">
                        <?php if ($popup['has_link'] && filter_var($popup['link_url'], FILTER_VALIDATE_URL)): ?>
                        <a href="<?= htmlspecialchars($popup['link_url']) ?>"
                            target="<?= $link_targets[(int)$popup['is_target']]['target'] ?? '_self' ?>">
                            <img src="/uploads/popups/<?= htmlspecialchars($popup['popup_image']) ?>"
                                alt="<?= htmlspecialchars($popup['title']) ?>">
                        </a>
                        <?php else: ?>
                        <img src="/uploads/popups/<?= htmlspecialchars($popup['popup_image']) ?>"
                            alt="<?= htmlspecialchars($popup['title']) ?>">
                        <?php endif; ?>
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
            <button type="button" class="popup-close no-body-md fw600" data-index="close">닫기</button>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="main-popup-bg"></div>

<!-- 팝업 스크립트 -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const mainPopup = document.querySelector(".main-popup-wrap");
    const popupBg = document.querySelector(".main-popup-bg");
    const closeButton = document.querySelector(".popup-close");
    const checkbox = document.getElementById("closeCheck");

    const main_popup = new Swiper('.main-popup-slide', {
        pagination: {
            el: '.main-popup .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '[data-index="next"]',
            prevEl: '[data-index="prev"]',
        },
        speed: 300,
        spaceBetween: 15,
        slidesPerView: 1,
        allowTouchMove: true
    });

    function setPopupCookie(popupId) {
        const expires = new Date();
        expires.setHours(23, 59, 59, 999); // 오늘 자정까지
        document.cookie = `popupClosed_${popupId}=true; expires=${expires.toUTCString()}; path=/`;
    }

    function closePopup() {
        const currentSlide = main_popup.slides[main_popup.activeIndex];
        const popupId = currentSlide?.dataset.popupId;

        if (checkbox.checked && popupId) {
            setPopupCookie(popupId);
        }

        mainPopup.style.display = "none";
        popupBg.style.display = "none";
    }

    // 닫기 버튼
    closeButton.addEventListener("click", closePopup);

    // 체크박스 단독 클릭 시
    checkbox.addEventListener("change", () => {
        if (checkbox.checked) {
            const currentSlide = main_popup.slides[main_popup.activeIndex];
            const popupId = currentSlide?.dataset.popupId;

            if (popupId) {
                setPopupCookie(popupId);
            }

            mainPopup.style.display = "none";
            popupBg.style.display = "none";
        }
    });
});
</script>