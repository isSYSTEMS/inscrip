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
<div class="sidebar">
  <a class="active" href="insription.php">inscription</a>
  <a href="verificationcode.php">payer</a>
  <a href="#contact">informations</a>
  <a href="#about">a propos</a>
</div>

<div class="content">
<br><br><br><br>
       <?php 

        if(isset($_POST['verifier']))
        {
if(isset($_POST['numero'])){
  $numero=$_POST['numero'];
}
   if(isset($_POST['code1']))  {
    $code=$_POST['code1'];
   }    
   $compt=0;
   $compt2=0;
;
   $recupmessage1=$bdd->query(" SELECT numeroassocier,cd FROM code  ");
   while($message=$recupmessage1->fetch()){
     
     if( $message['numeroassocier']==$numero && $message['cd']==$code){
      
$compt++;
     }

         else{
$compt2++;
         }}
        
        if($compt==1){
          if(isset($code)){
         
            $recupmessage1=$bdd->query(" SELECT nomel,prenomel,sexeel,dateel,lieunaissel,telephonneparentel,filiere,classe,code FROM eleves,code where cd='$code' and telephonneparentel=numeroassocier  ");
           
            while($message=$recupmessage1->fetch()){
                  
                        ?>
                       <div class="container-fluid">
    <div class="row">
    <div class="col-sm-9 col-md-6 col-lg-8 bg-light text-black">
          <br><br>
         
                        <p style="text-align:center;">information de votre enfant <?=$message['nomel'] ?>  <?=$message['prenomel'] ?></p>
                        
                        <div class="container">
                        
                        <a href="modifierinfos.php?id1=<?=$code?>&id2=<?=$message['telephonneparentel']?>" class="btn btn-danger" style="color:black;text-decoration:none">modifier mon code</a>   

                        
                        
                        <div class="col-6">
                          <div class="p-3 border bg-light">
                          <div>nom : <?=$message['nomel'] ?> </div>
                          </div>
                          </div>
                         
                                
                        <div class="col-6">
                          <div class="p-3 border bg-light">
                          <div>prenom : <?=$message['prenomel'] ?> </div>
                          </div>
                          </div>
                          
                                
                                
                        <div class="col-6">
                          <div class="p-3 border bg-light">
                          <div>sexe : <?=$message['sexeel'] ?> </div>
                          </div>
                          </div>
                         

                                
                                <div class="col-6">
                          <div class="p-3 border bg-light">
                    <div> date de naissance :  <?=$message['dateel'] ?> </div>
                          </div>
                                </div>
                                
        
        
     
                                <div class="col-6">
                          <div class="p-3 border bg-light">
                    <div>lieu de naissance :  <?=$message['lieunaissel'] ?></div>
                          </div>
                                </div>
                               

                                
        
        <div class="col-6">
                          <div class="p-3 border bg-light">
                    <div> telephonne parent : <?=$message['telephonneparentel'] ?></div>
                          </div>
                                </div>
                               

            
        
        <div class="col-6">
                          <div class="p-3 border bg-light">
                    <div> filiere :  <?=$message['filiere'] ?></div>
                          </div>
                                </div>
                               


                                <div class="col-6">
                          <div class="p-3 border bg-light">
                    <div> classe :  <?=$message['classe'] ?></div>
                          </div>
                                </div>
                               
        
                       
                        </div>
                        <?php
                      
                    
                              
                             // $recupmessage1=$bdd->query('SELECT nomel,prenomel,deteel,sexeel,lieunaissel,telephonneel,telephonneparentel FROM messages,code where cd="65000" and numeroassocier="$tel" ');
                             
                              ?>
                    <p></p>
                    <?php
                            }
                          } 
         }
      
         else{
           echo "mot de passe ou code incorect";
        
          

         }
        }   
                            ?>
                
    
          
       

           
   
</div>
<div class="col-sm-3 col-md-6 col-lg-4 bg-light text-black">
<div  class="p-3 border bg-light">
      <br><br>
       <h3>PROCEDER AU PAIYEMENT :</h3><br><br>
       
<div  class="p-3 border bg-light">
       <p style="text-align:center;">veuiller cocher une case ou toutes les case</p><br>
       </div>
       <div class="p-3 border bg-primary">
       <div class="row g-3">
      
       <div class="col-md-4">
      
       <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
  <label class="form-check-label" for="flexCheckDefault">
    PREMIERE TRANCHE -- 35000
  </label>

</div>
</div>
<div class="col-md-4">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
    DEUXIEME TRANCHE -- 50000
  </label>
  </div>
</div>
<div class="col-md-4">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
    TROISIEME TRANCHE -- 15000
  </label>
  </div>
</div>
  
      </div>
      </div>
      
      
<br>

<div  class="p-3 border bg-light">
 <p style="text-align:center;"> OU ,saisir le montant que vous vouler payer(minimum:15000)</p>
 </div>
 
 <div  class="p-3 border bg-secondary">
 <label for="">
       <label for="">MONTANT:</label>
       <input type="text" placeholder="exemple:20000">
      </label>

</div>
</div> 
</div>
</div>
</div> 
           
</body>
</html>