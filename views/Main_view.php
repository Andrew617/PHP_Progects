
<!DOCTYPE html>
<body>
<div class = "a"></div>
<h1>Стихи</h1>
</body>
<head>
<body>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> СТИХИ </title>
<script> function enter(){
const ajax = new XMLHttpRequest();
ajax.open('GET', 'http://stihi/my_form.php', true);
ajax.addEventListener('readystatechange', function()
{
  if (this.readyState == 4 && this.status == 200)
  output.innerHTML = this.responseText;
})
  ajax.send(); 
} </script>
  <input type="button" onclick = "enter()" value = "войти">
</body>
<style>
 .a {
    background-image: url('images/2311_mainfoto_03.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}

</style>
</head>
<body>
<p> Авторы</p>
<?php require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
$users = new Controller_user;
$get_users = $users -> getAllusersNick();
foreach ($get_users as $us) {
    echo '<a href = "http://stihi?controller=user&nick=',urlencode($us),' "> ',$us,'</a>';
}
?><br><br>
<p><a href = "http://stihi?id=new" > зарегистрироваться </a> </p>
<p><a href = "http://stihi?controller=entry&id=key" > войти</a></p>
</body>
</html>

