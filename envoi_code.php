<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php 
try{
    $bdd = new PDO('mysql:host=localhost;dbname=elite;charset=utf8','root','');

}
catch(Exception $e)
{
    die('erreur:'. $e->getmessage());
}
$bytes = openssl_random_pseudo_bytes(4);
    $pass = bin2hex($bytes);
//require_once  'vendor/autoload.php';
//\SMSFactor\SMSFactor::setApiToken('your token');
//$response = \SMSFactor\Message::send([
	//'to' => '237695003862',
	//'text' => 'Did you ever dance whith the devil in the pale moonlight ?'
//]);
//print_r($response->getJson());
//header("location:actualisersms.php");

    //$numparent=$message['telephonneparentel'];
   // echo $numparent;

       
   if(isset($_GET['id1']))
    {$id1=$_GET['id1'];

echo $id1;

$information=$bdd->query(" SELECT * FROM eleves  WHERE  telephonneparentel=$id1  " );
while($recupmessage=$information->fetch()){
    ?>
    <br><br><br>
    <form action="envoi_code2.php">
    <div class="container">
    <div class="col-12">
    <div class="p-3 border bg-light" style="margin-left:300px; margin-right:300px;">
    <p style="text-align:center"  >information de l'eleve <?=  $recupmessage['nomel'] ?> <?=  $recupmessage['prenomel']?></p>
    </div>
    </div>
    </div>
    <div class="container">
    <div class="col-12">
    <div class="p-3 border bg-light" style="margin-left:300px; margin-right:300px;">
    <div >NOM : <?=  $recupmessage['nomel'] ?></div>
    <div >PRENOM : <?=  $recupmessage['prenomel'] ?></div>
    <div > DATE DE NAISSANCE :<?=  $recupmessage['dateel'] ?></div>
    <div >SEXE: <?=  $recupmessage['sexeel'] ?></div>
    <div >TELEPHONNE ELEVES : <?php 
      $telephone=$recupmessage['telephonneel'];
      $tel1=substr($telephone,0,1);
     
      $tel2=substr($telephone,1,9);
      
      $telephone = chunk_split($tel2,2, " ");
      
      echo $tel1." " .$telephone;
      
        
          
        

        ?></div>
    <div >LIEU DE NAISSANCE : <?=  $recupmessage['lieunaissel'] ?></div>
    <div >TELEPHONNE PARENT :<u> <?php 
      $telephone=$recupmessage['telephonneparentel'];
      $tel1=substr($telephone,0,1);
     
      $tel2=substr($telephone,1,9);
      
      $telephone = chunk_split($tel2,2, " ");
      
      echo $tel1." " .$telephone;
      
        
          
        

        ?></u></div>
    </div>
    <div class="p-3 border bg-light" style="margin-left:300px; margin-right:300px;">
<div><label for="">code <input type="password" value="<?=$pass ?>" disabled name="code"></label></div>

    </div>
    </div>
    </div>
    
    <div  style="margin-left:700px; ">
  
    <button style="border:none   " > <a  class="btn btn-primary" style="text-decoration:none   " type="submit"  href="envoi_code2.php?id2=<?= $recupmessage['telephonneparentel'];?> " >envoyer ce code au +237 <?php 
      $telephone=$recupmessage['telephonneparentel'];
    
  
      $tel1=substr($telephone,0,1);
     
      $tel2=substr($telephone,1,9);
      
      $telephone = chunk_split($tel2,2, " ");
      
      echo $tel1." " .$telephone;
      
        
          
        

        ?></a> </button></div>
  
    
    </form>
    <?php
} }
?>
</body>
</html>
