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
if(isset($_POST['inscrire'])){
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $age=$_POST['age'];
        $nom_cours=$_POST['nom_cours'];
        $sql="INSERT INTO etudient(nom,email,password,age,nom_cours) VALUES ('$nom','$email','$password',$age,'$nom_cours')";
        $result=$conn->exec($sql);
        if($result >0)
        {
            header('Location: conxetudiant.php');
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
     <span class=" text-primary sous" style="font-size:25px">Inscrire Etudiant</span> </h1>
           
</div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card  " style="border-radius:15px">      
          <div class="card-body py-5 px-md-5"> 

        <form  action="" method="post">
        <div class="row">
             
             <div class="form-outline ">

Nom utilisateur<input type="text" name="nom" class="form-control "><br>
         Adresse e-mail <input type="text" name="email" class="form-control "><br>
         Mot de passe <input type="password" name="password" class="form-control "><br>
         <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
         Age <input type="number" name="age" class="form-control ">
</div>
</div>

                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
        Cours<input type="text" name="nom_cours" class="form-control "><br>
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
