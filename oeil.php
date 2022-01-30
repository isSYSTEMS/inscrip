<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=elite;charset=utf8','root','');

}
catch(Exception $e)
{
    die('erreur:'. $e->getmessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    

<label for="exampleDataList" class="form-label">Datalist example</label>
<input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="entrer le mot cle">
<datalist id="datalistOptions">
<option value="all">
    <?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=elite;charset=utf8','root','');

}
catch(Exception $e)
{
    die('erreur:'. $e->getmessage());
}

$recupmessage1=$bdd->query("SELECT DISTINCT nomel FROM eleves WHERE nomel IS NOT NULL  ");
while($message=$recupmessage1->fetch()){


    ?>
    
  <option value=" <?=  $message['nomel'];?>">
  <?php
}
?>
  <option value="New York">
  <option value="Seattle">
  <option value="Los Angeles">
  <option value="Chicago">
</datalist>

</body>
</html>