<?php
$cur_gnb = $CUR_PAGE_LIST[0]['title'];
$cur_page = $CUR_PAGE_LIST[1]['title'];

$img_path = '';
$kr_title = '';
$eng_title = '';

if ($cur_gnb == 'About') {
    $img_path = '1';
    $eng_title = 'ABOUT';
    $h2TextColorClass = 'text-white';
} else if ($cur_gnb == 'Portfolio') {
    $img_path = '2';
    $eng_title = 'PORTFOLIO';
} else if ($cur_gnb == 'Trend') {
    $img_path = '3';
    $eng_title = 'TREND';
} else if ($cur_gnb == 'Contact') {
    $img_path = '4';
    $eng_title = 'CONTACT';
}
?>

<section class="no-sub-visual">
    <div class="no-container-xl">
        <figure>
            <img src="/resource/images/sub-visual<?= $img_path ?>.jpg">
        </figure>

        <h2 class="no-display-lg font-en reveal-char <?= isset($h2TextColorClass) ? $h2TextColorClass : '' ?>"><?= $eng_title ?></h2>
        </hgroup>
    </div>
</section>