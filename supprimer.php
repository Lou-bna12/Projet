<?php
require_once ("connexion.php");

?>
<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<!--Footer-->

<section class="footer">
  <div class="social">
     <a href="#"><i class="fab fa-instagram"></i></a>
     <a href="#"><i class="fab fa-telegram"></i></a>
     <a href="#"><i class="fab fa-facebook"></i></a>
     <a href="#"><i class="fab fa-twitter"></i></a>
  </div>

  <ul class="list">
    <li>
      <a href="#">Home</a>
    </li>

    <li>
      <a href="#">Services</a>
    </li>

    <li>
      <a href="#">À propos</a>
      </li>

      <li>
        <a href="#">Termes</a>
        </li>

        <li>
          <a href="#">Politique de confidentialité</a>
          </li>

  </ul>
<p class="copyright">
   Future Coders @ 2023
  </p>
     
</section>

</body>
</html>