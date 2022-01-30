<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=elite;charset=utf8','root','');

}
catch(Exception $e)
{
    die('erreur:'. $e->getmessage());
}

if(isset($_FILES['text']['name'])){
    $nomfichier=$_FILES['text']['name'];
    
    $tmpname=$_FILES['text']['tmp_name'];
    $filedest='fichier/'.$nomfichier;
    $DEPLACEMENT=move_uploaded_file($tmpname, $filedest);
    if($DEPLACEMENT)
    {
        echo 'ok';
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <title>Document</title><link rel="stylesheet" href="index.css">
</head>
<body>
<
     <?php
if(isset($_GET['id2']))
{

    
    $idbd=$_GET['id2'];

    $id2="+237".$_GET['id2'];
    
    
    $bytes = openssl_random_pseudo_bytes(4);
    $pass = bin2hex($bytes);
    echo $pass;
   
if($pass){
   
    
    


    
require_once __DIR__ . '/../vendor/autoload.php';

$basic  = new \Vonage\Client\Credentials\Basic("a85b187b", "I0FpVuufgkfTUOBN");
$client = new \Vonage\Client($basic);

$response = $client->sms()->send(
    new \Vonage\SMS\Message\SMS("$id2", "ALLDEV", "$pass")
);

$message = $response->current();

if ($message->getStatus() == 0) {
    echo "The message was sent successfully\n";
    
    $inserermessage2=$bdd->prepare("INSERT INTO code(cd,numeroassocier) VALUES(?,?) ");
    $inserermessage2->execute(array($pass,$idbd));
    if(isset($inserermessage2)){
        echo "enregistrer avec sucess";
        var_dump($inserermessage2);
    }
    
  // $inserermessage2->execute(array($_POST['filiere'],$_POST['classe']));

} else {
    echo "The message failed with status: " . $message->getStatus() . "\n";
}
}}
    ?>
</body>
</html>