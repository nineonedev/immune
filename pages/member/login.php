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
                                                <input type="password" name="user_pwd" id="user_pwd" class="no-input">
                                            </li>
                                        </ul>

                                        <button type="button" onclick="doLogin();" class="submit no-body-lg fw600 no-mg-16--t">
                                            로그인
                                        </button>
                                    </fieldset>
                                </form>

                                <a href="../member/find_id.php" class="move-btn no-body-xs fw300 no-mg-16--y wblack --tac">아이디 / 비밀번호 찾기</a>

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