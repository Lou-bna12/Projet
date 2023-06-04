<?php
require_once('connexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Modifier</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="Garage.png" width="60px"height="60px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Nos services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacte.html">Nous contacter</a>
        </li>
        <li class="nav-item">
         <a href="login.php" class="nav-link">Connexion</a>
       </li>
     </ul>
    </div>
  </div>
</nav>

 <div id="container">

    <form name="formUpdate" method="post" action="" class="formulaire" enctype="multipart/form-data">
        <h2 align-text="center">Mettre à jour une voiture...</h2>

        <label><b>Immatriculation : </b></label>
        <input type="text" name="txtImm" class="zonetext" value="<?php echo $_GET['mod'] ?>" readonly>

        <label><b>Marque : </b></label>
        <input type="text" name="txtMarque" class="zonetext" placeholder="Entrer la marque ici..." required >

        <label><b>Prix : </b></label>
        <input type="number" name="txtPrix" class="zonetext" placeholder="Entrer le prix unitaire..." required>

        <label><b>Année : </b></label>
        <input type="number" name="txtAnnee" class="zonetext" placeholder="Entrer l'année de la voiture..." required>

        <label><b>KM : </b></label>
        <input type="number" name="txtKM" class="zonetext" placeholder="Entrer le kilométrage de la voiture..." required>

        <label><b>Photo : </b></label>
        <input type="file" name="txtPhoto"  placeholder="Choisir une image..." required>

        <input type="submit" class="submit" name="btmod" value="Mettre à jour">

        <p><a href="Accueil.php" class="submit">Tableau de bord</a></p>
        <label style="text-align: center; color: #D95350;">

          <?php
          
          if(isset($_POST['btmod']))
          {
            $imma=$_POST['txtImm'];
            $marque=$_POST['txtMarque'];
            $prix=$_POST['txtPrix'];
            $annee=$_POST['txtAnnee'];
            $KM=$_POST['txtKM'];


            $modifier=$_GET['mod'];


            $image=$_FILES['txtPhoto']['tmp_name'];

            $traget="images/" .$_FILES['txtPhoto']['name'];

            move_uploaded_file($image,$traget);

            $reqUp="UPDATE automobile SET marque='$marque', prix='$prix', annee='$annee', KM='$KM', photo='$traget' WHERE  imma='$modifier'";

            $result=mysqli_query($connect,$reqUp);

            if($result)
            { 
                echo "Mise à jour des données validée...";

            }else
            {
                echo "Echec de modification des données...";
            }

          }



          ?>



</form>

</div>
    
</body>
</html>