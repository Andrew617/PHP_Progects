<?php 
session_start();
if (!empty($_SESSION['name'])){
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi.php';
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
$id = $_SESSION['name'];
$newControllerUserObj = new Controller_user;
$user = $newControllerUserObj -> getUserFromId($_SESSION['name']);
$id = $_SESSION['name'];
$name = $user['name'];
$biography = $user['biography'];
$surname = $user['surname'];
$profession = $user['profession'];?>

<form method="POST"
        <input type = "text" name="name" size="90" cols="2000" value = <?php echo $name;?>><br><br>
        <input type = "text" name="surname" size="90" cols="2000" value = <?php echo $surname;?>><br><br>
        <input type = "text" name="profession" size="90" cols="2000" value = <?php echo $profession;?>><br><br>
        <textarea wrap = "hard" rows="100" cols="100" name="biography"> <?php echo $biography;?></textarea><br><br>
        <input type="submit" value="ИЗМЕНИТЬ"></form>    
<p>
<?php if (!empty($_POST['name']) || !empty($_POST['surname']) || !empty($_POST['profession']) || !empty($_POST['biography']))
    {
        print_r($_POST);
        exit;
    }
}    