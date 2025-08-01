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

                        <section class="no-inquiry-wrap no-member-pwdchange no-pd-48--y no-mg-48--t">

                            <div class="no-container-sm">

                                <hgroup class="--tac no-mg-24--b">

                                    <h2 class="no-heading-sm">프로필 정보관리</h2>

                                </hgroup>



                                <ul class="find-list no-mg-24--b">

                                    <li>

                                        <a href="../member/profile.php" class="no-member-btn no-body-md --tac">프로필
                                            정보관리</a>

                                    </li>

                                    <li>

                                        <a href="../member/pwd_change.php"
                                            class="no-member-btn no-body-md --tac active">비밀번호 변경</a>

                                    </li>

                                </ul>



                                <form id="profileForm" method="post">

                                    <fieldset>

                                        <ul class="form-wrap">

                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">현재 비밀번호</p>

                                                </div>

                                                <input type="password" name="pwd_old" id="pwd_old">

                                            </li>



                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">신규 비밀번호</p>

                                                </div>

                                                <input type="password" name="pwd_new" id="pwd_new">

                                            </li>



                                            <li class="input-wrap">

                                                <div class="f-wrap">

                                                    <p class="no-body-lg fw600">신규 비밀번호 재확인</p>

                                                </div>

                                                <input type="password" name="pwd_new_confirm" id="pwd_new_confirm">

                                            </li>

                                        </ul>



                                        <button type="submit" class="submit no-body-lg fw600 no-mg-16--t">

                                            비밀번호 수정

                                        </button>

                                    </fieldset>

                                </form>

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
const form = document.getElementById('profileForm');
const API_URL = '/module/ajax/change_password.php';

const validate = () => {
    const pwd_old = document.getElementById('pwd_old');
    const pwd_new = document.getElementById('pwd_new');
    const pwd_new_confirm = document.getElementById('pwd_new_confirm');

    if (!pwd_old.value.trim()) {
        alert('현재 비밀번호를 입력해주세요.');
        pwd_old.focus();
        return false;
    }

    if (!pwd_new.value.trim()) {
        alert('신규 비밀번호를 입력해주세요.');
        pwd_new.focus();
        return false;
    }

    if (!pwd_new_confirm.value.trim()) {
        alert('신규 비밀번호 확인을 입력해주세요.');
        pwd_new_confirm.focus();
        return false;
    }

    if (pwd_new.value !== pwd_new_confirm.value) {
        alert('신규 비밀번호와 재확인 값이 일치하지 않습니다.');
        pwd_new_confirm.focus();
        return false;
    }

    if (pwd_old.value === pwd_new.value) {
        alert('기존 비밀번호와 다른 비밀번호를 입력해주세요.');
        pwd_new.focus();
        return false;
    }

    return true;
};

const handleSubmit = async (e) => {
    e.preventDefault();

    if (!validate()) return;

    const formData = new FormData(form);

    try {
        const response = await fetch(API_URL, {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        alert(result.message);

        if (result.success) {
            form.reset();
            // 필요 시 리다이렉트 가능
            // window.location.href = '/member/logout.php';
        }
    } catch (error) {
        console.error('비밀번호 변경 오류:', error);
        alert('비밀번호 변경 중 오류가 발생했습니다.');
    }
};

form.addEventListener('submit', handleSubmit);
</script>