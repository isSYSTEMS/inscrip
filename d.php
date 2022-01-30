<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    input.controle {
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
}	
input.controle:invalid + span:before  {
  content: "\f00d";
  font-family: "FontAwesome";
  color:#a00;
  font-size: 1.5em;
}
</style>
</head>
<body>
<form name="monFormulaire" id="monFormulaire" method="post" onsubmit="return false">
<div>
  <label class="label">Votre pseudo :</label> 
  <input class="controle" type="text" name="pseudo" required pattern="[0-9a-zA-Z-\.]{3,12}" placeholder="De 3 à 12 caractères"> 
  <span class="resultat"></span>
</div>
<div>
  <label class="label">Votre mail :</label> 
  <input class="controle" type="email" name="mail" required placeholder="mail@serveur.com"> 
  <span class="resultat"></span>
</div>
<div>
  <label class="label">Votre contribution :</label> 
  <input class="controle" type="number" name="contribution" min="0" max="10" required placeholder="Entre 1 et 10"> 
  <span class="resultat"></span>
</div>
<div>
  <label class="label">Votre date de venue :</label> 
  <input class="controle" type="date" name="venue"  required> 
  <span class="resultat"></span>
</div>
<div>
  <input type="submit" value="Envoyer">
</div>
</form> 
</body>
</html>
