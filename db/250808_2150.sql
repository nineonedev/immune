-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- 호스트: db:3306
-- 생성 시간: 25-08-08 12:50
-- 서버 버전: 8.0.43
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
  `upwd` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT '패스워드',
  `uname` varchar(25) NOT NULL COMMENT '관리자명',
  `active_status` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '사용여부',
  `role_id` int NOT NULL DEFAULT '3' COMMENT '권한 ID (nb_roles 참조)',
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='관리자 계정 관리';

--
-- 테이블의 덤프 데이터 `nb_admin`
--

INSERT INTO `nb_admin` (`no`, `sitekey`, `uid`, `upwd`, `uname`, `active_status`, `role_id`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'IMMUNE', 'tmaster', '$2y$10$JxWvgydNpaNoCV0HG1RCLOSLBxXpdkm5jwptaogaJ7uo5hSUE4dqu', '관리자', 'Y', 2, 'nineonelabs@co.kr', '010-1111-3333', '2025-07-31 08:23:14', '2025-08-07 07:32:00'),
(13, 'IMMUNE', 'test1234', '$2y$10$vQohOWfcWPF13BIdS.S7fe7laCnoPl5fgCiOwrr7shbvxZpe0g0u2', '홍길동', 'Y', 3, 'test1234@naver.com', '000-0000-0000', '2025-07-31 16:15:26', '2025-08-07 07:31:50'),
(18, 'IMMUNE', 'superuser', '$2y$10$F4CrP3Zzp056VFrTfUuTX.DjGD3DMqmRLoGS6CjrV7Or1NROXl0lW', '면력한방병원', 'Y', 1, 'test@naver.com', '010-2222-1111', '2025-08-07 02:02:07', '2025-08-07 07:32:10');

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
-- 테이블 구조 `nb_banners`
--

CREATE TABLE `nb_banners` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '관리용 제목',
  `banner_type` int NOT NULL COMMENT '전역 변수 banner_types의 키 (int)',
  `is_active` int DEFAULT '1' COMMENT '전역 변수 $is_active의 값 (0=숨김, 1=노출)',
  `start_at` varchar(20) DEFAULT NULL,
  `end_at` varchar(20) DEFAULT NULL,
  `description` text COMMENT '설명글',
  `has_link` int DEFAULT '2' COMMENT '전역 변수 $has_link의 값 (1=링크, 2=비링크)',
  `link_url` varchar(1024) DEFAULT NULL COMMENT '링크 URL',
  `duration` int DEFAULT '6' COMMENT '지속 시간 (초)',
  `banner_image` varchar(1024) DEFAULT NULL COMMENT '배너 이미지 경로',
  `branch_id` int DEFAULT NULL COMMENT 'nb_branches.id 참조, NULL이면 공통 배너',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sort_no` int NOT NULL DEFAULT '0' COMMENT '정렬 순서',
  `is_unlimited` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = 무기한 노출, 0 = 노출 기간 사용',
  `is_target` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=현재창(_self), 1=새창(_blank)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `nb_banners`
--

INSERT INTO `nb_banners` (`id`, `title`, `banner_type`, `is_active`, `start_at`, `end_at`, `description`, `has_link`, `link_url`, `duration`, `banner_image`, `branch_id`, `created_at`, `updated_at`, `sort_no`, `is_unlimited`, `is_target`) VALUES
(11, '강서 메인 페이지', 1, 1, '', '', '', 2, '', 6, '6895825b600130.26433858.jpg', 2, '2025-08-06 04:32:50', '2025-08-08 04:51:39', 1, 1, 1),
(12, '강서 시설 안내 비쥬얼 배너', 5, 1, '', '', '<p>필요한 치료만,</p><p><b>진심을 담아</b></p>', 2, '', 6, '6895e8d4f39234.88795438.jpg', 2, '2025-08-06 07:51:57', '2025-08-08 12:09:51', 2, 1, 1),
(14, '암면역센터 메인 이미지', 2, 1, '', '', '<p>암 회복을 위한 여정,</p><p>함께 걸어가고 있습니다.</p>', 2, '', 6, '68958290074023.47202131.jpg', 2, '2025-08-08 04:52:32', '2025-08-08 12:47:25', 1, 1, 1),
(15, '신경면역센터 메인 이미지', 3, 1, '', '', '<div>통증과 마비로 겪는 어려움,</div><div>면력에서 해결하세요.</div>', 2, '', 6, '6895d35d0b12c8.45598860.jpg', 2, '2025-08-08 10:37:17', '2025-08-08 12:46:27', 3, 1, 1),
(16, '재활센터 메인 이미지', 4, 1, '', '', '<p>움직임의 회복</p><p>일상의 회복입니다.</p>', 2, '', 6, '6895ddce0c8ac5.65412518.jpg', 2, '2025-08-08 11:21:50', '2025-08-08 12:48:25', 4, 1, 1),
(17, '22', 1, 1, '', '', '', 2, '', 6, '6895edb5901f81.40373525.jpg', 2, '2025-08-08 12:29:41', '2025-08-08 12:29:41', 5, 1, 1);

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
  `extra12` varchar(4000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `extra13` varchar(4000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `extra14` varchar(4000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `extra15` varchar(4000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `sort_no` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='통합 게시판';

--
-- 테이블의 덤프 데이터 `nb_board`
--

INSERT INTO `nb_board` (`no`, `sitekey`, `board_no`, `user_no`, `category_no`, `comment_cnt`, `title`, `contents`, `regdate`, `read_cnt`, `thumb_image`, `is_admin_writed`, `is_notice`, `is_secret`, `secret_pwd`, `write_name`, `isFile`, `file_attach_1`, `file_attach_origin_1`, `file_attach_2`, `file_attach_origin_2`, `file_attach_3`, `file_attach_origin_3`, `file_attach_4`, `file_attach_origin_4`, `file_attach_5`, `file_attach_origin_5`, `is_admin_comment_yn`, `direct_url`, `filedown_pwd`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`, `extra11`, `extra12`, `extra13`, `extra14`, `extra15`, `sort_no`) VALUES
(70, 'IMMUNE', 11, -1, 15, 0, '30대 직장인의 얼굴 대상포진, 이렇게 달라졌어요!', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;여러분 안녕하세요! 면력한방병원입니다&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;오늘은 급작스러운 대상포진으로 큰 고통을 겪으셨던&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60대 이진옥님의 치유 이야기를 나눕니다.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;▶ 환자분의 고민&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;참기 힘든 날카로운 통증&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;대형병원에서도 초기 진단 놓쳐&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;독한 약으로도 차도가 없던 상황&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;진통제를 먹어도 몇 시간을 못 버티는 통증&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6개월은 걸린다&quot;는 절망적인 이야기&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;하지만!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;면력한방병원의 맞춤형 집중치료로&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;단 4일 만에 통증에서 해방되신&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;이진옥님의 감동적인 치유 과정을&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;생생한 후기로 만나보세요&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 19:59:23', 0, '687e1de547b707.89591157.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(94, 'IMMUNE', 11, -1, 15, 0, '30대 직장인의 얼굴 대상포진, 이렇게 달라졌어요!', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50668;&amp;#47084;&amp;#48516; &amp;#50504;&amp;#45397;&amp;#54616;&amp;#49464;&amp;#50836;! &amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51077;&amp;#45768;&amp;#45796;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50724;&amp;#45720;&amp;#51008; &amp;#44553;&amp;#51089;&amp;#49828;&amp;#47084;&amp;#50868; &amp;#45824;&amp;#49345;&amp;#54252;&amp;#51652;&amp;#51004;&amp;#47196; &amp;#53360; &amp;#44256;&amp;#53685;&amp;#51012; &amp;#44202;&amp;#51004;&amp;#49512;&amp;#45912;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60&amp;#45824; &amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#52824;&amp;#50976; &amp;#51060;&amp;#50556;&amp;#44592;&amp;#47484; &amp;#45208;&amp;#45589;&amp;#45768;&amp;#45796;.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#9654; &amp;#54872;&amp;#51088;&amp;#48516;&amp;#51032; &amp;#44256;&amp;#48124;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#52280;&amp;#44592; &amp;#55192;&amp;#46304; &amp;#45216;&amp;#52852;&amp;#47196;&amp;#50868; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45824;&amp;#54805;&amp;#48337;&amp;#50896;&amp;#50640;&amp;#49436;&amp;#46020; &amp;#52488;&amp;#44592; &amp;#51652;&amp;#45800; &amp;#45459;&amp;#52432;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#46021;&amp;#54620; &amp;#50557;&amp;#51004;&amp;#47196;&amp;#46020; &amp;#52264;&amp;#46020;&amp;#44032; &amp;#50630;&amp;#45912; &amp;#49345;&amp;#54889;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51652;&amp;#53685;&amp;#51228;&amp;#47484; &amp;#47673;&amp;#50612;&amp;#46020; &amp;#47751; &amp;#49884;&amp;#44036;&amp;#51012; &amp;#47803; &amp;#48260;&amp;#54000;&amp;#45716; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6&amp;#44060;&amp;#50900;&amp;#51008; &amp;#44152;&amp;#47536;&amp;#45796;&quot;&amp;#45716; &amp;#51208;&amp;#47581;&amp;#51201;&amp;#51064; &amp;#51060;&amp;#50556;&amp;#44592;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#54616;&amp;#51648;&amp;#47564;!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51032; &amp;#47582;&amp;#52644;&amp;#54805; &amp;#51665;&amp;#51473;&amp;#52824;&amp;#47308;&amp;#47196;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45800; 4&amp;#51068; &amp;#47564;&amp;#50640; &amp;#53685;&amp;#51613;&amp;#50640;&amp;#49436; &amp;#54644;&amp;#48169;&amp;#46104;&amp;#49888;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#44048;&amp;#46041;&amp;#51201;&amp;#51064; &amp;#52824;&amp;#50976; &amp;#44284;&amp;#51221;&amp;#51012;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#49373;&amp;#49373;&amp;#54620; &amp;#54980;&amp;#44592;&amp;#47196; &amp;#47564;&amp;#45208;&amp;#48372;&amp;#49464;&amp;#50836;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:59:23', 0, '687e23b44e32d.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(97, 'IMMUNE', 12, -1, 0, 0, '암환우를 위한 겨울 보양식 & 누룽지 백숙 매콤 오징어볶음', '&lt;div&gt;&lt;p&gt;&lt;iframe frameborder=&quot;0&quot; src=&quot;//www.youtube.com/embed/xjYXO5Dj-kc&quot; width=&quot;640&quot; height=&quot;360&quot; class=&quot;note-video-clip&quot;&gt;&lt;/iframe&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;면력한방병원 셰프가 정성껏 준비한 특별한 보양식을 소개합니다!&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;누룽지 백숙 &amp;amp; 매콤 오징어볶음&amp;nbsp;&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;-구수한 누룽지와 닭고기의 완벽한 조화&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;-영양가 높은 닭백숙으로 면역력 강화&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;-매콤한 오징어볶음으로 입맛 돋우기&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;-소화가 잘 되는 건강한 식재료 사용&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;면력한방병원 치료식 셰프의 특별 레시피&lt;/p&gt;&lt;p style=&quot;font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &#039;Noto Sans KR&#039;, sans-serif;&quot;&gt;추운 겨울, 따뜻한 보양식으로 건강을 챙기세요!&amp;nbsp;&lt;/p&gt;&lt;/div&gt;', '2025-07-21 20:38:53', 2, '687e26cd853fb9.30396853.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(98, 'IMMUNE', 13, -1, 17, 0, '9월(추석) 진료 일정 안내', '&lt;div&gt;&lt;/div&gt;', '2025-07-22 08:58:11', 0, '687ed4138c13e8.86085174.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(99, 'IMMUNE', 13, -1, 17, 0, '10월 진료 일정 안내', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-22 08:58:10', 0, '687ed42caa8e57.01391508.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(100, 'IMMUNE', 13, -1, 17, 0, '12월 진료 일정 안내', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-22 08:58:09', 0, '687ed440656688.69697406.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(101, 'IMMUNE', 13, -1, 17, 0, '1월(설) 진료 일정 안내', '&lt;div&gt;&lt;div&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-22 08:58:12', 3, '687ed44e644355.11657728.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '687edb8959edf1.54801644.jpg', '356.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(102, 'IMMUNE', 13, -1, 18, 0, '암환우를 위한 달콤한 힐링 \'정성 가득 화과자 만들기\'', '&lt;div&gt;&lt;div&gt;&lt;p&gt;면력한방병원에서 준비한 특별한 원데이 클래스를 소개합니다!&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;크리스마스 모루인형 만들기&amp;nbsp;&lt;/p&gt;&lt;p&gt;- 손쉽게 따라 할 수 있는 공예활동&lt;/p&gt;&lt;p&gt;- 마음의 안정과 집중력 향상&lt;/p&gt;&lt;p&gt;- 즐거운 크리스마스 분위기 만들기&lt;/p&gt;&lt;p&gt;- 환우들과 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;전문 공예 강사와 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;면력한방병원은 환우 분들의 심신 치유를 응원합니다!&amp;nbsp;&lt;/p&gt;&lt;p&gt;소중한 추억을 만들며 일상의 즐거움을 되찾으세요.&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-22 09:33:53', 0, '687edc71ea08b0.05948707.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '687edc71ea3fa6.74429009.jpg', 'i67.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(103, 'IMMUNE', 13, -1, 18, 0, '암 환우와 함께하는 힐링 클래스: 나만의 클렌저주스 만들기', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;p&gt;면력한방병원에서 준비한 특별한 원데이 클래스를 소개합니다!&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;크리스마스 모루인형 만들기&amp;nbsp;&lt;/p&gt;&lt;p&gt;- 손쉽게 따라 할 수 있는 공예활동&lt;/p&gt;&lt;p&gt;- 마음의 안정과 집중력 향상&lt;/p&gt;&lt;p&gt;- 즐거운 크리스마스 분위기 만들기&lt;/p&gt;&lt;p&gt;- 환우들과 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;전문 공예 강사와 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;면력한방병원은 환우 분들의 심신 치유를 응원합니다!&amp;nbsp;&lt;/p&gt;&lt;p&gt;소중한 추억을 만들며 일상의 즐거움을 되찾으세요.&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-22 09:33:54', 0, '687edc9d321a14.01892662.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '687edc916fdb6.jpg', 'i67.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(104, 'IMMUNE', 13, -1, 18, 0, '환우 분들과 함께한 \'따뜻한 크리스마스 모루인형 만들기\'', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;p&gt;면력한방병원에서 준비한 특별한 원데이 클래스를 소개합니다!&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;크리스마스 모루인형 만들기&amp;nbsp;&lt;/p&gt;&lt;p&gt;- 손쉽게 따라 할 수 있는 공예활동&lt;/p&gt;&lt;p&gt;- 마음의 안정과 집중력 향상&lt;/p&gt;&lt;p&gt;- 즐거운 크리스마스 분위기 만들기&lt;/p&gt;&lt;p&gt;- 환우들과 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;전문 공예 강사와 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;면력한방병원은 환우 분들의 심신 치유를 응원합니다!&amp;nbsp;&lt;/p&gt;&lt;p&gt;소중한 추억을 만들며 일상의 즐거움을 되찾으세요.&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-22 09:33:55', 2, '687edcae3f8b94.15451415.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '687edc9ec1adf.jpg', 'i67.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(88, 'IMMUNE', 11, -1, 15, 0, '일상을 힘들게 하는 안면마비, 어떻게 완치되었을까요?', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50668;&amp;#47084;&amp;#48516; &amp;#50504;&amp;#45397;&amp;#54616;&amp;#49464;&amp;#50836;! &amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51077;&amp;#45768;&amp;#45796;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50724;&amp;#45720;&amp;#51008; &amp;#44553;&amp;#51089;&amp;#49828;&amp;#47084;&amp;#50868; &amp;#45824;&amp;#49345;&amp;#54252;&amp;#51652;&amp;#51004;&amp;#47196; &amp;#53360; &amp;#44256;&amp;#53685;&amp;#51012; &amp;#44202;&amp;#51004;&amp;#49512;&amp;#45912;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60&amp;#45824; &amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#52824;&amp;#50976; &amp;#51060;&amp;#50556;&amp;#44592;&amp;#47484; &amp;#45208;&amp;#45589;&amp;#45768;&amp;#45796;.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#9654; &amp;#54872;&amp;#51088;&amp;#48516;&amp;#51032; &amp;#44256;&amp;#48124;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#52280;&amp;#44592; &amp;#55192;&amp;#46304; &amp;#45216;&amp;#52852;&amp;#47196;&amp;#50868; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45824;&amp;#54805;&amp;#48337;&amp;#50896;&amp;#50640;&amp;#49436;&amp;#46020; &amp;#52488;&amp;#44592; &amp;#51652;&amp;#45800; &amp;#45459;&amp;#52432;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#46021;&amp;#54620; &amp;#50557;&amp;#51004;&amp;#47196;&amp;#46020; &amp;#52264;&amp;#46020;&amp;#44032; &amp;#50630;&amp;#45912; &amp;#49345;&amp;#54889;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51652;&amp;#53685;&amp;#51228;&amp;#47484; &amp;#47673;&amp;#50612;&amp;#46020; &amp;#47751; &amp;#49884;&amp;#44036;&amp;#51012; &amp;#47803; &amp;#48260;&amp;#54000;&amp;#45716; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6&amp;#44060;&amp;#50900;&amp;#51008; &amp;#44152;&amp;#47536;&amp;#45796;&quot;&amp;#45716; &amp;#51208;&amp;#47581;&amp;#51201;&amp;#51064; &amp;#51060;&amp;#50556;&amp;#44592;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#54616;&amp;#51648;&amp;#47564;!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51032; &amp;#47582;&amp;#52644;&amp;#54805; &amp;#51665;&amp;#51473;&amp;#52824;&amp;#47308;&amp;#47196;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45800; 4&amp;#51068; &amp;#47564;&amp;#50640; &amp;#53685;&amp;#51613;&amp;#50640;&amp;#49436; &amp;#54644;&amp;#48169;&amp;#46104;&amp;#49888;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#44048;&amp;#46041;&amp;#51201;&amp;#51064; &amp;#52824;&amp;#50976; &amp;#44284;&amp;#51221;&amp;#51012;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#49373;&amp;#49373;&amp;#54620; &amp;#54980;&amp;#44592;&amp;#47196; &amp;#47564;&amp;#45208;&amp;#48372;&amp;#49464;&amp;#50836;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:59:22', 0, '687e23adde584.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(85, 'IMMUNE', 11, -1, 15, 0, '30대 직장인의 얼굴 대상포진, 이렇게 달라졌어요!', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50668;&amp;#47084;&amp;#48516; &amp;#50504;&amp;#45397;&amp;#54616;&amp;#49464;&amp;#50836;! &amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51077;&amp;#45768;&amp;#45796;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50724;&amp;#45720;&amp;#51008; &amp;#44553;&amp;#51089;&amp;#49828;&amp;#47084;&amp;#50868; &amp;#45824;&amp;#49345;&amp;#54252;&amp;#51652;&amp;#51004;&amp;#47196; &amp;#53360; &amp;#44256;&amp;#53685;&amp;#51012; &amp;#44202;&amp;#51004;&amp;#49512;&amp;#45912;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60&amp;#45824; &amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#52824;&amp;#50976; &amp;#51060;&amp;#50556;&amp;#44592;&amp;#47484; &amp;#45208;&amp;#45589;&amp;#45768;&amp;#45796;.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#9654; &amp;#54872;&amp;#51088;&amp;#48516;&amp;#51032; &amp;#44256;&amp;#48124;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#52280;&amp;#44592; &amp;#55192;&amp;#46304; &amp;#45216;&amp;#52852;&amp;#47196;&amp;#50868; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45824;&amp;#54805;&amp;#48337;&amp;#50896;&amp;#50640;&amp;#49436;&amp;#46020; &amp;#52488;&amp;#44592; &amp;#51652;&amp;#45800; &amp;#45459;&amp;#52432;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#46021;&amp;#54620; &amp;#50557;&amp;#51004;&amp;#47196;&amp;#46020; &amp;#52264;&amp;#46020;&amp;#44032; &amp;#50630;&amp;#45912; &amp;#49345;&amp;#54889;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51652;&amp;#53685;&amp;#51228;&amp;#47484; &amp;#47673;&amp;#50612;&amp;#46020; &amp;#47751; &amp;#49884;&amp;#44036;&amp;#51012; &amp;#47803; &amp;#48260;&amp;#54000;&amp;#45716; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6&amp;#44060;&amp;#50900;&amp;#51008; &amp;#44152;&amp;#47536;&amp;#45796;&quot;&amp;#45716; &amp;#51208;&amp;#47581;&amp;#51201;&amp;#51064; &amp;#51060;&amp;#50556;&amp;#44592;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#54616;&amp;#51648;&amp;#47564;!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51032; &amp;#47582;&amp;#52644;&amp;#54805; &amp;#51665;&amp;#51473;&amp;#52824;&amp;#47308;&amp;#47196;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45800; 4&amp;#51068; &amp;#47564;&amp;#50640; &amp;#53685;&amp;#51613;&amp;#50640;&amp;#49436; &amp;#54644;&amp;#48169;&amp;#46104;&amp;#49888;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#44048;&amp;#46041;&amp;#51201;&amp;#51064; &amp;#52824;&amp;#50976; &amp;#44284;&amp;#51221;&amp;#51012;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#49373;&amp;#49373;&amp;#54620; &amp;#54980;&amp;#44592;&amp;#47196; &amp;#47564;&amp;#45208;&amp;#48372;&amp;#49464;&amp;#50836;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:59:23', 0, '687e23a8564d5.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(86, 'IMMUNE', 11, -1, 15, 0, '30대 직장인의 얼굴 대상포진, 이렇게 달라졌어요!', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50668;&amp;#47084;&amp;#48516; &amp;#50504;&amp;#45397;&amp;#54616;&amp;#49464;&amp;#50836;! &amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51077;&amp;#45768;&amp;#45796;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50724;&amp;#45720;&amp;#51008; &amp;#44553;&amp;#51089;&amp;#49828;&amp;#47084;&amp;#50868; &amp;#45824;&amp;#49345;&amp;#54252;&amp;#51652;&amp;#51004;&amp;#47196; &amp;#53360; &amp;#44256;&amp;#53685;&amp;#51012; &amp;#44202;&amp;#51004;&amp;#49512;&amp;#45912;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60&amp;#45824; &amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#52824;&amp;#50976; &amp;#51060;&amp;#50556;&amp;#44592;&amp;#47484; &amp;#45208;&amp;#45589;&amp;#45768;&amp;#45796;.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#9654; &amp;#54872;&amp;#51088;&amp;#48516;&amp;#51032; &amp;#44256;&amp;#48124;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#52280;&amp;#44592; &amp;#55192;&amp;#46304; &amp;#45216;&amp;#52852;&amp;#47196;&amp;#50868; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45824;&amp;#54805;&amp;#48337;&amp;#50896;&amp;#50640;&amp;#49436;&amp;#46020; &amp;#52488;&amp;#44592; &amp;#51652;&amp;#45800; &amp;#45459;&amp;#52432;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#46021;&amp;#54620; &amp;#50557;&amp;#51004;&amp;#47196;&amp;#46020; &amp;#52264;&amp;#46020;&amp;#44032; &amp;#50630;&amp;#45912; &amp;#49345;&amp;#54889;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51652;&amp;#53685;&amp;#51228;&amp;#47484; &amp;#47673;&amp;#50612;&amp;#46020; &amp;#47751; &amp;#49884;&amp;#44036;&amp;#51012; &amp;#47803; &amp;#48260;&amp;#54000;&amp;#45716; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6&amp;#44060;&amp;#50900;&amp;#51008; &amp;#44152;&amp;#47536;&amp;#45796;&quot;&amp;#45716; &amp;#51208;&amp;#47581;&amp;#51201;&amp;#51064; &amp;#51060;&amp;#50556;&amp;#44592;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#54616;&amp;#51648;&amp;#47564;!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51032; &amp;#47582;&amp;#52644;&amp;#54805; &amp;#51665;&amp;#51473;&amp;#52824;&amp;#47308;&amp;#47196;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45800; 4&amp;#51068; &amp;#47564;&amp;#50640; &amp;#53685;&amp;#51613;&amp;#50640;&amp;#49436; &amp;#54644;&amp;#48169;&amp;#46104;&amp;#49888;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#44048;&amp;#46041;&amp;#51201;&amp;#51064; &amp;#52824;&amp;#50976; &amp;#44284;&amp;#51221;&amp;#51012;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#49373;&amp;#49373;&amp;#54620; &amp;#54980;&amp;#44592;&amp;#47196; &amp;#47564;&amp;#45208;&amp;#48372;&amp;#49464;&amp;#50836;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:59:23', 0, '687e23aba255a.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(84, 'IMMUNE', 11, -1, 15, 0, '일상을 힘들게 하는 안면마비, 어떻게 완치되었을까요?', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;여러분 안녕하세요! 면력한방병원입니다&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;오늘은 급작스러운 대상포진으로 큰 고통을 겪으셨던&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60대 이진옥님의 치유 이야기를 나눕니다.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;▶ 환자분의 고민&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;참기 힘든 날카로운 통증&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;대형병원에서도 초기 진단 놓쳐&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;독한 약으로도 차도가 없던 상황&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;진통제를 먹어도 몇 시간을 못 버티는 통증&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6개월은 걸린다&quot;는 절망적인 이야기&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;하지만!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;면력한방병원의 맞춤형 집중치료로&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;단 4일 만에 통증에서 해방되신&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;이진옥님의 감동적인 치유 과정을&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;생생한 후기로 만나보세요&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 20:59:22', 1, '687e1ec17f61f.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(95, 'IMMUNE', 12, -1, 0, 0, '풍미로 가득한 이탈리아 요리 봉골레 파스타와 목살스테이크', '&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;p&gt;면력한방병원 셰프가 정성껏 준비한 특별한 보양식을 소개합니다!&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;iframe frameborder=&quot;0&quot; src=&quot;//www.youtube.com/embed/OIgmREiZQ40&quot; width=&quot;640&quot; height=&quot;360&quot; class=&quot;note-video-clip&quot;&gt;&lt;/iframe&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;누룽지 백숙 &amp;amp; 매콤 오징어볶음&amp;nbsp;&lt;/p&gt;&lt;p&gt;-구수한 누룽지와 닭고기의 완벽한 조화&lt;/p&gt;&lt;p&gt;-영양가 높은 닭백숙으로 면역력 강화&lt;/p&gt;&lt;p&gt;-매콤한 오징어볶음으로 입맛 돋우기&lt;/p&gt;&lt;p&gt;-소화가 잘 되는 건강한 식재료 사용&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;면력한방병원 치료식 셰프의 특별 레시피&lt;/p&gt;&lt;p&gt;추운 겨울, 따뜻한 보양식으로 건강을 챙기세요!&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-21 20:37:30', 2, '687e267a22f447.20477501.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', NULL, 'Logo_C_Black.svg', NULL, 'Logo_C_Black.svg', NULL, 'Logo_C_Black.svg', NULL, 'Logo_C_Black.svg', NULL, 'Logo_C_Black.svg', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(96, 'IMMUNE', 12, -1, 0, 0, '암환우를 위한 프리미엄 요리 갈릭버터 랍스터 안심스테이크', '&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;면력한방병원 셰프가 정성껏 준비한 특별한 보양식을 소개합니다!&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;누룽지 백숙 &amp;amp; 매콤 오징어볶음&amp;nbsp;&lt;/div&gt;&lt;div&gt;-구수한 누룽지와 닭고기의 완벽한 조화&lt;/div&gt;&lt;div&gt;-영양가 높은 닭백숙으로 면역력 강화&lt;/div&gt;&lt;div&gt;-매콤한 오징어볶음으로 입맛 돋우기&lt;/div&gt;&lt;div&gt;-소화가 잘 되는 건강한 식재료 사용&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;면력한방병원 치료식 셰프의 특별 레시피&lt;/div&gt;&lt;div&gt;추운 겨울, 따뜻한 보양식으로 건강을 챙기세요!&amp;nbsp;&lt;/div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-21 20:38:31', 0, '687e26b7401db0.01776259.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '[셰프특식]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

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

--
-- 테이블의 덤프 데이터 `nb_board_category`
--

INSERT INTO `nb_board_category` (`no`, `sitekey`, `board_no`, `name`, `sort_no`) VALUES
(12, 'IMMUNE', 10, '회복을 끌어 올리는 다양한 치료공간', 3),
(11, 'IMMUNE', 10, '다인입원실', 2),
(10, 'IMMUNE', 10, 'VIP 입원실', 1),
(7, 'IMMUNE', 9, '강서', 1),
(8, 'IMMUNE', 9, '광명', 2),
(9, 'IMMUNE', 9, '신촌', 3),
(13, 'IMMUNE', 10, '24시간/365일 힐링 할 수 있는 환경', 4),
(14, 'IMMUNE', 11, '암면역', 1),
(15, 'IMMUNE', 11, '신경면역', 2),
(16, 'IMMUNE', 11, '재활', 3),
(17, 'IMMUNE', 13, '진료일정', 1),
(18, 'IMMUNE', 13, '힐링프로그램', 2),
(19, 'IMMUNE', 16, '입원/퇴원/외출', 1),
(20, 'IMMUNE', 16, '진료/처방/본원진료', 2),
(21, 'IMMUNE', 16, '입원생활', 3),
(22, 'IMMUNE', 16, '식이/영양', 4),
(23, 'IMMUNE', 16, '상담/문의/후기', 5),
(24, 'IMMUNE', 16, '기타', 6);

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

--
-- 테이블의 덤프 데이터 `nb_board_manage`
--

INSERT INTO `nb_board_manage` (`no`, `sitekey`, `title`, `skin`, `regdate`, `top_banner_image`, `contents`, `view_yn`, `secret_yn`, `sort_no`, `list_size`, `block_size`, `fileattach_yn`, `fileattach_cnt`, `comment_yn`, `depth1`, `depth2`, `depth3`, `lnb_path`, `category_yn`, `extra_match_field1`, `extra_match_field2`, `extra_match_field3`, `extra_match_field4`, `extra_match_field5`, `extra_match_field6`, `extra_match_field7`, `extra_match_field8`, `extra_match_field9`, `extra_match_field10`, `extra_match_field11`, `extra_match_field12`, `extra_match_field13`, `extra_match_field14`, `extra_match_field15`, `isOpen`, `view_skin`) VALUES
(11, 'IMMUNE', '치료후기', 'gal', '2025-07-21 19:52:16', '', NULL, 'Y', 'N', 0, 3, 0, 'N', 0, 'N', NULL, NULL, NULL, NULL, 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'init'),
(12, 'IMMUNE', '면역채널', 'gal', '2025-07-21 20:31:56', '', '', 'Y', 'N', 0, 3, 0, 'N', 0, 'N', '', '', '', '', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'init'),
(13, 'IMMUNE', '면력소식', 'gal', '2025-07-22 08:52:19', '', '', 'Y', 'N', 0, 4, 0, 'N', 0, 'N', '', '', '', '', 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'init');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_branches`
--

CREATE TABLE `nb_branches` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_kr` varchar(100) NOT NULL,
  `json_path` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `nb_branches`
--

INSERT INTO `nb_branches` (`id`, `name`, `name_kr`, `json_path`, `created_at`, `updated_at`) VALUES
(1, 'index', '메인', 'menu.json', '2025-08-04 08:40:36', '2025-08-04 08:40:36'),
(2, 'gangseo', '강서', 'menu.gangseo.json', '2025-08-04 08:40:36', '2025-08-06 15:29:41'),
(3, 'gwangmyeon', '광명', 'menu.gwangmyeon.json', '2025-08-04 08:40:36', '2025-08-04 08:48:11'),
(4, 'sinchon', '신촌', 'menu.sinchon.json', '2025-08-04 08:40:36', '2025-08-04 08:48:19'),
(5, 'herb', '공진단', 'menu.herb.json', '2025-08-04 08:40:36', '2025-08-04 08:48:33');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_branch_seos`
--

CREATE TABLE `nb_branch_seos` (
  `id` int NOT NULL,
  `branch_id` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `section_title` varchar(255) DEFAULT NULL COMMENT '중간 카테고리 제목',
  `topic_title` varchar(255) DEFAULT NULL COMMENT '세부 주제 제목'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `nb_branch_seos`
--

INSERT INTO `nb_branch_seos` (`id`, `branch_id`, `path`, `page_title`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `section_title`, `topic_title`) VALUES
(7, 1, 'herb/gongjin.php', '한약', '공진단 | 기력 회복 & 면역력 강화', '공진단은 고귀한 사향과 녹용을 포함한 한약재로 면역력 강화, 피로 회복, 노화 예방에 효과적인 한방 명약입니다. 면력한방병원에서 개인 체질에 맞는 공진단을 처방받아보세요.', '공진단, 면역력 강화, 피로회복, 고농축 한약, 한방 명약, 사향, 녹용, 한방 클리닉, 공진단 효능, 한의원 공진단', '2025-08-07 00:56:36', '2025-08-07 08:46:07', '', ''),
(8, 1, 'herb/gyeongok.php', '한약', '경옥고 | 원기 회복 & 항노화 보약', '경옥고는 기력 저하, 노화, 폐기능 저하에 도움을 주는 한방 보약입니다. 전통 한의학 처방으로 면력한방병원에서 정성껏 조제합니다. 활력 넘치는 일상을 위한 첫걸음, 경옥고로 시작하세요.', '경옥고, 원기회복, 노화방지, 보약, 폐기능 강화, 면력한방병원, 경옥고 효능, 한의원 보약, 항노화, 기력 보충', '2025-08-07 00:57:01', '2025-08-07 08:46:03', '', ''),
(9, 1, 'herb/joint.php', '한약', '관절고 | 관절 통증 완화 & 연골 재생', '관절고는 관절염, 무릎통증, 허리통증 등 관절 질환을 한방으로 치료하는 고약입니다. 한의학적 원리를 기반으로 관절 기능 개선과 통증 완화를 돕습니다. 일상 속 움직임을 회복하세요.', '관절고, 관절염 치료, 무릎 통증, 연골 재생, 한방 치료, 한의원 관절, 허리통증, 관절 보약, 면력한방병원 관절, 고약 치료', '2025-08-07 00:57:21', '2025-08-07 08:45:58', '', ''),
(10, 2, 'cancer/home.php', '암면역센터', '암면역센터 | 통합면역치료 한방 클리닉', '면력한방병원 암면역센터는 항암치료 및 수술 후 회복을 돕고, 면역력 강화에 중점을 둔 한방 통합치료를 제공합니다. 개인별 맞춤 한약과 면역 프로그램으로 삶의 질을 높이세요.', '암면역센터, 한방 암 치료, 암 후유증, 항암 보약, 면역력 강화, 통합의학, 한방 클리닉, 암 재활, 암 치료 보조, 암환자 한약', '2025-08-07 01:00:07', '2025-08-07 08:45:34', '', ''),
(11, 2, 'cancer/female-1.php', '암면역센터', '유방·자궁·난소암 수술 전후 한방 케어', '수술 전후 체력 저하, 감염 위험, 상처 회복 등 다양한 문제를 예방하고 개선하는 여성암 수술 전후 한방치료 프로그램. 빠른 회복과 면역 증진을 동시에.', '여성암 수술, 유방암 수술 후, 자궁암 회복, 수술 후 한방치료, 면역력 강화, 한방 케어, 수술 회복, 수술 후유증', '2025-08-07 01:01:38', '2025-08-07 09:09:05', '유방 / 자궁 / 난소암', '수술 전 후'),
(12, 2, 'cancer/female-2.php', '암면역센터', '항암방사선 후 회복 | 유방·자궁·난소암', '항암과 방사선 치료는 피로, 식욕부진, 탈모 등 다양한 부작용을 동반합니다. 면력한방병원은 체질 맞춤 한약으로 부작용 완화와 체력 회복을 돕습니다.', '항암 후유증, 방사선 치료 회복, 유방암 항암, 자궁암 방사선, 면역력 개선, 한방 암치료, 여성암 부작용', '2025-08-07 01:04:22', '2025-08-07 08:45:25', '유방 / 자궁 / 난소암', '항암방사선'),
(13, 2, 'cancer/female-3.php', '암면역센터', '전이·재발 예방 | 유방·자궁·난소암', '암의 재발과 전이를 예방하기 위해 면역 시스템을 강화하고, 체질 개선 중심의 한방 통합치료를 제공합니다. 지속적인 관리가 생존율을 높입니다.', '암 재발 방지, 전이 억제, 암 재발 관리, 여성암 지속관리, 유방암 전이, 자궁암 재발, 한방 면역, 통합치료', '2025-08-07 01:04:53', '2025-08-07 08:45:21', '유방 / 자궁 / 난소암', '전이재발관리'),
(14, 2, 'cancer/female-4.php', '암면역센터', '항암식이 | 여성암 환자 맞춤 식단', '유방암, 자궁암, 난소암 환자의 항암치료 중·후 권장 식단과 금기 식품을 안내합니다. 면역력 강화와 체력 유지에 중점을 둔 한방 식이요법 제공합니다.', '항암식이요법, 암환자 식단, 여성암 식이, 유방암 영양, 자궁암 식이요법, 항암 중 먹을 것, 한방 영양관리', '2025-08-07 01:05:22', '2025-08-07 08:45:17', '유방 / 자궁 / 난소암', '항암식이'),
(15, 2, 'cancer/female-5.php', '암면역센터', '여성암 맞춤 프로그램 | 유방·자궁·난소암 관리', '면력한방병원은 여성암 환자의 수술, 항암, 회복 단계별로 특화된 통합 프로그램을 운영합니다. 침, 약침, 탕약 등 한방요법을 체계적으로 제공합니다.', '여성암 프로그램, 암관리 플랜, 유방암 프로그램, 자궁암 통합치료, 한방 재활 프로그램, 면역치료, 여성암 맞춤 치료', '2025-08-07 01:05:51', '2025-08-07 08:44:58', '유방 / 자궁 / 난소암', '프로그램'),
(16, 2, 'cancer/digest-1.php', '암면역센터', '대장암·위암 수술 전후 한방 케어', '대장암·위암 수술 전후 체력 회복, 위장 기능 강화, 감염 예방을 위한 한방 치료 프로그램. 수술의 부담을 줄이고 빠른 일상 복귀를 돕습니다.', '대장암 수술, 위암 수술, 수술 전후 회복, 위장 회복, 한방 암치료, 면역력 강화, 소화기암 수술 후유증', '2025-08-07 01:06:04', '2025-08-07 08:44:49', '대장 / 위암', '수술 전 후'),
(17, 2, 'cancer/digest-2.php', '암면역센터', '대장암·위암 항암 후유증 완화 | 면역 회복', '항암치료와 방사선으로 인한 피로, 식욕저하, 소화불량 등을 한방치료로 개선하고 위장 기능을 보호합니다. 장기적인 면역력 유지까지 함께 관리하세요.', '대장암 항암, 위암 방사선, 암치료 부작용, 소화기암 면역치료, 항암 후유증, 한방 보약, 피로 회복', '2025-08-07 01:08:12', '2025-08-07 08:44:42', '대장 / 위암', '항암방사선'),
(18, 2, 'cancer/digest-3.php', '암면역센터', '전이·재발 예방 | 대장암·위암 통합치료', '대장암·위암의 재발 및 전이를 막기 위해 한의학적 체질 개선, 장 기능 강화, 면역 증진을 통한 장기 관리 치료를 진행합니다.', '대장암 재발, 위암 전이, 암 전이 예방, 면역력 관리, 한방 지속치료, 소화기암 재발방지', '2025-08-07 01:08:41', '2025-08-07 08:44:36', '대장 / 위암', '전이재발관리'),
(19, 2, 'cancer/digest-4.php', '암면역센터', '대장암·위암 식이요법 | 항암식단 관리', '소화기계 암 환자에게 적합한 항암 식이요법을 안내합니다. 위장 부담을 줄이고, 면역력을 높이며, 영양소를 충분히 공급하는 식단 가이드를 확인하세요.', '항암식이요법, 위암 식단, 대장암 식이, 암환자 영양, 항암 중 음식, 암식단 가이드, 위장 건강 식이', '2025-08-07 01:09:17', '2025-08-07 08:44:31', '대장 / 위암', '항암식이'),
(20, 2, 'cancer/digest-5.php', '암면역센터', '대장암·위암 맞춤 프로그램 | 한방 통합치료', '면력한방병원은 대장·위암 환자의 수술, 항암, 회복 등 각 단계에 맞는 침, 약침, 한약, 식이요법 프로그램을 제공합니다. 개인별 상태에 맞춘 통합 치료로 회복을 돕습니다.', '대장암 프로그램, 위암 회복 프로그램, 통합 암치료, 한방 맞춤 관리, 침치료, 약침요법, 항암식이, 암환자 회복 관리', '2025-08-07 01:09:41', '2025-08-07 08:44:24', '대장 / 위암', '프로그램'),
(21, 2, 'cancer/liver-1.php', '암면역센터', '간암·담도암·췌장암 수술 전후 한방 관리', '간, 담도, 췌장 부위의 수술은 회복 속도와 면역력이 중요한 요소입니다. 수술 전 체력 준비와 수술 후 빠른 회복을 위한 한방 치료를 제공합니다.', '간암 수술, 췌장암 수술, 담도암 수술, 수술 회복, 장기 보호, 한방 치료, 간 기능 회복, 수술 전후 한약', '2025-08-07 01:10:49', '2025-08-07 08:44:18', '간/담도/췌장암', '수술 전 후'),
(22, 2, 'cancer/liver-2.php', '암면역센터', '항암치료 부작용 개선 | 간암·췌장암·담도암', '항암·방사선 치료 후 간 기능 저하, 소화불량, 피로감 등 다양한 부작용을 개선하고 면역력을 보완하는 한방 치료 프로그램을 제공합니다.', '간암 항암치료, 췌장암 방사선, 담도암 후유증, 항암 부작용 완화, 한방 보약, 면역 보강, 간 기능 저하 개선', '2025-08-07 01:11:18', '2025-08-07 08:44:13', '간/담도/췌장암', '항암방사선'),
(23, 2, 'cancer/liver-3.php', '암면역센터', '전이·재발 예방 | 간암·췌장암·담도암 한방치료', '간·담도·췌장암은 전이 위험이 높기 때문에 면역력 유지와 체질 개선이 필수입니다. 전이 억제를 위한 한방 통합관리 프로그램을 확인하세요.', '간암 재발, 췌장암 전이, 담도암 관리, 장기암 전이 예방, 한방 면역치료, 체질개선, 암 재발 방지', '2025-08-07 01:11:40', '2025-08-07 08:44:04', '간/담도/췌장암', '전이재발관리'),
(24, 2, 'cancer/liver-4.php', '암면역센터', '항암식이요법 | 간암·췌장암·담도암 환자 식단', '간·췌장 기능을 해치지 않으면서 면역력과 체력을 보강할 수 있는 항암 식이요법. 독소 배출, 영양 균형을 고려한 식단 가이드를 제공합니다.', '항암 식단, 간암 영양관리, 췌장암 식이요법, 담도암 음식, 해독 식이, 간보호 음식, 암환자 식단, 항암 영양', '2025-08-07 01:12:06', '2025-08-07 08:43:50', '간/담도/췌장암', '항암식이'),
(25, 2, 'cancer/liver-5.php', '암면역센터', '간암·췌장암·담도암 한방 프로그램 | 장기 보호 통합치료', '장기별 특성을 고려한 해독, 보강, 면역 회복 중심의 통합 한방 프로그램. 침, 약침, 한약, 해독요법을 통해 암 이후의 삶을 건강하게 만들어갑니다.', '간암 프로그램, 췌장암 회복, 담도암 관리, 해독요법, 한방 통합관리, 장기 보호 프로그램, 암 후 재활', '2025-08-07 01:12:33', '2025-08-07 08:43:42', '간/담도/췌장암', '프로그램'),
(26, 2, 'cancer/lung-1.php', '암면역센터', '폐암 수술 전후 회복 | 면역·호흡기 관리', '폐암 수술 전 체력 준비, 수술 후 호흡기 기능 회복과 면역력 보강을 위한 한방치료. 폐 기능을 보호하며 빠른 일상 복귀를 지원합니다.', '폐암 수술 후, 호흡기 회복, 폐암 수술 전 관리, 면역력 강화, 폐기능 개선, 폐암 한방치료, 폐 회복 한약', '2025-08-07 01:13:50', '2025-08-07 08:43:33', '폐암', '수술 전 후'),
(27, 2, 'cancer/lung-2.php', '암면역센터', '폐암 항암치료 부작용 | 피로·기침 완화', '항암·방사선 치료 후 피로, 기침, 호흡곤란, 식욕 저하 등을 한방 치료로 완화하고 면역력을 보강합니다. 폐 기능을 보호하는 맞춤 한약 처방 진행 중.', '폐암 항암치료, 방사선 부작용, 항암 피로, 기침 완화, 폐기능 강화, 폐암 면역치료, 한방 폐암 관리', '2025-08-07 01:14:20', '2025-08-07 08:43:25', '폐암', '항암방사선'),
(28, 2, 'cancer/lung-3.php', '암면역센터', '폐암 재발 방지 | 전이 예방 치료', '폐암의 재발과 전이를 방지하기 위해 체질 개선과 면역력 향상을 중심으로 통합 한방 치료를 제공합니다. 장기적인 관리와 감시가 중요합니다.', '폐암 전이, 폐암 재발, 암 재발 방지, 면역치료, 체질개선, 폐기능 보강, 한방 암관리, 폐암 예방', '2025-08-07 01:14:50', '2025-08-07 08:43:16', '폐암', '전이재발관리'),
(29, 2, 'cancer/lung-4.php', '암면역센터', '폐암 식이요법 | 항암 식단 가이드', '폐 기능을 보호하고 항암 부작용을 줄이는 항암 식단을 안내합니다. 호흡기 건강에 도움이 되는 음식과 피해야 할 식품 정보를 제공합니다.', '폐암 식이요법, 항암식단, 폐기능 영양관리, 폐암 영양, 암환자 식사, 항암 식이, 폐 보호 음식', '2025-08-07 01:15:14', '2025-08-07 08:43:07', '폐암', '항암식이'),
(30, 2, 'cancer/lung-5.php', '암면역센터', '폐암 한방 통합 프로그램 | 체력·면역 회복', '수술, 항암, 재활까지 전 단계를 아우르는 폐암 환자 맞춤 한방 프로그램. 침, 약침, 한약, 면역 강화 중심으로 폐 기능과 전신 회복을 돕습니다.', '폐암 프로그램, 폐암 재활, 폐암 치료 과정, 한방 통합 암치료, 침치료, 약침, 폐기능 회복, 폐암 맞춤 치료', '2025-08-07 01:15:37', '2025-08-07 08:43:00', '폐암', '프로그램'),
(31, 2, 'cancer/thyroid-1.php', '암면역센터', '갑상선암 수술 전후 | 회복·면역 강화', '갑상선암 수술 전 체력 보강 및 수술 후 기능 회복과 면역력 향상을 위한 한방 치료를 제공합니다. 갑상선 호르몬 불균형에 대한 한약 관리 포함.', '갑상선암 수술, 갑상선 수술 후유증, 수술 회복 한약, 호르몬 회복, 면역력 강화, 수술 후 피로', '2025-08-07 01:16:38', '2025-08-07 08:42:53', '갑상선암', '수술 전 후'),
(32, 2, 'cancer/thyroid-2.php', '암면역센터', '갑상선암 방사성치료 부작용 | 기능 회복', '방사성 요오드 치료 후 나타나는 피로감, 호르몬 불균형, 구강 건조 등을 한방치료로 완화합니다. 갑상선 기능 안정화를 위한 한약 중심 관리.', '갑상선암 방사성치료, 요오드 치료 부작용, 호르몬 회복, 갑상선 기능 안정, 한방 부작용 완화, 면역 회복', '2025-08-07 01:17:09', '2025-08-07 08:42:45', '갑상선암', '방사성치료'),
(33, 2, 'cancer/thyroid-3.php', '암면역센터', '갑상선암 면역치료 | 재발 방지 한방관리', '갑상선암 치료 이후 면역력 저하로 인한 재발을 방지하기 위해 체질 맞춤 한약, 침 치료, 약침 등으로 전신 면역을 강화합니다.', '갑상선암 면역관리, 재발 예방, 면역 강화, 체질 개선, 갑상선 보약, 면역력 회복, 갑상선 한방치료', '2025-08-07 01:17:42', '2025-08-07 08:42:36', '갑상선암', '면역관리'),
(34, 2, 'cancer/thyroid-4.php', '암면역센터', '갑상선암 식이요법 | 항암 영양 관리', '갑상선 기능에 영향을 주지 않으면서도 면역력과 영양 밸런스를 맞출 수 있는 항암 식단 가이드를 제공합니다. 요오드 섭취 주의사항 포함.', '갑상선암 식단, 요오드 식이, 항암식이요법, 영양관리, 갑상선암 영양, 면역 식단, 항암 식단 가이드', '2025-08-07 01:17:59', '2025-08-07 08:42:25', '갑상선암', '항암식이'),
(35, 2, 'cancer/thyroid-5.php', '암면역센터', '갑상선암 한방 프로그램 | 기능 회복 & 체질 개선', '갑상선암 환자를 위한 수술 전후, 방사성치료 후, 재발 예방까지 아우르는 맞춤 통합 한방 프로그램. 침·약침·한약으로 전신 회복을 돕습니다.', '갑상선암 프로그램, 갑상선 회복, 한방 통합치료, 체질개선, 호르몬 균형, 재활 한방관리, 통합 암치료', '2025-08-07 01:18:43', '2025-08-07 08:42:14', '갑상선암', '프로그램'),
(36, 2, 'cancer/etc-1.php', '암면역센터', '희귀암 수술 전후 회복 | 통합 한방관리', '림프종, 뇌종양 등 기타암 수술 전후 회복을 위한 한방 치료. 체력 보강, 장기 기능 회복, 면역력 향상을 목표로 개인별 맞춤 처방을 제공합니다.', '기타암 수술, 희귀암 회복, 림프종 수술 후, 뇌종양 수술 회복, 한방 치료, 면역력 강화, 수술 전후 한약', '2025-08-07 01:19:42', '2025-08-07 08:41:52', '기타암', '수술 전 후'),
(37, 2, 'cancer/etc-2.php', '암면역센터', '희귀암 항암·방사선 후유증 완화', '항암제나 방사선치료 후 발생하는 식욕부진, 피로, 장기 손상 등을 최소화하고 면역 기능을 회복하는 한방 보조 치료를 제공합니다.', '희귀암 항암치료, 림프종 방사선, 뇌종양 부작용, 항암 후유증, 면역보강 한약, 한방 부작용 완화', '2025-08-07 01:20:17', '2025-08-07 08:41:36', '기타암', '항암방사선'),
(38, 2, 'cancer/etc-3.php', '암면역센터', '기타암 전이·재발 관리', '전이 가능성이 높은 기타암을 한방 치료로 면역력 중심 관리. 체질 개선과 장기 기능 강화로 재발 위험을 낮춥니다.', '희귀암 전이, 암 재발 방지, 림프종 관리, 뇌종양 한방치료, 면역 강화, 체질개선, 기타암 재발', '2025-08-07 01:20:44', '2025-08-07 08:41:18', '기타암', '전이재발관리'),
(39, 2, 'cancer/etc-4.php', '암면역센터', '기타암 식이요법 | 림프종·뇌종양 환자 식단', '종 희귀암에 적합한 항암 식이요법 안내. 소화기 부담을 줄이고 면역력을 높이며 치료 부작용을 완화하는 영양 중심 식단을 제공합니다.', '희귀암 식단, 림프종 식이요법, 뇌종양 식이, 암환자 영양관리, 항암식단 가이드, 면역식이', '2025-08-07 01:21:12', '2025-08-07 08:41:04', '기타암', '항암식이'),
(40, 2, 'cancer/etc-5.php', '암면역센터', '기타암 치료 프로그램 | 통합 면역·재활 관리', '림프종, 뇌종양 등 기타암 환자를 위한 수술 후 회복, 항암 보조치료, 면역력 강화까지 포함된 맞춤형 한방 통합 프로그램 운영 중입니다.', '기타암 치료, 희귀암 통합 프로그램, 림프종 회복, 뇌종양 관리, 한방 재활, 맞춤 한방치료, 통합 면역 프로그램', '2025-08-07 01:21:36', '2025-08-07 08:40:49', '기타암', '프로그램'),
(41, 2, 'neuro/shingles-1.php', '신경면역센터', '대상포진 초기 치료 | 빠른 통증 완화', '대상포진 초기에는 신속한 치료가 중요합니다. 면력한방병원은 침·약침·한약을 활용해 신경 손상 최소화, 통증 억제, 면역력 강화 중심의 초기 한방치료를 제공합니다.', '대상포진 초기, 대상포진 침치료, 신경통 완화, 통증 조절, 한방 대상포진, 면역치료, 초기포진 치료', '2025-08-07 01:23:26', '2025-08-07 08:40:39', '대상포진', '초기자료'),
(42, 2, 'neuro/shingles-2.php', '신경면역센터', '신경통·만성통증의 근본적 한방치료', '대상포진 후유증으로 나타나는 만성 신경통, 저린감, 통증 지속은 한방치료로 개선할 수 있습니다. 면력한방병원은 장기적인 신경면역 회복 치료를 진행합니다.', '대상포진 후유증, 대상포진 신경통, 신경면역 한방치료, 만성통증, 저림 증상, 후유증 치료, 면역력 회복', '2025-08-07 01:23:52', '2025-08-07 08:38:58', '대상포진', '후유증'),
(43, 2, 'neuro/home.php', '신경면역센터', '신경통증과 면역불균형을 함께 다루는 한방통합치료', '신경계 통증과 면역 불균형으로 인한 질환은 빠른 치료가 핵심입니다. 면력한방병원 신경면역센터는 대상포진, 만성신경통, 자가면역 이상 등을 한방 통합요법으로 치료합니다.', '신경면역센터, 대상포진, 신경통증, 자가면역, 면역 저하, 한방 면역치료, 통증 한약, 약침요법, 면역력 강화, 신경통 한방치료', '2025-08-07 01:24:35', '2025-08-07 08:38:46', '', ''),
(44, 2, 'rehab/home.php', '재활 센터', '수술·사고 후 회복을 돕는 맞춤형 한방재활치료', '면력한방병원 재활센터는 수술, 사고, 만성질환 후유증으로 인한 통증과 기능 저하를 개선하는 한방 통합재활치료를 제공합니다. 빠른 일상 복귀를 위한 맞춤 케어.', '재활센터, 한방 재활, 수술 후 회복, 사고 후유증, 통증 치료, 기능 재활, 약침치료, 한방치료, 재활 한약', '2025-08-07 01:26:52', '2025-08-07 08:38:31', '', ''),
(45, 2, 'rehab/gyn.php', '재활 센터', '부인과 수술 후 회복 | 여성 맞춤 한방재활', '자궁, 난소 등 부인과 수술 후 체력 저하, 호르몬 불균형, 면역력 저하 등을 한방 재활치료로 개선합니다. 여성 특화 회복 프로그램 운영.', '부인과 수술 회복, 자궁 수술 후, 난소 수술 후, 여성 재활, 호르몬 조절, 회복 보약, 면역 재활, 여성질환 재활치료', '2025-08-07 01:27:11', '2025-08-07 08:33:48', '', ''),
(46, 2, 'rehab/accident.php', '재활 센터', '교통사고 한방치료 | 목·허리 통증 재활', '사고 후 발생하는 목 통증, 허리통증, 어지럼증, 피로감 등 만성 후유증을 침·약침·한약 등으로 회복합니다. 자동차보험 적용 가능.', '교통사고 후유증, 자동차보험 한방치료, 사고 재활, 목통증, 허리통증, 약침, 침치료, 사고 후 피로, 한방 재활치료', '2025-08-07 01:27:28', '2025-08-07 08:36:29', '', ''),
(47, 2, 'rehab/postop.php', '재활 센터', '수술 후 재활 | 통증·면역 회복 통합치료', '정형외과, 척추, 신경계 등 수술 후 발생하는 통증, 기능 저하, 회복 지연 등을 한방 재활치료로 개선합니다. 침·약침·운동요법 포함 통합적 접근.', '수술 후 재활, 정형외과 수술 회복, 척추 수술 후 통증, 수술 후 한방, 기능 재활, 한방 통합치료, 약침, 면역 회복', '2025-08-07 01:28:11', '2025-08-07 08:33:33', '', ''),
(48, 2, 'hospital/about.php', '병원 소개', '병원소개 | 면역 중심 한방병원', '환자의 면역력 회복과 재발 방지를 목표로 운영되는 면력한방병원은 암·신경·재활치료에 특화된 한방 통합 클리닉입니다.', '한방병원 소개, 면역치료, 통합의학, 암한방치료, 통증한방, 면력한방병원', '2025-08-07 01:29:23', '2025-08-07 08:33:27', '', ''),
(49, 2, 'hospital/doctor.php', '병원 소개', '의료진 안내 | 한방·통합치료 전문 의료진', '한방·면역·재활 전문 의료진이 모여 환자의 치료와 회복을 전담합니다. 분야별 전문성과 풍부한 임상 경험을 바탕으로 진료합니다.', '한의사 소개, 의료진 구성, 암 면역 전문가, 면력한방병원 의료진', '2025-08-07 01:30:27', '2025-08-07 08:33:22', '', ''),
(50, 2, 'hospital/facility.php', '병원 소개', '병원 시설안내 | 진료실·치료실·입원실 구성', '치료 효율성과 환자 편의를 고려한 진료실, 약침실, 입원실 등 첨단 시설을 갖춘 면력한방병원. 청결하고 따뜻한 환경을 유지합니다.', '한방병원 시설, 입원실, 약침실, 청결 병원, 치료환경', '2025-08-07 01:30:42', '2025-08-07 08:33:16', '', ''),
(51, 2, 'hospital/location.php', '병원 소개', '위치안내 | 강서구 한방병원', '서울 강서구에 위치한 면력한방병원은 지하철, 버스 등 대중교통 접근성이 뛰어나며 자가용 이용 시에도 편리하게 오실 수 있습니다.', '강서구 한방병원, 한방병원 위치, 교통안내, 오시는 길, 병원 약도', '2025-08-07 01:31:00', '2025-08-07 08:30:44', '', ''),
(52, 2, 'hospital/nonpayment.php', '병원 소개', '비급여항목 | 침·약침·탕약 비용', '비급여 항목(침, 약침, 탕약 등)의 상세 내역과 가격 정보를 투명하게 제공합니다.', '비급여항목, 약침 가격, 탕약비용, 비급여 진료비, 한방병원 요금표', '2025-08-07 01:31:52', '2025-08-07 08:30:38', '', ''),
(53, 2, 'hospital/documents.php', '병원 소개', '서류발급안내 | 진단서·입원확인서 발급 |', '진단서, 소견서, 입·퇴원 확인서, 통원 확인서 등 필요한 의무기록 및 서류 발급 절차를 안내합니다.', '진단서 발급, 입원확인서, 소견서 신청, 통원 확인서, 병원 서류', '2025-08-07 01:32:11', '2025-08-07 08:30:32', '', ''),
(54, 2, 'hospital/inquiry.php', '병원 소개', '빠른문의 | 온라인 상담접수', '진료 전 궁금한 사항을 빠르게 문의하세요. 의료진이 빠르고 정확하게 안내해드립니다.', '한방상담, 병원 문의, 온라인 상담, 빠른접수, 면역치료 문의', '2025-08-07 01:32:28', '2025-08-07 08:30:24', '', ''),
(55, 2, 'hospital/faq.php', '병원 소개', 'FAQ | 진료·예약·치료 관련 질문', '진료과목, 치료방법, 예약절차 등 자주 묻는 질문과 답변을 정리했습니다. 빠르게 궁금증을 해결해보세요.', '자주 묻는 질문, 면역치료 FAQ, 진료 예약, 한방 치료 궁금증', '2025-08-07 01:32:43', '2025-08-07 08:30:13', '', '');

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
-- 테이블 구조 `nb_custom_inquires`
--

CREATE TABLE `nb_custom_inquires` (
  `id` int NOT NULL COMMENT '기본 PK',
  `name` varchar(100) NOT NULL COMMENT '성명',
  `birth` varchar(10) NOT NULL COMMENT '생년월일 (YYMMDD)',
  `gender` tinyint NOT NULL COMMENT '0: 남자, 1: 여자',
  `height` int NOT NULL,
  `weight` int NOT NULL,
  `phone` varchar(20) NOT NULL,
  `job` varchar(100) NOT NULL,
  `consult_time` tinyint NOT NULL COMMENT '상담 가능 시간 (1=10~12시, 2=12~14시 등)',
  `first_visit` tinyint NOT NULL COMMENT '첫 방문 여부 (1=첫 방문, 0=재방문)',
  `branch_id` int DEFAULT NULL COMMENT '지점 ID (nb_branches.id 참조)',
  `treatment` text,
  `symptoms` text,
  `drink` varchar(255) DEFAULT NULL,
  `headache` varchar(255) DEFAULT NULL,
  `dizzy` varchar(255) DEFAULT NULL,
  `pain_etc` varchar(255) DEFAULT NULL,
  `appetite` text,
  `digestion` text,
  `water` text,
  `feces` text,
  `urine` text,
  `sweat` text,
  `sweat_part` text,
  `temperature` text,
  `ent` text,
  `resp` text,
  `chest` text,
  `sleep` text,
  `body_skin` text,
  `pain_area` text,
  `pain_condition` text,
  `pain_special` text,
  `men_health` text,
  `pain_menstrual` text,
  `feces_time` varchar(100) DEFAULT NULL,
  `urine_time` varchar(100) DEFAULT NULL,
  `birth_exp` tinyint DEFAULT NULL,
  `birth_count` varchar(10) DEFAULT NULL,
  `miscarriage_exp` tinyint DEFAULT NULL,
  `miscarriage_count` varchar(10) DEFAULT NULL,
  `menstrual_status` tinyint DEFAULT NULL,
  `menstrual_cycle` varchar(10) DEFAULT NULL,
  `menopause_age` varchar(10) DEFAULT NULL,
  `hand_temp` tinyint DEFAULT NULL COMMENT '글로벌 옵션 매핑',
  `foot_temp` tinyint DEFAULT NULL COMMENT '글로벌 옵션 매핑',
  `swelling_area` tinyint DEFAULT NULL COMMENT '글로벌 옵션 매핑',
  `swelling_time` tinyint DEFAULT NULL COMMENT '글로벌 옵션 매핑',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `nb_custom_inquires`
--

INSERT INTO `nb_custom_inquires` (`id`, `name`, `birth`, `gender`, `height`, `weight`, `phone`, `job`, `consult_time`, `first_visit`, `branch_id`, `treatment`, `symptoms`, `drink`, `headache`, `dizzy`, `pain_etc`, `appetite`, `digestion`, `water`, `feces`, `urine`, `sweat`, `sweat_part`, `temperature`, `ent`, `resp`, `chest`, `sleep`, `body_skin`, `pain_area`, `pain_condition`, `pain_special`, `men_health`, `pain_menstrual`, `feces_time`, `urine_time`, `birth_exp`, `birth_count`, `miscarriage_exp`, `miscarriage_count`, `menstrual_status`, `menstrual_cycle`, `menopause_age`, `hand_temp`, `foot_temp`, `swelling_area`, `swelling_time`, `created_at`, `updated_at`) VALUES
(1, '양상규', '971229', 1, 191, 80, '01022224444', '개발자', 4, 0, 2, 'ㅁㄴㅇㅇㄴㅁㅇㄴㅁㅇㄴㅁ\r\nㄴㅇ\r\nㅁㄴㅇ\r\nㅁㄴㅇ\r\nㄴㅇㅁ\r\nㅁㄴㅇ\r\nㅇㄴㅁ\r\n', 'ㅁㄴㅇㅇㄴㅁㅇㄴㅁㅇㄴㅁ\r\nㄴㅇ\r\nㅁㄴㅇ\r\nㅁㄴㅇ\r\nㄴㅇㅁ\r\nㅁㄴㅇ\r\nㅇㄴㅁ\r\n', '', '', '', '', '골고루 잘 먹는 편이다,한 번에 먹는 양이 많다', '소화가 잘 된다,속이 더부룩 하다', '찬물을 좋아한다', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '생리 전 주체할 수 없이 식욕이 생긴다', '발기력이 떨어진다', '기타', '', '', 2, '1', 2, '2', 3, NULL, '3', NULL, NULL, NULL, NULL, '2025-08-05 06:07:15', '2025-08-05 06:07:15');

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
-- 테이블 구조 `nb_doctors`
--

CREATE TABLE `nb_doctors` (
  `id` int UNSIGNED NOT NULL COMMENT 'PK',
  `title` varchar(255) NOT NULL COMMENT '이름',
  `branch_id` int NOT NULL COMMENT '지점 FK (nb_branches.id)',
  `position` varchar(100) DEFAULT NULL COMMENT '직급',
  `department` varchar(20) NOT NULL,
  `keywords` varchar(500) DEFAULT NULL COMMENT '키워드 (콤마 구분)',
  `career` text COMMENT '경력',
  `activity` text COMMENT '활동',
  `education` text COMMENT '학력',
  `publication_visible` tinyint(1) DEFAULT '1' COMMENT '저서 및 논문 노출 여부 (1:노출, 0:숨김)',
  `publications` text COMMENT '저서 및 논문',
  `thumb_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '썸네일 이미지 URL (누끼)',
  `detail_image` varchar(255) DEFAULT NULL COMMENT '상세 이미지 URL',
  `sort_no` int DEFAULT '0' COMMENT '정렬 순서',
  `is_active` tinyint(1) DEFAULT '1' COMMENT '노출 여부 (1:노출, 0:숨김)',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '생성일',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '수정일',
  `is_ceo` tinyint(1) NOT NULL DEFAULT '0' COMMENT '대표원장 여부 (1:대표, 0:일반)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `nb_doctors`
--

INSERT INTO `nb_doctors` (`id`, `title`, `branch_id`, `position`, `department`, `keywords`, `career`, `activity`, `education`, `publication_visible`, `publications`, `thumb_image`, `detail_image`, `sort_no`, `is_active`, `created_at`, `updated_at`, `is_ceo`) VALUES
(2, '황이준', 2, '대표원장', '통합면역 대표원장', '#꼼꼼한, #친절한, #예리한, #이성적인, #정확한', '<ul><li><span data-metadata=\"&lt;!--(figmeta)eyJmaWxlS2V5IjoiMm1jQUhYa1ZZdVl1c3BEelJPNVdJMCIsInBhc3RlSUQiOjIxMDE4NjY3MjcsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)--&gt;\"></span><span data-metadata=\"&lt;!--(figmeta)eyJmaWxlS2V5IjoiMm1jQUhYa1ZZdVl1c3BEelJPNVdJMCIsInBhc3RlSUQiOjE4ODU2NDM5ODAsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)--&gt;\"></span><span data-buffer=\"&lt;!--(figma)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(/figma)--&gt;\"></span><span style=\"white-space-collapse: preserve;\">(現) 면력한방병원 대표원장</span></li></ul>', '<p><span data-metadata=\"&lt;!--(figmeta)eyJmaWxlS2V5IjoiMm1jQUhYa1ZZdVl1c3BEelJPNVdJMCIsInBhc3RlSUQiOjQ4MTY5NDEwNywiZGF0YVR5cGUiOiJzY2VuZSJ9Cg==(/figmeta)--&gt;\"></span></p><ul style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: &quot;Noto Sans KR&quot;, sans-serif;\"><li><span style=\"font-family: &quot;Noto Sans KR&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; white-space-collapse: preserve;\">한방비만학회 전문가과정</span></li><li><span data-metadata=\"&lt;!--(figmeta)eyJmaWxlS2V5IjoiMm1jQUhYa1ZZdVl1c3BEelJPNVdJMCIsInBhc3RlSUQiOjEwNjExMzAwNzQsImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)--&gt;\"></span><span data-buffer=\"&lt;!--(figma)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(/figma)--&gt;\"></span><span style=\"white-space-collapse: preserve;\">동의방약학회 정회원</span></li></ul>', '<ul><li><span data-metadata=\"&lt;!--(figmeta)eyJmaWxlS2V5IjoiMm1jQUhYa1ZZdVl1c3BEelJPNVdJMCIsInBhc3RlSUQiOjYwOTUyNTMyNSwiZGF0YVR5cGUiOiJzY2VuZSJ9Cg==(/figmeta)--&gt;\"></span><span data-metadata=\"&lt;!--(figmeta)eyJmaWxlS2V5IjoiMm1jQUhYa1ZZdVl1c3BEelJPNVdJMCIsInBhc3RlSUQiOjIxMTM0MTEzNjksImRhdGFUeXBlIjoic2NlbmUifQo=(/figmeta)--&gt;\"></span><span data-buffer=\"&lt;!--(figma)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(/figma)--&gt;\"></span><span style=\"white-space-collapse: preserve;\">동국대학교 한의과대학 졸업</span></li><li><span style=\"white-space-collapse: preserve;\">통합암학회 인정의</span></li><li><span style=\"white-space-collapse: preserve;\">척추신경추나의학회 정회원</span></li></ul>', 1, '<div><span style=\"white-space-collapse: preserve;\"><br></span></div>', '6892f0a0e52693.59245043.png', '6895e62074dc23.62228636.jpg', 1, 1, '2025-08-05 00:38:46', '2025-08-08 12:03:51', 1);
INSERT INTO `nb_doctors` (`id`, `title`, `branch_id`, `position`, `department`, `keywords`, `career`, `activity`, `education`, `publication_visible`, `publications`, `thumb_image`, `detail_image`, `sort_no`, `is_active`, `created_at`, `updated_at`, `is_ceo`) VALUES
(3, '이우석', 2, '양방 대표 원장', '통합면역 부인과', '#부담없는, #배려깊은, #상담이편한, #공감있는, #질문환영', '<div><span style=\"white-space-collapse: preserve;\"><br></span></div>', '<div><span style=\"white-space-collapse: preserve;\"><br></span></div>', '', 1, '', '6892fd1ba21cc4.40720269.png', '6892fd1ba5bae7.53569256.png', 2, 1, '2025-08-05 15:03:41', '2025-08-08 12:06:47', 2),
(6, '김지영', 2, '진료원장', '통합면역 한방내과', '#꼼꼼한, #친절한, #예리한, #이성적인, #정확한', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(前) 자생한방병원 수련의</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(現) 면력한방병원 대표원장</li></ul>', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">임상통합의학암학회(CSIO) 이사</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">GermanyBioMed-klinik(독일 비오메드클리닉)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">한국암재활병원 협회 회원</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">대한한의학회 회원</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">기능영양 한의학회</li></ul>', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">경희대학교 동서의학과 박사</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">경희대학교 생리학교실</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">동신대학교 한의학과 학사</li></ul>', 1, '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li></ul>', '6892fdf91ce3e5.73346725.png', '6892fdf91fa4d3.25657490.png', 4, 1, '2025-08-06 07:02:17', '2025-08-08 11:55:53', 2),
(7, '김은지', 2, '진료 원장', '통합면역 한방내과', '#꼼꼼한, #친절한, #예리한, #이성적인, #정확한', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(前) 자생한방병원 수련의</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(現) 면력한방병원 대표원장</li></ul>', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">임상통합의학암학회(CSIO) 이사</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">GermanyBioMed-klinik(독일 비오메드클리닉)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">한국암재활병원 협회 회원</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">대한한의학회 회원</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">기능영양 한의학회</li></ul>', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">경희대학교 동서의학과 박사</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">경희대학교 생리학교실</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">동신대학교 한의학과 학사</li></ul>', 1, '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li></ul>', '6892fe5f62f958.67802708.png', '6892fe5f6598a3.95093187.png', 5, 1, '2025-08-06 07:03:59', '2025-08-08 11:55:53', 2),
(8, '박형준', 2, '진료원장', '통증재활', '#꼼꼼한, #친절한, #예리한, #이성적인, #정확한', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(前) 자생한방병원 수련의</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(現) 면력한방병원 대표원장</li></ul>', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">임상통합의학암학회(CSIO) 이사</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">GermanyBioMed-klinik(독일 비오메드클리닉)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">한국암재활병원 협회 회원</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">대한한의학회 회원</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">기능영양 한의학회</li></ul>', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">경희대학교 동서의학과 박사</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">경희대학교 생리학교실</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">동신대학교 한의학과 학사</li></ul>', 1, '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li></ul>', '6892fea2b04e95.62809690.png', '6892fea2b350f3.93779917.png', 6, 1, '2025-08-06 07:05:06', '2025-08-08 11:55:53', 2),
(9, '손동준', 2, '진료원장', '통증재활', '#꼼꼼한, #친절한, #예리한, #이성적인, #정확한', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(前) 자생한방병원 수련의</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(現) 면력한방병원 대표원장</li></ul>', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">임상통합의학암학회(CSIO) 이사</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">GermanyBioMed-klinik(독일 비오메드클리닉)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">한국암재활병원 협회 회원</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">대한한의학회 회원</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">기능영양 한의학회</li></ul>', '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">경희대학교 동서의학과 박사</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">경희대학교 생리학교실</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">동신대학교 한의학과 학사</li></ul>', 1, '<ul class=\"dept2 no-mg-16--t\" style=\"margin-top: clamp(1.6rem, 1.6rem + 0vw, 1.6rem); margin-left: 1rem; padding-left: 0px; background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 18px; line-height: inherit; font-family: Pretendard; list-style: none; color: rgb(62, 63, 67);\"><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li><li style=\"background-position: center center; background-size: cover; background-repeat: no-repeat; word-break: keep-all; font-weight: 300; font-size: 1.8rem; line-height: inherit; display: flex; color: rgb(103, 104, 108);\">Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li></ul>', '6892fec7d65df8.94355807.png', '6892fec7d92782.49666715.png', 7, 1, '2025-08-06 07:05:43', '2025-08-08 11:55:53', 2),
(11, '임지성', 2, '의무원장', '통증재황 한방재활의학과', 'ex', '', '', '', 1, '', '', '', 3, 1, '2025-08-08 11:55:37', '2025-08-08 11:56:00', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_etcs`
--

CREATE TABLE `nb_etcs` (
  `id` int NOT NULL,
  `non_pay_last_modified` varchar(255) DEFAULT NULL,
  `banner_rolling_times` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `nb_etcs`
--

INSERT INTO `nb_etcs` (`id`, `non_pay_last_modified`, `banner_rolling_times`) VALUES
(1, '2025.01.01', 6);

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_facilities`
--

CREATE TABLE `nb_facilities` (
  `id` int NOT NULL COMMENT '시설 고유 ID',
  `title` varchar(255) NOT NULL COMMENT '시설명',
  `branch_id` int NOT NULL COMMENT '지점 ID (nb_branches 외래키)',
  `categories` int NOT NULL COMMENT '카테고리 ID (전역 설정으로 관리)',
  `thumb_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '썸네일 이미지 URL (누끼)',
  `is_active` tinyint(1) DEFAULT '1' COMMENT '노출 여부 (1:노출, 0:숨김)',
  `sort_no` int NOT NULL DEFAULT '0' COMMENT '정렬 순서 (낮을수록 위)',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '생성일시',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '수정일시'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='시설 관리 테이블';

--
-- 테이블의 덤프 데이터 `nb_facilities`
--

INSERT INTO `nb_facilities` (`id`, `title`, `branch_id`, `categories`, `thumb_image`, `is_active`, `sort_no`, `created_at`, `updated_at`) VALUES
(2, 'VIP 입원실 1', 2, 1, '6893056ea2bb36.70016166.jpg', 1, 1, '2025-08-05 14:32:40', '2025-08-06 07:34:06'),
(3, 'VIP 입원실 2', 2, 1, '6893057b7b98d6.71760217.jpg', 1, 9, '2025-08-05 15:07:29', '2025-08-07 07:51:32'),
(4, 'VIP 입원실 3', 2, 1, '6893058dc33682.29745764.jpg', 1, 5, '2025-08-06 07:34:37', '2025-08-07 07:51:12'),
(5, 'VIP 입원실 4', 2, 1, '689305994ad381.58850939.jpg', 1, 12, '2025-08-06 07:34:49', '2025-08-07 07:50:49'),
(6, '다인입원실 1', 2, 2, '689312ea0aa933.01936177.jpg', 1, 2, '2025-08-06 08:31:38', '2025-08-07 07:51:42'),
(7, '다인입원실 2', 2, 2, '689312f5b3d1e7.86506003.jpg', 1, 8, '2025-08-06 08:31:49', '2025-08-07 07:51:27'),
(8, '다인입원실 3', 2, 2, '68931300ae75a0.30476630.jpg', 1, 11, '2025-08-06 08:32:00', '2025-08-07 07:51:03'),
(9, '치료공간 1', 2, 3, '6895d4fa2ed0b9.39462196.jpg', 1, 3, '2025-08-06 08:33:13', '2025-08-08 10:44:10'),
(10, '치료공간 2', 2, 3, '6895d5060a54a4.33929598.jpg', 1, 7, '2025-08-06 08:33:40', '2025-08-08 10:44:22'),
(11, '치료공간 3', 2, 3, '6895d50fd16de4.42589908.jpg', 1, 10, '2025-08-06 08:33:57', '2025-08-08 10:44:31'),
(12, '치료공간 4', 2, 3, '6895d519331118.44767347.jpg', 1, 13, '2025-08-06 08:34:21', '2025-08-08 10:44:41'),
(13, '힐링 공간', 2, 4, '6895e97c9bb5b9.72629469.jpg', 1, 4, '2025-08-06 08:37:53', '2025-08-08 12:11:40'),
(14, '힐링 공간 2', 2, 4, '6895e984e72530.73501440.jpg', 1, 6, '2025-08-06 08:38:10', '2025-08-08 12:11:48'),
(15, '힐링 공간 3', 2, 4, '6895e9a27163b3.11074499.jpg', 1, 16, '2025-08-06 08:39:33', '2025-08-08 12:12:18'),
(16, '힐리 공간 4', 2, 4, '6895e98da907d6.04767846.jpg', 1, 14, '2025-08-06 08:39:49', '2025-08-08 12:11:57'),
(17, '힐링 공간 5', 2, 4, '6895e996409ee8.20820981.jpg', 1, 15, '2025-08-06 08:40:02', '2025-08-08 12:12:06'),
(20, '시설6', 2, 4, '6895e9b29ffcf8.94827434.jpg', 1, 17, '2025-08-08 12:12:34', '2025-08-08 12:12:34');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_faqs`
--

CREATE TABLE `nb_faqs` (
  `id` int UNSIGNED NOT NULL,
  `branch_id` int NOT NULL COMMENT '지점 ID (외래키)',
  `categories` int NOT NULL COMMENT 'FAQ 카테고리 코드 (var.php에 매핑)',
  `question` text NOT NULL COMMENT '질문',
  `answer` text NOT NULL COMMENT '답변',
  `sort_no` int NOT NULL DEFAULT '0' COMMENT '정렬 순서 (낮을수록 위)',
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: 활성화, 2: 비활성화',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '수정일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='지점별 FAQ';

--
-- 테이블의 덤프 데이터 `nb_faqs`
--

INSERT INTO `nb_faqs` (`id`, `branch_id`, `categories`, `question`, `answer`, `sort_no`, `is_active`, `created_at`, `updated_at`) VALUES
(13, 2, 1, '첫번째', 'ㅁㄴㅇ', 2, 1, '2025-08-07 07:41:18', '2025-08-07 07:41:51'),
(14, 2, 2, '두번째놈', 'ㄴㅇㅇ', 3, 1, '2025-08-07 07:41:27', '2025-08-07 07:41:51'),
(15, 2, 2, '세번째놈', 'ㅁㅇㄴㅁㄴㅇ', 1, 1, '2025-08-07 07:41:46', '2025-08-07 07:41:51');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_herb_inquiries`
--

CREATE TABLE `nb_herb_inquiries` (
  `id` int NOT NULL COMMENT '기본 PK',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '성명',
  `birth` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '생년월일 (YYMMDD)',
  `gender` tinyint NOT NULL COMMENT '성별 (0=여성, 1=남성)',
  `height` int NOT NULL COMMENT '키 (cm)',
  `weight` int NOT NULL COMMENT '몸무게 (kg)',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '연락처',
  `consult_time` tinyint NOT NULL COMMENT '상담 가능 시간 (1=10~12시, 2=12~14시 등)',
  `first_visit` tinyint NOT NULL COMMENT '첫 방문 여부 (1=첫 방문, 0=재방문)',
  `branch_id` int DEFAULT NULL COMMENT '지점 ID (nb_branches.id 참조)',
  `treatment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '치료 이력 / 복용 약물',
  `symptoms` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '현재 증상',
  `drink` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '음주 습관',
  `feces_time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '대변 주기',
  `urine_time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '소변 주기',
  `appetite` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '식욕 관련 선택사항 (checkbox)',
  `digestion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '소화 관련 선택사항 (checkbox)',
  `feces` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '대변 관련 선택사항 (checkbox)',
  `urine` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '소변 관련 선택사항 (checkbox)',
  `sleep` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '수면 관련 선택사항 (checkbox)',
  `indigest` tinyint DEFAULT NULL COMMENT '소화불량 주기 (1=항상, 2=가끔)',
  `belly_pain` tinyint DEFAULT NULL COMMENT '복통 시기 (1=공복, 2=식후, 3=스트레스)',
  `reason` tinyint DEFAULT NULL COMMENT '속쓰림 이유 (1=공복, 2=매운 것)',
  `inquiry_type` tinyint NOT NULL COMMENT '상담 종류 (1=공진단, 2=경옥고, 3=관절고)',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '등록 일시'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `nb_herb_inquiries`
--

INSERT INTO `nb_herb_inquiries` (`id`, `name`, `birth`, `gender`, `height`, `weight`, `phone`, `consult_time`, `first_visit`, `branch_id`, `treatment`, `symptoms`, `drink`, `feces_time`, `urine_time`, `appetite`, `digestion`, `feces`, `urine`, `sleep`, `indigest`, `belly_pain`, `reason`, `inquiry_type`, `created_at`) VALUES
(1, 'ㅁㄴㅇㅇㅁㄴ', '19971229', 2, 141, 22, '01022223333', 4, 0, 2, 'ㅁㄴㅇㅁㄴㅇㅁㄴㅇ', 'ㅁㄴㅇㄴㅇㅁㄴㅇㅁ', 'ㅁㄴㅇㅁㄴㅇ', 'ㄴㄴㅇㅁ', 'ㄴㅁㅇㅇㅁㄴ', '입맛이 없다,최근 살이 찌고 있다,최근 살이 빠지고 있다', '소화가 잘 된다', '대변을 보고 난 후 시원하지 않다,물 같은 설사가 잦다', '소변을 시원하게 본다,소변을 보고 난 후 시원하지 않다', '잠을 잘 잔다,잠이 잘 들지 않는다', 2, 3, 2, 0, '2025-08-05 03:34:33'),
(2, '홍길동', '199712', 1, 175, 122, '01022222222', 4, 1, NULL, 'ㅇㅁㄴㅁㄴㅇ', 'ㅁㄴㅇㅁㄴㅇ', 'ㅁㄴㅇㅁㄴㅇ', '1일에 대변을 1번 본다', '1일에 소변을 1번 본다', '골고루 잘 먹는 편이다,입맛이 없다,최근 살이 찌고 있다,최근 살이 빠지고 있다', '소화가 잘 된다,잘 체하는 편이다', '대변을 보고 난 후 시원하다', '소변을 시원하게 본다,소변을 보고 난 후 시원하지 않다', '잠을 잘 잔다,잠이 잘 들지 않는다', 1, 2, 2, 1, '2025-08-05 03:40:31');

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
-- 테이블 구조 `nb_nonpay_items`
--

CREATE TABLE `nb_nonpay_items` (
  `id` int UNSIGNED NOT NULL,
  `category_primary` varchar(50) NOT NULL COMMENT '1차 카테고리',
  `category_secondary` varchar(50) NOT NULL COMMENT '2차 카테고리',
  `title` varchar(255) NOT NULL COMMENT '항목명',
  `cost` int UNSIGNED DEFAULT '0' COMMENT '비용 (원)',
  `notice` text COMMENT '비고',
  `sort_no` int DEFAULT '0' COMMENT '정렬 순서',
  `is_active` tinyint(1) DEFAULT '1' COMMENT '노출 여부 (1:노출, 0:숨김)',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '최종 수정일',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='비급여 항목 관리';

--
-- 테이블의 덤프 데이터 `nb_nonpay_items`
--

INSERT INTO `nb_nonpay_items` (`id`, `category_primary`, `category_secondary`, `title`, `cost`, `notice`, `sort_no`, `is_active`, `updated_at`, `created_at`) VALUES
(1, '1', '1', 'NK활성도검사', 100000, NULL, 1, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(2, '1', '1', '모발미네랄검사', 150000, NULL, 2, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(3, '1', '1', '향산화 향노화 검사', 100000, NULL, 3, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(4, '1', '1', '소변 유기산 검사', 270000, NULL, 4, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(5, '1', '1', '남성암11종', 150000, NULL, 5, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(6, '1', '1', '여성암12종', 150000, NULL, 6, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(7, '1', '1', '남성종합26종', 220000, NULL, 7, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(8, '1', '1', '여성종합27종', 200000, NULL, 8, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(9, '1', '2', '도수치료30분', 90000, NULL, 9, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(10, '1', '2', '도수치료40분', 120000, NULL, 10, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(11, '1', '2', '도수치료50분', 180000, NULL, 11, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(12, '1', '2', '도수치료60분', 230000, NULL, 12, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(13, '1', '2', '도수치료70분', 280000, NULL, 13, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(14, '1', '2', '페인스크램블러', 200000, NULL, 14, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(15, '1', '2', '페인스크램블러', 300000, NULL, 15, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(16, '1', '3', '체외충격파5분', 50000, NULL, 16, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(17, '1', '3', '체외충격파10분', 100000, NULL, 17, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(18, '1', '3', 'CRYO(냉각치료) 3분', 30000, NULL, 18, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(19, '1', '4', '고주파 온열치료', 250000, NULL, 19, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(20, '1', '5', '약침(황련해동,봉침)', 10000, NULL, 20, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(21, '1', '5', '약침(근이완약침,자하거)', 20000, NULL, 21, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(22, '1', '5', '약침(행인)', 30000, NULL, 22, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(23, '1', '5', '약침(산삼경혈약침)', 50000, NULL, 23, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(24, '1', '5', 'ICT', 5000, NULL, 24, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(25, '1', '6', '상급병실(최저)', 200000, NULL, 25, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(26, '1', '6', '상급병실(최고)', 600000, NULL, 26, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(27, '2', '1', '디펩디벤', 90000, NULL, 27, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(28, '2', '1', '닥터라민250ml', 40000, NULL, 28, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(29, '2', '1', '뉴트리헥스100ml', 30000, NULL, 29, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(30, '2', '1', '메리트디주', 60000, NULL, 30, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(31, '2', '1', '콤비플렉스페리주', 150000, NULL, 31, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(32, '2', '1', '라이넥주', 30000, NULL, 32, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(33, '2', '1', '지씨아르기닌주', 90000, NULL, 33, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(34, '2', '1', '안티옥시주', 30000, NULL, 34, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(35, '2', '1', '셀레늄주', 30000, NULL, 35, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(36, '2', '1', '멀티주', 80000, NULL, 36, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(37, '2', '1', '독감백신4가', 30000, NULL, 37, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(38, '2', '1', '이스카도M주', 40000, NULL, 38, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(39, '2', '1', '이스카도Q주', 40000, NULL, 39, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(40, '2', '1', '압노바A주', 40000, NULL, 40, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(41, '2', '1', '압노바주', 40000, NULL, 41, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(42, '2', '1', 'vitB1', 60000, NULL, 42, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(43, '2', '1', 'vitB6', 60000, NULL, 43, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(44, '2', '1', 'vitB12', 60000, NULL, 44, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(45, '2', '1', '메리트씨주', 15000, NULL, 45, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(46, '2', '1', '마시주', 15000, NULL, 46, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(47, '2', '1', '글루타치온', 60000, NULL, 47, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(48, '2', '1', '진코발주', 30000, NULL, 48, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(49, '2', '1', '엘카르주', 30000, NULL, 49, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(50, '2', '1', '리릭스주', 100000, NULL, 50, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(51, '2', '1', '셀레늄500', 60000, NULL, 51, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(52, '2', '1', '프리베나13', 90000, NULL, 52, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(53, '2', '1', '스카이조스타', 130000, NULL, 53, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(54, '2', '1', '조스타박스', 130000, NULL, 54, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(55, '2', '1', '싱그릭스주 1회', 250000, NULL, 55, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(56, '2', '1', '가다실 1회', 190000, NULL, 56, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(57, '2', '2', '세파셀렌정', 5000, NULL, 57, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(58, '2', '2', '세파셀렌정 1box', 100000, NULL, 58, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(59, '2', '2', '셀레나제퍼오랄', 5000, NULL, 59, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(60, '2', '2', '젬비오캡슐', 800, NULL, 60, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(61, '2', '2', '젬비오캡슐 1box', 72000, NULL, 61, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(62, '2', '2', '이스미젠 1box(30T)', 450000, NULL, 62, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(63, '2', '3', '관절고', 5000, NULL, 63, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(64, '2', '3', '관절고30환 1box', 150000, NULL, 64, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(65, '2', '3', '녹용공진단10환', 150000, NULL, 65, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(66, '2', '3', '원방공진단10환', 550000, NULL, 66, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(67, '2', '3', '경옥고(스틱)', 150000, NULL, 67, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(68, '2', '3', '사삼청폐음(스틱)', 150000, NULL, 68, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(69, '2', '3', '담적환', 18000, NULL, 69, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(70, '2', '3', '소적건비환', 3500, NULL, 70, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(71, '2', '3', '윤장환', 3500, NULL, 71, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(72, '2', '3', '천왕보심단', 3500, NULL, 72, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(73, '2', '3', '소경활혈환', 3500, NULL, 73, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(74, '2', '3', '팔미원', 3500, NULL, 74, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(75, '2', '3', '자운고', 20000, NULL, 75, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(76, '2', '3', '한방파스(6p)', 5000, NULL, 76, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(77, '2', '3', '쌍패탕', 10000, NULL, 77, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(78, '2', '3', '평진건비탕', 10000, NULL, 78, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(79, '2', '3', '계강조초황신부탕', 10000, NULL, 79, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(80, '2', '3', '가미위령탕', 10000, NULL, 80, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(81, '2', '3', '작약감초탕', 10000, NULL, 81, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(82, '2', '3', '쌍화산조인탕', 10000, NULL, 82, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(83, '2', '3', '당귀수산', 10000, NULL, 83, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(84, '2', '3', '항암단', 60000, NULL, 84, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(85, '2', '3', '유암단', 40000, NULL, 85, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(86, '2', '3', '항암플러스', 8000, NULL, 86, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(87, '2', '3', '면역플러스', 8000, NULL, 87, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39'),
(88, '2', '3', '청간플러스', 4000, NULL, 88, 1, '2025-08-08 04:07:39', '2025-08-08 04:07:39');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_popup`
--

CREATE TABLE `nb_popup` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `p_title` varchar(50) NOT NULL COMMENT '팝업 제목',
  `p_img` varchar(128) NOT NULL COMMENT '팝업 이미지',
  `p_target` enum('_none','_self','_blank') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '_self' COMMENT '링크 오픈 형식',
  `p_link` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '팝업 링크',
  `p_view` enum('Y','N') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Y' COMMENT '노출 여부',
  `p_left` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '노출위치(px) 왼쪽으로부터',
  `p_top` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '노출위치(px) 위쪽으로부터',
  `p_idx` int DEFAULT '0' COMMENT '순서',
  `p_sdate` date DEFAULT NULL COMMENT '시작일 - 00 시부터 시작',
  `p_edate` date DEFAULT NULL COMMENT '종료일 - 23시 59분 59초까지',
  `p_rdate` datetime NOT NULL COMMENT '등록일',
  `p_none_limit` enum('N','Y') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'N' COMMENT '기한설정 Y:무기한 N:기한설',
  `p_loc` enum('P','M') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'P' COMMENT '노출위치 P : PC M : 모받',
  `p_is_link` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '링크 여부'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `nb_popup`
--

INSERT INTO `nb_popup` (`no`, `sitekey`, `p_title`, `p_img`, `p_target`, `p_link`, `p_view`, `p_left`, `p_top`, `p_idx`, `p_sdate`, `p_edate`, `p_rdate`, `p_none_limit`, `p_loc`, `p_is_link`) VALUES
(8, 'IMMUNE', '1', '687f2e060d4692.25750740.jpg', '_self', '', 'Y', NULL, NULL, 1, NULL, NULL, '2025-07-22 15:21:58', 'Y', 'P', 'N'),
(9, 'IMMUNE', '2', '687f3232a1cee2.36188412.jpg', '_self', '', 'Y', NULL, NULL, 2, NULL, NULL, '2025-07-22 15:39:46', 'Y', 'P', 'N');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_popups`
--

CREATE TABLE `nb_popups` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '관리용 제목',
  `popup_type` int NOT NULL COMMENT '전역 변수 banner_types의 키 (int)',
  `is_active` int DEFAULT '1' COMMENT '전역 변수 $is_active의 값 (0=숨김, 1=노출)',
  `start_at` varchar(20) DEFAULT NULL,
  `end_at` varchar(20) DEFAULT NULL,
  `description` text COMMENT '설명글',
  `has_link` int DEFAULT '2' COMMENT '전역 변수 $has_link의 값 (1=링크, 2=비링크)',
  `link_url` varchar(1024) DEFAULT NULL COMMENT '링크 URL',
  `popup_image` varchar(1024) DEFAULT NULL COMMENT '배너 이미지 경로',
  `branch_id` int DEFAULT NULL COMMENT 'nb_branches.id 참조, NULL이면 공통 배너',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sort_no` int NOT NULL DEFAULT '0' COMMENT '정렬 순서',
  `is_unlimited` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = 무기한 노출, 0 = 노출 기간 사용',
  `is_target` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=현재창(_self), 1=새창(_blank)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `nb_popups`
--

INSERT INTO `nb_popups` (`id`, `title`, `popup_type`, `is_active`, `start_at`, `end_at`, `description`, `has_link`, `link_url`, `popup_image`, `branch_id`, `created_at`, `updated_at`, `sort_no`, `is_unlimited`, `is_target`) VALUES
(5, 'ㄴㅇㅁ', 1, 1, '', '', 'ㅁㄴㅇ', 1, 'http://naver.com', '6895ea2e5c2ea7.93642518.jpg', 2, '2025-08-06 16:34:58', '2025-08-08 12:14:38', 1, 1, 0),
(6, 'asd', 1, 1, '', '', 'das', 1, 'http://naver.com', '6895ea333f3e50.75079924.jpg', 2, '2025-08-06 16:35:11', '2025-08-08 12:14:43', 2, 1, 1);

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
-- 테이블 구조 `nb_roles`
--

CREATE TABLE `nb_roles` (
  `role_id` int NOT NULL,
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '沅뚰븳 ?대쫫 (?? superadmin, editor, viewer)',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '沅뚰븳 ?ㅻ챸'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `nb_roles`
--

INSERT INTO `nb_roles` (`role_id`, `role_name`, `description`) VALUES
(1, 'superadmin', '최고 관리자 - 모든 기능 사용 가능'),
(2, 'manager', '중간 관리자 - 일부 기능 제한'),
(3, 'external', '외부인 - 조회 전용');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_simple_inquiries`
--

CREATE TABLE `nb_simple_inquiries` (
  `id` int NOT NULL COMMENT '고유번호',
  `branch_id` int NOT NULL COMMENT '지점 ID (nb_branches.id)',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '이름',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '연락처',
  `consult_time` tinyint NOT NULL DEFAULT '1' COMMENT '상담 가능 시간 키 (1~9)',
  `hope_treatment` tinyint NOT NULL DEFAULT '1' COMMENT '희망 진료 항목 키 (1~5)',
  `inquiry_type` tinyint NOT NULL DEFAULT '1' COMMENT '문의 종류 키 (1: 공진단, 2: 경옥고, 3: 관절고)',
  `contents` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '문의 내용',
  `private_check` tinyint(1) NOT NULL DEFAULT '0' COMMENT '개인정보 수집 동의 (1:동의)',
  `marketing_check` tinyint(1) NOT NULL DEFAULT '0' COMMENT '마케팅 수신 동의 (1:동의, 선택)',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='간편 문의 접수';

--
-- 테이블의 덤프 데이터 `nb_simple_inquiries`
--

INSERT INTO `nb_simple_inquiries` (`id`, `branch_id`, `name`, `phone`, `consult_time`, `hope_treatment`, `inquiry_type`, `contents`, `private_check`, `marketing_check`, `created_at`) VALUES
(1, 4, '홍길동', '00000000000', 4, 4, 1, 'ㅁㄴㅇㅁㄴㅇㅁㄴㅇㅁㄴㅇ', 1, 1, '2025-08-05 01:56:01'),
(2, 3, 'sdaㄴㅁㅇ', 'ㄴㅇㅁㅇㄴ', 3, 3, 1, 'ㄴㅁㄴㅇ', 1, 1, '2025-08-05 01:57:21');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_siteinfo`
--

CREATE TABLE `nb_siteinfo` (
  `no` int NOT NULL,
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 유니크 키',
  `title` varchar(50) DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '대표 연락처',
  `hp` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '대표 휴대폰',
  `fax` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '대표 팩스',
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT '대표 이메일',
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

--
-- 테이블의 덤프 데이터 `nb_siteinfo`
--

INSERT INTO `nb_siteinfo` (`no`, `sitekey`, `title`, `phone`, `hp`, `fax`, `email`, `customercenter_able_time`, `company_able_time`, `google_map_key`, `logo_top`, `logo_footer`, `footer_name`, `footer_address`, `footer_phone`, `footer_hp`, `footer_fax`, `footer_email`, `footer_owner`, `footer_ssn`, `footer_policy_charger`, `meta_keywords`, `meta_description`, `meta_thumb`, `meta_favicon_ico`) VALUES
(4, 'IMMUNE', '면력한방병원', '', 'https://blog.naver.com/dreamoriental', '', 'http://pf.kakao.com/_xdexmXd/chat', 'https://www.instagram.com/immunehospital', '', '', '687df188b985d8.79816702.svg', '687df188b99d40.43641209.svg', '면력한방병원', '서울 강서구 마곡중앙6로 93 열린프라자 6층, 7층, 10층', '1588-2915', '', '', '', '황이준', '645-92-01641 ', '', '면력한방병원, 암 면역치료, 유방암 한방치료, 자궁암 한방치료, 난소암 치료, 통합면역치료, 암 재발 방지, 자연치유, 한방병원, 강서 한방병원, 항암치료 후 회복, 면역력 강화 치료', '면력한방병원은 암 환자의 면역력을 높이는 통합 한방 치료를 전문으로 합니다. 유방암, 자궁암, 난소암 등 여성암 환자에게 특화된 면역한약과 자연치유 기반의 치료 프로그램을 제공합니다.', '687df1b2e95748.25055776.png', '687df188b9af70.90215450.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_site_tags`
--

CREATE TABLE `nb_site_tags` (
  `id` int NOT NULL,
  `sitekey` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `tag_content` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 테이블의 덤프 데이터 `nb_site_tags`
--

INSERT INTO `nb_site_tags` (`id`, `sitekey`, `title`, `tag_content`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'IMMUNE', 'SDASDASDA', 'ASDSDA', 0, '2025-08-04 08:46:29', '2025-08-04 08:46:39');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_users`
--

CREATE TABLE `nb_users` (
  `id` int NOT NULL,
  `sitekey` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `kakao_id` bigint UNSIGNED DEFAULT NULL,
  `kakao_nickname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `kakao_profile_img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `regdate` timestamp NULL DEFAULT (now()),
  `birth` varchar(8) DEFAULT NULL COMMENT '생년월일 (예: 19900101)',
  `agree_receive_notice` tinyint(1) DEFAULT '0',
  `agree_privacy_policy` tinyint(1) NOT NULL,
  `agree_terms_of_service` tinyint(1) NOT NULL,
  `active_status` enum('N','Y') NOT NULL DEFAULT 'Y' COMMENT '활성화 상태'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `nb_users`
--

INSERT INTO `nb_users` (`id`, `sitekey`, `user_id`, `password`, `name`, `email`, `phone`, `kakao_id`, `kakao_nickname`, `kakao_profile_img`, `regdate`, `birth`, `agree_receive_notice`, `agree_privacy_policy`, `agree_terms_of_service`, `active_status`) VALUES
(25, 'IMMUNE', 'didtkdrb3', '$2y$10$A6aTOGJ.SyEn7.yGQsahYuVWFjsDPzqwDMZsyk8aNCT.5ylOUArKS', '양상규', 'didtkdrb3@naver.com', '01071226157', NULL, NULL, NULL, '2025-08-01 04:05:59', '19971229', 0, 1, 1, 'Y'),
(26, 'IMMUNE', 'kakao_4351014800', '', '양상규', '', '', 4351014800, '상규', 'http://k.kakaocdn.net/dn/UUaOV/btsOCDnCM7t/LZKKT6BfPpcgczbpTOclJk/img_640x640.jpg', '2025-08-01 04:21:55', '', 0, 0, 0, 'Y'),
(27, 'IMMUNE', 'topmaster', '$2y$10$wOfNvZQzGsrLdEpa0l/77Of7rD0UmIkBu63g/hYiFXrZjudKww.du', '홍길동', 'test@naver.com', '0102226666', NULL, NULL, NULL, '2025-08-01 04:24:26', '971229', 0, 1, 1, 'N'),
(28, 'IMMUNE', 'tmaster', '$2y$10$Z2H2wQCgXSwOtS7BcPcdKO6qsuPnPo.br8ouKJZgT6WqNN2/8RYGy', '홍길동', 'test@naver.com', '01011113333', NULL, NULL, NULL, '2025-08-01 04:25:55', '971129', 0, 1, 1, 'N'),
(29, 'IMMUNE', 'test', '$2y$10$dPTlKPFESHKw14z6NqNun./3c/dUbcwNcmZhPkNJGLDd.4CDWMF4C', '1234', 'test@test.com', '010-1234-56', NULL, NULL, NULL, '2025-08-08 04:09:09', '000804', 1, 1, 1, 'Y');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_user_search_history`
--

CREATE TABLE `nb_user_search_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `search_keyword` varchar(255) NOT NULL,
  `searched_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `nb_user_search_history`
--

INSERT INTO `nb_user_search_history` (`id`, `user_id`, `search_keyword`, `searched_at`) VALUES
(6, 25, '면력', '2025-08-07 09:50:05'),
(10, 29, '암', '2025-08-08 04:15:07');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `nb_admin`
--
ALTER TABLE `nb_admin`
  ADD PRIMARY KEY (`no`),
  ADD KEY `fk_nb_admin_role` (`role_id`);

--
-- 테이블의 인덱스 `nb_banner`
--
ALTER TABLE `nb_banner`
  ADD PRIMARY KEY (`no`),
  ADD KEY `b_loc` (`b_loc`);

--
-- 테이블의 인덱스 `nb_banners`
--
ALTER TABLE `nb_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nb_banners_branch` (`branch_id`);

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
-- 테이블의 인덱스 `nb_branches`
--
ALTER TABLE `nb_branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- 테이블의 인덱스 `nb_branch_seos`
--
ALTER TABLE `nb_branch_seos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_branch` (`branch_id`);

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
-- 테이블의 인덱스 `nb_custom_inquires`
--
ALTER TABLE `nb_custom_inquires`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `nb_data`
--
ALTER TABLE `nb_data`
  ADD PRIMARY KEY (`no`),
  ADD KEY `IDX_NB_DATA1` (`sitekey`,`target`);

--
-- 테이블의 인덱스 `nb_doctors`
--
ALTER TABLE `nb_doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doctor_branch` (`branch_id`);

--
-- 테이블의 인덱스 `nb_etcs`
--
ALTER TABLE `nb_etcs`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `nb_facilities`
--
ALTER TABLE `nb_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_facility_branch` (`branch_id`);

--
-- 테이블의 인덱스 `nb_faqs`
--
ALTER TABLE `nb_faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- 테이블의 인덱스 `nb_herb_inquiries`
--
ALTER TABLE `nb_herb_inquiries`
  ADD PRIMARY KEY (`id`);

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
-- 테이블의 인덱스 `nb_nonpay_items`
--
ALTER TABLE `nb_nonpay_items`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `nb_popup`
--
ALTER TABLE `nb_popup`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `nb_popups`
--
ALTER TABLE `nb_popups`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `nb_request`
--
ALTER TABLE `nb_request`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `nb_roles`
--
ALTER TABLE `nb_roles`
  ADD PRIMARY KEY (`role_id`) USING BTREE,
  ADD UNIQUE KEY `role_name` (`role_name`) USING BTREE;

--
-- 테이블의 인덱스 `nb_simple_inquiries`
--
ALTER TABLE `nb_simple_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_branch_id` (`branch_id`);

--
-- 테이블의 인덱스 `nb_siteinfo`
--
ALTER TABLE `nb_siteinfo`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `nb_site_tags`
--
ALTER TABLE `nb_site_tags`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `nb_users`
--
ALTER TABLE `nb_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  ADD UNIQUE KEY `uniq_kakao_id` (`kakao_id`);

--
-- 테이블의 인덱스 `nb_user_search_history`
--
ALTER TABLE `nb_user_search_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `nb_admin`
--
ALTER TABLE `nb_admin`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 테이블의 AUTO_INCREMENT `nb_banner`
--
ALTER TABLE `nb_banner`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `nb_banners`
--
ALTER TABLE `nb_banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 테이블의 AUTO_INCREMENT `nb_board`
--
ALTER TABLE `nb_board`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- 테이블의 AUTO_INCREMENT `nb_board_category`
--
ALTER TABLE `nb_board_category`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `nb_branches`
--
ALTER TABLE `nb_branches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `nb_branch_seos`
--
ALTER TABLE `nb_branch_seos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
-- 테이블의 AUTO_INCREMENT `nb_custom_inquires`
--
ALTER TABLE `nb_custom_inquires`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '기본 PK', AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `nb_data`
--
ALTER TABLE `nb_data`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `nb_doctors`
--
ALTER TABLE `nb_doctors`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=12;

--
-- 테이블의 AUTO_INCREMENT `nb_etcs`
--
ALTER TABLE `nb_etcs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `nb_facilities`
--
ALTER TABLE `nb_facilities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '시설 고유 ID', AUTO_INCREMENT=21;

--
-- 테이블의 AUTO_INCREMENT `nb_faqs`
--
ALTER TABLE `nb_faqs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 테이블의 AUTO_INCREMENT `nb_herb_inquiries`
--
ALTER TABLE `nb_herb_inquiries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '기본 PK', AUTO_INCREMENT=3;

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
-- 테이블의 AUTO_INCREMENT `nb_nonpay_items`
--
ALTER TABLE `nb_nonpay_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- 테이블의 AUTO_INCREMENT `nb_popup`
--
ALTER TABLE `nb_popup`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 테이블의 AUTO_INCREMENT `nb_popups`
--
ALTER TABLE `nb_popups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `nb_request`
--
ALTER TABLE `nb_request`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 테이블의 AUTO_INCREMENT `nb_roles`
--
ALTER TABLE `nb_roles`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `nb_simple_inquiries`
--
ALTER TABLE `nb_simple_inquiries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '고유번호', AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `nb_siteinfo`
--
ALTER TABLE `nb_siteinfo`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `nb_site_tags`
--
ALTER TABLE `nb_site_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `nb_users`
--
ALTER TABLE `nb_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 테이블의 AUTO_INCREMENT `nb_user_search_history`
--
ALTER TABLE `nb_user_search_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `nb_banners`
--
ALTER TABLE `nb_banners`
  ADD CONSTRAINT `fk_nb_banners_branch` FOREIGN KEY (`branch_id`) REFERENCES `nb_branches` (`id`) ON DELETE SET NULL;

--
-- 테이블의 제약사항 `nb_branch_seos`
--
ALTER TABLE `nb_branch_seos`
  ADD CONSTRAINT `fk_branch` FOREIGN KEY (`branch_id`) REFERENCES `nb_branches` (`id`) ON DELETE CASCADE;

--
-- 테이블의 제약사항 `nb_doctors`
--
ALTER TABLE `nb_doctors`
  ADD CONSTRAINT `fk_doctor_branch` FOREIGN KEY (`branch_id`) REFERENCES `nb_branches` (`id`) ON DELETE CASCADE;

--
-- 테이블의 제약사항 `nb_facilities`
--
ALTER TABLE `nb_facilities`
  ADD CONSTRAINT `fk_facility_branch` FOREIGN KEY (`branch_id`) REFERENCES `nb_branches` (`id`);

--
-- 테이블의 제약사항 `nb_faqs`
--
ALTER TABLE `nb_faqs`
  ADD CONSTRAINT `nb_faqs_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `nb_branches` (`id`) ON DELETE CASCADE;

--
-- 테이블의 제약사항 `nb_simple_inquiries`
--
ALTER TABLE `nb_simple_inquiries`
  ADD CONSTRAINT `fk_simple_inquiry_branch` FOREIGN KEY (`branch_id`) REFERENCES `nb_branches` (`id`) ON DELETE CASCADE;

--
-- 테이블의 제약사항 `nb_user_search_history`
--
ALTER TABLE `nb_user_search_history`
  ADD CONSTRAINT `nb_user_search_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `nb_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
