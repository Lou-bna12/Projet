<?php
require_once ("connexion.php");

?>
<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:ital,wght@1,200&family=Poppins&family=Rajdhani:wght@300;400&family=Raleway&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&family=Great+Vibes&family=Montserrat:ital,wght@1,200&family=Poppins&family=Rajdhani:wght@300;400&family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Garage V.Parrot</title>
</head>
<body>
    <div id="entete">
        <a href="Login.php" class="login">Connectez-vous</a>

</div>
        
        <h1>Garage V.Parrot</h1>
     <img src="Logo G.png" alt="logo"  id="logo">
        <div class="container-fluid">
        <p>Le meilleur garage de la région</p>
        <div class="divider">
      <form name="formauto" method="post" action="">
      <input id="motcle" type="text" name="motcle" placeholder=" Recherche par Marque...">
      <input  class="btfind" type="submit" name="btsubmit" value="Recherche">
    </form>
  </div>
  </div>
  </div>
</nav>
 </div>
     <div id="articles">
    <?php
            if (isset($_POST['btsubmit'])) {
                $mc = $_POST['motcle'];
                $reqSelect = "SELECT * FROM `automobile` WHERE `marque` LIKE '%$mc%' ";
            }
             else {
                $reqSelect = "SELECT * FROM `automobile`";
            }

            $result = mysqli_query($connect, $reqSelect);
            $nbr = mysqli_num_rows($result);
            echo "<p><b>".$nbr."</b> Résultats de votre recherche...</p>";
            while ($ligne = mysqli_fetch_assoc($result))
     {
                ?>
                <div id="auto">
                    <img src="<?php echo $ligne ['photo'] ?>"/><br/>
                    <?php echo $ligne ['marque']; ?><br />
                    <?php echo $ligne ['prix']; ?><br />
                    <?php echo $ligne ['annee']; ?><br />
                    <?php echo $ligne ['KM']; ?>
</div>

            <?php } ?>
        </div>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous">
</script> 
</body>

</html>