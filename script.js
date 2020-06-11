function getExtension(filename) {
  var parts = filename.split('.');
  return parts[parts.length - 1];
}

function fvalidator(filename) {
  var ext = getExtension(filename);
  if ((ext.toLowerCase()) == 'csv') {
    return true;
  } else {
    return false
  }
}


$(document).ready(function(){
    $('.btn').click(function(){

      var file = document.getElementById("fs");
      if (!fvalidator(file.value)) {
        alert('Wrong File Type!')
        return;
      }



      var clickBtnValue = $(this).val();
      var ajax = 'up.php',
      data =  {'action': clickBtnValue};
      $.post(ajax, data, function (response) {
          alert("Upload button clicked");
      });
    });
});
