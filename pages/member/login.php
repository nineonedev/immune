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

                        <section class="no-inquiry-wrap no-member-login no-pd-48--y no-mg-48--t">

                            <div class="no-container-sm">

                                <hgroup class="--tac no-mg-16--b">

                                    <h2 class="no-heading-sm">로그인</h2>

                                </hgroup>



                                <form id="loginForm" method="post">

                                    <fieldset>

                                        <ul class="form-wrap">

                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">아이디</p>

                                                </div>

                                                <input type="text" name="user_id" id="user_id" class="no-input">

                                            </li>



                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">비밀번호</p>

                                                </div>

                                                <input type="password" name="password" id="password" class="no-input">

                                            </li>

                                        </ul>



                                        <button type="submit" class="submit no-body-lg fw600 no-mg-16--t">

                                            로그인

                                        </button>



                                    </fieldset>

                                </form>

                                <a href="<?=$LOGIN_URL?>" class="submit no-body-lg fw600 no-mg-16--t">
                                    카카오톡 로그인
                                </a>


                                <a href="../member/find_id.php"
                                    class="move-btn no-body-xs fw300 no-mg-16--y wblack --tac">아이디 / 비밀번호 찾기</a>


                                <div class="signup-link no-pd-32--t">

                                    <div class="txt">

                                        <h3 class="no-body-lg fw600">아직, 회원이 아니신가요?</h3>

                                        <p class="no-body-xs fw300 wblack no-mg-4--t">가입을 통해 면력의 웹 서비스를 받아보세요.</p>

                                    </div>

                                    <a href="../member/signup.php" class="no-body-xs basic-btn fw300">빠른 회원가입</a>

                                </div>

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
const form = document.getElementById('loginForm');
const API_URL = '/module/ajax/login.php';

const validate = () => {
    // 입력값 가져오기
    const user_id = document.getElementById('user_id');
    const user_pwd = document.getElementById('password');

    console.log(user_id, user_pwd);

    if (!user_id.value.trim()) {
        alert('아이디를 입력해주세요.');
        user_id.focus();
        return false;
    }

    if (!user_pwd.value.trim()) {
        alert('비밀번호를 입력해주세요.');
        user_pwd.focus();
        return false;
    }

    return true;
};

const handleSubmit = async (e) => {
    e.preventDefault(); // 기본 폼 제출 방지

    // 입력값 검증
    if (!validate()) {
        return;
    }

    // 로그인 데이터 생성
    const formData = new FormData(form);

    try {
        const response = await fetch(API_URL, {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        alert(result.message); // 서버에서 받은 메시지 출력

        if (result.success) {
            window.location.href = "/"; // 로그인 성공 시 메인 페이지로 이동 (필요시 변경 가능)
        }
    } catch (error) {
        alert('로그인 처리 중 오류가 발생했습니다.');
        console.error(error);
    }
};

form.addEventListener('submit', handleSubmit);
</script>