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