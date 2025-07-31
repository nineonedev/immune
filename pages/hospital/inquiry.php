<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<!-- dev -->

<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<script src="<?= $ROOT ?>/resource/js/sub.js?v=<?= date('YmdHis') ?>" defer></script>
<script src="<?= $ROOT ?>/resource/js/inquiry.js?v=<?= date('YmdHis') ?>" defer></script>
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

                    <div class="no-cancer no-neuro no-rehab no-inquiry">
                        <section class="no-inquiry-wrap no-pd-48--y">
                            <div class="no-container-sm">
                                <hgroup class="--tac">
                                    <h2 class="no-heading-sm">고민이시라면<br>
                                        전문가와 상담해보세요.</h2>
                                </hgroup>

                                <form id="frm" name="frm" method="post" class="fade-up no-mg-48--t">
                                    <fieldset>
                                        <ul class="form-wrap">
                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">이름<b class="error fw300">*</b></p>
                                                    <h6 class="no-body-xs"><b class="error">*</b> 표기된 항목은 필수입력 항목입니다.</h6>
                                                </div>
                                                <input type="text" name="name" id="name" placeholder="이름">
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">연락처<b class="error fw300">*</b></p>
                                                </div>
                                                <input type="text" name="phone" id="phone" placeholder="숫자만 입력해 주세요.">
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">상담 가능시간</p>
                                                    <h6 class="no-body-xs"><b class="blue fw600">전화상담 가능 시간</b> 평일 10:00 - 18:00</h6>
                                                </div>
                                                <div class="radio-group-wrap">
                                                    <div class="radio-select">
                                                        <p>상관없음</p>
                                                        <i class="fa-regular fa-angle-down i-24"></i>
                                                    </div>
                                                    <div class="radio-list">
                                                        <label><input type="radio" name="consult_time" value="상관없음" checked> 상관없음</label>
                                                        <label><input type="radio" name="consult_time" value="10:00 - 11:00"> 10:00 - 11:00</label>
                                                        <label><input type="radio" name="consult_time" value="11:00 - 12:00"> 11:00 - 12:00</label>
                                                        <label><input type="radio" name="consult_time" value="12:00 - 13:00"> 12:00 - 13:00</label>
                                                        <label><input type="radio" name="consult_time" value="13:00 - 14:00"> 13:00 - 14:00</label>
                                                        <label><input type="radio" name="consult_time" value="14:00 - 15:00"> 14:00 - 15:00</label>
                                                        <label><input type="radio" name="consult_time" value="15:00 - 16:00"> 15:00 - 16:00</label>
                                                        <label><input type="radio" name="consult_time" value="16:00 - 17:00"> 16:00 - 17:00</label>
                                                        <label><input type="radio" name="consult_time" value="17:00 - 18:00"> 17:00 - 18:00</label>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">희망진료항목</p>
                                                </div>
                                                <div class="radio-group-wrap">
                                                    <div class="radio-select">
                                                        <p>상관없음</p>
                                                        <i class="fa-regular fa-angle-down i-24"></i>
                                                    </div>
                                                    <div class="radio-list">
                                                        <label><input type="radio" name="hope_treatment" value="상관없음" checked> 상관없음</label>
                                                        <label><input type="radio" name="hope_treatment" value="암센터">암센터</label>
                                                        <label><input type="radio" name="hope_treatment" value="신경면역센터">신경면역센터</label>
                                                        <label><input type="radio" name="hope_treatment" value="재활센터">재활센터</label>
                                                        <label><input type="radio" name="hope_treatment" value="기타">기타</label>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">문의 내용</p>
                                                </div>
                                                <textarea name="contents" id="contents" placeholder="내용을 입력해주세요."></textarea>
                                            </li>
                                        </ul>

                                        <div class="form-bottom no-mg-10--t">
                                            <p class="wgray collect">수집하는 개인정보 항목 : 이름, 연락처<br>
                                                수집 및 이용목적 : 면력 한방병원에서 진행하는 시술 및 진료에 관한 유선 상담<br>
                                                보유 및 이용 기간 : 유선 상담 목적의 종결 시까지</p>

                                            <div class="check-list no-mg-6--t">
                                                <figure>
                                                    <input type="checkbox" name="private_check" id="private_check" class="check">
                                                    <label for="private_check"><i class="fa-sharp fa-solid fa-square-check"></i></label>
                                                    <label for="private_check" class="no-body-xs fw300">개인정보 취급방침에 동의합니다. (필수)</label>

                                                    <a href="#" class="private-btn">
                                                        보기
                                                    </a>
                                                </figure>

                                                <div class="private-box" data-lenis-prevent-wheel>
                                                    <h3 class="fw700 blue no-mg-4--b">개인정보처리방침</h3>

                                                    <p>제1조 (개인정보의 처리 목적)
                                                        면력한방병원(이하 "병원")은 다음의 목적을 위해 필요한 최소한의 개인정보를 수집·이용합니다.<br>
                                                        <b>1.</b> 진료 서비스 제공 및 의료비 청구<br>
                                                        <b>2.</b> 온라인 예약, 상담, 문의 등 원활한 서비스 제공<br>
                                                        3.병원의 소식, 이벤트, 정보 제공 (수신 동의를 한 경우에 한함)<br>
                                                        <b>4.</b> 기타 병원의 원활한 운영을 위하여 필요한 목적<br>
                                                        제2조 (수집하는 개인정보 항목 및 수집 방법)<br>
                                                        <b>1.</b> 병원은 회원가입, 진료 예약, 온라인 상담, 서비스 이용 과정에서 필요한 개인정보를 수집할 수 있습니다.<br>
                                                        <b>· </b>일반 회원가입 시: 이름, 연락처(전화번호, 이메일), 비밀번호, 생년월일 등<br>
                                                        <b>· </b>진료 예약 시: 이름, 연락처, 예약 희망일, 증상 등 진료 관련 정보<br>
                                                        <b>· </b>온라인 상담 시: 이름, 연락처, 상담 내용, 질환 정보 등<br>
                                                        <b>2.</b> 병원은 이용자의 동의하에 쿠키(Cookie), 로그 기록, 기기 정보 등 자동으로 생성되는 정보(접속일시, 서비스 이용 기록 등)를 수집할 수 있습니다.<br>
                                                        제3조 (개인정보의 보유·이용기간)<br>
                                                        <b>1.</b> 병원은 개인정보의 수집·이용 목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다.<br>
                                                        <b>2.</b> 단, 의료법, 전자상거래 등에서의 소비자보호에 관한 법률, 국세기본법 등 관련 법령에서 정한 바에 따라 일정 기간 보관해야 하는 정보는 법령에서 정한 기간 동안 보관합니다.<br>
                                                        <b>· </b>예) 진료기록(의료법): 10년 보관<br>
                                                        <b>· </b>예) 전자상거래 기록(전자상거래법): 5년 보관<br>
                                                        제4조 (개인정보의 제3자 제공)<br>
                                                        <b>1.</b> 병원은 원칙적으로 이용자의 개인정보를 외부에 제공하지 않습니다.<br>
                                                        <b>2.</b> 다만, 이용자가 사전에 동의한 경우 또는 법령에 특별한 규정이 있는 경우에 한하여 개인정보를 제공할 수 있습니다.<br>
                                                        제5조 (개인정보 처리의 위탁)<br>
                                                        <b>1.</b> 병원은 서비스 향상을 위해 개인정보 처리를 외부 전문기관에 위탁할 수 있으며, 이 경우 위탁받는 업체명, 위탁 업무 내용 등을 병원 홈페이지 등에 공지합니다.<br>
                                                        <b>2.</b> 위탁계약 시 개인정보보호 관련 법령 준수, 재위탁 제한, 안전성 확보 조치 등을 명시하여 이용자의 개인정보가 안전하게 처리될 수 있도록 관리·감독합니다.<br>
                                                        제6조 (개인정보의 안전성 확보 조치)<br>
                                                        병원은 개인정보의 안전성 확보를 위해 다음과 같은 조치를 시행하고 있습니다.<br>
                                                        <b>1.</b> 기술적 조치: 개인정보 암호화, 백신 프로그램 이용, 접근권한 최소화 등<br>
                                                        <b>2.</b> 관리적 조치: 개인정보 취급자 지정, 정기 교육, 내부 감사 등<br>
                                                        <b>3.</b> 물리적 조치: 전산실, 자료 보관실 등에 대한 접근 통제<br>
                                                        제7조 (이용자와 법정대리인의 권리·의무 및 행사 방법)<br>
                                                        <b>1.</b> 이용자는 언제든지 병원에 대해 개인정보 열람, 정정, 삭제, 처리정지 요구를 할 수 있습니다.<br>
                                                        <b>2.</b> 이용자의 요청이 있는 경우, 병원은 관련 법령에 따라 지체 없이 필요한 조치를 합니다. 다만, 다른 법령에서 보관 의무가 있는 경우 해당 법령에서 정하는 기간 동안 개인정보를 보관할 수 있습니다.<br>
                                                        <b>3.</b> 만 14세 미만 아동의 경우, 법정대리인이 아동의 개인정보를 조회·수정 또는 수집·이용·제공 동의 철회를 요청할 수 있습니다.
                                                        제8조 (개인정보 보호책임자 및 담당부서 안내)<br>
                                                        <b>1.</b> 병원은 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련된 이용자의 불만 처리 및 피해 구제를 위해 아래와 같이 개인정보 보호책임자를 지정하고 있습니다.<br>
                                                        <b>· </b>개인정보 보호책임자: ○○○<br>
                                                        <b>· </b>연락처: ○○○-○○○○-○○○○ / 이메일: privacy@menryeok.com<br>
                                                        <b>2.</b> 기타 자세한 사항은 병원 홈페이지 내 “개인정보 보호 안내”를 참고하시기 바랍니다.<br>
                                                        제9조 (고지의 의무)<br>
                                                        본 개인정보처리방침은 시행일로부터 적용되며, 법령 또는 내부 방침의 변경 등으로 내용이 추가, 삭제 및 수정될 수 있습니다. 변경 사항은 병원 홈페이지를 통해 공지합니다.
                                                    </p>
                                                </div>

                                                <figure>
                                                    <input type="checkbox" name="marketing_check" id="marketing_check" class="check">
                                                    <label for="marketing_check"><i class="fa-sharp fa-solid fa-square-check"></i></label>
                                                    <label for="marketing_check" class="no-body-xs fw300">마케팅 (이벤트 정보수신 등) 사용 동의 (선택)</label>
                                                </figure>
                                            </div>
                                        </div>

                                        <button type="button" onclick="doRequest();" class="submit no-body-lg fw600 no-mg-20--t">
                                            제출하기
                                        </button>

                                    </fieldset>
                                </form>
                            </div>
                        </section>

                        <section class="no-documents-top no-pd-48--b">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-24--b fade-up">
                                    <h2 class="no-heading-sm">면력 상담 진행절차</h2>
                                </hgroup>

                                <ul class="simple-process v2 bg no-pd-16 no-radius-sm fade-up">
                                    <li class="f-wrap no-gap-16">
                                        <figure>
                                            <img src="/resource/images/icon/list.svg">
                                        </figure>

                                        <div class="txt">
                                            <p class="no-body-xs fw600 blue">STEP 1</p>
                                            <h3 class="no-body-xl fw700">접수 데스크 방문</h3>
                                            <p class="no-body-xs fw300">환자 진단명 및 증상 파악</p>
                                        </div>
                                    </li>
                                    <i class="fa-solid fa-angle-down i-24 wgray"></i>
                                    <li class="f-wrap no-gap-16">
                                        <figure>
                                            <img src="/resource/images/icon/calendar.svg">
                                        </figure>

                                        <div class="txt">
                                            <p class="no-body-xs fw600 blue">STEP 2</p>
                                            <h3 class="no-body-xl fw700">상담일정 조정</h3>
                                            <p class="no-body-xs fw300">예약확정문자 발송</p>
                                        </div>
                                    </li>
                                    <i class="fa-solid fa-angle-down i-24 wgray"></i>
                                    <li class="f-wrap no-gap-16">
                                        <figure>
                                            <img src="/resource/images/icon/say.svg">
                                        </figure>

                                        <div class="txt">
                                            <p class="no-body-xs fw600 blue">STEP 3</p>
                                            <h3 class="no-body-xl fw700">전문가 상담진행</h3>
                                            <p class="no-body-xs fw300">전문가 대면상담진행</p>
                                        </div>
                                    </li>
                                    <i class="fa-solid fa-angle-down i-24 wgray"></i>
                                    <li class="f-wrap no-gap-16">
                                        <figure>
                                            <img src="/resource/images/icon/heal.svg">
                                        </figure>

                                        <div class="txt">
                                            <p class="no-body-xs fw600 blue">STEP 4</p>
                                            <h3 class="no-body-xl fw700">환자 맞춤 치료</h3>
                                        </div>
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