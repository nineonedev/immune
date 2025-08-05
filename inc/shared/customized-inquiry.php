<?php
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

<div class="herb-form customized-inquiry">

    <div class="top-wrap no-pd-48--t">

        <i class="fa-solid fa-xmark-large close"></i>



        <h2 class="no-heading-sl --tac">개인맞춤한약 예진표</h2>

    </div>



    <div class="no-container-sm">

        <div class="form-guide bg --tac ">

            <h3 class="no-body-md">비대면 상담의 특성상<br>

                구체적인 정보를 요청 드리고 있습니다.</h3>



            <b class="no-body-md fw600">작성 시간이 길어질 수 있는 점을<br>

                이해해 주시면 감사하겠습니다.</b>



            <p class="brown fw600 no-body-xs">(소요시간 약 5분)</p>

        </div>



        <form id="customForm" name="customForm" method="post">
            <input type="hidden" name="mode" id="mode" value="custom_inquiry">
            <fieldset>


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

                    <!-- 직업 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">직업<b class="error fw300">*</b></h3>

                        <input type="text" name="job" id="job">

                    </div>

                    <!-- 성별 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">성별<b class="error fw300">*</b></h3>


                        <div class="grid-wrap">

                            <?php foreach ($gender_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="gender" value="<?= $key ?>">
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

                        <input type="text" name="phone" id="phone" maxlength="11"
                            placeholder="숫자만 입력해주세요. ex) 01012345678">

                    </div>

                    <!-- 상담가능시간 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b">상담 가능 시간<b class="error fw300">*</b></h3>

                        <?php foreach ($product_consult_time_options as $key => $label): ?>
                        <label class="no-mg-8--b">
                            <input type="radio" name="consult_time" value="<?= $key ?>">
                            <span><?= $label ?></span>
                        </label>
                        <?php endforeach; ?>

                    </div>

                    <!-- 방문이력 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">저희 병원은 처음이세요?<b class="error fw300">*</b></h3>

                        <div class="grid-wrap">

                            <?php foreach ($first_visit_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="first_visit" value="<?= $key ?>">
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

                            <input type="checkbox" name="appetite[]" value="한 번에 먹는 양이 많다">

                            <span>한 번에 먹는 양이 많다</span>

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

                            <?php foreach ($indigest_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="indigest" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <!-- 복부 통증 시기 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">배가 자주 아프다면</h3>

                        <div class="grid-wrap v3">

                            <?php foreach ($belly_pain_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="belly_pain" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>


                        </div>

                    </div>

                    <!-- 통증 이유 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">속이 쓰리다면</h3>

                        <div class="grid-wrap">

                            <?php foreach ($reason_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="reason" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>


                        </div>

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">수분섭취</h6>

                    <!-- 1일 음수량 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">1일 음수량 <span class="no-body-md fw400"
                                style="margin-top: auto">(음료수, 우유, 커피 등 포함 모든 수분)</span></h3>



                        <div class="grid-wrap v2">

                            <?php foreach ($drink_amount_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="drink_amount" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>



                    <!-- 수분 섭취 습관 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">수분 섭취 습관<b class="error fw400 no-body-xs">중복 선택
                                가능</b></h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="water[]" value="찬물을 좋아한다">

                            <span>찬물을 좋아한다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="water[]" value="따듯한 물을 좋아한다">

                            <span>따듯한 물을 좋아한다</span>

                        </label>

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

                    <h6 class="no-body-xs fw600">발한(땀) 상태 진단</h6>



                    <!-- 땀 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            땀 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="sweat[]" value="땀이 잘 난다">

                            <span>땀이 잘 난다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="sweat[]" value="땀이 잘 안 난다">

                            <span>땀이 잘 안 난다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="sweat[]" value="땀을 내면 기분이 좋다">

                            <span>땀을 내면 기분이 좋다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="sweat[]" value="땀을 내면 지친다">

                            <span>땀을 내면 지친다</span>

                        </label>

                    </div>



                    <!-- 땀 부위 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            신체 일부분에서 땀이 잘 난다면 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <div class="grid-wrap">

                            <label>

                                <input type="checkbox" name="sweat_part[]" value="얼굴">

                                <span>얼굴</span>

                            </label>



                            <label>

                                <input type="checkbox" name="sweat_part[]" value="가슴">

                                <span>가슴</span>

                            </label>



                            <label>

                                <input type="checkbox" name="sweat_part[]" value="뒷목과 등">

                                <span>뒷목과 등</span>

                            </label>



                            <label>

                                <input type="checkbox" name="sweat_part[]" value="겨드랑이">

                                <span>겨드랑이</span>

                            </label>



                            <label>

                                <input type="checkbox" name="sweat_part[]" value="손바닥">

                                <span>손바닥</span>

                            </label>



                            <label>

                                <input type="checkbox" name="sweat_part[]" value="발바닥">

                                <span>발바닥</span>

                            </label>

                        </div>

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">체온 민감도 진단</h6>



                    <!-- 체온 민감도 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            체온 민감도 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="temperature[]" value="더위를 못 참는다">

                            <span>더위를 못 참는다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="temperature[]" value="추위를 못 참는다">

                            <span>추위를 못 참는다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="temperature[]" value="에어컨, 선풍기를 쐬는 것이 싫다">

                            <span>에어컨, 선풍기를 쐬는 것이 싫다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="temperature[]" value="체온 변화가 심하다">

                            <span>체온 변화가 심하다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="temperature[]" value="열이 머리 위로 확 오를 때가 있다">

                            <span>열이 머리 위로 확 오를 때가 있다</span>

                        </label>

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">두통 • 어지럼증 진단</h6>



                    <!-- 두통 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">두통이 자주 있다면</h3>

                        <input type="text" name="headache" id="headache" placeholder="언제, 어떻게 두통이 있는지 작성해 주세요.">

                    </div>



                    <!-- 어지럼증 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">자주 어지럽다면</h3>

                        <input type="text" name="dizzy" id="dizzy" placeholder="언제, 어떻게 어지러움 증상이 있는지 작성해 주세요.">

                    </div>



                    <!-- 두면, 이비인후 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            두면, 이비인후 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="ent[]" value="편도가 자주 붓는다">

                            <span>편도가 자주 붓는다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="ent[]" value="입안이 자주 헌다">

                            <span>입안이 자주 헌다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="ent[]" value="목에 뭔가 걸린 느낌을 자주 받는다">

                            <span>목에 뭔가 걸린 느낌을 자주 받는다</span>

                        </label>

                    </div>

                    <!-- 호흡기 증상 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            호흡기 증상이 잘 생긴다면

                            <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <div class="grid-wrap">

                            <label>

                                <input type="checkbox" name="resp[]" value="기침">

                                <span>기침</span>

                            </label>



                            <label>

                                <input type="checkbox" name="resp[]" value="재채기">

                                <span>재채기</span>

                            </label>



                            <label>

                                <input type="checkbox" name="resp[]" value="콧물">

                                <span>콧물</span>

                            </label>



                            <label>

                                <input type="checkbox" name="resp[]" value="코막힘">

                                <span>코막힘</span>

                            </label>

                        </div>

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">심폐능력 진단</h6>



                    <!-- 흉부 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            흉부 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="chest[]" value="심장이 자주 두근거린다">

                            <span>심장이 자주 두근거린다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="chest[]" value="가슴이 자주 답답하다">

                            <span>가슴이 자주 답답하다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="chest[]" value="조금만 움직여도 숨이 찬다">

                            <span>조금만 움직여도 숨이 찬다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="chest[]" value="한숨을 자주 쉰다">

                            <span>한숨을 자주 쉰다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="chest[]" value="숨을 들이쉴 때 힘들다">

                            <span>숨을 들이쉴 때 힘들다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="chest[]" value="숨을 내쉴 때 힘들다">

                            <span>숨을 내쉴 때 힘들다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="chest[]" value="불안감을 느낄 때가 자주 있다">

                            <span>불안감을 느낄 때가 자주 있다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="chest[]" value="가슴이 뻐근하거나 따끔거리는 통증을 자주 느낀다">

                            <span>가슴이 뻐근하거나 따끔거리는 통증을 자주 느낀다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="chest[]" value="가슴을 조이는 옷(목폴라, 넥타이, 브래지어 등)은 답답해서 싫다">

                            <span>가슴을 조이는 옷(목폴라, 넥타이, 브래지어 등)은 답답해서 싫다</span>

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



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">손발 • 신체 상태 진단</h6>



                    <!-- 손의 온도 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">손의 온도</h3>

                        <div class="grid-wrap">

                            <?php foreach ($hand_temp_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="hand_temp" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <!-- 발의 온도 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">발의 온도</h3>

                        <div class="grid-wrap">

                            <?php foreach ($foot_temp_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="foot_temp" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <!-- 잘 붓는 신체 부위 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">잘 붓는 신체 부위</h3>

                        <div class="grid-wrap">

                            <?php foreach ($swelling_area_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="swelling_area" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <!-- 하루 중 붓기가 가장 심한 시간 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">하루 중 붓기가 가장 심한 시간</h3>

                        <div class="grid-wrap v2">

                            <?php foreach ($swelling_time_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="swelling_time" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>

                        </div>

                    </div>

                    <!-- 손발, 신체, 피부 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            손발, 신체, 피부 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="body_skin[]" value="손발이 자주 저리다">

                            <span>손발이 자주 저리다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="body_skin[]" value="손발이 자주 뻣뻣하다">

                            <span>손발이 자주 뻣뻣하다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="body_skin[]" value="쥐가 잘 나는 편이다">

                            <span>쥐가 잘 나는 편이다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="body_skin[]" value="피부 감각이 내 살 같지 않은 부분이 있다">

                            <span>피부 감각이 내 살 같지 않은 부분이 있다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="body_skin[]" value="피곤할 때 눈꺼풀, 입 주위나 몸의 어딘가의 근육이 자주 떨린다">

                            <span>피곤할 때 눈꺼풀, 입 주위나 몸의 어딘가의 근육이 자주 떨린다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="body_skin[]" value="음식을 먹고 자주 두드러기가 난다">

                            <span>음식을 먹고 자주 두드러기가 난다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="body_skin[]" value="어딘가 부딪히지 않아도 멍이 잘 생긴다">

                            <span>어딘가 부딪히지 않아도 멍이 잘 생긴다</span>

                        </label>

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">통증 상세 진단</h6>



                    <!-- 통증 상세 진단 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            통증을 느끼는 부위 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>

                        <div class="grid-wrap v2">

                            <label><input type="checkbox" name="pain_area[]" value="뒷목"><span>뒷목</span></label>

                            <label><input type="checkbox" name="pain_area[]" value="어깨"><span>어깨</span></label>

                            <label><input type="checkbox" name="pain_area[]" value="팔"><span>팔</span></label>



                            <label><input type="checkbox" name="pain_area[]" value="손목"><span>손목</span></label>

                            <label><input type="checkbox" name="pain_area[]" value="손가락"><span>손가락</span></label>

                            <label><input type="checkbox" name="pain_area[]" value="다리"><span>다리</span></label>



                            <label><input type="checkbox" name="pain_area[]" value="무릎"><span>무릎</span></label>

                            <label><input type="checkbox" name="pain_area[]" value="발목"><span>발목</span></label>

                            <label><input type="checkbox" name="pain_area[]" value="발가락"><span>발가락</span></label>



                            <label><input type="checkbox" name="pain_area[]" value="등"><span>등</span></label>

                            <label><input type="checkbox" name="pain_area[]" value="허리"><span>허리</span></label>

                            <label><input type="checkbox" name="pain_area[]" value="엉치"><span>엉치</span></label>

                        </div>

                    </div>

                    <!-- 통증을 느끼는 상황 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            통증을 느끼는 상황 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="pain_condition[]" value="찬 기운이 닿으면 아파지는 곳이 있다">

                            <span>찬 기운이 닿으면 아파지는 곳이 있다</span>

                        </label>



                        <label>

                            <input type="checkbox" name="pain_condition[]" value="아픈 곳이 부으면서 통증이 있다">

                            <span>아픈 곳이 부으면서 통증이 있다</span>

                        </label>

                    </div>

                    <!-- 그 외 통증 -->

                    <div class="input-wrap">

                        <h3 class="no-body-lg fw600">그 외 통증을 느낀다면</h3>

                        <input type="text" name="pain_etc" id="pain_etc"
                            placeholder="답변하신 부분 외 통증을 느끼는 부위가 있다면 작성해 주세요.">

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">여성 건강 진단</h6>

                    <!-- 출산 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600">출산</h3>

                        <div class="grid-wrap v4">
                            <?php foreach ($birth_exp_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="birth_exp" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>
                            <input type="text" name="birth_count" class="inline-input birth-count" placeholder="( )회"
                                disabled>
                        </div>

                    </div>

                    <!-- 유산 -->

                    <div class="radio-wrap">
                        <h3 class="no-body-lg fw600">유산</h3>
                        <div class="grid-wrap v4">
                            <?php foreach ($miscarriage_exp_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="miscarriage_exp" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php endforeach; ?>
                            <input type="text" name="miscarriage_count" class="inline-input miscarriage-count"
                                placeholder="( )회" disabled>
                        </div>
                    </div>


                    <!-- 생리주기 -->

                    <div class="radio-wrap">
                        <h3 class="no-body-lg fw600">생리주기</h3>
                        <div class="grid-wrap v3">
                            <?php foreach ($menstrual_status_options as $key => $label): ?>
                            <label>
                                <input type="radio" name="menstrual_status" value="<?= $key ?>">
                                <span><?= $label ?></span>
                            </label>
                            <?php if ($key == 1): ?>
                            <input type="text" name="menstrual_cycle" placeholder="( )일"
                                class="inline-input menstrual-cycle" disabled>
                            <?php elseif ($key == 3): ?>
                            <input type="text" name="menopause_age" placeholder="폐경 ( )세"
                                class="inline-input menopause-age" disabled>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!--  생리통 부위 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 v2">

                            생리통이 심하다면 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>

                        <div class="grid-wrap v2">

                            <label>

                                <input type="checkbox" name="pain_menstrual[]" value="하복통"><span>하복통</span>

                            </label>

                            <label>

                                <input type="checkbox" name="pain_menstrual[]" value="요통"><span>요통</span>

                            </label>

                            <label>

                                <input type="checkbox" name="pain_menstrual[]" value="두통"><span>두통</span>

                            </label>

                            <label>

                                <input type="checkbox" name="pain_menstrual[]" value="기타"
                                    class="etc-toggle"><span>기타</span>

                            </label>

                            <input type="text" class="inline-input pain-mens-etc" placeholder="기타 부위 작성" disabled
                                name="pain_mens_etc" id="pain_mens_etc">

                        </div>

                    </div>

                    <!--  여성 건강 특이사항 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 v2">

                            그외 특이사항 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>

                        <label class="no-mg-8--t">

                            <input type="checkbox" name="pain_special[]" value="냉이 있다"><span>냉이 있다</span>

                        </label>

                        <label class="no-mg-8--t">

                            <input type="checkbox" name="pain_special[]" value="소변을 본 후 통증이 있다"><span>소변을 본 후 통증이
                                있다</span>

                        </label>

                        <label class="no-mg-8--t">

                            <input type="checkbox" name="pain_special[]" value="생리 전 주체할 수 없이 식욕이 생긴다"><span>생리 전 주체할 수
                                없이 식욕이 생긴다</span>

                        </label>

                    </div>

                </div>



                <div class="form-wrap no-mg-48--t">

                    <h6 class="no-body-xs fw600">남성 건강 진단</h6>



                    <!-- 남성 건강 -->

                    <div class="radio-wrap">

                        <h3 class="no-body-lg fw600 no-mg-8--b v2">

                            남성 건강 진단 <b class="error fw400 no-body-xs">중복 선택 가능</b>

                        </h3>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="men_health[]" value="발기력이 떨어진다">

                            <span>발기력이 떨어진다</span>

                        </label>



                        <label class="no-mg-8--b">

                            <input type="checkbox" name="men_health[]" value="조루증상이 있다">

                            <span>조루증상이 있다</span>

                        </label>

                    </div>

                </div>



                <button type="button" id="submitCustomForm" class="submit no-body-lg fw600 no-mg-20--t">
                    제출하기
                </button>



            </fieldset>

        </form>

    </div>

</div>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("customForm");
    const submitBtn = document.getElementById("submitCustomForm");
    const requestUrl = "/module/ajax/request.custom.process.php";

    submitBtn.addEventListener("click", async () => {
        const formData = new FormData(form);

        const requiredFields = [
            "name", "birth", "job", "gender",
            "height", "weight", "phone",
            "consult_time", "first_visit"
        ];
        for (const field of requiredFields) {
            const value = formData.get(field);
            if (!value || value.trim() === "") {
                alert("필수 항목을 모두 입력해주세요.");
                return;
            }
        }

        if (formData.get("first_visit") === "0") {
            if (!formData.get("branch_id")) {
                alert("상담받은 지점을 선택해주세요.");
                return;
            }
        }

        try {
            const response = await fetch(requestUrl, {
                method: "POST",
                body: formData
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
            alert("서버와 통신 중 문제가 발생했습니다. 다시 시도해주세요.");
        }
    });
});
</script>