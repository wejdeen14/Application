<html> 
    <head> 
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>

        </title>
    </head>
    <?php
   

include_once('connexion.php');
$login="wejdenadmin";
$pass="wejwej1234";
if(isset($_POST['nom']) && isset($_POST['password']) &&(isset($_POST['sinscrire'])) ){
    if(($_POST['nom']==$login) && ($_POST['password']==$pass)){
        header('Location: liste.php');
        
      
    }
   
    else{
        echo "<p style='color:red;'>vous etes pas l'admin verifier votre  donées</p>";
    }
    }

?>
    <body style="background-color: hsl(0, 0%, 96%)">
    <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
    <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
        <h1 class="my-5 display-3 fw-bold ls-tight " style="letter-spacing:2px"> 
       BONJOUR  <br />
            <span class=" text-primary sous" style="font-size:25px">Admin Connecté sur votre plateforme </span> </h1>
           
</div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card  " style="border-radius:15px">      
          <div class="card-body py-5 px-md-5">  
        <form  action="" method="POST">
        <div class="row">
             
             <div class="form-outline ">
         <input type="text" name="nom" class="form-control " placeholder="nom utilisateur"><br><br>
          <input type="password" name="password" class="form-control " placeholder="mot de passe "><br>
         <input type="submit" name="sinscrire" value="se connecter" class="btn btn-primary btn-block mb-4 btn-lg btn-block form-control"><br>
         
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
