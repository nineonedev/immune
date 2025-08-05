<?php

// 배너 위치 설정
$arr_banner_loc = [
    'site_main' => '메인 상단이미지',
];

$banner_types = [
    1 => '메인 페이지',
    2 => '암면역센터',
    3 => '신경면역센터',
    4 => '재활센터',
    5 => '시설안내',
    6 => '면력채널',
];

$popup_types = [
    1 => '메인 페이지',
    2 => '암면역센터',
    3 => '신경면역센터',
    4 => '재활센터',
    5 => '시설안내',
    6 => '면력채널',
];


$has_link = [
    1 => '링크',
    2 => '비링크',
];

$is_unlimited = [
    1 => '무기한 노출',
    2 => '노출 기간 설정'
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

// ACTIVE 공통
$is_active = [
    1 => "활성화",
    0 => "비활성화"
];

// 부서 리스트
$departments = [
    1 => '내과',
    2 => '정형외과',
    3 => '피부과',
];

// 시설 카테고리
$facilities = [
    1 => "VIP",
    2 => "다인입원실",
    3 => "회복을 끌어 올리는 다양한 치료공간",
    4 => "24시간/365일 힐링 할 수 있는 환경"
];

// 저서 및 논문 노출 여부
$publication_visible = [
    1 => '노출',
    0 => '숨김',
];

$consult_time_options = [
    1 => '상관없음',
    2 => '10:00 - 11:00',
    3 => '11:00 - 12:00',
    4 => '12:00 - 13:00',
    5 => '13:00 - 14:00',
    6 => '14:00 - 15:00',
    7 => '15:00 - 16:00',
    8 => '16:00 - 17:00',
    9 => '17:00 - 18:00',
];


$inquiry_types = [
    1 => '공진단',
    2 => '경옥고',
    3 => '관절고',
];

// 희망 진료 항목
$hope_treatments = [
    1 => "상관없음",
    2 => "암센터",
    3 => "신경면역센터",
    4 => "재활센터",
    5 => "기타",
];

//공진단 · 한약 변수
$gender_options = [
    1 => '남성',
    2 => '여성',
];

$product_consult_time_options = [
    1 => '10:00 - 12:00',
    2 => '12:00 - 14:00',
    3 => '14:00 - 16:00',
    4 => '16:00 - 18:00',
];

$first_visit_options = [
    1 => '네 (첫 방문)',
    0 => '아니요 (재구매)',
];

$indigest_options = [
    1 => '항상 안 되는 느낌',
    2 => '가끔씩만',
];

$reason_options = [
    1 => '공복 시',
    2 => '매운 것 먹을 때',
];

$belly_pain_options = [
    1 => '공복 시',
    2 => '식사 후',
    3 => '스트레스 받은 후',
];

// 1일 음수량
$drink_amount_options = [
    1 => '1L 미만',
    2 => '1L ~ 2L',
    3 => '2L 이상',
];

// 손의 온도
$hand_temp_options = [
    1 => '따뜻하다',
    2 => '차갑다',
];

// 발의 온도
$foot_temp_options = [
    1 => '따뜻하다',
    2 => '차갑다',
];

// 잘 붓는 신체 부위
$swelling_area_options = [
    1 => '전신',
    2 => '얼굴',
    3 => '손',
    4 => '다리, 발',
];

// 하루 중 붓기가 가장 심한 시간
$swelling_time_options = [
    1 => '아침',
    2 => '저녁',
    3 => '하루종일',
];

// 출산 여부
$birth_exp_options = [
    1 => '경험 없음',
    2 => '경험 있음',
];

// 유산 여부
$miscarriage_exp_options = [
    1 => '경험 없음',
    2 => '경험 있음',
];

// 생리 주기 상태
$menstrual_status_options = [
    1 => '주기가 규칙적이다',
    2 => '주기가 불규칙하다',
    3 => '폐경기이다',
];




// 허용된 파일 확장자
$board_file_allow = ['jpg', 'jpeg', 'png', 'gif', 'zip', 'xls', 'xlsx', 'ppt', 'pptx', 'doc', 'docx', 'pdf', 'hwp', 'mp4', 'mov', 'avi', 'txt', 'webp'];
$employment_file_allow = ['zip', 'xls', 'xlsx', 'ppt', 'pptx', 'doc', 'docx', 'pdf', 'hwp'];
$admission_file_allow = ['jpg', 'jpeg', 'png', 'gif'];

?>