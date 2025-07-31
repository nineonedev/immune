<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<!-- dev -->

<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<!-- css, js  -->

<!-- contents -->

<main>
    <section class="no-cetner-visual">
        <div class="no-container-pc">
            <div class="visual-wrap">
                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>

                <div class="mobile-visual-wrap">
                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
                    <?php include_once $STATIC_ROOT . '/inc/shared/sub.nav-depth.php'; ?>

                    <div class="no-cancer no-neuro no-rehab no-doctor">
                        <section class="no-doctor-view-visual">
                            <hgroup class="fade-up">
                                <h2 class="no-heading-sl blue"><?=$data['title']?></h2>
                                <p class="no-body-xl fw600"><?=$data['category_name']?> <?=$data['extra1']?></p>
                                <span class="no-body-xs fw300"><?=$data['extra2']?></span>
                            </hgroup>

                            <figure>
                                <img src="/uploads/board/<?=$data['file_attach_1']?>">
                            </figure>
                        </section>

                        <section class="no-doctor-view-keyword no-pd-48--y">
                            <div class="no-container-sm">
                                <h2 class="no-heading-sm fade-up fw600">내가 보는 <?=$data['title']?> 원장님은<br>
                                    <b class="blue">어떤 분일까?</b>
                                </h2>

                                <ul class="keyword-list no-mg-24--t list-js">
                                    <li class="no-body-md">
                                        #꼼꼼한
                                    </li>

                                    <li class="no-body-md">
                                        #친절한
                                    </li>

                                    <li class="no-body-md">
                                        #예리한
                                    </li>

                                    <li class="no-body-md">
                                        #이성적인
                                    </li>

                                    <li class="no-body-md">
                                        #정확한
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section class="no-doctor-view-profile no-pd-48--y">
                            <div class="no-container-sm">
                                <ul class="profile-list">
                                    <li class="fade-up">
                                        <h3 class="no-heading-sm fw600">경력</h3>
                                        <ul class="dept2 no-mg-16--t">
                                            <li>(前) 자생한방병원 수련의</li>
                                            <li>(現) 면력한방병원 대표원장</li>
                                        </ul>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-heading-sm fw600">활동</h3>
                                        <ul class="dept2 no-mg-16--t">
                                            <li>임상통합의학암학회(CSIO) 이사</li>
                                            <li>Swiss Arlesheim Klinik(스위스 알레하임클리닉)</li>
                                            <li>GermanyBioMed-klinik(독일 비오메드클리닉)</li>
                                            <li>한국암재활병원 협회 회원</li>
                                            <li>대한한의학회 회원</li>
                                            <li>기능영양 한의학회</li>
                                        </ul>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-heading-sm fw600">학력</h3>
                                        <ul class="dept2 no-mg-16--t">
                                            <li>경희대학교 동서의학과 박사</li>
                                            <li>경희대학교 생리학교실</li>
                                            <li>동신대학교 한의학과 학사</li>
                                        </ul>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-heading-sm fw600">저서 및 논문</h3>
                                        <ul class="dept2 no-mg-16--t">
                                            <li>(옥살리플라틴 유발 신경병증에 봉독치료의 효과)</li>
                                            <li>Bee Venom Acupuncture Attenuates Oxaliplatin-Induced Neuropathic Pain </li>
                                            <li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons </li>
                                            <li>by Modulating Action Potential Threshold in Dorsal Root Ganglia Neurons Toxins,2020;12(12):2072-6651 </li>
                                            <li>(세로토닌 시스템에서 옥살리플라틴 유발 신경병성 통증에 대한 Shogaol의 효과)</li>
                                            <li>Engagement of Spinal Serotonergic System in the Pain-Alleviating Effect of
                                                [6]-Shogaol in Chemotherapy-Induced Neuropathic Pain
                                                [6]-Shogaol Attenuates Oxaliplatin-Induced Allodynia through Serotonergic Receptors
                                                and GABA in the Spinal Cord in Mice</li>
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