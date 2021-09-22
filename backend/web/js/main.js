$(document).ready(function () {
  if ($('#img_1').attr('src') == '') {
    for (let i = 1; i <= 6; i++) {
      $('#img_' + i).css('display', 'none');
    }
  }
});
function readURL(input, img) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $(img).css('display', 'block');
      $(img)
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}