<?php

    $inquiry_title = isset($inquiry_types[$inquiry_type_key])
    ? $inquiry_types[$inquiry_type_key]
    : '상담신청'; 

    try {
        $db = DB::getInstance(); 
        $branches = [];
        $stmt = $db->query("SELECT * FROM nb_branches ORDER BY id ASC");
        $branches = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "데이터베이스 연결 오류: " . $e->getMessage();
        exit;
    }

?>

<div class="herb-form product-inquiry">

    <div class="top-wrap no-pd-48--t">

        <i class="fa-solid fa-xmark-large close"></i>

        <h2 class="no-heading-sl --tac"><?=$inquiry_title?> 상담신청</h2>
    </div>


    <div class="no-container-sm">

        <div class="form-guide bg --tac ">

            <h3 class="no-body-md">비대면 상담의 특성상<br>

                구체적인 정보를 요청 드리고 있습니다.</h3>



            <b class="no-body-md fw600">작성 시간이 길어질 수 있는 점을<br>

                이해해 주시면 감사하겠습니다.</b>


            <p class="brown fw600 no-body-xs">(소요시간 약 2분)</p>

        </div>



        <form id="herbForm" name="herbForm" method="post">
            <input type="hidden" name="inquiry_type" value="<?= $inquiry_type_key ?>">
            <input type="hidden" name="mode" id="mode" value="inquiry_herb">

            <fieldset>

                <input type="hidden" id="inquiry_subject" name="inquiry_subject" value="공진단 상담신청">



                <div class="form-wrap">

                    <h6 class="no-body-xs fw600">인적사항</h6>

                    <!-- 성명 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">성명<b class="error fw300">*</b></h3>

                        <input type="text" name="name" id="name" placeholder="성명">

                    </div>

                    <!-- 생년월일 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">생년월일<b class="error fw300">*</b></h3>

                        <input type="text" name="birth" id="birth" maxlength="6" placeholder="숫자만 입력해주세요. ex) 020102">

                    </div>

                    <!-- 성별 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">성별<b class="error fw300">*</b></h3>

                        <div class="grid-wrap">

                            <?php foreach ($gender_options as $value => $label): ?>
                            <label>
                                <input type="radio" name="gender" value="<?= $value ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <!-- 키, 몸무게 -->

                    <div class="grid-wrap">

                        <div class="input-wrap">

                            <h3 class="no-body-lg fw600">현재 키(cm)<b class="error fw300">*</b></h3>

                            <input type="number" name="height" id="height" placeholder="현재 키(cm)">

                        </div>



                        <div class="input-wrap">

                            <h3 class="no-body-lg fw600">현재 체중(kg)<b class="error fw300">*</b></h3>

                            <input type="number" name="weight" id="weight" placeholder="현재 키(kg)">

                        </div>

                    </div>

                    <!-- 연락처 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">상담 가능한 연락처<b class="error fw300">*</b></h3>

                        <input type="text" name="phone" id="phone" maxlength="11" inputmode="numeric" pattern="\d*"
                            placeholder="숫자만 입력해주세요. ex) 01012345678">

                    </div>

                    <!-- 상담가능시간 -->


                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b">상담 가능 시간<b class="error fw300">*</b></h3>

                        <?php foreach ($product_consult_time_options as $value => $label): ?>
                        <label class="no-mg-8--b">
                            <input type="radio" name="consult_time" value="<?= $value ?>">
                            <span><?= $label ?></span>
                        </label>
                        <?php endforeach; ?>

                    </div>

                    <!-- 방문이력 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">저희 병원은 처음이세요?<b class="error fw300">*</b></h3>

                        <div class="grid-wrap">

                            <?php foreach ($first_visit_options as $value => $label): ?>
                            <label>
                                <input type="radio" name="first_visit" value="<?= $value ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>
                    </div>

                    <!-- 재구매인경우 -->

                    <div class="radio-wrap spot-radio" style="display: none;">

                        <h3 class="no-body-lg fw600">재구매인 경우, 상담받은 지점</h3>

                        <div class="grid-wrap v2">

                            <?php foreach ($branches as $branch): ?>
                            <label>
                                <input type="radio" name="branch_id" value="<?= $branch['id'] ?>">
                                <span><?= htmlspecialchars($branch['name_kr']) ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <!-- 치료내역, 복용약물 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">과거 또는 현재 치료내역, 복용중인 약물을 모두 작성해주세요.</h3>

                        <textarea name="treatment" id="treatment" placeholder="ex) 암, 갑상선질환, 자궁근종, 우울증 등"></textarea>

                    </div>

                    <!-- 증상 설명 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">앓고 계시는 증상을 간략하게 작성해 주세요.</h3>

                        <textarea name="symptoms" id="symptoms"></textarea>

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">식욕 • 기호 • 음주습관 진단</h6>



                    <!-- 식욕 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">식욕<b class="error fw400 no-body-xs">중복 선택 가능</b></h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="appetite[]" value="골고루 잘 먹는 편이다">

                            <span>골고루 잘 먹는 편이다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="appetite[]" value="입맛이 없다">

                            <span>입맛이 없다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="appetite[]" value="최근 살이 찌고 있다">

                            <span>최근 살이 찌고 있다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="appetite[]" value="최근 살이 빠지고 있다">

                            <span>최근 살이 빠지고 있다</span>

                        </label>

                    </div>

                    <!-- 음주습관 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">음주습관</h3>

                        <input type="text" name="drink" id="drink" placeholder="ex) 소주 1주일에 2회, 주량 2병">

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">소화기 진단</h6>



                    <!-- 소화 상태-->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            소화 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="digestion[]" value="소화가 잘 된다">

                            <span>소화가 잘 된다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="digestion[]" value="속이 더부룩 하다">

                            <span>속이 더부룩 하다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="digestion[]" value="잘 체하는 편이다">

                            <span>잘 체하는 편이다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="digestion[]" value="트림을 자주 한다">

                            <span>트림을 자주 한다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="digestion[]" value="속이 쓰린 편이다">

                            <span>속이 쓰린 편이다</span>

                        </label>

                    </div>

                    <!-- 소화불량 주기 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">소화가 안 된다면</h3>



                        <div class="grid-wrap">

                            <?php foreach ($indigest_options as $value => $label): ?>
                            <label>
                                <input type="radio" name="indigest" value="<?= $value ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <!-- 복부 통증 시기 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">배가 자주 아프다면</h3>



                        <div class="grid-wrap v3">

                            <?php foreach ($belly_pain_options as $value => $label): ?>
                            <label>
                                <input type="radio" name="belly_pain" value="<?= $value ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>


                        </div>

                    </div>

                    <!-- 통증 이유 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">속이 쓰리다면</h3>



                        <div class="grid-wrap">
                            <?php foreach ($reason_options as $value => $label): ?>
                            <label>
                                <input type="radio" name="reason" value="<?= $value ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">대 • 소변 진단</h6>



                    <!-- 대변 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">대변<b class="error fw400 no-body-xs">중복 선택 가능</b></h3>



                        <div class="input-wrap no-mg-8--b">

                            <input type="text" name="feces_time" id="feces_time"
                                placeholder="(    )일에 (    )번 정도 대변을 본다">

                        </div>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="feces[]" value="대변을 보고 난 후 시원하다">

                            <span>대변을 보고 난 후 시원하다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="feces[]" value="대변을 보고 난 후 시원하지 않다">

                            <span>대변을 보고 난 후 시원하지 않다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="feces[]" value="물 같은 설사가 잦다">

                            <span>물 같은 설사가 잦다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="feces[]" value="찬 것을 먹으면 설사를 잘한다">

                            <span>찬 것을 먹으면 설사를 잘한다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="feces[]" value="아랫배에 가스가 잘 찬다">

                            <span>아랫배에 가스가 잘 찬다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="feces[]" value="복부 통증이 있다">

                            <span>복부 통증이 있다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="feces[]" value="복부 팽만감이 있다">

                            <span>복부 팽만감이 있다</span>

                        </label>

                    </div>



                    <!-- 소변 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">소변<b class="error fw400 no-body-xs">중복 선택 가능</b></h3>



                        <div class="input-wrap no-mg-8--b">

                            <input type="text" name="urine_time" id="urine_time" placeholder="1일에 (    )번 정도 소변을 본다">

                        </div>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="urine[]" value="소변을 시원하게 본다">

                            <span>소변을 시원하게 본다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="urine[]" value="소변을 보고 난 후 시원하지 않다">

                            <span>소변을 보고 난 후 시원하지 않다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="urine[]" value="소변을 참기가 어렵다">

                            <span>소변을 참기가 어렵다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="urine[]" value="소변이 잘 안 나오거나 방울방울 떨어진다">

                            <span>소변이 잘 안 나오거나 방울방울 떨어진다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="urine[]" value="소변을 보고 난 후 통증을 느낀다">

                            <span>소변을 보고 난 후 통증을 느낀다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="urine[]" value="수면 도중 잠에서 깨어 소변을 2회이상 본다">

                            <span>수면 도중 잠에서 깨어 소변을 2회이상 본다</span>

                        </label>

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">수면 진단</h6>



                    <!-- 수면 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            수면 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="sleep[]" value="잠을 잘 잔다">

                            <span>잠을 잘 잔다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="sleep[]" value="잠이 잘 들지 않는다">

                            <span>잠이 잘 들지 않는다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="sleep[]" value="중간에 잠에서 잘 깨고 잠들지 못한다">

                            <span>중간에 잠에서 잘 깨고 잠들지 못한다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="sleep[]" value="수면제나 안정제를 복용중이다">

                            <span>수면제나 안정제를 복용중이다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="sleep[]" value="아침에 일어난 이후에도 한참동안 몽롱하다">

                            <span>아침에 일어난 이후에도 한참동안 몽롱하다</span>

                        </label>

                    </div>

                </div>



                <button type="button" class="submit no-body-lg fw600 no-mg-20--t" id="submitHerbForm">
                    제출하기
                </button>




            </fieldset>

        </form>

    </div>

</div>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("herbForm");
    const submitBtn = document.getElementById("submitHerbForm");
    const requestUrl = "/module/ajax/request.herb.process.php";

    submitBtn.addEventListener("click", async () => {
        const formData = new FormData(form);

        // 필수 항목 체크 (공통)
        const requiredFields = ["name", "birth", "gender", "height", "weight", "phone",
            "consult_time", "first_visit"
        ];
        for (const field of requiredFields) {
            const value = formData.get(field);
            if (!value || value.trim() === "") {
                alert("필수 항목을 모두 입력해주세요.");
                return;
            }
        }

        // 재방문인 경우 branch_id 필수
        if (formData.get("first_visit") === "0") {
            const branchId = formData.get("branch_id");
            if (!branchId) {
                alert("상담받은 지점을 선택해주세요.");
                return;
            }
        }

        try {
            const response = await fetch(requestUrl, {
                method: "POST",
                body: formData,
            });

            const result = await response.json();

            if (result.result === "success") {
                alert(result.msg || "문의가 정상적으로 접수되었습니다.");
                location.reload();
            } else {
                alert(result.msg || "처리 중 오류가 발생했습니다.");
            }
        } catch (error) {
            console.error("Fetch Error:", error);
            alert("서버 통신 중 오류가 발생했습니다.");
        }
    });
});
</script>