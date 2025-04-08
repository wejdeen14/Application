<html> 
    <head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <title>

</title>
  <style> 
    </style>
    </head>

    <body style="background-color: hsl(0, 0%, 96%)">
    <?php
    session_set_cookie_params(['secure' => true]);
    include_once('connexion.php');
if(isset($_POST['nom_enseignants']) && isset($_POST['mdp_enseignants'])){
    if((!empty($_POST['nom_enseignants'])) &&(!empty($_POST['mdp_enseignants']))){
        $nom_enseignants=$_POST['nom_enseignants'];
        $mdp_enseignants=$_POST['mdp_enseignants'];

        $sql="SELECT * FROM enseignants WHERE nom_enseignants='$nom_enseignants' AND mdp_enseignants='$mdp_enseignants'";
        $result=$conn->query($sql);
        if($result->rowCount()> 0)
      {
        $data = $result->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['id_enseignants']= $data['id_enseignants'];
        $_SESSION['nom_enseignants']= $data['nom_enseignants'];
        $_SESSION['mdp_enseignants']= $data['mdp_enseignants'];
       
   header('Location: pageacceuilenseignante.php');
  
    }
    else{
        echo "Login ou mot de passe incorrecte...";
    }
    }
}
?>
    <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
    <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
        <h1 class="my-5 display-3 fw-bold ls-tight " style="letter-spacing:2px"> 
            EDUCATION   <br />
            <span class=" text-primary sous" style="font-size:25px">Connexion enseignante</span> </h1>
           
</div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card  " style="border-radius:15px">      
          <div class="card-body py-5 px-md-5">  

        <form  action="" method="POST">
        
        <div class="row">
             
                    <div class="form-outline ">

        <input type="text" name="nom_enseignants" class="form-control " placeholder="nom utilisateur"><br> <br>
      <input type="password" name="mdp_enseignants" class="form-control"  placeholder="mot de passe"><br>
         <input type="submit" name="sinscrire" value="se connecter"  class="btn btn-primary btn-block mb-4 btn-lg btn-block form-control"> <br>
        <a href="inscriptionenseignants.php" style="margin-left:100px;" >vous n'avez pas un compte? inscrire</a> 
        <br>
        <br>
       


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
