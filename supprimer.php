<?php
require_once ("connexion.php");

?>
<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Supprimer</title>
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
    <form name="formdelet" class="formulaire">
    <p><a href="Accueil.php" class="submit">Tableau de bord</a></p>

    

     
<?php

   if(isset($_GET['supCar']))
{
    $sup=$_GET['supCar'];
    $reqDelete="DELETE FROM automobile WHERE imma='$sup'";
    $result=mysqli_query($connect,$reqDelete);

}

if($result)
  {
   echo "<label style='text-align: center; color: #960406;'> La suppression a été bien effectuée...</label>";
  }
else{

   echo "<label style='text-align: center; color: #960406;'> La suppression a échouée...</label>";
}

?>
</form>
</div>

</body>
</html>