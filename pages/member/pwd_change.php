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
                                        <a href="../member/profile.php" class="no-member-btn no-body-md --tac">프로필 정보관리</a>
                                    </li>
                                    <li>
                                        <a href="../member/pwd_change.php" class="no-member-btn no-body-md --tac active">비밀번호 변경</a>
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

                                        <button type="button" onclick="doPwdChange();" class="submit no-body-lg fw600 no-mg-16--t">
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