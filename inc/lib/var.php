<?php

// 배너 위치 설정
$arr_banner_loc = [
    'site_main' => '메인 상단이미지',
];

// 사이트 데이터 타겟 설정
$siteDataTarget = [
    'subtitle' => '임시제목',
];

// 창 열기 방식 설정
$_targetArr = [
    '_blank' => '새창',
    '_self' => '같은창',
];

// 게시판 타입 설정
$board_type = [
    'bbs' => '게시판',
    'gal' => '갤러리',

    // 홍보센터
    'new' => '뉴스',
    'not' => '공지사항',
];

// 회원가입 동의 내용
$agree_options = [
    'agree_receive_notice'    => ['label' => "공지 등 문자 수신에 동의 (선택)", 'required' => false],
    'agree_privacy_policy'    => ['label' => "개인정보 취급방침 동의 (필수)", 'required' => true],
    'agree_terms_of_service'  => ['label' => "이용약관에 동의 (필수)", 'required' => true]
];

// 지점 변수 설정
$branchList = [
    1 => ['code' => 'gangseo', 'label' => '강서'],
    2 => ['code' => 'gwangmyeong', 'label' => '광명'],
    3 => ['code' => 'sinchon', 'label' => '신촌'],
];

// FAQ 카테고리
$faq_categories = [
  1 => '입원/퇴원/외출',
  2 => '진료/처방/본원치료',
  3 => '입원생활',
  4 => '식이/영양',
  5 => '상담/문의/후기',
  6 => '기타',
];

// 비급여 카테고리 1차
$nonpay_primary_categories = [
    1 => '행위료',
    2 => '약제비',
    3 => '재료비'
];
// 비급여 카테고리 2차
$nonpay_secondary_categories = [
    1 => [
        1 => '검사료',
        2 => '이학요법료',
        3 => '정신요법료',
    ],
    2 => [
        1 => '주사료',
        2 => '약품대',
    ],
    3 => [
        1 => '의료소모품',
        2 => '치료재료대',
    ]
];

// 허용된 파일 확장자
$board_file_allow = ['jpg', 'jpeg', 'png', 'gif', 'zip', 'xls', 'xlsx', 'ppt', 'pptx', 'doc', 'docx', 'pdf', 'hwp', 'mp4', 'mov', 'avi', 'txt', 'webp'];
$employment_file_allow = ['zip', 'xls', 'xlsx', 'ppt', 'pptx', 'doc', 'docx', 'pdf', 'hwp'];
$admission_file_allow = ['jpg', 'jpeg', 'png', 'gif'];

?>