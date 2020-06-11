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
    $('.Import').click(function(){

      var file = document.getElementById("file");
      if (!fvalidator(file.value)) {
        alert('Wrong File Type!')
        return;
      }
    });
});
