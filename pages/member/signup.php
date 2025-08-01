<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->



<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>

<script src="<?= $ROOT ?>/resource/js/member.js?v=<?= date('YmdHis') ?>" defer></script>

<!-- css, js  -->



<!-- contents -->



<main>

    <section class="no-cetner-visual">

        <div class="no-container-pc">

            <div class="visual-wrap">

                <?php include_once $STATIC_ROOT . '/inc/shared/pc-info.php'; ?>



                <div class="mobile-visual-wrap">

                    <?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>



                    <div class="no-member">

                        <section class="no-inquiry-wrap no-member-signup no-pd-48--y no-mg-48--t">

                            <div class="no-container-sm">

                                <hgroup class="--tac no-mg-16--b">

                                    <h2 class="no-heading-sm">빠른 회원가입</h2>

                                </hgroup>



                                <form id="signupForm" method="post">

                                    <fieldset>

                                        <ul class="form-wrap">

                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">아이디<b class="error fw300">*</b></p>

                                                </div>

                                                <div class="id-check-wrap">

                                                    <input type="text" name="user_id" id="user_id" class="no-input" />


                                                    <button type="button" id="check_user_id"
                                                        class="check-btn no-body-xs fw600">
                                                        중복확인
                                                    </button>

                                                </div>

                                            </li>



                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">비밀번호<b class="error fw300">*</b></p>

                                                </div>
                                                <!-- 비밀번호 -->
                                                <input type="password" name="password" id="password" class="no-input" />

                                            </li>



                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">이름<b class="error fw300">*</b></p>

                                                </div>

                                                <input type="text" name="name" id="name" class="no-input" />

                                            </li>



                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">연락처<b class="error fw300">*</b></p>

                                                </div>

                                                <input type="tel" name="phone" id="phone" class="no-input"
                                                    maxlength="11" placeholder="예시) 01012345678" />

                                            </li>



                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">이메일<b class="error fw300">*</b></p>

                                                </div>

                                                <input type="email" name="email" id="email" class="no-input" />

                                            </li>



                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">생년월일</p>

                                                </div>

                                                <input type="tel" name="birth" id="birth" class="no-input" maxlength="6"
                                                    placeholder="예시) 250101">


                                            </li>

                                        </ul>



                                        <div class="form-bottom no-mg-16--t">

                                            <div class="check-list">

                                                <?php foreach ($agree_options as $name => $option): ?>
                                                <figure>
                                                    <input type="checkbox" name="<?= $name ?>" id="<?= $name ?>"
                                                        class="check">

                                                    <label for="<?= $name ?>">
                                                        <i class="fa-sharp fa-solid fa-square-check"></i>
                                                    </label>

                                                    <label for="<?= $name ?>" class="no-body-xs fw300">
                                                        <?= $option['label'] ?>
                                                    </label>

                                                    <?php if (!empty($option['required'])): ?>
                                                    <a href="#" class="private-btn">보기</a>
                                                    <?php endif; ?>
                                                </figure>
                                                <?php endforeach; ?>


                                                <div class="private-box" data-lenis-prevent-wheel>

                                                    <h3 class="fw700 blue no-mg-4--b">개인정보처리방침</h3>



                                                    <p>제1조 (개인정보의 처리 목적)

                                                        면력한방병원(이하 "병원")은 다음의 목적을 위해 필요한 최소한의 개인정보를 수집·이용합니다.<br>

                                                        <b>1.</b> 진료 서비스 제공 및 의료비 청구<br>

                                                        <b>2.</b> 온라인 예약, 상담, 문의 등 원활한 서비스 제공<br>

                                                        3.병원의 소식, 이벤트, 정보 제공 (수신 동의를 한 경우에 한함)<br>

                                                        <b>4.</b> 기타 병원의 원활한 운영을 위하여 필요한 목적<br>

                                                        제2조 (수집하는 개인정보 항목 및 수집 방법)<br>

                                                        <b>1.</b> 병원은 회원가입, 진료 예약, 온라인 상담, 서비스 이용 과정에서 필요한 개인정보를 수집할 수
                                                        있습니다.<br>

                                                        <b>· </b>일반 회원가입 시: 이름, 연락처(전화번호, 이메일), 비밀번호, 생년월일 등<br>

                                                        <b>· </b>진료 예약 시: 이름, 연락처, 예약 희망일, 증상 등 진료 관련 정보<br>

                                                        <b>· </b>온라인 상담 시: 이름, 연락처, 상담 내용, 질환 정보 등<br>

                                                        <b>2.</b> 병원은 이용자의 동의하에 쿠키(Cookie), 로그 기록, 기기 정보 등 자동으로 생성되는
                                                        정보(접속일시, 서비스 이용 기록 등)를 수집할 수 있습니다.<br>

                                                        제3조 (개인정보의 보유·이용기간)<br>

                                                        <b>1.</b> 병원은 개인정보의 수집·이용 목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다.<br>

                                                        <b>2.</b> 단, 의료법, 전자상거래 등에서의 소비자보호에 관한 법률, 국세기본법 등 관련 법령에서 정한 바에
                                                        따라 일정 기간 보관해야 하는 정보는 법령에서 정한 기간 동안 보관합니다.<br>

                                                        <b>· </b>예) 진료기록(의료법): 10년 보관<br>

                                                        <b>· </b>예) 전자상거래 기록(전자상거래법): 5년 보관<br>

                                                        제4조 (개인정보의 제3자 제공)<br>

                                                        <b>1.</b> 병원은 원칙적으로 이용자의 개인정보를 외부에 제공하지 않습니다.<br>

                                                        <b>2.</b> 다만, 이용자가 사전에 동의한 경우 또는 법령에 특별한 규정이 있는 경우에 한하여 개인정보를
                                                        제공할 수 있습니다.<br>

                                                        제5조 (개인정보 처리의 위탁)<br>

                                                        <b>1.</b> 병원은 서비스 향상을 위해 개인정보 처리를 외부 전문기관에 위탁할 수 있으며, 이 경우 위탁받는
                                                        업체명, 위탁 업무 내용 등을 병원 홈페이지 등에 공지합니다.<br>

                                                        <b>2.</b> 위탁계약 시 개인정보보호 관련 법령 준수, 재위탁 제한, 안전성 확보 조치 등을 명시하여 이용자의
                                                        개인정보가 안전하게 처리될 수 있도록 관리·감독합니다.<br>

                                                        제6조 (개인정보의 안전성 확보 조치)<br>

                                                        병원은 개인정보의 안전성 확보를 위해 다음과 같은 조치를 시행하고 있습니다.<br>

                                                        <b>1.</b> 기술적 조치: 개인정보 암호화, 백신 프로그램 이용, 접근권한 최소화 등<br>

                                                        <b>2.</b> 관리적 조치: 개인정보 취급자 지정, 정기 교육, 내부 감사 등<br>

                                                        <b>3.</b> 물리적 조치: 전산실, 자료 보관실 등에 대한 접근 통제<br>

                                                        제7조 (이용자와 법정대리인의 권리·의무 및 행사 방법)<br>

                                                        <b>1.</b> 이용자는 언제든지 병원에 대해 개인정보 열람, 정정, 삭제, 처리정지 요구를 할 수
                                                        있습니다.<br>

                                                        <b>2.</b> 이용자의 요청이 있는 경우, 병원은 관련 법령에 따라 지체 없이 필요한 조치를 합니다. 다만,
                                                        다른 법령에서 보관 의무가 있는 경우 해당 법령에서 정하는 기간 동안 개인정보를 보관할 수 있습니다.<br>

                                                        <b>3.</b> 만 14세 미만 아동의 경우, 법정대리인이 아동의 개인정보를 조회·수정 또는 수집·이용·제공 동의
                                                        철회를 요청할 수 있습니다.

                                                        제8조 (개인정보 보호책임자 및 담당부서 안내)<br>

                                                        <b>1.</b> 병원은 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련된 이용자의 불만 처리
                                                        및 피해 구제를 위해 아래와 같이 개인정보 보호책임자를 지정하고 있습니다.<br>

                                                        <b>· </b>개인정보 보호책임자: ○○○<br>

                                                        <b>· </b>연락처: ○○○-○○○○-○○○○ / 이메일: privacy@menryeok.com<br>

                                                        <b>2.</b> 기타 자세한 사항은 병원 홈페이지 내 “개인정보 보호 안내”를 참고하시기 바랍니다.<br>

                                                        제9조 (고지의 의무)<br>

                                                        본 개인정보처리방침은 시행일로부터 적용되며, 법령 또는 내부 방침의 변경 등으로 내용이 추가, 삭제 및 수정될 수
                                                        있습니다. 변경 사항은 병원 홈페이지를 통해 공지합니다.

                                                    </p>

                                                </div>


                                                <div class="private-box terms" data-lenis-prevent-wheel>

                                                    <h3 class="fw700 blue no-mg-4--b">이용약관</h3>



                                                    <p>제1조 (개인정보의 처리 목적)

                                                        면력한방병원(이하 "병원")은 다음의 목적을 위해 필요한 최소한의 개인정보를 수집·이용합니다.<br>

                                                        <b>1.</b> 진료 서비스 제공 및 의료비 청구<br>

                                                        <b>2.</b> 온라인 예약, 상담, 문의 등 원활한 서비스 제공<br>

                                                        3.병원의 소식, 이벤트, 정보 제공 (수신 동의를 한 경우에 한함)<br>

                                                        <b>4.</b> 기타 병원의 원활한 운영을 위하여 필요한 목적<br>

                                                        제2조 (수집하는 개인정보 항목 및 수집 방법)<br>

                                                        <b>1.</b> 병원은 회원가입, 진료 예약, 온라인 상담, 서비스 이용 과정에서 필요한 개인정보를 수집할 수
                                                        있습니다.<br>

                                                        <b>· </b>일반 회원가입 시: 이름, 연락처(전화번호, 이메일), 비밀번호, 생년월일 등<br>

                                                        <b>· </b>진료 예약 시: 이름, 연락처, 예약 희망일, 증상 등 진료 관련 정보<br>

                                                        <b>· </b>온라인 상담 시: 이름, 연락처, 상담 내용, 질환 정보 등<br>

                                                        <b>2.</b> 병원은 이용자의 동의하에 쿠키(Cookie), 로그 기록, 기기 정보 등 자동으로 생성되는
                                                        정보(접속일시, 서비스 이용 기록 등)를 수집할 수 있습니다.<br>

                                                        제3조 (개인정보의 보유·이용기간)<br>

                                                        <b>1.</b> 병원은 개인정보의 수집·이용 목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다.<br>

                                                        <b>2.</b> 단, 의료법, 전자상거래 등에서의 소비자보호에 관한 법률, 국세기본법 등 관련 법령에서 정한 바에
                                                        따라 일정 기간 보관해야 하는 정보는 법령에서 정한 기간 동안 보관합니다.<br>

                                                        <b>· </b>예) 진료기록(의료법): 10년 보관<br>

                                                        <b>· </b>예) 전자상거래 기록(전자상거래법): 5년 보관<br>

                                                        제4조 (개인정보의 제3자 제공)<br>

                                                        <b>1.</b> 병원은 원칙적으로 이용자의 개인정보를 외부에 제공하지 않습니다.<br>

                                                        <b>2.</b> 다만, 이용자가 사전에 동의한 경우 또는 법령에 특별한 규정이 있는 경우에 한하여 개인정보를
                                                        제공할 수 있습니다.<br>

                                                        제5조 (개인정보 처리의 위탁)<br>

                                                        <b>1.</b> 병원은 서비스 향상을 위해 개인정보 처리를 외부 전문기관에 위탁할 수 있으며, 이 경우 위탁받는
                                                        업체명, 위탁 업무 내용 등을 병원 홈페이지 등에 공지합니다.<br>

                                                        <b>2.</b> 위탁계약 시 개인정보보호 관련 법령 준수, 재위탁 제한, 안전성 확보 조치 등을 명시하여 이용자의
                                                        개인정보가 안전하게 처리될 수 있도록 관리·감독합니다.<br>

                                                        제6조 (개인정보의 안전성 확보 조치)<br>

                                                        병원은 개인정보의 안전성 확보를 위해 다음과 같은 조치를 시행하고 있습니다.<br>

                                                        <b>1.</b> 기술적 조치: 개인정보 암호화, 백신 프로그램 이용, 접근권한 최소화 등<br>

                                                        <b>2.</b> 관리적 조치: 개인정보 취급자 지정, 정기 교육, 내부 감사 등<br>

                                                        <b>3.</b> 물리적 조치: 전산실, 자료 보관실 등에 대한 접근 통제<br>

                                                        제7조 (이용자와 법정대리인의 권리·의무 및 행사 방법)<br>

                                                        <b>1.</b> 이용자는 언제든지 병원에 대해 개인정보 열람, 정정, 삭제, 처리정지 요구를 할 수
                                                        있습니다.<br>

                                                        <b>2.</b> 이용자의 요청이 있는 경우, 병원은 관련 법령에 따라 지체 없이 필요한 조치를 합니다. 다만,
                                                        다른 법령에서 보관 의무가 있는 경우 해당 법령에서 정하는 기간 동안 개인정보를 보관할 수 있습니다.<br>

                                                        <b>3.</b> 만 14세 미만 아동의 경우, 법정대리인이 아동의 개인정보를 조회·수정 또는 수집·이용·제공 동의
                                                        철회를 요청할 수 있습니다.

                                                        제8조 (개인정보 보호책임자 및 담당부서 안내)<br>

                                                        <b>1.</b> 병원은 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련된 이용자의 불만 처리
                                                        및 피해 구제를 위해 아래와 같이 개인정보 보호책임자를 지정하고 있습니다.<br>

                                                        <b>· </b>개인정보 보호책임자: ○○○<br>

                                                        <b>· </b>연락처: ○○○-○○○○-○○○○ / 이메일: privacy@menryeok.com<br>

                                                        <b>2.</b> 기타 자세한 사항은 병원 홈페이지 내 “개인정보 보호 안내”를 참고하시기 바랍니다.<br>

                                                        제9조 (고지의 의무)<br>

                                                        본 개인정보처리방침은 시행일로부터 적용되며, 법령 또는 내부 방침의 변경 등으로 내용이 추가, 삭제 및 수정될 수
                                                        있습니다. 변경 사항은 병원 홈페이지를 통해 공지합니다.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>



                                        <button type="submit" class="submit no-body-lg fw600 no-mg-16--t">

                                            회원가입

                                        </button>

                                    </fieldset>

                                </form>



                                <a href="../member/login.php"
                                    class="move-btn no-body-xs fw300 no-mg-16--y wblack --tac">로그인</a>

                            </div>

                        </section>

                    </div>



                    <?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>



                    <?php include_once $STATIC_ROOT . '/inc/layouts/floating-bottom.php'; ?>

                </div>

            </div>

        </div>

    </section>

</main>

<script>
const form = document.getElementById('signupForm');
const API_URL = '/module/ajax/signup.php';
const checkUserId = document.getElementById('check_user_id');
const validate = () => {
    // 입력값 가져오기
    const user_id = document.getElementById('user_id');
    const password = document.getElementById('password');
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');

    if (!user_id.value.trim()) {
        alert('아이디를 입력해주세요.');
        user_id.focus();
        return;
    }

    if (!password.value.trim()) {
        alert('비밀번호를 입력해주세요.');
        user_pwd.focus();
        return;
    }


    if (!name.value.trim()) {
        alert('이름을 입력해주세요.');
        name.focus();
        return;
    }

    if (!email.value.trim()) {
        alert('이메일을 입력해주세요.');
        email.focus();
        return;
    }

    if (!phone.value.trim()) {
        alert('연락처를 입력해주세요.');
        phone.focus();
        return;
    }

    return true;
}

const handleSubmit = async (e) => {
    e.preventDefault(); // 기본 폼 제출 방지

    // 입력값 가져오기
    const user_id = document.getElementById('user_id').value.trim();
    const password = document.getElementById('password').value.trim();
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();

    // 입력값 검증
    if (!validate()) {
        return;
    }

    // 회원가입 데이터 생성
    const formData = new FormData(form);

    try {
        const response = await fetch(API_URL, {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        alert(result.message);

        if (result.success) {
            window.location.href = './login.php';
        }

    } catch (error) {
        alert(error.message);
    }
};


async function handleUserIdCheck() {
    const userIdInput = document.getElementById('user_id');
    const userId = userIdInput.value.trim();

    if (!userId) {
        showAlert('아이디를 입력해주세요.');
        return;
    }

    try {
        const response = await fetch('/api/check_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                user_id: userId
            })
        });

        const {
            success,
            message
        } = await response.json();

        showAlert(message);

    } catch (error) {
        console.error('중복확인 에러:', error);
        showAlert('중복 확인 중 오류가 발생했습니다.');
    }
}

function showAlert(msg) {
    alert(msg);
}

form.addEventListener('submit', handleSubmit);
checkUserId.addEventListener('click', handleUserIdCheck);
</script>