-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- 호스트: db:3306
-- 생성 시간: 25-07-15 15:31
-- 서버 버전: 8.0.42
-- PHP 버전: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `nineonelabs`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_admin`
--

CREATE TABLE `nb_admin` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `uid` varchar(25) NOT NULL COMMENT '아이디',
  `upwd` varchar(64) NOT NULL COMMENT '패스워드',
  `uname` varchar(25) NOT NULL COMMENT '관리자명',
  `active_status` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '사용여부'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='관리자 계정 관리';

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_banner`
--

CREATE TABLE `nb_banner` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `b_loc` varchar(64) NOT NULL COMMENT '노출위치 main, main_top_right 등',
  `b_img` varchar(64) NOT NULL COMMENT '이미지파일명',
  `b_link` varchar(128) NOT NULL COMMENT '배너링크',
  `b_target` enum('_none','_self','_blank') NOT NULL DEFAULT '_self' COMMENT '링크 형식',
  `b_view` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '관리자명',
  `b_title` varchar(50) NOT NULL COMMENT '배너 제목',
  `b_idx` int NOT NULL DEFAULT '0' COMMENT '순서',
  `b_none_limit` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '무기한 배너여부(Y:무기한, 기한)',
  `b_sdate` date DEFAULT NULL COMMENT '시작일 - 00 시부터 시작',
  `b_edate` date DEFAULT NULL COMMENT '종료일 - 23시 59분 59초까지',
  `b_rdate` datetime DEFAULT NULL COMMENT '배너등록일',
  `b_desc` varchar(256) DEFAULT NULL COMMENT '배너설명(필요한경우)',
  `b_img_mobile` varchar(64) DEFAULT NULL,
  `b_contents` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='배너 관리';

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_board`
--

CREATE TABLE `nb_board` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `board_no` int NOT NULL COMMENT '게시판 고유번호',
  `user_no` int NOT NULL DEFAULT '0' COMMENT '회원 고유번호',
  `category_no` int NOT NULL DEFAULT '0' COMMENT '게시판 카테고리 번호',
  `comment_cnt` int NOT NULL DEFAULT '0' COMMENT '등록된 댓글수',
  `title` varchar(200) NOT NULL COMMENT '제목',
  `contents` text NOT NULL COMMENT '내용',
  `regdate` datetime DEFAULT NULL COMMENT '등록일',
  `read_cnt` int NOT NULL DEFAULT '0' COMMENT '조회수',
  `thumb_image` varchar(125) DEFAULT NULL COMMENT '썸네일 이미지(게시판에 따라 필요한 경우)',
  `is_admin_writed` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '관리자작성 여부',
  `is_notice` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '공지여부',
  `is_secret` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '비밀글여부',
  `secret_pwd` varchar(64) DEFAULT NULL COMMENT '비밀글 비밀번호',
  `write_name` varchar(25) DEFAULT NULL COMMENT '작성자',
  `isFile` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '첨부파일이 있는지 여부',
  `file_attach_1` varchar(125) DEFAULT NULL COMMENT '파일첨부',
  `file_attach_origin_1` varchar(125) DEFAULT NULL COMMENT '원래 파일명',
  `file_attach_2` varchar(125) DEFAULT NULL,
  `file_attach_origin_2` varchar(125) DEFAULT NULL,
  `file_attach_3` varchar(125) DEFAULT NULL,
  `file_attach_origin_3` varchar(125) DEFAULT NULL,
  `file_attach_4` varchar(125) DEFAULT NULL,
  `file_attach_origin_4` varchar(125) DEFAULT NULL,
  `file_attach_5` varchar(125) DEFAULT NULL,
  `file_attach_origin_5` varchar(125) DEFAULT NULL,
  `is_admin_comment_yn` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '관리자가 댓글 달았는지 여부 ',
  `direct_url` varchar(255) DEFAULT NULL COMMENT '바로연결할 URL',
  `filedown_pwd` varchar(64) DEFAULT NULL COMMENT '파일다운로드 비밀번',
  `extra1` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `extra2` varchar(100) DEFAULT NULL,
  `extra3` varchar(100) DEFAULT NULL,
  `extra4` varchar(2100) DEFAULT NULL,
  `extra5` varchar(100) DEFAULT NULL,
  `extra6` varchar(100) DEFAULT NULL,
  `extra7` varchar(100) DEFAULT NULL,
  `extra8` varchar(100) DEFAULT NULL,
  `extra9` varchar(100) DEFAULT NULL,
  `extra10` varchar(100) DEFAULT NULL,
  `extra11` varchar(100) DEFAULT NULL,
  `extra12` varchar(100) DEFAULT NULL,
  `extra13` varchar(100) DEFAULT NULL,
  `extra14` varchar(100) DEFAULT NULL,
  `extra15` varchar(100) DEFAULT NULL,
  `sort_no` int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='통합 게시판';

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_board_category`
--

CREATE TABLE `nb_board_category` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `board_no` int NOT NULL COMMENT '게시판 고유번호',
  `name` varchar(125) NOT NULL COMMENT '카테고리명',
  `sort_no` int NOT NULL DEFAULT '0' COMMENT '정렬번호'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_board_comment`
--

CREATE TABLE `nb_board_comment` (
  `no` int UNSIGNED NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `parent_no` int NOT NULL COMMENT '게시물 부모 번호',
  `user_no` int NOT NULL DEFAULT '0' COMMENT '회원 고유번호',
  `write_name` varchar(25) DEFAULT NULL COMMENT '작성자',
  `regdate` datetime NOT NULL COMMENT '등록일',
  `contents` text NOT NULL COMMENT '내용',
  `isAdmin` varchar(1) NOT NULL DEFAULT 'N',
  `pwd` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_board_lev_manage`
--

CREATE TABLE `nb_board_lev_manage` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `board_no` int NOT NULL COMMENT '게시판 고유번호',
  `lev_no` int NOT NULL COMMENT '등급 번호',
  `role_write` enum('N','Y') NOT NULL DEFAULT 'Y' COMMENT '메뉴 쓰기 권한',
  `role_edit` enum('N','Y') NOT NULL DEFAULT 'Y' COMMENT '메뉴 수정 권한',
  `role_view` enum('N','Y') NOT NULL DEFAULT 'Y' COMMENT '메뉴 상세보기 권한',
  `role_list` enum('N','Y') NOT NULL DEFAULT 'Y' COMMENT '메뉴 목록보기 권한',
  `role_delete` enum('N','Y') NOT NULL DEFAULT 'Y' COMMENT '삭제 권한',
  `role_comment` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '댓글쓰기 권한'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_board_manage`
--

CREATE TABLE `nb_board_manage` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `title` varchar(50) NOT NULL COMMENT '게시판명',
  `skin` varchar(3) NOT NULL COMMENT '게시판종류(bbs : 일반, img : 갤러리 , web : 웹진)',
  `regdate` datetime NOT NULL COMMENT '등록일',
  `top_banner_image` varchar(255) DEFAULT NULL COMMENT '상단배너 이미지',
  `contents` text,
  `view_yn` enum('N','Y') NOT NULL DEFAULT 'Y' COMMENT '사용여부',
  `secret_yn` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '비밀글기능 활성화',
  `sort_no` int NOT NULL DEFAULT '0' COMMENT '정렬번호',
  `list_size` int NOT NULL DEFAULT '20' COMMENT '목록출력수',
  `block_size` int NOT NULL DEFAULT '0' COMMENT '페이지 카운',
  `fileattach_yn` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '파일첨부 여부',
  `fileattach_cnt` int NOT NULL DEFAULT '0' COMMENT '파일첨부 갯수',
  `comment_yn` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '댓글기능 활성화',
  `depth1` varchar(20) DEFAULT NULL COMMENT '1뎁스',
  `depth2` varchar(20) DEFAULT NULL COMMENT '2뎁스',
  `depth3` varchar(20) DEFAULT NULL COMMENT '3뎁스',
  `lnb_path` varchar(50) DEFAULT NULL COMMENT '좌측 메뉴 경로',
  `category_yn` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '카테고리 사용여부',
  `extra_match_field1` varchar(100) DEFAULT NULL,
  `extra_match_field2` varchar(100) DEFAULT NULL,
  `extra_match_field3` varchar(100) DEFAULT NULL,
  `extra_match_field4` varchar(100) DEFAULT NULL,
  `extra_match_field5` varchar(100) DEFAULT NULL,
  `extra_match_field6` varchar(100) DEFAULT NULL,
  `extra_match_field7` varchar(100) DEFAULT NULL,
  `extra_match_field8` varchar(100) DEFAULT NULL,
  `extra_match_field9` varchar(100) DEFAULT NULL,
  `extra_match_field10` varchar(100) DEFAULT NULL,
  `extra_match_field11` varchar(100) DEFAULT NULL,
  `extra_match_field12` varchar(100) DEFAULT NULL,
  `extra_match_field13` varchar(100) DEFAULT NULL,
  `extra_match_field14` varchar(100) DEFAULT NULL,
  `extra_match_field15` varchar(100) DEFAULT NULL,
  `isOpen` varchar(1) NOT NULL DEFAULT 'Y' COMMENT '공개게시판 여부 ',
  `view_skin` varchar(4) NOT NULL DEFAULT 'init'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_counter`
--

CREATE TABLE `nb_counter` (
  `uid` int NOT NULL,
  `Connect_IP` varchar(30) NOT NULL DEFAULT '',
  `id` varchar(30) NOT NULL DEFAULT '',
  `Time` int NOT NULL DEFAULT '0',
  `Year` int NOT NULL DEFAULT '0',
  `Month` int NOT NULL DEFAULT '0',
  `Day` int NOT NULL DEFAULT '0',
  `Hour` int NOT NULL DEFAULT '0',
  `Week` char(3) NOT NULL DEFAULT '',
  `OS` varchar(50) NOT NULL DEFAULT '',
  `Browser` varchar(50) NOT NULL DEFAULT '',
  `Connect_Route` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_counter_config`
--

CREATE TABLE `nb_counter_config` (
  `uid` int NOT NULL,
  `Cookie_Use` enum('A','T','O') NOT NULL DEFAULT 'A' COMMENT '중복 카운터 적용 여부',
  `Cookie_Term` int NOT NULL DEFAULT '0' COMMENT '쿠키 지속 시간',
  `Counter_Use` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '카운터 사용여부',
  `Now_Connect_Use` enum('Y','N') NOT NULL DEFAULT 'Y',
  `Route_Use` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '접속경로 저장여부',
  `Now_Connect_Term` int NOT NULL DEFAULT '0',
  `Total_Num` int NOT NULL DEFAULT '0' COMMENT '총 접속자 수',
  `Admin_Check_Use` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '관리자 접속 카운터 여부',
  `Admin_IP` char(30) NOT NULL COMMENT '관리자 아이피'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_counter_data`
--

CREATE TABLE `nb_counter_data` (
  `uid` int NOT NULL,
  `Year` int NOT NULL DEFAULT '0',
  `Month` int NOT NULL DEFAULT '0',
  `Day` int NOT NULL DEFAULT '0',
  `Hour00` int NOT NULL DEFAULT '0',
  `Hour01` int NOT NULL DEFAULT '0',
  `Hour02` int NOT NULL DEFAULT '0',
  `Hour03` int NOT NULL DEFAULT '0',
  `Hour04` int NOT NULL DEFAULT '0',
  `Hour05` int NOT NULL DEFAULT '0',
  `Hour06` int NOT NULL DEFAULT '0',
  `Hour07` int NOT NULL DEFAULT '0',
  `Hour08` int NOT NULL DEFAULT '0',
  `Hour09` int NOT NULL DEFAULT '0',
  `Hour10` int NOT NULL DEFAULT '0',
  `Hour11` int NOT NULL DEFAULT '0',
  `Hour12` int NOT NULL DEFAULT '0',
  `Hour13` int NOT NULL DEFAULT '0',
  `Hour14` int NOT NULL DEFAULT '0',
  `Hour15` int NOT NULL DEFAULT '0',
  `Hour16` int NOT NULL DEFAULT '0',
  `Hour17` int NOT NULL DEFAULT '0',
  `Hour18` int NOT NULL DEFAULT '0',
  `Hour19` int NOT NULL DEFAULT '0',
  `Hour20` int NOT NULL DEFAULT '0',
  `Hour21` int NOT NULL DEFAULT '0',
  `Hour22` int NOT NULL DEFAULT '0',
  `Hour23` int NOT NULL DEFAULT '0',
  `Week` char(3) NOT NULL DEFAULT '',
  `Visit_Num` int NOT NULL DEFAULT '0',
  `Counter_ID` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_counter_route`
--

CREATE TABLE `nb_counter_route` (
  `uid` int NOT NULL,
  `Connect_Route` varchar(255) NOT NULL DEFAULT '',
  `Time` int NOT NULL DEFAULT '0',
  `BookMark` char(1) NOT NULL DEFAULT '',
  `Visit_Num` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_data`
--

CREATE TABLE `nb_data` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `target` varchar(25) NOT NULL COMMENT '데이터가 사용될 곳 아이디 구분값',
  `contents` text NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_member`
--

CREATE TABLE `nb_member` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `lev` int NOT NULL DEFAULT '0' COMMENT '회원등급(코드 별도로 있음)기본 0',
  `campus` int NOT NULL DEFAULT '0' COMMENT '캠퍼스 코드 (별도 테이블)',
  `gubun` varchar(3) NOT NULL COMMENT '가입구분 (재학생, 학부모)',
  `grade` varchar(4) NOT NULL COMMENT '학년 KIN, G1~G12',
  `uid` varchar(30) NOT NULL COMMENT '아이디',
  `upwd` varchar(64) NOT NULL COMMENT '패스워드',
  `uname` varchar(30) NOT NULL COMMENT '이름',
  `name_first` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL COMMENT '연락처',
  `hp` varchar(15) NOT NULL COMMENT '휴대폰번호',
  `hp_recieve_yn` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '휴대폰 광고 동의',
  `email` varchar(125) NOT NULL COMMENT '이메일 주소',
  `email_recieve_yn` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '이메일 수신 동의',
  `zipcode` varchar(6) DEFAULT NULL COMMENT '우편번호',
  `addr1` varchar(50) DEFAULT NULL COMMENT '주소',
  `addr2` varchar(100) DEFAULT NULL COMMENT '상세 주소',
  `regdate` datetime NOT NULL COMMENT '등록일',
  `child_name` varchar(20) DEFAULT NULL COMMENT '자녀이',
  `child_no` int NOT NULL DEFAULT '-1' COMMENT '자녀 회원 테이블 no 맵핑용 ',
  `name_last` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_member_level`
--

CREATE TABLE `nb_member_level` (
  `no` int NOT NULL,
  `sitekey` varchar(6) DEFAULT NULL,
  `lev_name` varchar(125) NOT NULL COMMENT '등급명',
  `is_join` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '회원가입시 부여 등급'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_popup`
--

CREATE TABLE `nb_popup` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `p_title` varchar(50) NOT NULL COMMENT '팝업 제목',
  `p_img` varchar(128) NOT NULL COMMENT '팝업 이미지',
  `p_target` enum('_self','_blank') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '_self' COMMENT '링크 오픈 형식',
  `p_link` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '팝업 링크',
  `p_view` enum('Y','N') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Y' COMMENT '노출 여부',
  `p_left` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '노출위치(px) 왼쪽으로부터',
  `p_top` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '노출위치(px) 위쪽으로부터',
  `p_idx` int DEFAULT '0' COMMENT '순서',
  `p_sdate` date DEFAULT NULL COMMENT '시작일 - 00 시부터 시작',
  `p_edate` date DEFAULT NULL COMMENT '종료일 - 23시 59분 59초까지',
  `p_rdate` datetime NOT NULL COMMENT '등록일',
  `p_none_limit` enum('N','Y') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'N' COMMENT '기한설정 Y:무기한 N:기한설',
  `p_loc` enum('P','M') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'P' COMMENT '노출위치 P : PC M : 모받'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_request`
--

CREATE TABLE `nb_request` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `type` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '문의 유형',
  `name` varchar(30) DEFAULT NULL COMMENT '이름',
  `phone` varchar(13) DEFAULT NULL COMMENT '연락처',
  `birth` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '생년월일',
  `region` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '지역',
  `contents` varchar(4000) DEFAULT NULL COMMENT '내용',
  `regdate` datetime DEFAULT NULL COMMENT '등록일',
  `gender` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '성별',
  `city` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '지점',
  `answer` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '수신방법',
  `major` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '분야'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_siteinfo`
--

CREATE TABLE `nb_siteinfo` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `title` varchar(50) DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '대표 연락처',
  `hp` varchar(13) DEFAULT NULL COMMENT '대표 휴대폰',
  `fax` varchar(13) DEFAULT NULL COMMENT '대표 팩스',
  `email` varchar(50) DEFAULT NULL COMMENT '대표 이메일',
  `customercenter_able_time` varchar(50) DEFAULT NULL COMMENT '상담가능시간',
  `company_able_time` varchar(50) DEFAULT NULL COMMENT '회사운영시간',
  `google_map_key` varchar(256) DEFAULT NULL COMMENT '구글 지도 키',
  `logo_top` varchar(50) DEFAULT NULL COMMENT '상단 로고 이미지',
  `logo_footer` varchar(50) DEFAULT NULL COMMENT '하단 로고 이미지',
  `footer_name` varchar(50) DEFAULT NULL COMMENT '하단 사이트명',
  `footer_address` varchar(125) DEFAULT NULL COMMENT '하단 주소',
  `footer_phone` varchar(13) DEFAULT NULL COMMENT '하단 연락처',
  `footer_hp` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '하단 휴대폰',
  `footer_fax` varchar(13) DEFAULT NULL COMMENT '하단 팩스',
  `footer_email` varchar(50) DEFAULT NULL COMMENT '하단 이메일',
  `footer_owner` varchar(15) DEFAULT NULL COMMENT '하단 대표자',
  `footer_ssn` varchar(13) DEFAULT NULL COMMENT '하단 사업자번호',
  `footer_policy_charger` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '하단 개인정보책임자',
  `meta_keywords` varchar(256) DEFAULT NULL,
  `meta_description` varchar(256) DEFAULT NULL,
  `meta_thumb` varchar(50) DEFAULT NULL COMMENT '메타 이미지 파일',
  `meta_favicon_ico` varchar(50) DEFAULT NULL COMMENT 'ico 파'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `kakao_id` bigint DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `profile_image` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`id`, `kakao_id`, `nickname`, `profile_image`, `created_at`) VALUES
(2, 4351014800, '상규', 'http://k.kakaocdn.net/dn/UUaOV/btsOCDnCM7t/LZKKT6BfPpcgczbpTOclJk/img_640x640.jpg', '2025-07-15 15:23:28');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `nb_admin`
--
ALTER TABLE `nb_admin`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `nb_banner`
--
ALTER TABLE `nb_banner`
  ADD PRIMARY KEY (`no`),
  ADD KEY `b_loc` (`b_loc`);

--
-- 테이블의 인덱스 `nb_board`
--
ALTER TABLE `nb_board`
  ADD PRIMARY KEY (`no`),
  ADD KEY `IDX_NB_BOARD4` (`sitekey`,`board_no`);

--
-- 테이블의 인덱스 `nb_board_category`
--
ALTER TABLE `nb_board_category`
  ADD PRIMARY KEY (`no`),
  ADD KEY `IDX_NB_BOARD_CATEGORY` (`board_no`);

--
-- 테이블의 인덱스 `nb_board_comment`
--
ALTER TABLE `nb_board_comment`
  ADD PRIMARY KEY (`no`),
  ADD KEY `IDX_NB_BOARD_COMMENT` (`parent_no`);

--
-- 테이블의 인덱스 `nb_board_lev_manage`
--
ALTER TABLE `nb_board_lev_manage`
  ADD PRIMARY KEY (`no`),
  ADD KEY `IDX_NB_BOARD_LEV_MANAGE` (`board_no`,`lev_no`);

--
-- 테이블의 인덱스 `nb_board_manage`
--
ALTER TABLE `nb_board_manage`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `nb_counter`
--
ALTER TABLE `nb_counter`
  ADD PRIMARY KEY (`uid`);

--
-- 테이블의 인덱스 `nb_counter_config`
--
ALTER TABLE `nb_counter_config`
  ADD PRIMARY KEY (`uid`);

--
-- 테이블의 인덱스 `nb_counter_data`
--
ALTER TABLE `nb_counter_data`
  ADD PRIMARY KEY (`uid`);

--
-- 테이블의 인덱스 `nb_counter_route`
--
ALTER TABLE `nb_counter_route`
  ADD PRIMARY KEY (`uid`);

--
-- 테이블의 인덱스 `nb_data`
--
ALTER TABLE `nb_data`
  ADD PRIMARY KEY (`no`),
  ADD KEY `IDX_NB_DATA1` (`sitekey`,`target`);

--
-- 테이블의 인덱스 `nb_member`
--
ALTER TABLE `nb_member`
  ADD PRIMARY KEY (`no`),
  ADD KEY `IDX_NB_MEMBER` (`lev`,`campus`);

--
-- 테이블의 인덱스 `nb_member_level`
--
ALTER TABLE `nb_member_level`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `nb_popup`
--
ALTER TABLE `nb_popup`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `nb_request`
--
ALTER TABLE `nb_request`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `nb_siteinfo`
--
ALTER TABLE `nb_siteinfo`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kakao_id` (`kakao_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `nb_admin`
--
ALTER TABLE `nb_admin`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `nb_banner`
--
ALTER TABLE `nb_banner`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `nb_board`
--
ALTER TABLE `nb_board`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 테이블의 AUTO_INCREMENT `nb_board_category`
--
ALTER TABLE `nb_board_category`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `nb_board_comment`
--
ALTER TABLE `nb_board_comment`
  MODIFY `no` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `nb_board_lev_manage`
--
ALTER TABLE `nb_board_lev_manage`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `nb_board_manage`
--
ALTER TABLE `nb_board_manage`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `nb_counter`
--
ALTER TABLE `nb_counter`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `nb_counter_config`
--
ALTER TABLE `nb_counter_config`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `nb_counter_data`
--
ALTER TABLE `nb_counter_data`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `nb_counter_route`
--
ALTER TABLE `nb_counter_route`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `nb_data`
--
ALTER TABLE `nb_data`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `nb_member`
--
ALTER TABLE `nb_member`
  MODIFY `no` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `nb_member_level`
--
ALTER TABLE `nb_member_level`
  MODIFY `no` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `nb_popup`
--
ALTER TABLE `nb_popup`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `nb_request`
--
ALTER TABLE `nb_request`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 테이블의 AUTO_INCREMENT `nb_siteinfo`
--
ALTER TABLE `nb_siteinfo`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
