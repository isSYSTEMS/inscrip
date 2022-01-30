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
/* controle formulaire*/
.controle {
  outline:0;
  font-size:14px;
  width:250px;
}	
label.label {
  display:inline-block;
  width:200px;
  text-align: right;
  font-style: italic;
  margin-right:5px;
}
input.controle:valid {
  border:3px solid #0a0;
}
input.controle:invalid {
  border:3px solid #a00;
}
input.controle:valid + span:before  {
  content: "\f00c";
  font-family: "FontAwesome";
  color:#0a0;
  font-size: 1.5em;
}	firebase login
input.controle:invalid + span:before  {
  content: "\f00d";
  font-family: "FontAwesome";
  color:#a00;
  font-size: 1.5em;
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
<script>
function Afficher()
{ 
var input = document.getElementById("name"); 
if (input.type === "password")
{ 
input.type = "text"; 
} 
else
{ 
input.type = "password"; 
} 
} 
</script>
<br><br>
<script>
  
</script>
<p style="text-align:center;">Le parent a recue un code sur son numero, verifier svec ce la.</p>
<form action="payer_inscription.php" method="post">
         <br><br>
         <div class="row g-1">
    
<div class="col-6">
    <div class="p-3 border bg-light">
    <div class="input-group mb-3">
 
  <input type="password" min="1" max="8" name="code1" class="control" id="name" required placeholder="entrer le code" aria-label="Username" aria-describedby="basic-addon1">
  
  <span class="resultat"></span>
  <span class="input-group-text" id="basic-addon1"><input type="checkbox" onclick="Afficher()"></span>
</div>

    </div>
</div>

<div class="col-6">
    <div class="p-3 border bg-light">
    
    <input type="text" name="numero" class="form-control" placeholder="numero" aria-label="Username" aria-describedby="basic-addon1" required>
    <span class="resultat"></span>
</div>

</div>
</div>
<div class="col-3">

    <input type="submit" value="verifier" name="verifier" class="btn btn-primary">
</div> 
       </form> 
</div>

       
    </body>
</html>