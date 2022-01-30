<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=elite;charset=utf8','root','');

}
catch(Exception $e)
{
    die('erreur:'. $e->getmessage());
}
var_dump ($_FILES);

if(isset($_POST['envoyer'])){
  if(isset($_FILES['bord'])){
    if(isset($_FILES['lettre'])){ 

     
      $date = date('Y-m-d h:i:s');
      echo $date;
   
  
    $oFileInfos = $_FILES["bord"]; 
    $oFileInfos2 = $_FILES["lettre"]; 
	$nom = $oFileInfos["name"]; 
  $nom2 = $oFileInfos2["name"];
	$type_mime = $oFileInfos["type"]; 
  $type_mime2 = $oFileInfos2["type"];
	$taille = $oFileInfos["size"]; 
  $taille2 = $oFileInfos2["size"];
	$fichier_temporaire = $oFileInfos["tmp_name"]; 
  $fichier_temporaire2 = $oFileInfos2["tmp_name"];

	$code_erreur = $oFileInfos["error"]; 
  $code_erreur2 = $oFileInfos2["error"];
	switch ($code_erreur)
	{ 
		case UPLOAD_ERR_OK : 
			 
			$destination = "bordereau_lettre/$nom"; 

			// Copie le fichier temporaire 
			if (copy($fichier_temporaire,$destination))
			{ 
				// Copie OK
				$message  = "Transfert termine - Fichier = $nom - "; 
				$message .= "Taille = $taille octets - "; 
				$message .= "Type MIME = $type_mime."; 
			}
			else
			{ 
				// Problème de copie => message d’erreur. 
				$message = "Probleme de copie sur le serveur."; 
			} 
			break; 

		

		default : 
			// Erreur non prévue ! 
			$message  = "Fichier non transfere "; 
			$message .= "(erreur inconnue : ".$code_erreur.")"; 
	}
  switch ($code_erreur2)
	{ 
		case UPLOAD_ERR_OK : 
			 
			$destination2 = "bordereau_lettre/$nom2"; 

			// Copie le fichier temporaire 
			if (copy($fichier_temporaire2,$destination2))
			{ 
				// Copie OK
				$message  = "Transfert termine - Fichier = $nom2 - "; 
				$message .= "Taille = $taille octets - "; 
				$message .= "Type MIME = $type_mime."; 
			}
			else
			{ 
				// Problème de copie => message d’erreur. 
				$message = "Probleme de copie sur le serveur."; 
			} 
			break; 

		

		default : 
			// Erreur non prévue ! 
			$message  = "Fichier non transfere "; 
			$message .= "(erreur inconnue : ".$code_erreur.")"; 
	}
     
  
 
  
   
   //$message=$_POST['bordereau'];
   $pseudo=$_POST['nomE'];
   $inserermessage=$bdd->prepare('INSERT INTO eleves (bordereau,lettre,nomel,prenomel,dateel,sexeel,telephonneel,lieunaissel,telephonneparentel,filiere,classe,date_heureel) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
   $inserermessage->execute(array($destination,$destination2,$_POST['nomE'],$_POST['prenomE'],$_POST['dateE'],$_POST['sexeE'],$_POST['telE'],$_POST['lieuE'],$_POST['parentE'],$_POST['filiere'],$_POST['classe'],$date));
  // $inserermessage2=$bdd->prepare('INSERT INTO messages(filiere,classe) VALUES(?,?) ');
  // $inserermessage2->execute(array($_POST['filiere'],$_POST['classe']));
   echo "envoyer avec succes";
  
} }  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <title>Document</title><link rel="stylesheet" href="index.css">
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
  
<div class=" container">
      <div class="container-fluid" >
     
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <br><br>
        <p id="pinscription">entrer les informations  suivantes</p><br><br>
        
      </div>
      <form class="row g-3" id="form"  enctype="multipart/form-data" action="" method="post">
      
      <div class="mb-3">
  <label for="formFileMultiple" class="form-label">bordereau de recepisse(image ou document ):</label>
  <input class="form-control" type="file" id="formFileMultiple"  name="bord" required>
  
</div> 
<div class="mb-3">
  <label for="formFileMultiple" class="form-label">lettre d'admission(image ou document):</label>
  <input class="form-control" type="file" id="formFileMultiple" name="lettre" multiple required>
  <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">importer une image ou un pdf.</div>
</div>

        <div class="form-floating mb-3 mt-3">
          
          <input type="text" name="nomE" class="form-control" id="name" placeholder="entrer le nom">
          <label for="nameEL"  class="form-label">nom</label>
        </div>
        <div class="form-floating mb-3 mt-3">
        <input type="text" name="prenomE" class="form-control" id="name" placeholder="entrer le nom">
          <label for="prenomEL" class="form-label">prenom</label>
          
        </div>
        <div class="form-floating mb-3 mt-3">
        <input type="date" name="dateE" class="form-control" id="name" placeholder="entrer le nom">
          <label for="datenaissEL" class="form-label">date de naissance</label>
         
        </div>
     
            <label for="sexeEL" class="form-label">SEXE</label>
            <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" name="sexeE" type="radio" name="sexeEL" id="" value="masculin" checked>
                <label class="form-check-label" for="sexeEL">
                 M
                </label>
        </div>
        </div>
        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" name="sexeE" type="radio" name="sexeEL" id="" value="feminin" >
            <label class="form-check-label" for="sexeEL">
            F
            </label>
          </div>
        </div>
        
        <div class="form-floating mb-3 mt-3">
        <input type="text" name="classe" class="form-control" id="name" placeholder="entrer le nom">
      <label for="texte" class="form-label"> classe eleve:</label>

</div>

<div class="form-floating mb-3 mt-3">
<input type="text" name="filiere" class="form-control" id="name" placeholder="entrer le nom">
    <label for="" class="form-label">filiere</label>
    


</div>
    
        <div  class="form-floating mb-3 mt-3">
        <input type="text" name="telE" class="form-control" id="name" placeholder="entrer le nom">
          <label for="telephoneEL" class="form-label">telephone eleves</label>
          
          
        </div>
        <div  class="form-floating mb-3 mt-3">
        <input type="text" name="lieuE" class="form-control" id="name" placeholder="entrer le nom" required>
          <label for="lieudenaissEL" class="form-label">lieu de naissance</label>
        
          <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">veiller renseigner ce champ.</div>
        </div>
        <div  class="form-floating mb-3 mt-3">
        <input type="text" name="parentE" class="form-control" id="name" placeholder="entrer le nom" required>
          <label for="telephoneparentsEL" class="form-label">numero parents</label>
          
          <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">veiller renseigner ce champ.</div>
        </div>
        <div class="col-md-3">
  <!-- Submit button -->
  <input type="submit" tgh value="envoyer" name='envoyer' class="btn btn-primary">
  </div>
</form>

    </div>
</div>

 
       

       
    
        
  <!-- 2 column grid layout with text inputs for the first and last names -->
  
      
      
   
</body>
</html>