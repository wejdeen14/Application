<?php

session_start();
if (!isset($_SESSION['id_enseignants'])) {
header('location: conxenseignant.php');
}
?>
<html> 
    <head> 
    <title>
saisir note
</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>

.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}


table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}

</style>
    </head>
    <body style="background-color: hsl(0, 0%, 96%)">
    <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card" style=" box-shadow: 6px 4px 25px rgba(0, 0, 0, 0.5);">
        <div class="card-body"style="  border-radius:15px; ">

            <h1 class="text-center mb-4 fw-bold ls-tight text-primary " style="font-size:30px;">Acceuil</h1>
           
            <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
       <?php
include_once('connexion.php');
$id=$_SESSION['id_enseignants'];
       $sql ="SELECT e.id, e.nom, c.nom_cours, d.nom_examen
       FROM etudient e INNER JOIN cours c 
       ON c.nom_cours = e.nom_cours
       INNER JOIN examen d 
       ON d.nom_examen = c.nom_cours
       WHERE c.id_enseignants=$id; ";
    $result=$conn->query($sql);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
       $ent = <<<ENT
       <form  action='saisirnote.php' method='post'>
       <table class="table table-striped table-hover">
        <tr>
           <th>ID</th>
           <th>Nom etudiant</th>
           <th>nom cours</th>
           <th>examen</th>
           <th>note etudiant</th>
        </tr>
ENT;   
echo $ent;
foreach($data as $ligne) {
    // echo "Nom : ".$ligne['nom']."<br>";
     $id_E = $ligne['id'];
     $nom = $ligne['nom'];
     $nom_cours = $ligne['nom_cours'];
     $nom_examen = $ligne['nom_examen'];
     echo "<tr>";
     echo "<td>$id_E</td>";
     echo "<td>$nom</td>";
     echo "<td>$nom_cours</td>";
     echo "<td>$nom_examen</td>";
     echo"<td> <input type='text' name='note_$id_E' ></td>";
     echo "</tr>";
 }
 echo "</table>";
 // "<input type='submit' name='b1'value='Soumettre'>";
 echo "<button type='submit' name='b1'  class='btn btn-primary' data-toggle='modal' >
            <i class='material-icons'>&#xE147;</i> <span> Soumettre</span></button>";

    echo" </form>";
    if(isset($_POST['b1'])){
       foreach($data as $ligne){
        $id_E = $ligne['id'];
        $nom_examen = $ligne['nom_examen'];
        $note=$_POST['note_'.$id_E];
        $req="INSERT INTO note (id_examen,note,id) SELECT e.id_examen,'$note','$id_E' FROM examen e
        WHERE e.nom_examen='$nom_examen';";
        $res=$conn->exec($req);
        if($res ==! false){
            echo"<label style='color:GREEN;'> insertion effectuée......</label> ";
            exit();
        }
        else {
            echo "erorr <br>";
        }
       }
    }
        ?>
    </body>
</html>