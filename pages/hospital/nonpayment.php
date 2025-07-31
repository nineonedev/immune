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

                    <div class="no-cancer no-neuro no-rehab no-nonpayment">
                        <section class="no-review-top no-pd-48--t">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-48--b">
                                    <h2 class="no-heading-sm">비급여안내</h2>
                                </hgroup>

                                <div class="no-search-result no-mg-8--b">
                                    <div class="search-guide bg">
                                        <p class="bullet no-body-lg fw300">비급여란, 건강보험의 혜택이 적용되지 않는 항목을 말합니다.</p>
                                        <p class="bullet no-body-lg fw300">개별 항목의 1회 비용으로 처방에 따라 항목의 비용이 달라질 수 있습니다.</p>
                                    </div>
                                </div>

                                <ul class="cartegory-wrap v2">
                                    <li>
                                        <a href="#" class="active no-body-lg fw300">
                                            행위료
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="no-body-lg fw300">
                                            약제비
                                        </a>
                                    </li>
                                </ul>

                                <p class="no-body-xs fw300 wgray --tar no-mg-8--t edit">최종변경일.00.00.00</p>
                            </div>
                        </section>

                        <section class="no-nonpayment-table-wrap no-pd-24--t no-pd-48--b">
                            <div class="no-container-sm">
                                <ul class="table-list active" data-index="0">
                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">검사료</h3>

                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <tr>
                                                    <td>NK활성도검사</td>
                                                    <td>100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>모발미네랄검사</td>
                                                    <td>150,000</td>
                                                </tr>
                                                <tr>
                                                    <td>향산화 향노화 검사</td>
                                                    <td>100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>소변 유기산 검사</td>
                                                    <td>270,000</td>
                                                </tr>
                                                <tr>
                                                    <td>남성암11종</td>
                                                    <td>150,000</td>
                                                </tr>
                                                <tr>
                                                    <td>여성암12종</td>
                                                    <td>150,000</td>
                                                </tr>
                                                <tr>
                                                    <td>남성종합26종</td>
                                                    <td>220,000</td>
                                                </tr>
                                                <tr>
                                                    <td>여성종합27종</td>
                                                    <td>200,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">이학요법료</h3>

                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <tr>
                                                    <td>도수치료30분</td>
                                                    <td>90,000</td>
                                                </tr>
                                                <tr>
                                                    <td>도수치료40분</td>
                                                    <td>120,000</td>
                                                </tr>
                                                <tr>
                                                    <td>도수치료50분</td>
                                                    <td>180,000</td>
                                                </tr>
                                                <tr>
                                                    <td>도수치료60분</td>
                                                    <td>230,000</td>
                                                </tr>
                                                <tr>
                                                    <td>도수치료70분</td>
                                                    <td>280,000</td>
                                                </tr>
                                                <tr>
                                                    <td>페인스크램블러</td>
                                                    <td>200,000</td>
                                                </tr>
                                                <tr>
                                                    <td>페인스크램블러</td>
                                                    <td>300,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">처치 및 수술료/근골</h3>

                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <tr>
                                                    <td>체외충격파5분</td>
                                                    <td>50,000</td>
                                                </tr>
                                                <tr>
                                                    <td>체외충격파10분</td>
                                                    <td>100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>CRYO(냉각치료) 3분</td>
                                                    <td>30,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">방사선치료료</h3>

                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <tr>
                                                    <td>고주파 온열치료</td>
                                                    <td>250,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">한방 시술 및 처치료 / 시술료</h3>

                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <tr>
                                                    <td>약침(황련해동,봉침)</td>
                                                    <td>10,000</td>
                                                </tr>
                                                <tr>
                                                    <td>약침(근이완약침,자하거)</td>
                                                    <td>20,000</td>
                                                </tr>
                                                <tr>
                                                    <td>약침(행인)</td>
                                                    <td>30,000</td>
                                                </tr>
                                                <tr>
                                                    <td>약침(산삼경혈약침)</td>
                                                    <td>50,000</td>
                                                </tr>
                                                <tr>
                                                    <td>ICT</td>
                                                    <td>5,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">병실료</h3>

                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <tr>
                                                    <td>상급병실(최저)</td>
                                                    <td>200,000</td>
                                                </tr>
                                                <tr>
                                                    <td>상급병실(최고)</td>
                                                    <td>600,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>

                                <ul class="table-list" data-index="1">
                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">주사료</h3>

                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <tr>
                                                    <td>디펩디벤</td>
                                                    <td>90,000</td>
                                                </tr>
                                                <tr>
                                                    <td>닥터라민250ml</td>
                                                    <td>40,000</td>
                                                </tr>
                                                <tr>
                                                    <td>뉴트리헥스100ml</td>
                                                    <td>30,000</td>
                                                </tr>
                                                <tr>
                                                    <td>메리트디주</td>
                                                    <td>60,000</td>
                                                </tr>
                                                <tr>
                                                    <td>콤비플렉스페리주</td>
                                                    <td>150,000</td>
                                                </tr>
                                                <tr>
                                                    <td>라이넥주</td>
                                                    <td>30,000</td>
                                                </tr>
                                                <tr>
                                                    <td>지씨아르기닌주</td>
                                                    <td>90,000</td>
                                                </tr>
                                                <tr>
                                                    <td>안티옥시주</td>
                                                    <td>30,000</td>
                                                </tr>
                                                <tr>
                                                    <td>셀레늄주</td>
                                                    <td>30,000</td>
                                                </tr>
                                                <tr>
                                                    <td>멀티주</td>
                                                    <td>80,000</td>
                                                </tr>
                                                <tr>
                                                    <td>독감백신4가</td>
                                                    <td>30,000</td>
                                                </tr>
                                                <tr>
                                                    <td>이스카도M주</td>
                                                    <td>40,000</td>
                                                </tr>
                                                <tr>
                                                    <td>이스카도Q주</td>
                                                    <td>40,000</td>
                                                </tr>
                                                <tr>
                                                    <td>압노바A주</td>
                                                    <td>40,000</td>
                                                </tr>
                                                <tr>
                                                    <td>압노바주</td>
                                                    <td>40,000</td>
                                                </tr>
                                                <tr>
                                                    <td>vitB1</td>
                                                    <td>60,000</td>
                                                </tr>
                                                <tr>
                                                    <td>vitB6</td>
                                                    <td>60,000</td>
                                                </tr>
                                                <tr>
                                                    <td>vitB12</td>
                                                    <td>60,000</td>
                                                </tr>
                                                <tr>
                                                    <td>메리트씨주</td>
                                                    <td>15,000</td>
                                                </tr>
                                                <tr>
                                                    <td>마시주</td>
                                                    <td>15,000</td>
                                                </tr>
                                                <tr>
                                                    <td>글루타치온</td>
                                                    <td>60,000</td>
                                                </tr>
                                                <tr>
                                                    <td>진코발주</td>
                                                    <td>30,000</td>
                                                </tr>
                                                <tr>
                                                    <td>엘카르주</td>
                                                    <td>30,000</td>
                                                </tr>
                                                <tr>
                                                    <td>리릭스주</td>
                                                    <td>100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>셀레늄500</td>
                                                    <td>60,000</td>
                                                </tr>
                                                <tr>
                                                    <td>프리베나13</td>
                                                    <td>90,000</td>
                                                </tr>
                                                <tr>
                                                    <td>스카이조스타</td>
                                                    <td>130,000</td>
                                                </tr>
                                                <tr>
                                                    <td>조스타박스</td>
                                                    <td>130,000</td>
                                                </tr>
                                                <tr>
                                                    <td>싱그릭스주 1회</td>
                                                    <td>250,000</td>
                                                </tr>
                                                <tr>
                                                    <td>가다실 1회</td>
                                                    <td>190,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">투약료</h3>

                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <tr>
                                                    <td>세파셀렌정</td>
                                                    <td>5,000</td>
                                                </tr>
                                                <tr>
                                                    <td>세파셀렌정 1box</td>
                                                    <td>100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>셀레나제퍼오랄</td>
                                                    <td>5,000</td>
                                                </tr>
                                                <tr>
                                                    <td>젬비오캡슐</td>
                                                    <td>800</td>
                                                </tr>
                                                <tr>
                                                    <td>젬비오캡슐 1box</td>
                                                    <td>72,000</td>
                                                </tr>
                                                <tr>
                                                    <td>이스미젠 1box(30T)</td>
                                                    <td>450,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>

                                    <li class="fade-up">
                                        <h3 class="no-body-xl fw700 blue --tac title">첩약료</h3>

                                        <table>
                                            <colgroup>
                                                <col width="50%">
                                                <col width="50%">
                                            </colgroup>
                                            <tbody>
                                                <tr class="top">
                                                    <th class="no-body-lg fw600">명칭</th>
                                                    <th class="no-body-lg fw600">비용</th>
                                                </tr>
                                                <tr>
                                                    <td>관절고</td>
                                                    <td>5,000</td>
                                                </tr>
                                                <tr>
                                                    <td>관절고30환 1box</td>
                                                    <td>150,000</td>
                                                </tr>
                                                <tr>
                                                    <td>녹용공진단10환</td>
                                                    <td>150,000</td>
                                                </tr>
                                                <tr>
                                                    <td>원방공진단10환</td>
                                                    <td>550,000</td>
                                                </tr>
                                                <tr>
                                                    <td>경옥고(스틱)</td>
                                                    <td>150,000</td>
                                                </tr>
                                                <tr>
                                                    <td>사삼청폐음(스틱)</td>
                                                    <td>150,000</td>
                                                </tr>
                                                <tr>
                                                    <td>담적환</td>
                                                    <td>18,000</td>
                                                </tr>
                                                <tr>
                                                    <td>소적건비환</td>
                                                    <td>3,500</td>
                                                </tr>
                                                <tr>
                                                    <td>윤장환</td>
                                                    <td>3,500</td>
                                                </tr>
                                                <tr>
                                                    <td>천왕보심단</td>
                                                    <td>3,500</td>
                                                </tr>
                                                <tr>
                                                    <td>소경활혈환</td>
                                                    <td>3,500</td>
                                                </tr>
                                                <tr>
                                                    <td>팔미원</td>
                                                    <td>3,500</td>
                                                </tr>
                                                <tr>
                                                    <td>자운고</td>
                                                    <td>20,000</td>
                                                </tr>
                                                <tr>
                                                    <td>한방파스(6p)</td>
                                                    <td>5,000</td>
                                                </tr>
                                                <tr>
                                                    <td>쌍패탕</td>
                                                    <td>10,000</td>
                                                </tr>
                                                <tr>
                                                    <td>평진건비탕</td>
                                                    <td>10,000</td>
                                                </tr>
                                                <tr>
                                                    <td>계강조초황신부탕</td>
                                                    <td>10,000</td>
                                                </tr>
                                                <tr>
                                                    <td>가미위령탕</td>
                                                    <td>10,000</td>
                                                </tr>
                                                <tr>
                                                    <td>작약감초탕</td>
                                                    <td>10,000</td>
                                                </tr>
                                                <tr>
                                                    <td>쌍화산조인탕</td>
                                                    <td>10,000</td>
                                                </tr>
                                                <tr>
                                                    <td>당귀수산</td>
                                                    <td>10,000</td>
                                                </tr>
                                                <tr>
                                                    <td>항암단</td>
                                                    <td>60,000</td>
                                                </tr>
                                                <tr>
                                                    <td>유암단</td>
                                                    <td>40,000</td>
                                                </tr>
                                                <tr>
                                                    <td>항암플러스</td>
                                                    <td>8,000</td>
                                                </tr>
                                                <tr>
                                                    <td>면역플러스</td>
                                                    <td>8,000</td>
                                                </tr>
                                                <tr>
                                                    <td>청간플러스</td>
                                                    <td>4,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
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