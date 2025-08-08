<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<!-- dev -->

<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<script src="<?= $ROOT ?>/resource/js/sub.js" <?= date('YmdHis') ?> defer></script>
<!-- css, js  -->

<!-- contents -->

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-board.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-documents">
                        <section class="no-documents-top no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-48--b">
                                    <h2 class="no-heading-sm">서류발급</h2>
                                </hgroup>

                                <ul class="simple-process bg no-pd-16 no-radius-sm fade-up">
                                    <li class="f-wrap no-gap-16">
                                        <figure>
                                            <img src="/resource/images/icon/list.svg">
                                        </figure>

                                        <div class="txt">
                                            <p class="no-body-xs fw600 blue">STEP 1</p>
                                            <h3 class="no-body-xl fw700">접수 데스크 방문</h3>
                                        </div>
                                    </li>
                                    <i class="fa-solid fa-angle-down i-24 wgray"></i>
                                    <li class="f-wrap no-gap-16">
                                        <figure>
                                            <img src="/resource/images/icon/id.svg">
                                        </figure>

                                        <div class="txt">
                                            <p class="no-body-xs fw600 blue">STEP 2</p>
                                            <h3 class="no-body-xl fw700">신분증 확인 및 구비서류 제출</h3>
                                        </div>
                                    </li>
                                    <i class="fa-solid fa-angle-down i-24 wgray"></i>
                                    <li class="f-wrap no-gap-16">
                                        <figure>
                                            <img src="/resource/images/icon/certificate.svg">
                                        </figure>

                                        <div class="txt">
                                            <p class="no-body-xs fw600 blue">STEP 3</p>
                                            <h3 class="no-body-xl fw700">수납 및 증명서 수령</h3>
                                        </div>
                                    </li>
                                </ul>

                                <ul class="documents-explan no-mg-48--t fade-up">
                                    <li>
                                        <h3 class="no-body-xl fw700 no-mg-16--b">증명발급안내</h3>
                                        <p class="no-body-lg fw300"><b>1.</b> 증명서를 발급 받으실 때는 수수료가 발생합니다.</p>
                                        <p class="no-body-lg fw300"><b>2.</b> 모든 서류 발급 시 의료법 제 20조 1항에 의거하여 환자, 배우자, 직계존비속 또는 배우자의 직계존속인 경우 구비서류 지참 후 발급이 가능합니다.</p>
                                        <p class="no-body-lg fw300"><b>3.</b> 신분증을 지참하지 않은 경우는 신분 확인이 되지 않으므로 환자정보보호를 위해 사본 발급이 불가능합니다.</p>
                                    </li>

                                    <li>
                                        <h3 class="no-body-xl fw700 no-mg-16--b">1. 진단서/소견서/진료의뢰서</h3>
                                        <p class="no-body-lg fw300">접수 데스크에 신청하시면 담당 의료진이 작성, 수납 후 데스크에서 발급 받으실 수 있습니다.</p>
                                    </li>

                                    <li>
                                        <h3 class="no-body-xl fw700 no-mg-16--b">2. 입원확인서 및 진료확인서</h3>
                                        <p class="no-body-lg fw300">접수 데스크에 신청하시면 담당 의료진이 작성, 수납 후 데스크에서 발급 받으실 수 있습니다.<br>
                                            입원환자: 입퇴원계 or 접수데스크<br>
                                            외래환자 : 접수데스크</p>
                                    </li>

                                    <li>
                                        <h3 class="no-body-xl fw700 no-mg-16--b">3. 의무기록사본 및 영상기록사본</h3>
                                        <p class="no-body-lg fw300">접수 데스크에 신청하시면 담당 의료진의 승인절차를 걸쳐 데스크에서 발급 받으실 수 있습니다.</p>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-documents-guide no-pd-48--y">
                            <div class="no-container-sm">
                                <ul class="guide-list">
                                    <li class="fade-up">
                                        <h3 class="--tac no-heading-sm">환자 본인일 경우</h3>

                                        <ul class="dept2 no-mg-32--t">
                                            <li class="top">
                                                <h4 class="no-body-lg fw600 blue">신청인</h4>
                                                <p class="no-body-lg fw300">환자 본인</p>
                                            </li>
                                            <li>
                                                <h4 class="no-body-lg fw600">구비서류</h4>
                                                <p class="no-body-lg fw300">본인 신분증 <b class="no-body-xs fw300">(주민등록증, 운전면허증, 여권 등)</b></p>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="--tac no-heading-sm">환자 동의를 받을 수 있는 경우</h3>

                                        <ul class="dept2 no-mg-32--t">
                                            <li class="top">
                                                <h4 class="no-body-lg fw600 blue">신청인</h4>
                                                <p class="no-body-lg fw300">환자가 지정하는 대리인</p>
                                            </li>
                                            <li class="v2">
                                                <h4 class="no-body-lg fw600">구비서류</h4>
                                                <div class="group no-mg-8--t">
                                                    <p class="no-body-lg fw300 bullet">신청자의 신분증 또는 신분증사본(주민등록증, 운전면허증, 여권 등)</p>
                                                    <p class="no-body-lg fw300 bullet">보건복지가족부에서 배포한 별지 9-2, 9-3의 환자가 자필로 서명한 동의서와 위임장<br> (단 환자가 만 14세 미만의 미성년자의 경우에는 환자의 부모가 작성하며, 가족관계증명서나 주민등록표등본을 첨부)</p>
                                                    <p class="no-body-lg fw300 bullet">환자본인의 신분증 사본</p>
                                                    <p class="no-body-lg fw300 bullet">환자가 만 17세 미만으로 주민등록증 발급 안 된 경우 제외</p>
                                                    <p class="no-body-lg fw300 bullet">환자가 만 14세 미만으로 동의서, 위임장을 부모가 작성했을 경우 부모의 신분증 사본 첨부</p>
                                                </div>
                                            </li>

                                            <!--  -->

                                            <li class="top">
                                                <h4 class="no-body-lg fw600 blue">신청인</h4>
                                                <p class="no-body-lg fw300">환자의 배우자 직계 존속/비속<br> 또는 배우자의 직계 존속</p>
                                            </li>
                                            <li class="v2">
                                                <h4 class="no-body-lg fw600">구비서류</h4>
                                                <div class="group no-mg-8--t">
                                                    <p class="no-body-lg fw300 bullet">신청자의 신분증 또는 신분증사본(주민등록증, 운전면허증, 여권 등)</p>
                                                    <p class="no-body-lg fw300 bullet">가족관계증명서, 주민등록표 등본 등 직계가족임을 확인 할 수 있는 서류</p>
                                                    <p class="no-body-lg fw300 bullet">보건복지가족부에서 배포한 별지 9-2의 환자가 자필로 서명한 동의서(단 만 14세 미만의 미성년자인 경우 제외)</p>
                                                    <p class="no-body-lg fw300 bullet">환자본인의 신분증 사본(단, 환자가 만 17세 미만으로 주민등록증 발급이 안 된 경우 제외)</p>
                                                </div>
                                                <div class="documents-download no-pd-16--b">
                                                    <p class="no-body-xs fw300 --tal no-mg-4--b">※ 형제자매, 사위, 며느리는 직계가족의 범위에 들어가지 않습니다.<br> 이점 유의하시기 바랍니다.</p>

                                                    <div class="download-list no-mg-24--t">
                                                        <p class="no-body-sm fw600">동의서 다운로드</p>
                                                        <ul class="no-mg-8--t">
                                                            <li>
                                                                <a href='/resource/file/동의서.hwp' download class="no-body-xs fw300">HWP</a>
                                                            </li>
                                                            <li>
                                                                <a href='/resource/file/동의서.docx' download class="no-body-xs fw300">DOC</a>
                                                            </li>
                                                            <li>
                                                                <a href='/resource/file/동의서.pdf' download class="no-body-xs fw300">PDF</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="download-list no-mg-16--t">
                                                        <p class="no-body-sm fw600">위임장 다운로드</p>
                                                        <ul class="no-mg-8--t">
                                                            <li>
                                                                <a href='/resource/file/위임장.hwp' download class="no-body-xs fw300">HWP</a>
                                                            </li>
                                                            <li>
                                                                <a href='/resource/file/위임장.docx' download class="no-body-xs fw300">DOC</a>
                                                            </li>
                                                            <li>
                                                                <a href='/resource/file/위임장.pdf' download class="no-body-xs fw300">PDF</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="--tac no-heading-sm">환자 동의를 받을 수 없는 경우</h3>

                                        <ul class="dept2 no-mg-32--t">
                                            <li class="top">
                                                <h4 class="no-body-lg fw600 blue">신청인</h4>
                                                <p class="no-body-lg fw300">환자가 사망한 경우<br> (직계가족만 가능)</p>
                                            </li>
                                            <li class="v2">
                                                <h4 class="no-body-lg fw600">구비서류</h4>
                                                <div class="group no-mg-8--t">
                                                    <p class="no-body-lg fw300 bullet">기록 열람이나 사본 발급을 요청하는 자의 신분증 사본(친족의 사본증)</p>
                                                    <p class="no-body-lg fw300 bullet">가족관계증명서, 주민등록표 등 친족관계를 확인할 수 있는 서류</p>
                                                    <p class="no-body-lg fw300 bullet">가족관계증명서, 제적등본, 사망진단서 등 사망사실을 확인할 수 있는 서류</p>
                                                    <p class="no-body-lg fw300 bullet">환자 친족과 대리인 간의 진료기록 사본발급 위임장(임의 대리인 신청 시)</p>
                                                    <p class="no-body-lg fw300 bullet">대리인(위임 받은자)의 신분증 사본</p>
                                                </div>
                                            </li>

                                            <!--  -->

                                            <li class="top">
                                                <h4 class="no-body-lg fw600 blue">신청인</h4>
                                                <p class="no-body-lg fw300">환자가 의식불명, 중증의 질환,<br>
                                                    부상으로 자필서명 할 수 없는 경우<br> (직계가족만 가능)</p>
                                            </li>
                                            <li class="v2">
                                                <h4 class="no-body-lg fw600">구비서류</h4>
                                                <div class="group no-mg-8--t">
                                                    <p class="no-body-lg fw300 bullet">기록 열람이나 사본 발급을 요청하는 자의 신분증 사본(친족의 사본증)</p>
                                                    <p class="no-body-lg fw300 bullet">가족관계증명서, 주민등록표 등본 등 친족관계를 확인할 수 있는 서류</p>
                                                    <p class="no-body-lg fw300 bullet">환자가 의식불명 또는 중증의 질환 · 부상으로 자필서명을 할 수 없음을 확인할 수 있는 진단서</p>
                                                    <p class="no-body-lg fw300 bullet">환자 친족과 대리인 간의 진료기록 사본발급 위임장(임의 대리인 신청 시)</p>
                                                    <p class="no-body-lg fw300 bullet">대리인(위임 받은자)의 신분증 사본</p>
                                                </div>
                                            </li>

                                            <!--  -->

                                            <li class="top">
                                                <h4 class="no-body-lg fw600 blue">신청인</h4>
                                                <p class="no-body-lg fw300">환자가 행방불명인 경우<br> (직계가족만 가능)</p>
                                            </li>
                                            <li class="v2">
                                                <h4 class="no-body-lg fw600">구비서류</h4>
                                                <div class="group no-mg-8--t">
                                                    <p class="no-body-lg fw300 bullet">기록열람이나 사본 발급을 요청하는 자의 신분증 사본(친족의 사본증)</p>
                                                    <p class="no-body-lg fw300 bullet">가족관계증명서, 주민등록표 등본 등 친족관계를 확인할 수 있는 서류</p>
                                                    <p class="no-body-lg fw300 bullet">주민등록표 등본, 법원의 실종선고 결정문 사본 등 행방불명 사실을 확인할 수 있는 서류</p>
                                                    <p class="no-body-lg fw300 bullet">환자 친족과 대리인 간의 진료기록 사본발급 위임장(임의 대리인 신청 시)</p>
                                                    <p class="no-body-lg fw300 bullet">대리인(위임 받은자)의 신분증 사본</p>
                                                </div>
                                            </li>

                                            <!--  -->

                                            <li class="top">
                                                <h4 class="no-body-lg fw600 blue">신청인</h4>
                                                <p class="no-body-lg fw300">환자가 의사무능력자인 경우<br> (직계가족만 가능)</p>
                                            </li>
                                            <li class="v2">
                                                <h4 class="no-body-lg fw600">구비서류</h4>
                                                <div class="group no-mg-8--t">
                                                    <p class="no-body-lg fw300 bullet">기록 열람이나 사본 발급을 요청하는 자의 신분증 사본(친족의 사본증)</p>
                                                    <p class="no-body-lg fw300 bullet">가족관계증명서, 주민등록표 등본 등 친족관계를 확인할 수 있는 서류</p>
                                                    <p class="no-body-lg fw300 bullet">법원의 금치산 선고 결정문 사본 또는 의사무능력자임을 증명하는 정신과 전문의의 진단서</p>
                                                    <p class="no-body-lg fw300 bullet">환자 친족과 대리인 간의 진료기록 사본발급 위임장(임의 대리인 시청 시)</p>
                                                    <p class="no-body-lg fw300 bullet">대리인(위임 받은자)의 신분증 사본</p>
                                                </div>
                                            </li>

                                            <!--  -->

                                            <li class="top">
                                                <h4 class="no-body-lg fw600 blue">신청인</h4>
                                                <p class="no-body-lg fw300">예외상황 형제 · 자매</p>
                                            </li>
                                            <li class="v2">
                                                <h4 class="no-body-lg fw600">구비서류</h4>
                                                <div class="group no-mg-8--t">
                                                    <p class="no-body-lg fw300 bullet">상기 규정 이외의 상황으로 환자의 형제 · 자매가 요청하는 경우에는 환자의 배우자 및 직계 존속 · 비속, 배우자의 직계존속이 모두 없음을 증명하는 확인서와 병원 직원이 상황을 인식할 수 있는 자료를 함께 제출하여야 한다.(2017.3.7 개정)</p>
                                                    <p class="no-body-lg fw300 bullet">가족관계증명서, 주민등록표 등본 등 친족관계를 확인할 수 있는 서류</p>
                                                </div>
                                                <div class="documents-download">
                                                    <div class="download-list no-mg-16--t">
                                                        <p class="no-body-sm fw600">확인서 다운로드</p>
                                                        <ul class="no-mg-8--t">
                                                            <li>
                                                                <a href='/resource/file/확인서.hwp' download class="no-body-xs fw300">HWP</a>
                                                            </li>
                                                            <li>
                                                                <a href='/resource/file/확인서.docx' download class="no-body-xs fw300">DOC</a>
                                                            </li>
                                                            <li>
                                                                <a href='/resource/file/확인서.pdf' download class="no-body-xs fw300">PDF</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <?php include_once $STATIC_ROOT . '/inc/layouts/integrate-link.php'; ?>
                    </div>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>

                    <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>
                </div>
            </div>
        </div>
    </section>
</main>