<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <title>Inscrire Enseignants</title>
    </head>
    <body style="background-color: hsl(0, 0%, 96%)">
        <?php
        include_once('connexion.php');

        // Ajouter un enseignant
        if (isset($_GET['ajouter'])) {
            header("Location: inscriptionenseignants.php");
        }

  // Supprimer un enseignant et tous les cours associés
if (isset($_GET['delete']) && isset($_GET['id_enseignants'])) {
    $id_enseignants = $_GET['id_enseignants'];

  
        // Supprimer les cours associés à l'enseignant de la table "cours"
        $sql_delete_cours = "DELETE FROM cours WHERE id_enseignants = :id";
        $stmt_delete_cours = $conn->prepare($sql_delete_cours);
        $stmt_delete_cours->bindParam(':id', $id_enseignants);
        $stmt_delete_cours->execute();

        // Supprimer l'enseignant de la table "enseignants"
        $sql_delete_enseignant = "DELETE FROM enseignants WHERE id_enseignants = :id";
        $stmt_delete_enseignant = $conn->prepare($sql_delete_enseignant);
        $stmt_delete_enseignant->bindParam(':id', $id_enseignants);
      if(  $stmt_delete_enseignant->execute()){

    
        echo "Suppression effectuée avec succès.<br>";
        echo "<a href='crudenseignantsliste.php'>Retour à la liste des enseignants</a>";
      }
      else{
        echo "Erreur lors de la mise à jour de l'enseignant.";
      }
}


        // Modifier un enseignant
        if (isset($_GET['id_enseignants']) && isset($_GET['modifier'])) {
            $id_enseignants = $_GET['id_enseignants'];
            $req = "SELECT * FROM enseignants WHERE id_enseignants=:id_enseignants";
            $stmt = $conn->prepare($req);
            $stmt->bindParam(':id_enseignants', $id_enseignants);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $nom_enseignants = $data['nom_enseignants'];
            $email_enseignants = $data['email_enseignants'];
            $mdp_enseignants = $data['mdp_enseignants'];
            $tel_enseignants = $data['tel_enseignants'];

            if (isset($_POST['sinscrire'])) {
                $nom_enseignants = $_POST['nom_enseignants'];
                $email_enseignants = $_POST['email_enseignants'];
                $mdp_enseignants = $_POST['mdp_enseignants'];
                $tel_enseignants = $_POST['tel_enseignants'];

                $req = "UPDATE enseignants SET nom_enseignants=:nom_enseignants, email_enseignants=:email_enseignants, mdp_enseignants=:mdp_enseignants, tel_enseignants=:tel_enseignants WHERE id_enseignants=:id_enseignants";
                $stmt = $conn->prepare($req);
                $stmt->bindParam(':nom_enseignants', $nom_enseignants);
                $stmt->bindParam(':email_enseignants', $email_enseignants);
                $stmt->bindParam(':mdp_enseignants', $mdp_enseignants);
                $stmt->bindParam(':tel_enseignants', $tel_enseignants);
                $stmt->bindParam(':id_enseignants', $id_enseignants);
                if ($stmt->execute()) {


                    echo "Mise à jour du champ enseignant effectuée avec succès.<br>";
                    echo "<a href='crudenseignantsliste.php'>Retour à la liste des enseignants</a>";
                } else {
                    echo "Erreur lors de la mise à jour de l'enseignant.";
                }
            } else {



                // Afficher le formulaire de modification
                ?>
                <div class="px-4 py-5 px-md-5 text-center text-lg-start">
                    <div class="container">
                        <div class="row gx-lg-5 align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <h1 class="my-5 display-3 fw-bold ls-tight">
                                    EDUCATION<br>
                                    <span class="text-primary sous" style="font-size:25px">Inscrire Enseignants</span>
                                </h1>
                            </div>
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card" style="border-radius:15px;">
                                    <div class="card-body py-5 px-md-5">
                                        <form name="f1" action="" method="post">
                                            <div class="row">
                                                <div class="form-outline">
                                                    Nom utilisateur <input type="text" name="nom_enseignants" class="form-control" value="<?php echo $nom_enseignants; ?>"><br>
                                                    Adresse e-mail <input type="text" name="email_enseignants" class="form-control" value="<?php echo $email_enseignants; ?>"><br>
                                                    Mot de passe <input type="password" name="mdp_enseignants" class="form-control" value="<?php echo $mdp_enseignants; ?>"><br>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-4">
                                                            <div class="form-outline">
                                                                Téléphone <input type="number" name="tel_enseignants" class="form-control" value="<?php echo $tel_enseignants; ?>"><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="submit" name="sinscrire" value="INSCRIRE" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>
