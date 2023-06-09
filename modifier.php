<?php
require_once('connexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Modifier</title>
</head>
<body>


 <div id="container">

    <form name="formUpdate" method="post" action="" class="formulaire" enctype="multipart/form-data">
        
        <h2>Mettre à jour une voiture...</h2>

        <label><b>Immatriculation : </b></label>

        <input type="text" name="txtImm" class="zonetext" value="<?php echo $_GET['mod'] ?>" readonly>

        <label><b>Marque : </b></label>
        <input type="text" name="txtMarque" class="zonetext" placeholder="Entrer la marque ici..." required >

        <label><b>Prix : </b></label>
        <input type="text" name="txtPrix" class="zonetext" placeholder="Entrer le prix unitaire..." required>

        <label><b>Année : </b></label>
        <input type="text" name="txtAnnee" class="zonetext" placeholder="Entrer l'année de la voiture..." required>

        <label><b>KM : </b></label>
        <input type="number" name="txtKM" class="zonetext" placeholder="Entrer le kilométrage de la voiture..." required>

        <labe><b>Catégorie : </b><label>
         <input type="text" name="txtCat" class="zonetext" placeholder="Entrer la catégorie de la voiure" required> 

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
            $Cat=$POST['txtCat'];


            $modifier=$_GET['mod'];


            $image=$_FILES['txtPhoto']['tmp_name'];

            $traget="images/" .$_FILES['txtPhoto']['name'];

            move_uploaded_file($image,$traget);

            $reqUp="UPDATE automobile SET marque='$marque', prix='$prix', annee='$annee', KM='$KM', catégories='$Cat', photo='$traget' WHERE  imma='$modifier'";

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