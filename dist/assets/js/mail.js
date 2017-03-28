/* MAIL CONTACT */
function submit(){
  var formElement = document.querySelector('form');
  var formData = new FormData(formElement);
  var request = new XMLHttpRequest();
  request.open("POST", "send.php");
  request.send(formData);
}

form.addEventListener('submit', function(e){
  e.preventDefault();
  submit();
  document.querySelector('.success').style.opacity = 1;
  document.getElementById('name').value = "";
  document.getElementById('mail').value = "";
  document.getElementById('subject').value = "";
  document.getElementById('content').value = "";
});