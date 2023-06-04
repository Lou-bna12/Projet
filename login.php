<?php 
require_once("connexion.php");

?>
<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">

    <title>Connexion</title>
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
        <form action="" method="post" class="formulaire">
            <h1>Connexion</h1>
            <label for="Username"><b>Nom d'utilisateur : </b></label>
            <input type="text" name="txtlogin" id="Username" placeholder="Entrer votre nom d'utilisateur" class="zonetext">

            <label for="password"><b>Mot de passe :</b></label>
            <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe"  class="zonetext">
            <input type="submit" value="Connexion" name="btsubmit" id="submit" class="submit">  

        <?php

        if(isset($_POST['btsubmit']))
        {
            $req="SELECT * FROM `utilisateurs` WHERE `id`='".$_POST['txtlogin']."' AND `password`='".$_POST['password']."'";
          if  ($result=mysqli_query($connect,$req))
          {
            $ligne=mysqli_fetch_assoc($result);
            if($ligne!=0)
            {
                session_start();
                $_SESSION['monLogin']=$_POST['txtlogin'];
                header("location:Accueil.php");
            }
            else{
                echo "<p style='color:red'>Login ou mot de passe incorrect</p>";
            }
          }
        }
      
       
    ?>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>    
    
</body>
</html>