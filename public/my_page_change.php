<?php 
session_start();
if (!empty($_SESSION['name'])){
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
$id = $_SESSION['name'];
$newControllerUserObj = new Controller_user;
$id = $_SESSION['name'];
$user = $newControllerUserObj -> getUserFromId($_SESSION['name']);
unset($user['nick']);
if (empty($_POST))
    {
        $name = $user['name'];
        $biography = $user['biography'];
        $surname = $user['surname'];
        $profession = $user['profession'];
    }
    else
    {
        $chengerest = array_diff_assoc($_POST, $user);
        print_r($chengerest);
        $chengeredUser = $newControllerUserObj -> update($chengerest, $id);
        $user = $newControllerUserObj -> getUserFromId($_SESSION['name']);
        $name = $user['name'];
        $biography = $user['biography'];
        $surname = $user['surname'];
        $profession = $user['profession']; 
    }

}
else
{
header("Location: index.php?");
exit;
}?>
<!DOCTIPE html>
<form method="POST">
        <textarea wrap = "off" rows="1" cols="100" name="name"><?php echo $name;?></textarea><br><br>
        <textarea wrap = "off" rows="1" cols="100" name="surname"><?php echo $surname;?></textarea><br><br>
        <textarea wrap = "off" rows="1" cols="100" name="profession"><?php echo $profession;?></textarea><br><br>
        <textarea wrap = "hard" rows="10" cols="100" name="biography"><?php echo $biography;?></textarea><br><br>
        <input type="submit" value="ИЗМЕНИТЬ"></form>    
<p>