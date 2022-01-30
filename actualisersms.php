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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <div class="sidebar">
  <a class="active" href="insription.php">inscription</a>
  <a href="verificationcode.php">payer</a>
  <a href="#contact">informations</a>
  <a href="#about">a propos</a>
</div>

<div class="content">
<br><br>

<p style="text-align:center; margin-left:100px;">LISTES DES MESSAGES RECUENT</p><br><br>
<?php

$compt=0;
$recupmessage1=$bdd->query("SELECT * FROM eleves ORDER by matricule DESC  ");

while($message=$recupmessage1->fetch()){
   $compt++;
    ?>
  
    
    <div class="container" >
    
    <div class="row g-2">
    <div class="col-12">
   
  <div class="alert alert-info"style="text-align:center; margin-left:300px; margin-right:300px;">
  <h6 ><?= $compt;?> --- DATE:<u><?= $message['date_heureel'] ?></u></h6>
  </div>
  
        
    
    
    <div class="col-12">
    <div class="p-3 border bg-light" style="margin-left:300px; margin-right:300px; text-align:center;">
        <label for="pseudo">fichier bordereau(image ou doc) : </label>
    
    <a class="nav-link" href="<?= $message['bordereau'];?> " style="text-"><?= $message['bordereau'];?></a>
    </div>
    </div>
    <div class="col-12">
    <div class="p-3 border bg-light" style="margin-left:300px; margin-right:300px; text-align:center;">
    <label for="pseudo">fichier lettre(image ou doc) : </label>
    <a class="nav-link" href="<?= $message['lettre'];?> " style="text-"><?= $message['lettre'];?></a>
    </div>
    </div>
    <div class="col-12">
    <div class="p-3 border bg-light" style="margin-left:300px; margin-right:300px; text-align:center;">
       <label for="">nom eleves : </label>
        <?=  $message['nomel'];?><br>
        <label for="">prenom eleves : </label>
        <?=  $message['prenomel'];?><br>
        <label for="">date de naissance eleves : </label>
        <?=  $message['dateel'];?><br>
        <label for="">sexe eleves : </label>
        <?=  $message['sexeel'];?><br>
        <label for="">telephonne eleves : </label>
        <?php 
      $telephone=$message['telephonneel'];
      $tel1=substr($telephone,0,1);
     
      $tel2=substr($telephone,1,9);
      
      $telephone = chunk_split($tel2,2, " ");
      
      echo $tel1." " .$telephone;
      
      
          
        

        ?>
       <br>
        <label for="">lieu de naissance eleves : </label>
        <?=  $message['lieunaissel'];?><br>
        
        <label for="">numero du parent : </label>
        <?php 
      $telephone=$message['telephonneparentel'];
      $tel1=substr($telephone,0,1);
     
      $tel2=substr($telephone,1,9);
      
      $telephone = chunk_split($tel2,2, " ");
      
      echo $tel1." " .$telephone;
      
        
          
        

        ?><br>
        
      
    </div>
    </div>
    
    <form action=" " method="post">
    <div class="col-12" style="margin-left:10px; margin-right:500px; text-align:center;" >
    <button style="border:none;" ><a class="btn btn-primary" style="text-decoration:none   "   href="envoi_code.php?id1=<?= $message['telephonneparentel'];?> "  >valider</a></button>
     
      
        </div>
        
      
    </div>
</div>
<br><br>
</form>
<?php
}

if(isset($_POST['code'])){
    $id=$message['nomel'];
   
   
echo $message['nomel'];


   



       
$information=$bdd->query(" SELECT  * FROM messages WHERE  nomel='$id' ");
while($recupmessage=$information->fetch()){
    ?>
    <div><?=  $recupmessage['id'] ?></div>
    <div><?=  $recupmessage['bordereau'] ?></div>
    <div><?=  $recupmessage['lettre'] ?></div>
    <div><?=  $recupmessage['nomel'] ?></div>
    <div><?=  $recupmessage['prenomel'] ?></div>
    <div><?=  $recupmessage['dateel'] ?></div>
    <div><?=  $recupmessage['sexeel'] ?></div>
    <div><?=  $recupmessage['telephonneel'] ?></div>
    <div><?=  $recupmessage['lieuel'] ?></div>
    <div><?=  $recupmessage['telephonneparentel'] ?></div>
    <br>
    <?php
} }




?>
</div>
    </body>
    </html>
