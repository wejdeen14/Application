<html> 
    <head> 
         <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body{
       
        background:url('img/overlay.png'),url('img/image.jpg');
background-size:cover;
background-repeat:no-repeat;
width:100%;
height:100vh;
background-attachment: fixed;
    }
    .photo {

}
.conx{
 margin-top:15%;   
 border-radius:15px;
box-shadow:-15px -15px rgba(255,255,255,0.2),
15px 15px rgba(0,0,0,0.3);
height:30%:


}
h1{
    letter-spacing: 2px;
    
}
img{ width:50px}
</style>
</head> 
<body class='container-fluid'>
<?php
// Inclure le fichier de connexion à la base de données
include('connexion.php');
?>
<div class='col-md-6 offset-md-3 conx'>
   

<h1 class='text-center text-white' > <img src="img/mortier.png "  > </img> PLATEFORME Education<br>   </h1>
   
   
    <p class='text-center text-primary'>connecté sur votre plteforme </p>
   
    <form name="f2" action="conxenseignant.php" method="POST" class='text-center'>
        <input type="submit" value="connexion enseignant" name="b2" class="btn btn-outline-secondary" ><br>      </form>

    <form name="f1" action="conxetudiant.php" method="POST" class='text-center'>
        <input type="submit" value="connexion etudiant" name="b1"  class="btn btn-outline-secondary"></form>
<br>
</div>
</body>

</html>