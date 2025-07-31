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
                        <section class="no-inquiry-wrap no-member-findpwd no-pd-48--y no-mg-48--t">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-24--b">
                                    <h2 class="no-heading-sm">아이디 / 비밀번호찾기</h2>
                                </hgroup>

                                <ul class="find-list no-mg-24--b">
                                    <li>
                                        <a href="../member/find_id.php" class="no-member-btn no-body-md --tac">아이디 찾기</a>
                                    </li>
                                    <li>
                                        <a href="../member/find_pwd.php" class="no-member-btn no-body-md --tac active">비밀번호 찾기</a>
                                    </li>
                                </ul>

                                <form id="loginFindId" method="post">
                                    <fieldset>
                                        <ul class="form-wrap">
                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">이름</p>
                                                </div>
                                                <input type="text" name="user_name" id="user_name" class="no-input">
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">아이디</p>
                                                </div>
                                                <input type="text" name="user_id" id="user_id" class="no-input">
                                            </li>
                                        </ul>

                                        <button type="button" onclick="doFindPwd();" class="submit no-body-lg fw600 no-mg-16--t">
                                            비밀번호 찾기
                                        </button>
                                    </fieldset>
                                </form>

                                <a href="../member/login.php" class="move-btn no-body-xs fw300 no-mg-16--y wblack --tac">로그인</a>
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