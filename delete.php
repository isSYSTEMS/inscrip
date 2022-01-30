<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=elite;charset=utf8','root','');

}
catch(Exception $e)
{
    die('erreur:'. $e->getmessage());
}


if(isset($_GET['id1']))
    {$id=$_GET['id1'];
echo $id;
       //$etudiant= htmlspecialchars($donnees['idetudiant']);
       $bdd->exec("DELETE  FROM eleves where telephonneparentel=$id ");
      // $sth=$bd->prepare($sql);
       /*$sth->execute();
       $count=$sth->rowcount();*/
    }
    header('location:liresms.php');?>