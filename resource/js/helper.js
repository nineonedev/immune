/**
 * 라디오 버튼 값에 따라 관련 input 활성화
 * @param {string} radioName - name 속성 값
 * @param {string} triggerValue - 활성화 조건이 되는 value 값 (문자열)
 * @param {string} inputSelector - 활성화/비활성화할 input 선택자
 */
export function toggleInputByRadio(radioName, triggerValue, inputSelector) {
  const radios = document.querySelectorAll(`input[name="${radioName}"]`);
  const targetInput = document.querySelector(inputSelector);

  if (!radios.length || !targetInput) return;

  radios.forEach((radio) => {
    radio.addEventListener("change", () => {
      if (radio.checked && radio.value === triggerValue) {
        targetInput.disabled = false;
      } else if (radio.checked) {
        targetInput.value = "";
        targetInput.disabled = true;
      }
    });
  });
}

/**
 * 라디오 버튼에서 여러 조건에 따라 여러 input 활성화
 * @param {string} radioName - name 속성 값
 * @param {object} mapping - { radioValue: inputSelector } 형태
 */
export function toggleInputsByRadioMap(radioName, mapping) {
  const radios = document.querySelectorAll(`input[name="${radioName}"]`);

  radios.forEach((radio) => {
    radio.addEventListener("change", () => {
      Object.entries(mapping).forEach(([val, selector]) => {
        const input = document.querySelector(selector);
        if (!input) return;
        if (radio.value === val && radio.checked) {
          input.disabled = false;
        } else {
          input.value = "";
          input.disabled = true;
        }
      });
    });
  });
}

/**
 * 체크박스가 체크되었을 때 input 활성화
 * @param {string} checkboxSelector - 체크박스 선택자
 * @param {string} inputSelector - 활성화할 input 선택자
 */
export function toggleInputByCheckbox(checkboxSelector, inputSelector) {
  const checkbox = document.querySelector(checkboxSelector);
  const targetInput = document.querySelector(inputSelector);

  if (!checkbox || !targetInput) return;

  checkbox.addEventListener("change", () => {
    if (checkbox.checked) {
      targetInput.disabled = false;
    } else {
      targetInput.value = "";
      targetInput.disabled = true;
    }
  });
}
