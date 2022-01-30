<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=elite;charset=utf8','root','');

}
catch(Exception $e)
{
    die('erreur:'. $e->getmessage());
   
}
if(isset($_GET['id1'])){
        $code=$_GET['id1'];
}
if(isset($_GET['id2'])){
    $telephonne=$_GET['id2'];
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
<form action="" method="post">
<div class="form-floating mb-3 mt-3">
<div class="input-group mb-3">
  
  

          <input type="password" value="<?=$code?>" name="nomE" class="form-control" id="name" placeholder="entrer le nouveau code" aria-label="Username" aria-describedby="basic-addon1">
          <span class="input-group-text" id="basic-addon1"><input type="checkbox" onclick="Afficher()"></span>
        </div>
        </div>
        <input type="submit" value="enregistrer" name="submit" onClick="Message()" class="btn btn-primary">
        

        </form>

       
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

<script type="text/javascript">
   function Message() {
       var msg="mot de passe modifier avec success \n vous serez rediriger sur la page pour  tester le mot de passe";
       console.log(msg)
       alert(msg);
   }
</script>
<?php  
         if(isset($_POST['submit'])){
             
            
                $result=$_POST['nomE'];
                echo $result;
                echo $telephonne;
  $inserermessage2=$bdd->prepare("UPDATE code SET  cd='$result'  where numeroassocier=$telephonne ");
                $inserermessage2->execute(array(" "));
                ?>
   <script>
                 
                alert("mot de passe modifier avec success \n vous serez rediriger sur la page pour  tester le mot de passe"); 
             </script>
                <?php
                header('location:verificationcode.php');
            
            
          }

?>
</div>
</body>
</html> 