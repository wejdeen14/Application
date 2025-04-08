<?php
 $servername = 'localhost';
 $login = 'root';
 $password = '';
 $bd="application_note";
try {
    $conn =new pdo("mysql:host=$servername;dbname=$bd",$login,$password);
  //  echo"<h1>connecte sur plateforme technique   </h1>";
    //$sql="select *from produit";

} catch (PDOException $e) {
    echo"erreur <br>".$e->getMessage();
}
 
?>



