<!DOCTIPE html>
<?php session_start();
setcookie($path = "/foo/");
if (!empty($_SESSION['name'])){
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
require_once '/home/andrew/PHP_Progects/stihi/views/template_view.html';
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi.php';
require_once '/home/andrew/PHP_Progects/stihi/views/exit_form.html';   
$newControllerUserObj = new Controller_user;
$user = $newControllerUserObj -> getUserFromId($_SESSION['name']);
$id = $_SESSION['name'];
echo 'добро пожаловать', $user['nick'];

    if (!empty($_POST['poem_name']) && !empty($_POST['poem_text']) && !empty($id))
{
    echo"<p>$_POST[poem_name]</p>";
    echo "<pre>$_POST[poem_text]</pre>";
    $newControllerStihi = new Controller_stihi;
    $newPoem = $newControllerStihi -> wrightPoem($id, $_POST['poem_name'], $_POST['poem_text']);  
    print_r($newPoem);
}
    }

    
else {
    header("Location: index.php?");}


