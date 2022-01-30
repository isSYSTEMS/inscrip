<?php

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
try{
    $bdd = new PDO('mysql:host=localhost;dbname=message;charset=utf8','root','');

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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <title>Document</title><link rel="stylesheet" href="index.css">
</head>
<body>
<
     <?php
if(isset($_GET['id2']))
{
    if(isset($_GET['pass1'])){
        $pass=$_GET['pass1']; 
        echo $pass;
    }
    $idbd=$_GET['id2'];

    $id2="+237".$_GET['id2'];
    
    
    $url = 'https://app.techsoft-web-agency.com/sms/api';
    $from = 'TECHSOF SMS';
    $api_key ='RGNBSmFneGxkY2F2amdHbGN4b3M=';
    //Etape 4: precisez le numéro de téléphone (Format international)
    	//$sms="bonjour"				
    
    // Construire le corps de la requête
    $sms_body = array(
        'action' => 'send-sms',
        'api_key' => $api_key,
        'to' => $id2,
        'from' => $from,
        'sms' => $pass
    );
    
    $send_data = http_build_query($sms_body);
    $gateway_url = $url . "?" . $send_data;
    
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $gateway_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        $output = curl_exec($ch);
    
        if (curl_errno($ch)) {
            $output = curl_error($ch);
        }
        curl_close($ch);
        $inserermessage2=$bdd->prepare("INSERT INTO code(cd,numeroassocier) VALUES(?,?) ");
    $inserermessage2->execute(array($pass,$idbd));
       
    
        var_dump($output);
    
    }catch (Exception $exception){
        echo $exception->getMessage();
    }
                            

}
    ?>
</body>
</html>


