<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <title>
    <title>Document</title>
    <style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
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
	background: #435d7d;
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
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}

table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	

table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}

</style>
</head>
<body >
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Liste <b>Etudiant</b></h2>
					</div>
					<div class="col-sm-6">
                    <form action='modificationetud.php' method='GET'>
						<button type="submit" name="ajouter"  class="btn btn-success" data-toggle="modal" >
                            <i class="material-icons">&#xE147;</i> <span>Ajouter un  nouveaux Etudiant</span></button>
</form>
                        </div>
				</div>
			</div>
   
   <?php
include_once('connexion.php');
        $req = "SELECT * FROM etudient";
        $resultat = $conn->query($req);
        //methode 1 avec fetchAll
        $data = $resultat->fetchAll(PDO::FETCH_ASSOC);
    
        $ent = <<<ENT
             <table class="table table-striped table-hover">
              <tr>
                 <th>ID</th>
                 <th>Nom</th>
                 <th>Email</th>
                 <th>Password</th>
                 <th>Age</th>
                 <th>Cours</th>
                
                 <th>Action</th>
              </tr>
ENT;   

        echo $ent;
        foreach($data as $ligne) {
           // echo "Nom : ".$ligne['nom']."<br>";
            $id = $ligne['id'];
            $nom = $ligne['nom'];
            $email = $ligne['email'];
            $password = $ligne['password'];
            $age = $ligne['age'];
            $nom_cours = $ligne['nom_cours'];
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$nom</td>";
            echo "<td>$email</td>";
            echo "<td>$password</td>";
            echo "<td>$age</td>";
            echo "<td>$nom_cours</td>";
            
            echo "<td>";
            echo "<form action='modificationetud.php' method='GET'>";

           echo "<input type='hidden' name='id' value='$id'>";
      
        echo"<button type='submit' name='modifier' class='edit btn btn-outline' data-toggle='modal'>
        <i class='material-icons' data-toggle='tooltip' title='Edit'  style='color:green';> &#xE254;</i></button>";
        echo"<button type='submit' name='delete' class='delete btn btn-outline' data-toggle='modal'>
        <i class='material-icons' data-toggle='tooltip' title='Delete' style='color:red';>&#xE872;</i></button></form>";
           echo" </td>";
            echo "</tr>";
        }
        echo "</table>";
		echo "</form>";
       
		echo "<a href='http://localhost/wejdenphp/applicationnote/crudenseignantsliste.php'>
        <i class='material-icons' style='color: blue;'>arrow_back</i>
      </a>";
		echo "<a href ='http://localhost/wejdenphp/applicationnote/crudetudiantliste.php'>
		<i class='material-icons' style =color:blue;'> arrow_forward </i></a>";
	

    ?>
    
</body>
</html>