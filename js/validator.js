function validateForm() {
  var x = document.getElementById("username").value;
  if (x == "") {
    var text = 'Имя должно быть заполнено!';
    document.getElementById('demo').innerHTML = text
    return false;
  }
}
