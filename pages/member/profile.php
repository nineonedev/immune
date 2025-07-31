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
                        <section class="no-inquiry-wrap no-member-profile no-pd-48--y no-mg-48--t">
                            <div class="no-container-sm">
                                <hgroup class="--tac no-mg-24--b">
                                    <h2 class="no-heading-sm">프로필 정보관리</h2>
                                </hgroup>

                                <ul class="find-list no-mg-24--b">
                                    <li>
                                        <a href="../member/profile.php" class="no-member-btn no-body-md --tac active">프로필 정보관리</a>
                                    </li>
                                    <li>
                                        <a href="../member/pwd_change.php" class="no-member-btn no-body-md --tac">비밀번호 변경</a>
                                    </li>
                                </ul>

                                <form id="profileForm" method="post">
                                    <fieldset>
                                        <ul class="form-wrap">
                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">아이디</p>
                                                </div>
                                                <input type="text" disabled name="user_id" id="user_id" class="disable">
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">이름</p>
                                                </div>
                                                <input type="text" name="user_name" id="user_name">
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">연락처</p>
                                                </div>
                                                <input type="text" name="user_phone" id="user_phone">
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">이메일</p>
                                                </div>
                                                <input type="email" name="user_email" id="user_email">
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">생년월일</p>
                                                </div>
                                                <input type="text" name="user_birth" id="user_birth">
                                            </li>
                                        </ul>

                                        <button type="button" onclick="doProfile();" class="submit no-body-lg fw600 no-mg-16--t">
                                            정보 수정
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