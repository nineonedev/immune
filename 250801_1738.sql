-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- 호스트: db:3306
-- 생성 시간: 25-08-01 08:38
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
(1, 'IMMUNE', 'tmaster', '$2y$10$StBbJnJ/3aSNyNk.u5KiBOm1xIcxqSouZj4mILZmtWEFeHdWDKNBa', '관리자', 'Y', 2, 'nineonelabs@co.kr', '010-1111-3333', '2025-07-31 08:23:14', '2025-08-01 00:44:59'),
(13, 'IMMUNE', 'didtkdrb3', '$2y$10$Zzx3b6uR.yqCLG/GR4K4wekvVwGlCiPe6S5mSqZmNJ1pfvAmnYzDO', '양상규', 'Y', 3, 'didtkdrb3@naver.com', '010-2244-1241', '2025-07-31 16:15:26', '2025-07-31 16:16:30'),
(15, 'IMMUNE', 'didtkdrb31', '$2y$10$2XJXE2Y0nW0BotJPNlM9muXKB/QUyf69De3mfs16KG5zsQhpfs5ri', '홍길동', 'N', 3, 'asdas@naver.com', '010-2222-1111', '2025-07-31 16:22:43', '2025-07-31 16:24:29');

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
(44, 'IMMUNE', 9, -1, 7, 0, '박형준', '&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-21 17:25:34', 1, '687e11923be027.34490091.png', 'N', 'N', 'N', NULL, '관리자', 'N', '687df981e3cd27.48300834.jpg', 'ceo-visual.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '진료원장', '통증재활', '#꼼꼼한 #친절한 #예리한 #이성적인 #정확한', '', '', '', '', '', '', '', '', '<li>(前) 자생한방병원 수련의</li>\r\n<li>(現) 면력한방병원 대표원장</li>', '<li>임상통합의학암학회(CSIO) 이사</li>\r\n<li>Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li>\r\n<li>GermanyBioMed-klinik(독일 비오메드클리닉)</li>\r\n<li>한국암재활병원 협회 회원</li>\r\n<li>대한한의학회 회원</li>\r\n<li>기능영양 한의학회</li>', '<li>경희대학교 동서의학과 박사</li>\r\n<li>경희대학교 생리학교실</li>\r\n<li>동신대학교 한의학과 학사</li>', '<li>(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li>\r\n<li>Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li>\r\n<li>(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li>\r\n<li>Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li>', 0),
(45, 'IMMUNE', 9, -1, 7, 0, '황이준', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 17:25:37', 18, '687e10b7c63ac.png', 'N', 'Y', 'N', NULL, '관리자', 'N', '687e10b7c67a2.jpg', 'ceo-visual.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '대표원장', '통합면역 대표원장', '#꼼꼼한 #친절한 #예리한 #이성적인 #정확한', '', '', '', '', '', '', '', '', '<li>(前) 자생한방병원 수련의</li>\r\n<li>(現) 면력한방병원 대표원장</li>', '<li>임상통합의학암학회(CSIO) 이사</li>\r\n<li>Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li>\r\n<li>GermanyBioMed-klinik(독일 비오메드클리닉)</li>\r\n<li>한국암재활병원 협회 회원</li>\r\n<li>대한한의학회 회원</li>\r\n<li>기능영양 한의학회</li>', '<li>경희대학교 동서의학과 박사</li>\r\n<li>경희대학교 생리학교실</li>\r\n<li>동신대학교 한의학과 학사</li>', '<li>(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li>\r\n<li>Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li>\r\n<li>(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li>\r\n<li>Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li>', 0),
(46, 'IMMUNE', 9, -1, 7, 0, '이우석', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 17:25:37', 4, '687e11351c474.png', 'N', 'N', 'N', NULL, '관리자', 'N', '687e11351c769.jpg', 'ceo-visual.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '양방대표원장 ', '통합면역 부인과', '#꼼꼼한 #친절한 #예리한 #이성적인 #정확한', '', '', '', '', '', '', '', '', '<li>(前) 자생한방병원 수련의</li>\r\n<li>(現) 면력한방병원 대표원장</li>', '<li>임상통합의학암학회(CSIO) 이사</li>\r\n<li>Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li>\r\n<li>GermanyBioMed-klinik(독일 비오메드클리닉)</li>\r\n<li>한국암재활병원 협회 회원</li>\r\n<li>대한한의학회 회원</li>\r\n<li>기능영양 한의학회</li>', '<li>경희대학교 동서의학과 박사</li>\r\n<li>경희대학교 생리학교실</li>\r\n<li>동신대학교 한의학과 학사</li>', '<li>(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li>\r\n<li>Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li>\r\n<li>(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li>\r\n<li>Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li>', 0),
(47, 'IMMUNE', 9, -1, 7, 0, '김지영', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 17:25:36', 3, '687e115a15b89.png', 'N', 'N', 'N', NULL, '관리자', 'N', '687e115a15ea3.jpg', 'ceo-visual.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '진료원장', '통합면역 한방내과', '#꼼꼼한 #친절한 #예리한 #이성적인 #정확한', '', '', '', '', '', '', '', '', '<li>(前) 자생한방병원 수련의</li>\r\n<li>(現) 면력한방병원 대표원장</li>', '<li>임상통합의학암학회(CSIO) 이사</li>\r\n<li>Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li>\r\n<li>GermanyBioMed-klinik(독일 비오메드클리닉)</li>\r\n<li>한국암재활병원 협회 회원</li>\r\n<li>대한한의학회 회원</li>\r\n<li>기능영양 한의학회</li>', '<li>경희대학교 동서의학과 박사</li>\r\n<li>경희대학교 생리학교실</li>\r\n<li>동신대학교 한의학과 학사</li>', '<li>(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li>\r\n<li>Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li>\r\n<li>(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li>\r\n<li>Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li>', 0),
(48, 'IMMUNE', 9, -1, 7, 0, '김은지', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 17:25:35', 0, '687e117cda60c.png', 'N', 'N', 'N', NULL, '관리자', 'N', '687e117cda8d1.jpg', 'ceo-visual.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '진료원장', '통합면역 한방내과', '#꼼꼼한 #친절한 #예리한 #이성적인 #정확한', '', '', '', '', '', '', '', '', '<li>(前) 자생한방병원 수련의</li>\r\n<li>(現) 면력한방병원 대표원장</li>', '<li>임상통합의학암학회(CSIO) 이사</li>\r\n<li>Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li>\r\n<li>GermanyBioMed-klinik(독일 비오메드클리닉)</li>\r\n<li>한국암재활병원 협회 회원</li>\r\n<li>대한한의학회 회원</li>\r\n<li>기능영양 한의학회</li>', '<li>경희대학교 동서의학과 박사</li>\r\n<li>경희대학교 생리학교실</li>\r\n<li>동신대학교 한의학과 학사</li>', '<li>(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li>\r\n<li>Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li>\r\n<li>(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li>\r\n<li>Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li>', 0),
(49, 'IMMUNE', 9, -1, 7, 0, '손동준', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 17:25:32', 0, '687e12f3490376.50894935.png', 'N', 'N', 'N', NULL, '관리자', 'N', '687e1193b8440.jpg', 'ceo-visual.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '진료원장', '통증재활', '#꼼꼼한 #친절한 #예리한 #이성적인 #정확한', '', '', '', '', '', '', '', '', '<li>(前) 자생한방병원 수련의</li>\r\n<li>(現) 면력한방병원 대표원장</li>', '<li>임상통합의학암학회(CSIO) 이사</li>\r\n<li>Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li>\r\n<li>GermanyBioMed-klinik(독일 비오메드클리닉)</li>\r\n<li>한국암재활병원 협회 회원</li>\r\n<li>대한한의학회 회원</li>\r\n<li>기능영양 한의학회</li>', '<li>경희대학교 동서의학과 박사</li>\r\n<li>경희대학교 생리학교실</li>\r\n<li>동신대학교 한의학과 학사</li>', '<li>(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li>\r\n<li>Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons</li>\r\n<li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651</li>\r\n<li>(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li>\r\n<li>Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors and GABA in the Spinal Cord in Mice</li>', 0),
(50, 'IMMUNE', 10, -1, 10, 0, 'VIP 4번째', '&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-21 19:16:33', 0, '687e13ba99a396.89544487.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(51, 'IMMUNE', 10, -1, 10, 0, 'VIP 1번째', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:16:36', 0, '687e13875f2a1.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(52, 'IMMUNE', 10, -1, 10, 0, 'VIP 2번째', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:16:35', 0, '687e13a09505f.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(53, 'IMMUNE', 10, -1, 10, 0, 'VIP 3번째', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:16:34', 0, '687e13afa3881.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(55, 'IMMUNE', 10, -1, 11, 0, '다인입원실 1번째', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:21:24', 0, '687e14a79a95b.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(56, 'IMMUNE', 10, -1, 11, 0, '다인입원실 2번째', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:21:23', 0, '687e14b6037c7.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(67, 'IMMUNE', 10, -1, 12, 0, '회복을 끌어 올리는 다양한 치료공간 4번째', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 19:29:05', 0, '687e190ae10e87.85392173.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(57, 'IMMUNE', 10, -1, 13, 0, '24시간/365일 힐링 할 수 있는 환경 3번째', '&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-21 19:22:58', 0, '687e1528696008.19120591.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(58, 'IMMUNE', 10, -1, 13, 0, '24시간/365일 힐링 할 수 있는 환경 1번째', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 19:23:00', 0, '687e1506526cf.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(63, 'IMMUNE', 10, -1, 12, 0, '회복을 끌어 올리는 다양한 치료공간 1번째', '&lt;div&gt;&lt;/div&gt;', '2025-07-21 19:29:08', 0, '687e1674bac5e1.28312812.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(59, 'IMMUNE', 10, -1, 13, 0, '24시간/365일 힐링 할 수 있는 환경 2번째', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 19:22:59', 0, '687e1517db26b.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(64, 'IMMUNE', 10, -1, 12, 0, '회복을 끌어 올리는 다양한 치료공간 2번째', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 19:29:07', 0, '687e16869499e8.02789652.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(60, 'IMMUNE', 10, -1, 13, 0, '24시간/365일 힐링 할 수 있는 환경 4번째', '&lt;div&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;&lt;/div&gt;', '2025-07-21 19:22:57', 0, '687e153e72e647.34743429.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(61, 'IMMUNE', 10, -1, 13, 0, '24시간/365일 힐링 할 수 있는 환경 5번째', '&lt;div&gt;&lt;div&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-21 19:22:56', 0, '687e154c9b3415.52999088.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(65, 'IMMUNE', 10, -1, 12, 0, '회복을 끌어 올리는 다양한 치료공간 3번째', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 19:29:06', 0, '687e169589f315.39727839.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(66, 'IMMUNE', 10, -1, 11, 0, '다인입원실 3번째', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:21:22', 0, '687e16b5b235c.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(70, 'IMMUNE', 11, -1, 15, 0, '30대 직장인의 얼굴 대상포진, 이렇게 달라졌어요!', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;여러분 안녕하세요! 면력한방병원입니다&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;오늘은 급작스러운 대상포진으로 큰 고통을 겪으셨던&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60대 이진옥님의 치유 이야기를 나눕니다.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;▶ 환자분의 고민&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;참기 힘든 날카로운 통증&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;대형병원에서도 초기 진단 놓쳐&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;독한 약으로도 차도가 없던 상황&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;진통제를 먹어도 몇 시간을 못 버티는 통증&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6개월은 걸린다&quot;는 절망적인 이야기&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;하지만!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;면력한방병원의 맞춤형 집중치료로&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;단 4일 만에 통증에서 해방되신&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;이진옥님의 감동적인 치유 과정을&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;생생한 후기로 만나보세요&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 19:59:23', 0, '687e1de547b707.89591157.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(94, 'IMMUNE', 11, -1, 15, 0, '30대 직장인의 얼굴 대상포진, 이렇게 달라졌어요!', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50668;&amp;#47084;&amp;#48516; &amp;#50504;&amp;#45397;&amp;#54616;&amp;#49464;&amp;#50836;! &amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51077;&amp;#45768;&amp;#45796;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50724;&amp;#45720;&amp;#51008; &amp;#44553;&amp;#51089;&amp;#49828;&amp;#47084;&amp;#50868; &amp;#45824;&amp;#49345;&amp;#54252;&amp;#51652;&amp;#51004;&amp;#47196; &amp;#53360; &amp;#44256;&amp;#53685;&amp;#51012; &amp;#44202;&amp;#51004;&amp;#49512;&amp;#45912;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60&amp;#45824; &amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#52824;&amp;#50976; &amp;#51060;&amp;#50556;&amp;#44592;&amp;#47484; &amp;#45208;&amp;#45589;&amp;#45768;&amp;#45796;.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#9654; &amp;#54872;&amp;#51088;&amp;#48516;&amp;#51032; &amp;#44256;&amp;#48124;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#52280;&amp;#44592; &amp;#55192;&amp;#46304; &amp;#45216;&amp;#52852;&amp;#47196;&amp;#50868; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45824;&amp;#54805;&amp;#48337;&amp;#50896;&amp;#50640;&amp;#49436;&amp;#46020; &amp;#52488;&amp;#44592; &amp;#51652;&amp;#45800; &amp;#45459;&amp;#52432;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#46021;&amp;#54620; &amp;#50557;&amp;#51004;&amp;#47196;&amp;#46020; &amp;#52264;&amp;#46020;&amp;#44032; &amp;#50630;&amp;#45912; &amp;#49345;&amp;#54889;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51652;&amp;#53685;&amp;#51228;&amp;#47484; &amp;#47673;&amp;#50612;&amp;#46020; &amp;#47751; &amp;#49884;&amp;#44036;&amp;#51012; &amp;#47803; &amp;#48260;&amp;#54000;&amp;#45716; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6&amp;#44060;&amp;#50900;&amp;#51008; &amp;#44152;&amp;#47536;&amp;#45796;&quot;&amp;#45716; &amp;#51208;&amp;#47581;&amp;#51201;&amp;#51064; &amp;#51060;&amp;#50556;&amp;#44592;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#54616;&amp;#51648;&amp;#47564;!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51032; &amp;#47582;&amp;#52644;&amp;#54805; &amp;#51665;&amp;#51473;&amp;#52824;&amp;#47308;&amp;#47196;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45800; 4&amp;#51068; &amp;#47564;&amp;#50640; &amp;#53685;&amp;#51613;&amp;#50640;&amp;#49436; &amp;#54644;&amp;#48169;&amp;#46104;&amp;#49888;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#44048;&amp;#46041;&amp;#51201;&amp;#51064; &amp;#52824;&amp;#50976; &amp;#44284;&amp;#51221;&amp;#51012;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#49373;&amp;#49373;&amp;#54620; &amp;#54980;&amp;#44592;&amp;#47196; &amp;#47564;&amp;#45208;&amp;#48372;&amp;#49464;&amp;#50836;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:59:23', 0, '687e23b44e32d.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(97, 'IMMUNE', 12, -1, 0, 0, '암환우를 위한 겨울 보양식 & 누룽지 백숙 매콤 오징어볶음', '&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;p&gt;면력한방병원 셰프가 정성껏 준비한 특별한 보양식을 소개합니다!&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;누룽지 백숙 &amp;amp; 매콤 오징어볶음&amp;nbsp;&lt;/p&gt;&lt;p&gt;-구수한 누룽지와 닭고기의 완벽한 조화&lt;/p&gt;&lt;p&gt;-영양가 높은 닭백숙으로 면역력 강화&lt;/p&gt;&lt;p&gt;-매콤한 오징어볶음으로 입맛 돋우기&lt;/p&gt;&lt;p&gt;-소화가 잘 되는 건강한 식재료 사용&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;면력한방병원 치료식 셰프의 특별 레시피&lt;/p&gt;&lt;p&gt;추운 겨울, 따뜻한 보양식으로 건강을 챙기세요!&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-21 20:38:53', 0, '687e26cd853fb9.30396853.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '[셰프특식]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(98, 'IMMUNE', 13, -1, 17, 0, '9월(추석) 진료 일정 안내', '&lt;div&gt;&lt;/div&gt;', '2025-07-22 08:58:11', 0, '687ed4138c13e8.86085174.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(99, 'IMMUNE', 13, -1, 17, 0, '10월 진료 일정 안내', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-22 08:58:10', 0, '687ed42caa8e57.01391508.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(100, 'IMMUNE', 13, -1, 17, 0, '12월 진료 일정 안내', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-22 08:58:09', 0, '687ed440656688.69697406.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(101, 'IMMUNE', 13, -1, 17, 0, '1월(설) 진료 일정 안내', '&lt;div&gt;&lt;div&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-22 08:58:12', 3, '687ed44e644355.11657728.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '687edb8959edf1.54801644.jpg', '356.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(102, 'IMMUNE', 13, -1, 18, 0, '암환우를 위한 달콤한 힐링 \'정성 가득 화과자 만들기\'', '&lt;div&gt;&lt;div&gt;&lt;p&gt;면력한방병원에서 준비한 특별한 원데이 클래스를 소개합니다!&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;크리스마스 모루인형 만들기&amp;nbsp;&lt;/p&gt;&lt;p&gt;- 손쉽게 따라 할 수 있는 공예활동&lt;/p&gt;&lt;p&gt;- 마음의 안정과 집중력 향상&lt;/p&gt;&lt;p&gt;- 즐거운 크리스마스 분위기 만들기&lt;/p&gt;&lt;p&gt;- 환우들과 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;전문 공예 강사와 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;면력한방병원은 환우 분들의 심신 치유를 응원합니다!&amp;nbsp;&lt;/p&gt;&lt;p&gt;소중한 추억을 만들며 일상의 즐거움을 되찾으세요.&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-22 09:33:53', 0, '687edc71ea08b0.05948707.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '687edc71ea3fa6.74429009.jpg', 'i67.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(103, 'IMMUNE', 13, -1, 18, 0, '암 환우와 함께하는 힐링 클래스: 나만의 클렌저주스 만들기', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;p&gt;면력한방병원에서 준비한 특별한 원데이 클래스를 소개합니다!&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;크리스마스 모루인형 만들기&amp;nbsp;&lt;/p&gt;&lt;p&gt;- 손쉽게 따라 할 수 있는 공예활동&lt;/p&gt;&lt;p&gt;- 마음의 안정과 집중력 향상&lt;/p&gt;&lt;p&gt;- 즐거운 크리스마스 분위기 만들기&lt;/p&gt;&lt;p&gt;- 환우들과 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;전문 공예 강사와 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;면력한방병원은 환우 분들의 심신 치유를 응원합니다!&amp;nbsp;&lt;/p&gt;&lt;p&gt;소중한 추억을 만들며 일상의 즐거움을 되찾으세요.&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-22 09:33:54', 0, '687edc9d321a14.01892662.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '687edc916fdb6.jpg', 'i67.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(104, 'IMMUNE', 13, -1, 18, 0, '환우 분들과 함께한 \'따뜻한 크리스마스 모루인형 만들기\'', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;p&gt;면력한방병원에서 준비한 특별한 원데이 클래스를 소개합니다!&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;크리스마스 모루인형 만들기&amp;nbsp;&lt;/p&gt;&lt;p&gt;- 손쉽게 따라 할 수 있는 공예활동&lt;/p&gt;&lt;p&gt;- 마음의 안정과 집중력 향상&lt;/p&gt;&lt;p&gt;- 즐거운 크리스마스 분위기 만들기&lt;/p&gt;&lt;p&gt;- 환우들과 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;전문 공예 강사와 함께하는 특별한 시간&lt;/p&gt;&lt;p&gt;면력한방병원은 환우 분들의 심신 치유를 응원합니다!&amp;nbsp;&lt;/p&gt;&lt;p&gt;소중한 추억을 만들며 일상의 즐거움을 되찾으세요.&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-22 09:33:55', 2, '687edcae3f8b94.15451415.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '687edc9ec1adf.jpg', 'i67.jpg', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(105, 'IMMUNE', 16, -1, 19, 0, '입원할 때 준비해야할 서류가 있나요?', '&lt;div&gt;&lt;/div&gt;', '2025-07-22 10:00:07', 0, '', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '네. 각 환자분께 꼭 필요한 의사, 한의사 선생님들 치료 서비스 제공을 위해 본원을 내원 시에는 아래 서류를 꼭 지참해 주시기 바랍니다.', '', '', '', 0),
(90, 'IMMUNE', 11, -1, 15, 0, '60대 대상포진 신경통, 이걸로 완치했어요!', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50668;&amp;#47084;&amp;#48516; &amp;#50504;&amp;#45397;&amp;#54616;&amp;#49464;&amp;#50836;! &amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51077;&amp;#45768;&amp;#45796;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50724;&amp;#45720;&amp;#51008; &amp;#44553;&amp;#51089;&amp;#49828;&amp;#47084;&amp;#50868; &amp;#45824;&amp;#49345;&amp;#54252;&amp;#51652;&amp;#51004;&amp;#47196; &amp;#53360; &amp;#44256;&amp;#53685;&amp;#51012; &amp;#44202;&amp;#51004;&amp;#49512;&amp;#45912;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60&amp;#45824; &amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#52824;&amp;#50976; &amp;#51060;&amp;#50556;&amp;#44592;&amp;#47484; &amp;#45208;&amp;#45589;&amp;#45768;&amp;#45796;.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#9654; &amp;#54872;&amp;#51088;&amp;#48516;&amp;#51032; &amp;#44256;&amp;#48124;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#52280;&amp;#44592; &amp;#55192;&amp;#46304; &amp;#45216;&amp;#52852;&amp;#47196;&amp;#50868; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45824;&amp;#54805;&amp;#48337;&amp;#50896;&amp;#50640;&amp;#49436;&amp;#46020; &amp;#52488;&amp;#44592; &amp;#51652;&amp;#45800; &amp;#45459;&amp;#52432;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#46021;&amp;#54620; &amp;#50557;&amp;#51004;&amp;#47196;&amp;#46020; &amp;#52264;&amp;#46020;&amp;#44032; &amp;#50630;&amp;#45912; &amp;#49345;&amp;#54889;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51652;&amp;#53685;&amp;#51228;&amp;#47484; &amp;#47673;&amp;#50612;&amp;#46020; &amp;#47751; &amp;#49884;&amp;#44036;&amp;#51012; &amp;#47803; &amp;#48260;&amp;#54000;&amp;#45716; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6&amp;#44060;&amp;#50900;&amp;#51008; &amp;#44152;&amp;#47536;&amp;#45796;&quot;&amp;#45716; &amp;#51208;&amp;#47581;&amp;#51201;&amp;#51064; &amp;#51060;&amp;#50556;&amp;#44592;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#54616;&amp;#51648;&amp;#47564;!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51032; &amp;#47582;&amp;#52644;&amp;#54805; &amp;#51665;&amp;#51473;&amp;#52824;&amp;#47308;&amp;#47196;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45800; 4&amp;#51068; &amp;#47564;&amp;#50640; &amp;#53685;&amp;#51613;&amp;#50640;&amp;#49436; &amp;#54644;&amp;#48169;&amp;#46104;&amp;#49888;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#44048;&amp;#46041;&amp;#51201;&amp;#51064; &amp;#52824;&amp;#50976; &amp;#44284;&amp;#51221;&amp;#51012;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#49373;&amp;#49373;&amp;#54620; &amp;#54980;&amp;#44592;&amp;#47196; &amp;#47564;&amp;#45208;&amp;#48372;&amp;#49464;&amp;#50836;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:59:24', 1, '687e23afb8f25.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(88, 'IMMUNE', 11, -1, 15, 0, '일상을 힘들게 하는 안면마비, 어떻게 완치되었을까요?', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50668;&amp;#47084;&amp;#48516; &amp;#50504;&amp;#45397;&amp;#54616;&amp;#49464;&amp;#50836;! &amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51077;&amp;#45768;&amp;#45796;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50724;&amp;#45720;&amp;#51008; &amp;#44553;&amp;#51089;&amp;#49828;&amp;#47084;&amp;#50868; &amp;#45824;&amp;#49345;&amp;#54252;&amp;#51652;&amp;#51004;&amp;#47196; &amp;#53360; &amp;#44256;&amp;#53685;&amp;#51012; &amp;#44202;&amp;#51004;&amp;#49512;&amp;#45912;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60&amp;#45824; &amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#52824;&amp;#50976; &amp;#51060;&amp;#50556;&amp;#44592;&amp;#47484; &amp;#45208;&amp;#45589;&amp;#45768;&amp;#45796;.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#9654; &amp;#54872;&amp;#51088;&amp;#48516;&amp;#51032; &amp;#44256;&amp;#48124;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#52280;&amp;#44592; &amp;#55192;&amp;#46304; &amp;#45216;&amp;#52852;&amp;#47196;&amp;#50868; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45824;&amp;#54805;&amp;#48337;&amp;#50896;&amp;#50640;&amp;#49436;&amp;#46020; &amp;#52488;&amp;#44592; &amp;#51652;&amp;#45800; &amp;#45459;&amp;#52432;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#46021;&amp;#54620; &amp;#50557;&amp;#51004;&amp;#47196;&amp;#46020; &amp;#52264;&amp;#46020;&amp;#44032; &amp;#50630;&amp;#45912; &amp;#49345;&amp;#54889;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51652;&amp;#53685;&amp;#51228;&amp;#47484; &amp;#47673;&amp;#50612;&amp;#46020; &amp;#47751; &amp;#49884;&amp;#44036;&amp;#51012; &amp;#47803; &amp;#48260;&amp;#54000;&amp;#45716; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6&amp;#44060;&amp;#50900;&amp;#51008; &amp;#44152;&amp;#47536;&amp;#45796;&quot;&amp;#45716; &amp;#51208;&amp;#47581;&amp;#51201;&amp;#51064; &amp;#51060;&amp;#50556;&amp;#44592;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#54616;&amp;#51648;&amp;#47564;!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51032; &amp;#47582;&amp;#52644;&amp;#54805; &amp;#51665;&amp;#51473;&amp;#52824;&amp;#47308;&amp;#47196;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45800; 4&amp;#51068; &amp;#47564;&amp;#50640; &amp;#53685;&amp;#51613;&amp;#50640;&amp;#49436; &amp;#54644;&amp;#48169;&amp;#46104;&amp;#49888;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#44048;&amp;#46041;&amp;#51201;&amp;#51064; &amp;#52824;&amp;#50976; &amp;#44284;&amp;#51221;&amp;#51012;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#49373;&amp;#49373;&amp;#54620; &amp;#54980;&amp;#44592;&amp;#47196; &amp;#47564;&amp;#45208;&amp;#48372;&amp;#49464;&amp;#50836;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:59:22', 0, '687e23adde584.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(85, 'IMMUNE', 11, -1, 15, 0, '30대 직장인의 얼굴 대상포진, 이렇게 달라졌어요!', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50668;&amp;#47084;&amp;#48516; &amp;#50504;&amp;#45397;&amp;#54616;&amp;#49464;&amp;#50836;! &amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51077;&amp;#45768;&amp;#45796;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50724;&amp;#45720;&amp;#51008; &amp;#44553;&amp;#51089;&amp;#49828;&amp;#47084;&amp;#50868; &amp;#45824;&amp;#49345;&amp;#54252;&amp;#51652;&amp;#51004;&amp;#47196; &amp;#53360; &amp;#44256;&amp;#53685;&amp;#51012; &amp;#44202;&amp;#51004;&amp;#49512;&amp;#45912;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60&amp;#45824; &amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#52824;&amp;#50976; &amp;#51060;&amp;#50556;&amp;#44592;&amp;#47484; &amp;#45208;&amp;#45589;&amp;#45768;&amp;#45796;.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#9654; &amp;#54872;&amp;#51088;&amp;#48516;&amp;#51032; &amp;#44256;&amp;#48124;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#52280;&amp;#44592; &amp;#55192;&amp;#46304; &amp;#45216;&amp;#52852;&amp;#47196;&amp;#50868; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45824;&amp;#54805;&amp;#48337;&amp;#50896;&amp;#50640;&amp;#49436;&amp;#46020; &amp;#52488;&amp;#44592; &amp;#51652;&amp;#45800; &amp;#45459;&amp;#52432;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#46021;&amp;#54620; &amp;#50557;&amp;#51004;&amp;#47196;&amp;#46020; &amp;#52264;&amp;#46020;&amp;#44032; &amp;#50630;&amp;#45912; &amp;#49345;&amp;#54889;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51652;&amp;#53685;&amp;#51228;&amp;#47484; &amp;#47673;&amp;#50612;&amp;#46020; &amp;#47751; &amp;#49884;&amp;#44036;&amp;#51012; &amp;#47803; &amp;#48260;&amp;#54000;&amp;#45716; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6&amp;#44060;&amp;#50900;&amp;#51008; &amp;#44152;&amp;#47536;&amp;#45796;&quot;&amp;#45716; &amp;#51208;&amp;#47581;&amp;#51201;&amp;#51064; &amp;#51060;&amp;#50556;&amp;#44592;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#54616;&amp;#51648;&amp;#47564;!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51032; &amp;#47582;&amp;#52644;&amp;#54805; &amp;#51665;&amp;#51473;&amp;#52824;&amp;#47308;&amp;#47196;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45800; 4&amp;#51068; &amp;#47564;&amp;#50640; &amp;#53685;&amp;#51613;&amp;#50640;&amp;#49436; &amp;#54644;&amp;#48169;&amp;#46104;&amp;#49888;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#44048;&amp;#46041;&amp;#51201;&amp;#51064; &amp;#52824;&amp;#50976; &amp;#44284;&amp;#51221;&amp;#51012;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#49373;&amp;#49373;&amp;#54620; &amp;#54980;&amp;#44592;&amp;#47196; &amp;#47564;&amp;#45208;&amp;#48372;&amp;#49464;&amp;#50836;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:59:23', 0, '687e23a8564d5.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(86, 'IMMUNE', 11, -1, 15, 0, '30대 직장인의 얼굴 대상포진, 이렇게 달라졌어요!', '&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;\n&lt;?xml encoding=&quot;utf-8&quot; ?&gt;&lt;html&gt;&lt;body&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50668;&amp;#47084;&amp;#48516; &amp;#50504;&amp;#45397;&amp;#54616;&amp;#49464;&amp;#50836;! &amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51077;&amp;#45768;&amp;#45796;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#50724;&amp;#45720;&amp;#51008; &amp;#44553;&amp;#51089;&amp;#49828;&amp;#47084;&amp;#50868; &amp;#45824;&amp;#49345;&amp;#54252;&amp;#51652;&amp;#51004;&amp;#47196; &amp;#53360; &amp;#44256;&amp;#53685;&amp;#51012; &amp;#44202;&amp;#51004;&amp;#49512;&amp;#45912;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60&amp;#45824; &amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#52824;&amp;#50976; &amp;#51060;&amp;#50556;&amp;#44592;&amp;#47484; &amp;#45208;&amp;#45589;&amp;#45768;&amp;#45796;.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#9654; &amp;#54872;&amp;#51088;&amp;#48516;&amp;#51032; &amp;#44256;&amp;#48124;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#52280;&amp;#44592; &amp;#55192;&amp;#46304; &amp;#45216;&amp;#52852;&amp;#47196;&amp;#50868; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45824;&amp;#54805;&amp;#48337;&amp;#50896;&amp;#50640;&amp;#49436;&amp;#46020; &amp;#52488;&amp;#44592; &amp;#51652;&amp;#45800; &amp;#45459;&amp;#52432;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#46021;&amp;#54620; &amp;#50557;&amp;#51004;&amp;#47196;&amp;#46020; &amp;#52264;&amp;#46020;&amp;#44032; &amp;#50630;&amp;#45912; &amp;#49345;&amp;#54889;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51652;&amp;#53685;&amp;#51228;&amp;#47484; &amp;#47673;&amp;#50612;&amp;#46020; &amp;#47751; &amp;#49884;&amp;#44036;&amp;#51012; &amp;#47803; &amp;#48260;&amp;#54000;&amp;#45716; &amp;#53685;&amp;#51613;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6&amp;#44060;&amp;#50900;&amp;#51008; &amp;#44152;&amp;#47536;&amp;#45796;&quot;&amp;#45716; &amp;#51208;&amp;#47581;&amp;#51201;&amp;#51064; &amp;#51060;&amp;#50556;&amp;#44592;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#54616;&amp;#51648;&amp;#47564;!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#47732;&amp;#47141;&amp;#54620;&amp;#48169;&amp;#48337;&amp;#50896;&amp;#51032; &amp;#47582;&amp;#52644;&amp;#54805; &amp;#51665;&amp;#51473;&amp;#52824;&amp;#47308;&amp;#47196;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#45800; 4&amp;#51068; &amp;#47564;&amp;#50640; &amp;#53685;&amp;#51613;&amp;#50640;&amp;#49436; &amp;#54644;&amp;#48169;&amp;#46104;&amp;#49888;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#51060;&amp;#51652;&amp;#50725;&amp;#45784;&amp;#51032; &amp;#44048;&amp;#46041;&amp;#51201;&amp;#51064; &amp;#52824;&amp;#50976; &amp;#44284;&amp;#51221;&amp;#51012;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&amp;#49373;&amp;#49373;&amp;#54620; &amp;#54980;&amp;#44592;&amp;#47196; &amp;#47564;&amp;#45208;&amp;#48372;&amp;#49464;&amp;#50836;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;\n', '2025-07-21 19:59:23', 0, '687e23aba255a.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);
INSERT INTO `nb_board` (`no`, `sitekey`, `board_no`, `user_no`, `category_no`, `comment_cnt`, `title`, `contents`, `regdate`, `read_cnt`, `thumb_image`, `is_admin_writed`, `is_notice`, `is_secret`, `secret_pwd`, `write_name`, `isFile`, `file_attach_1`, `file_attach_origin_1`, `file_attach_2`, `file_attach_origin_2`, `file_attach_3`, `file_attach_origin_3`, `file_attach_4`, `file_attach_origin_4`, `file_attach_5`, `file_attach_origin_5`, `is_admin_comment_yn`, `direct_url`, `filedown_pwd`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`, `extra11`, `extra12`, `extra13`, `extra14`, `extra15`, `sort_no`) VALUES
(84, 'IMMUNE', 11, -1, 15, 0, '일상을 힘들게 하는 안면마비, 어떻게 완치되었을까요?', '&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;\r\n&lt;!--?xml encoding=&quot;utf-8&quot; ?--&gt;&lt;div&gt;&lt;div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;여러분 안녕하세요! 면력한방병원입니다&amp;nbsp;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;오늘은 급작스러운 대상포진으로 큰 고통을 겪으셨던&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;60대 이진옥님의 치유 이야기를 나눕니다.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;▶ 환자분의 고민&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;참기 힘든 날카로운 통증&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;대형병원에서도 초기 진단 놓쳐&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;독한 약으로도 차도가 없던 상황&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;진통제를 먹어도 몇 시간을 못 버티는 통증&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&quot;6개월은 걸린다&quot;는 절망적인 이야기&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;하지만!&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;면력한방병원의 맞춤형 집중치료로&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;단 4일 만에 통증에서 해방되신&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;이진옥님의 감동적인 치유 과정을&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;white-space-collapse: preserve;&quot;&gt;생생한 후기로 만나보세요&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2025-07-21 20:59:22', 1, '687e1ec17f61f.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(95, 'IMMUNE', 12, -1, 0, 0, '풍미로 가득한 이탈리아 요리 봉골레 파스타와 목살스테이크', '&lt;div&gt;&lt;div&gt;&lt;p&gt;면력한방병원 셰프가 정성껏 준비한 특별한 보양식을 소개합니다!&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;누룽지 백숙 &amp;amp; 매콤 오징어볶음&amp;nbsp;&lt;/p&gt;&lt;p&gt;-구수한 누룽지와 닭고기의 완벽한 조화&lt;/p&gt;&lt;p&gt;-영양가 높은 닭백숙으로 면역력 강화&lt;/p&gt;&lt;p&gt;-매콤한 오징어볶음으로 입맛 돋우기&lt;/p&gt;&lt;p&gt;-소화가 잘 되는 건강한 식재료 사용&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;면력한방병원 치료식 셰프의 특별 레시피&lt;/p&gt;&lt;p&gt;추운 겨울, 따뜻한 보양식으로 건강을 챙기세요!&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;', '2025-07-21 20:37:30', 1, '687e267a22f447.20477501.jpg', 'N', 'N', 'N', NULL, '관리자', 'N', '', '', '', '', '', '', '', '', '', '', 'N', '', NULL, '[셰프특식]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
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
(10, 'IMMUNE', '시설안내', 'gal', '2025-07-21 19:15:01', '', NULL, 'Y', 'N', 0, 999, 0, 'N', 0, 'N', NULL, NULL, NULL, NULL, 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'init'),
(9, 'IMMUNE', '의료진안내', 'gal', '2025-07-18 18:05:51', NULL, NULL, 'Y', 'N', 0, 999, 0, 'N', 0, 'N', NULL, NULL, NULL, NULL, 'Y', '직책', '분야', '키워드', '', '', '', '', '', '', '', '', '경력', '활동', '학력', '저서 및 논문', 'Y', 'init'),
(11, 'IMMUNE', '치료후기', 'gal', '2025-07-21 19:52:16', '', NULL, 'Y', 'N', 0, 3, 0, 'N', 0, 'N', NULL, NULL, NULL, NULL, 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'init'),
(12, 'IMMUNE', '면역채널', 'gal', '2025-07-21 20:31:56', '', NULL, 'Y', 'N', 0, 3, 0, 'N', 0, 'N', NULL, NULL, NULL, NULL, 'N', '카테고리', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'init'),
(13, 'IMMUNE', '면력소식', 'gal', '2025-07-22 08:52:19', '', NULL, 'Y', 'N', 0, 4, 0, 'N', 0, 'N', NULL, NULL, NULL, NULL, 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'init'),
(14, 'IMMUNE', '비급여안내[행위료]', 'bbs', '2025-07-22 09:55:21', '', NULL, 'Y', 'N', 0, 9999, 0, 'N', 0, 'N', NULL, NULL, NULL, NULL, 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'init'),
(15, 'IMMUNE', '비급여안내[약제비]', 'bbs', '2025-07-22 09:56:21', '', NULL, 'Y', 'N', 0, 9999, 0, 'N', 0, 'N', NULL, NULL, NULL, NULL, 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Y', 'init'),
(16, 'IMMUNE', 'FAQ', 'gal', '2025-07-22 09:57:56', '', NULL, 'Y', 'N', 0, 5, 0, 'N', 0, 'N', NULL, NULL, NULL, NULL, 'Y', '', '', '', '', '', '', '', '', '', '', '', '답변', '', '', '', 'Y', 'init');

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
(4, 'IMMUNE', '면력한방병원', 'https://www.youtube.com/@immune-rj6mx/featured', '', '', '', '', '', '', '687df188b985d8.79816702.svg', '687df188b99d40.43641209.svg', '면력한방병원', '서울 강서구 마곡중앙6로 93 열린프라자 6층, 7층, 10층', '1588-2915', '', '', '', '황이준', '645-92-01641 ', '', '메타정보 키워드입니다.', '메타정보 설명입니다.', '687df1b2e95748.25055776.png', '687df188b9af70.90215450.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `nb_site_tags`
--

CREATE TABLE `nb_site_tags` (
  `id` int NOT NULL COMMENT '고유 ID',
  `sitekey` varchar(6) NOT NULL COMMENT '사이트 식별 키',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '태그 설명 또는 제목',
  `tag_content` text NOT NULL COMMENT '삽입할 외부 태그/스크립트',
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '사용 여부 (1: 사용, 0: 미사용)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='외부 스크립트 삽입 태그';

--
-- 테이블의 덤프 데이터 `nb_site_tags`
--

INSERT INTO `nb_site_tags` (`id`, `sitekey`, `title`, `tag_content`, `is_active`) VALUES
(4, 'IMMUNE', '구글 서치 어드바이저 태그', '<meta name=\"google-site-verification\" content=\"7D38nEvSN8uMQgHqx7DHTYCYOkpP7cJnlgCyZzXJOQs\" />', 1),
(8, 'IMMUNE', '네이버 서치 어드바이저 태그', '<meta name=\"naver-site-verification\" content=\"fac25e6b2f9b700c30a5236fee3cefb59ed9f6a6\" />', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `nb_users`
--

INSERT INTO `nb_users` (`id`, `sitekey`, `user_id`, `password`, `name`, `email`, `phone`, `kakao_id`, `kakao_nickname`, `kakao_profile_img`, `regdate`, `birth`, `agree_receive_notice`, `agree_privacy_policy`, `agree_terms_of_service`, `active_status`) VALUES
(28, 'IMMUNE', 'tmaster', '$2y$10$Z2H2wQCgXSwOtS7BcPcdKO6qsuPnPo.br8ouKJZgT6WqNN2/8RYGy', '홍길동', 'test@naver.com', '01011113333', NULL, NULL, NULL, '2025-08-01 04:25:55', '971129', 0, 1, 1, 'Y'),
(27, 'IMMUNE', 'topmaster', '$2y$10$wOfNvZQzGsrLdEpa0l/77Of7rD0UmIkBu63g/hYiFXrZjudKww.du', '홍길동', 'test@naver.com', '0102226666', NULL, NULL, NULL, '2025-08-01 04:24:26', '971229', 0, 1, 1, 'N'),
(25, 'IMMUNE', 'didtkdrb3', '$2y$10$A6aTOGJ.SyEn7.yGQsahYuVWFjsDPzqwDMZsyk8aNCT.5ylOUArKS', '양상규', 'didtkdrb3@naver.com', '01071226157', NULL, NULL, NULL, '2025-08-01 04:05:59', '19971229', 0, 1, 1, 'Y'),
(26, 'IMMUNE', 'kakao_4351014800', '', '양상규', '', '', 4351014800, '상규', 'http://k.kakaocdn.net/dn/UUaOV/btsOCDnCM7t/LZKKT6BfPpcgczbpTOclJk/img_640x640.jpg', '2025-08-01 04:21:55', '', 0, 0, 0, 'Y');

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
-- 테이블의 인덱스 `nb_roles`
--
ALTER TABLE `nb_roles`
  ADD PRIMARY KEY (`role_id`) USING BTREE,
  ADD UNIQUE KEY `role_name` (`role_name`) USING BTREE;

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
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `nb_admin`
--
ALTER TABLE `nb_admin`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 테이블의 AUTO_INCREMENT `nb_banner`
--
ALTER TABLE `nb_banner`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `nb_board`
--
ALTER TABLE `nb_board`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- 테이블의 AUTO_INCREMENT `nb_board_category`
--
ALTER TABLE `nb_board_category`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- 테이블의 AUTO_INCREMENT `nb_siteinfo`
--
ALTER TABLE `nb_siteinfo`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `nb_site_tags`
--
ALTER TABLE `nb_site_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '고유 ID', AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `nb_users`
--
ALTER TABLE `nb_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
