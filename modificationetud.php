<html> 
    <head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
        <title>

        </title>
    </head>
    <body style="background-color: hsl(0, 0%, 96%)">
<?php

include_once('connexion.php');
//ajouter un etudiant
if (isset($_GET['ajouter'])) {
    header("Location: inscrireetudiant.php");
    
}


// Supprimer un étudiant
if (isset($_GET['delete']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM etudient WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        echo "Suppression effectuée avec succès.<br>";
        echo "<a href='crudetudiantliste.php'>retour a la liste des etudiants </a>";
    } else {
        echo "Erreur lors de la suppression de l'étudiant.";
    }
}

//modifier un champ 
//st utilisée pour vérifier si deux paramètres sont présents dans la chaîne de requête de l'URL.
if(isset($_GET['id'])&&(isset($_GET['modifier']))) {
    $id = $_GET['id'];
    //  $id = $_GET['modifier']; recuperer lid a partir de url 
    $req = "select * from etudient where id =:id";
    $stmt = $conn->prepare($req);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    //recupere les champ de base de donnes 
    $id = $data['id'];
    $nom = $data['nom'];
    $email = $data['email'];
    $password = $data['password'];
    $age = $data['age'];
    $nom_cours = $data['nom_cours'];
    
//recuperer les variable de formulaire

if (isset($_POST['submit'])) {
$id = $_POST['id'];
$nom = $POST['nom'];
$email = $POST['email'];
$password = $POST['password'];
$age = $POST['age'];
$nom_cours = $POST['nom_cours'];
//Mise a jour les variable 
    $req="UPDATE etudient set nom ='$nom' ,email='$email' , password='$password', age='$age',nom_cours='$nom_cours' WHERE id=$id";
    $stmt = $conn->exec($req);
    if ($stmt ==!false) {
        echo "Mise à jour du champ etudiant effectuée avec succès.<br>";
        echo "<a href='crudetudiantliste.php'>retour a la Liste des etudiants</a>";
    } else {
        echo "Erreur lors de la mise à jour du produit.";
    }

}
 else {
    // Afficher le formulaire de modification
        ?>
       
    
    <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
    <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
        <h1 class="my-5 display-3 fw-bold ls-tight " style="letter-spacing:2px"> 
     EDUCATION<br>
     <span class=" text-primary sous" style="font-size:25px">Inscrire Etudiant</span> </h1>
           
</div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card  " style="border-radius:15px">      
          <div class="card-body py-5 px-md-5"> 

        <form  action="" method="post">
        <div class="row">
             
             <div class="form-outline ">

Nom utilisateur<input type="text" name="nom" class="form-control " value="<?php echo $nom; ?>"><br>
         Adresse e-mail <input type="text" name="email" class="form-control "value="<?php echo $email; ?>"><br>
         Mot de passe <input type="password" name="password" class="form-control " value="<?php echo $password; ?>"><br>
         <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
         Age <input type="number" name="age" class="form-control " value="<?php echo $age; ?>">
</div>
</div>

                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
        Cours<input type="text" name="nom_cours" class="form-control " value="<?php echo $nom_cours; ?>"><br>
        </div>
</div>
</div>
         <input type="submit" name="inscrire" value="INSCRIRE" class="btn btn-primary">
         </div>
</div></div>
</div>
</div>

</form>

</div>
</div>
</div>
    </body>
</html>

      
<?php
 }
}
?>

