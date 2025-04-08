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
if(isset($_POST['sinscrire'])){
        $nom_enseignants=$_POST['nom_enseignants'];
        $email_enseignants=$_POST['email_enseignants'];
        $mdp_enseignants=$_POST['mdp_enseignants'];
        $tel_enseignants=$_POST['tel_enseignants'];
        $sql="INSERT INTO enseignants(nom_enseignants,mdp_enseignants,email_enseignants,tel_enseignants) VALUES ('$nom_enseignants','$mdp_enseignants','$email_enseignants',$tel_enseignants)";
        $result=$conn->exec($sql);
        if($result >0)
        {
           
            header('Location: conxenseignant.php');
        }
        else{
            echo "erorr <br>";
        }

    }
?>
    <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
    <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
        <h1 class="my-5 display-3 fw-bold ls-tight " style="letter-spacing:2px"> 
     EDUCATION<br>
     <span class=" text-primary sous" style="font-size:25px">Inscrire Enseignant</span> </h1>
           
</div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card  " style="border-radius:15px;">      
          <div class="card-body py-5 px-md-5"> 

    
        <form name="f1" action="" method="post">
        <div class="row">
             
             <div class="form-outline ">

         Nom utilisateur  <input type="text" name="nom_enseignants"  class="form-control "><br>
         Adresse e-mail <input type="text" name="email_enseignants" class="form-control "><br>
         mot de passe <input type="password" name="mdp_enseignants" class="form-control "><br>
         <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
         téléphone <input type="number" name="tel_enseignants" class="form-control "><br>
</div>
</div>
</div>
         <input type="submit" name="sinscrire" value="INSCRIRE" class="btn btn-primary">

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