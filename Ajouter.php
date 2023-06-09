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
    <title>Ajouter</title>
</head>
<body>

    
<div id="container">

    <form name="formAdd" action="" method="post" class="formulaire" enctype="multipart/form-data">

        <h2 align-text="center">Ajouter une nouvelle voiture</h2>

        <label><b>Immatriculation : </b></label>
        <input type="text" name="txtImm" class="zonetext" placeholder="Entrer la plaque d'immatriculation" required>

        <label><b>Marque : </b></label>
        <input type="text" name="txtMarque" class="zonetext" placeholder="Entrer la marque de la voiture" required>

        <label><b>Prix : </b></label>
        <input type="number" name="txtPrix" class="zonetext" placeholder="Entrer le prix de la voiture" required>

        <label><b>Année : </b></label>
        <input type="number" name="txtAnnee" class="zonetext" placeholder="Entrer l'année de la voiture" required>

        <label><b>Kilométrage : </b></label>
        <input type="number" name="txtkm" class="zonetext" placeholder="Entrer le kilométrage de la voiture" required>

        <labe><b>Catégorie : </b><label>
         <input type="text" name="txtCat" class="zonetext" placeholder="Entrer la catégorie de la voiure" required> 

        <label><b>Photo : </b></label>
        <input type="file" name="txtphoto" class="zonetext" placeholder="Choisir une image" required>

            <input type="submit" name="btadd" value="Ajouter" class="submit">

            <p><a href="Accueil.php" class="submit">Tableau de bord</a></p>
            
               <label style="text-align: center; color: #960406">
    
        <?php

      if(isset($_POST['btadd']))
      {
        $imma=$_POST['txtImm'];
        $marque=$_POST['txtMarque'];
        $prix=$_POST['txtPrix'];
        $annee=$_POST['txtAnnee'];
        $KM=$_POST['txtkm'];
        $Cat=$_post['txtCat'];

        $image=$_FILES['txtphoto']['tmp_name'];

        $traget="images/".$_FILES['txtphoto']['name'];

        move_uploaded_file($image,$traget);
        
        $reqAdd="INSERT INTO automobile(imma,marque,prix,annee,KM,photo,catégories) VALUES ('$imma','$marque','$prix','$annee','$KM','$Cat', '$traget')";

        $result=mysqli_query($connect, $reqAdd);
         
          if ($result)
          {
            echo "Insertion des données validée";
          }
          else
          {
            echo "Echec d'insertion des données";
          }
        
    }

        ?>



</label>

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