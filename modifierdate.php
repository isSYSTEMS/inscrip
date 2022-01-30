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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="index.css">
<style>
body {
margin: 0;
font-family: "Lato", sans-serif;
}

.sidebar {
margin: 0;
padding: 0;
width: 200px;
background-color: #f1f1f1;
position: fixed;
height: 100%;
overflow: auto;
}

.sidebar a {
display: block;
color: black;
padding: 16px;
text-decoration: none;
}

.sidebar a.active {
background-color: #04AA6D;
color: white;
}

.sidebar a:hover:not(.active) {
background-color: #555;
color: white;
}

div.content {
margin-left: 200px;
padding: 1px 16px;
height: 1000px;
}

@media screen and (max-width: 700px) {
.sidebar {
width: 100%;
height: auto;
position: relative;
}
.sidebar a {float: left;}
div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
.sidebar a {
text-align: center;
float: none;
}
}
</style>
</head>
<body>
<body>
<div class="sidebar">
  <a class="active" href="insription.php">inscription</a>
  <a href="verificationcode.php">payer</a>
  <a href="#contact">informations</a>
  <a href="#about">a propos</a>
</div>

<div class="content">
<div class="form-floating mb-3 mt-3">
          <?php  if(isset($_GET['id'])){
$val=$_GET['id'];

          }

?>
          <input type="date" name="nomE" class="form-control" id="name" value="<?=$val?>" placeholder="entrer le nom">
          <label for="nameEL"  class="form-label">nouvelle valeur</label>
        </div>
       
</div>
</div>
</body>
</html>