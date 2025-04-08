<?php 
session_start();
if (!isset($_SESSION['id_enseignants'])) {
header('location: conxenseignant.php');
}
?>
<html> 
    <head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <title>
        </title>
        <style> 
label{
    font-family: Georgia, serif;
}
h1{
    font-family: Georgia, serif;
}
        </style>
    </head>
    <?php
include_once('connexion.php');

    if(isset($_POST['saisir']) && isset($_POST['nom_cours'])){
        $id_enseignants=$_SESSION['id_enseignants'];
        $nom_cours = $_POST['nom_cours'];
    
        $sql = "INSERT INTO cours (nom_cours, id_enseignants) values ('$nom_cours','$id_enseignants');
        SET @cours_id:=LAST_INSERT_ID();";
        
        $result = $conn->exec($sql);
        if($result > 0) {
            $res2="INSERT INTO examen (nom_examen,id_cours) VALUES ('$nom_cours',@cours_id);";
            $re3= $conn->exec($res2);
            header('Location: saisirnote.php');
            exit(); // Ajout de la fonction exit() pour arrêter l'exécution du script après la redirection
        } else {
            echo "Une erreur  lors de l'insertion du cours.";
        }
       
    }
?>

    <body style="background-color: hsl(0, 0%, 96%)">
   
    <?php
   
    echo"<p class='text-dark' style=' font-family: Georgia, serif;'> &nbsp;&nbsp;&nbsp; Bienvenue sur votre espace education".$_SESSION['id_enseignants']."</p>;" 
    ?>

    
    <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card" style="width: 400px; box-shadow: 6px 4px 25px rgba(0, 0, 0, 0.5);">
        <div class="card-body"style="  border-radius:15px; ">
            <h1 class="text-center mb-4 fw-bold ls-tight text-primary " style="font-size:30px;">Les cours enseigné</h1>
       
        <form action="" method="post">

        <input type="radio" name="nom_cours"value="math" class="form-check-input"><label class="form-check-label">&nbsp;  Math</label><br>
        <input type="radio" name="nom_cours"value="php" class="form-check-input"><label class="form-check-label"> &nbsp; Php</label><br>
        <input type="radio" name="nom_cours"value="java" class="form-check-input"><label class="form-check-label">&nbsp; Java</label><br>
        <input type="radio" name="nom_cours"value="3D"class="form-check-input"><label class="form-check-label"> &nbsp; 3D</label><br>
        <input type="radio" name="nom_cours"value="python"class="form-check-input"><label class="form-check-label"> &nbsp; Python</label><br>
        <input type="radio" name="nom_cours"value="angular"class="form-check-input"><label class="form-check-label">&nbsp;  Angular</label><br><br>
        
        
        
        <input type="submit" name="saisir" value="Saisir les notes de cour sélectionée" class="btn btn-outline-primary" style=" font-family: Georgia, serif;"><br> <br>
        </form>
        <form action="logout.php" method="post">
        <input type="submit" name="dec" value="Déconnexion" class="btn btn-outline-danger" style=" font-family: Georgia, serif;"><br> <br>
</form>
    </body>
</html>