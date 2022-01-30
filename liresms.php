<?php
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
    <title>Document</title>
    <script src="node_modules/jquery"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>



    
    <div id="messages">
    
</div>

        <script>
          setInterval('actualisersms()'  , 500); 
          function actualisersms(){
            $('#messages').load('actualisersms.php')
          }
        </script>
</body>
</html>