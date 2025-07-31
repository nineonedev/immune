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
        <input type="text" name="birth" id="birth" placeholder="숫자만 입력해주세요. ex) 020102">
    </div>
    <!-- 성별 -->
    <div class="radio-wrap">
        <h3 class="no-body-lg fw600">성별<b class="error fw300">*</b></h3>

        <div class="grid-wrap">
            <label>
                <input type="radio" name="gender" value="female">
                <span>여성</span>
            </label>

            <label>
                <input type="radio" name="gender" value="male">
                <span>남성</span>
            </label>
        </div>
    </div>
    <!-- 키, 몸무게 -->
    <div class="grid-wrap">
        <div class="input-wrap">
            <h3 class="no-body-lg fw600">현재 키(cm)<b class="error fw300">*</b></h3>
            <input type="text" name="height" id="height" placeholder="현재 키(cm)">
        </div>

        <div class="input-wrap">
            <h3 class="no-body-lg fw600">현재 체중(kg)<b class="error fw300">*</b></h3>
            <input type="text" name="weight" id="weight" placeholder="현재 키(kg)">
        </div>
    </div>
    <!-- 연락처 -->
    <div class="input-wrap">
        <h3 class="no-body-lg fw600">상담 가능한 연락처<b class="error fw300">*</b></h3>
        <input type="text" name="phone" id="phone" placeholder="숫자만 입력해주세요. ex) 01012345678">
    </div>
    <!-- 상담가능시간 -->
    <div class="radio-wrap">
        <h3 class="no-body-lg fw600 no-mg-8--b">상담 가능 시간<b class="error fw300">*</b></h3>

        <label class="no-mg-8--b">
            <input type="radio" name="consult_time" value="10:00-12:00">
            <span>10:00 - 12:00</span>
        </label>

        <label class="no-mg-8--b">
            <input type="radio" name="consult_time" value="12:00-14:00">
            <span>12:00 - 14:00</span>
        </label>

        <label class="no-mg-8--b">
            <input type="radio" name="consult_time" value="14:00-16:00">
            <span>14:00 - 16:00</span>
        </label>

        <label>
            <input type="radio" name="consult_time" value="16:00-18:00">
            <span>16:00 - 18:00</span>
        </label>
    </div>
    <!-- 방문이력 -->
    <div class="radio-wrap">
        <h3 class="no-body-lg fw600">저희 병원은 처음이세요?<b class="error fw300">*</b></h3>

        <div class="grid-wrap">
            <label>
                <input type="radio" name="first_visit" value="네">
                <span>네</span>
            </label>

            <label>
                <input type="radio" name="first_visit" value="아니요(재구매)">
                <span>아니요(재구매)</span>
            </label>
        </div>
    </div>
    <!-- 재구매인경우 -->
    <div class="radio-wrap spot-radio" style="display: none;">
        <h3 class="no-body-lg fw600">재구매인 경우, 상담받은 지점</h3>

        <div class="grid-wrap v2">
            <label>
                <input type="radio" name="spot" value="강서">
                <span>강서</span>
            </label>
            <label>
                <input type="radio" name="spot" value="신촌">
                <span>신촌</span>
            </label>
            <label>
                <input type="radio" name="spot" value="광명">
                <span>광명</span>
            </label>
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
            <label>
                <input type="radio" name="indigest" value="항상 안 되는 느낌">
                <span>항상 안 되는 느낌</span>
            </label>

            <label>
                <input type="radio" name="indigest" value="가끔씩만">
                <span>가끔씩만</span>
            </label>
        </div>
    </div>
    <!-- 복부 통증 시기 -->
    <div class="radio-wrap">
        <h3 class="no-body-lg fw600">배가 자주 아프다면</h3>

        <div class="grid-wrap v3">
            <label>
                <input type="radio" name="belly_pain" value="공복 시">
                <span>공복 시</span>
            </label>

            <label>
                <input type="radio" name="belly_pain" value="식사 후">
                <span>식사 후</span>
            </label>

            <label>
                <input type="radio" name="belly_pain" value="스트레스 받은 후">
                <span>스트레스 받은 후</span>
            </label>
        </div>
    </div>
    <!-- 통증 이유 -->
    <div class="radio-wrap">
        <h3 class="no-body-lg fw600">속이 쓰리다면</h3>

        <div class="grid-wrap">
            <label>
                <input type="radio" name="reason" value="공복 시">
                <span>공복 시</span>
            </label>

            <label>
                <input type="radio" name="reason" value="매운 것 먹을 때">
                <span>매운 것 먹을 때</span>
            </label>
        </div>
    </div>
</div>

<div class="form-wrap no-mg-48--t">
    <h6 class="no-body-xs fw600">대 • 소변 진단</h6>

    <!-- 대변 -->
    <div class="radio-wrap">
        <h3 class="no-body-lg fw600 no-mg-8--b v2">대변<b class="error fw400 no-body-xs">중복 선택 가능</b></h3>

        <div class="input-wrap no-mg-8--b">
            <input type="text" name="feces_time" id="feces_time" placeholder="(    )일에 (    )번 정도 대변을 본다">
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

<button type="button" onclick="doherbRequest();" class="submit no-body-lg fw600 no-mg-20--t">
    제출하기
</button>