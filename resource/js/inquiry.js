function doRequest() {
  if ($('#name').val() == '') {
    alert('성함를 입력해주세요.');
    $('#name').focus();
    return;
  }

  if ($('#phone').val() == '') {
    alert('연락처를 입력해주세요.');
    $('#phone').focus();
    return;
  }

  if (!$('#private_check').is(':checked')) {
    alert('개인정보 취급방침에 동의하셔야 합니다.');
    $('#private_check').focus();
    return;
  }

  var form = $('#frm')[0];
  var data = new FormData(form);

  $.ajax({
    type: 'POST',
    url: '/module/ajax/request.process.php',
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
      var jsonData = $.parseJSON(data);

      if (jsonData.result === 'fail') {
        alert(jsonData.msg);
      } else if (jsonData.result === 'success') {
        alert(jsonData.msg);

        $('#frm').hide();

        $('.no-inquiry-wrap hgroup.--tac h2').html('상담신청이<br> 완료되었습니다.');
        $('.no-documents-top').css('border-top', '1rem solid var(--clr-border-base)');
      }
    },
    error: function (e) {
      alert('처리 중 오류가 발생했습니다.');
    },
  });
}
