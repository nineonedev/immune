<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<?php
    $db = DB::getInstance();
    $user = null;
    // 세션 검사
    if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id']; // ← 수정: 세션의 'id' 사용

    $is_kakao = isset($_SESSION['kakao_id']) && !empty($_SESSION['kakao_id']);

    $stmt = $db->prepare("SELECT * FROM nb_users WHERE id = :id");
    $stmt->execute([':id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("회원 정보를 찾을 수 없습니다.");
    }
    } else {
        die("로그인이 필요합니다.");
    }

?>

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
                                        <a href="../member/profile.php"
                                            class="no-member-btn no-body-md --tac active">프로필 정보관리</a>
                                    </li>

                                    <?php if (!isset($_SESSION['kakao_id'])): ?>
                                    <li>
                                        <a href="../member/pwd_change.php" class="no-member-btn no-body-md --tac">비밀번호
                                            변경</a>
                                    </li>
                                    <?php endif; ?>

                                </ul>



                                <form id="profileForm" method="post">

                                    <fieldset>

                                        <ul class="form-wrap">

                                            <!-- 아이디 -->
                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">아이디</p>
                                                </div>
                                                <input type="text" disabled name="user_id" id="user_id" class="disable"
                                                    value="<?= $is_kakao ? '카카오 로그인' : htmlspecialchars($user['user_id']) ?>">
                                            </li>

                                            <?php if ($is_kakao): ?>
                                            <!-- 카카오 닉네임 정보 (표시용) -->
                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">카카오 닉네임</p>
                                                </div>
                                                <input type="text" disabled
                                                    value="<?= htmlspecialchars($user['kakao_nickname'] ?? '카카오 회원') ?>">
                                            </li>
                                            <?php endif; ?>

                                            <!-- 이름 (항상 표시) -->
                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">이름</p>
                                                </div>
                                                <input type="text" name="name" id="name"
                                                    value="<?= htmlspecialchars($user['name']) ?>">
                                            </li>

                                            <?php if (!$is_kakao): ?>
                                            <!-- 일반 사용자만 표시 -->
                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">연락처</p>
                                                </div>
                                                <input type="text" name="phone" id="phone"
                                                    value="<?= htmlspecialchars($user['phone']) ?>">
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">이메일</p>
                                                </div>
                                                <input type="email" name="email" id="email"
                                                    value="<?= htmlspecialchars($user['email']) ?>">
                                            </li>

                                            <li class="input-wrap">
                                                <div class="f-wrap">
                                                    <p class="no-body-lg fw600">생년월일</p>
                                                </div>
                                                <input type="text" name="birth" id="birth"
                                                    value="<?= htmlspecialchars($user['birth'] ?? '') ?>">
                                            </li>
                                            <?php endif; ?>
                                        </ul>


                                        <button type="submit" class="submit no-body-lg fw600 no-mg-16--t">
                                            정보 수정
                                        </button>

                                        <button type="button" id="delete-account-btn"
                                            class="submit no-body-lg fw600 no-mg-16--t">
                                            회원탈퇴
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
const deleteBtn = document.getElementById('delete-account-btn');
const API_UPDATE_URL = '/module/ajax/update_profile.php';
const API_DELETE_URL = '/module/ajax/delete.account.php';
const isKakao = <?= json_encode($is_kakao) ?>;

const validateForm = () => {
    const name = document.getElementById('name');
    if (!name.value.trim()) {
        alert('이름을 입력해주세요.');
        name.focus();
        return false;
    }

    if (!isKakao) {
        const email = document.getElementById('email');
        const phone = document.getElementById('phone');

        if (!email.value.trim()) {
            alert('이메일을 입력해주세요.');
            email.focus();
            return false;
        }

        if (!phone.value.trim()) {
            alert('연락처를 입력해주세요.');
            phone.focus();
            return false;
        }
    }

    return true;
};

const handleProfileSubmit = async (e) => {
    e.preventDefault();

    if (!validateForm()) return;

    try {
        const formData = new FormData(form);
        const response = await fetch(API_UPDATE_URL, {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        alert(result.message);

        if (result.success) {
            window.location.reload();
        }
    } catch (err) {
        console.error('정보 수정 오류:', err);
        alert('정보 수정 중 오류가 발생했습니다.');
    }
};

const handleAccountDelete = async () => {
    const confirmed = confirm('정말로 회원탈퇴 하시겠습니까?');
    if (!confirmed) return;

    try {
        const response = await fetch(API_DELETE_URL, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        });

        const result = await response.json();
        alert(result.message);

        if (result.success) {
            window.location.href = '/';
        }
    } catch (err) {
        console.error('회원탈퇴 오류:', err);
        alert('회원탈퇴 중 오류가 발생했습니다.');
    }
};

form?.addEventListener('submit', handleProfileSubmit);
deleteBtn?.addEventListener('click', handleAccountDelete);
</script>