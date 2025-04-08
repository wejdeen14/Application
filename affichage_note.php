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
p{
    font-family: Georgia, serif;
    font: italic  bold 12px/30px Georgia, serif;
}
        </style>
</head>
    <body style="background-color: hsl(0, 0%, 96%)">
    <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card" style="width: 400px; box-shadow: 6px 4px 25px rgba(0, 0, 0, 0.5);">
        <div class="card-body"style="  border-radius:15px; ">
            <p class=" ls-tight text-primary " style="font-size:30px; font-family: Georgia, serif;">le résultat:  </p>
        
    <?php
    session_start();
include_once('connexion.php');
$id=$_SESSION['id'];
$sql="SELECT n.note, e.id, e.nom, c.nom_cours, x.nom_examen
FROM etudient e
INNER JOIN cours c ON c.nom_cours = e.nom_cours
INNER JOIN examen x ON x.id_cours = c.id_cours
INNER JOIN note n ON n.id_examen = x.id_examen
INNER JOIN enseignants s ON s.id_enseignants=c.id_enseignants
WHERE n.id = $id;";
$res=$conn->query($sql);
$data = $res->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $ligne) {
    // echo "Nom : ".$ligne['nom']."<br>";
     $id = $ligne['id'];
     $nom = $ligne['nom'];
     $nom_cours = $ligne['nom_cours'];
     $note = $ligne['note'];
}
     echo "<p > l'etudiant sur l'identifiant :&nbsp; ".$id."</p>";
     echo "<p>Nom : &nbsp;".$nom."</p>";
     echo "<p>Nom de cours : &nbsp;".$nom_cours."</p>";
     echo "<p>Note: &nbsp;".$note."</p>";



?>
    <form action="conxetudiant.php" method="post">
        <input type="submit" name="dec" value="Déconnexion" class="btn btn-outline-danger" style=" font-family: Georgia, serif;"><br> <br>
</form>
</body>
</html>