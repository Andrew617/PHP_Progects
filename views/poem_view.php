
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<body background = '/home/andrew/PHP_Progects/stihi/public/images/2311_mainfoto_03.jpg'></body>
<?php include_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi';
$a = new Controller_stihi;
$poemId = get[poem_id];
$poem = $a -> getOnePoem($poemId);
print "<h3>$poem[title]</h3>";?> <br><br>
<?php echo "<pre>$poem[word];</pre>"?></head>
