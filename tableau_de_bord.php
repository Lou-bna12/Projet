<?php
require_once ('connexion.php');
?>

<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Tableau de bord</title>
    </head>
<body>

<p><h1><b>Liste de voitures...</b></h1>
<?php
 
$reqselect = "SELECT * FROM `automobile`";
$result = mysqli_query($connect, $reqselect);   

$nbr = mysqli_num_rows($result);

 echo "<p>Total <b>".$nbr." </b>voitures...</p>";
?>
</p>
<p><a href="Ajouter.php"><img src="images/Ajouter(2).png" width="50px" height="50px" ></a></p>

<table>
    <tr>
        <th>Photo</th>
        <th>Marque</th>
        <th>Immatriculation</th>
        <th>Prix</th>
        <th>Année</th>
        <th>Kilométrage</th>
        <th>Catégories</th>
        <th>Modifier</th>
        <th>Supprimer</th>

        <?php

        while ($ligne = mysqli_fetch_assoc($result))
        {
            ?>

            <tr>
                <td><img src="<?php echo $ligne ['photo'];?>" class="photocar"></td>
                <td><?php echo $ligne ['marque']; ?></td>
                <td><?php echo $ligne ['imma']; ?></td>
                <td><?php echo $ligne ['prix']; ?></td>
                <td><?php echo $ligne ['annee']; ?></td>
                <td><?php echo $ligne ['KM']; ?></td>
                <td><?php echo $ligne ['catégories']; ?></td>
                <td><a href="modifier.php?mod=<?php echo $ligne ['imma']; ?>"><img src="images/modifier.jpg" width="50px" height="50px"></a></td>
                <td><a href="supprimer.php?supCar=<?php echo $ligne ['imma']; ?>"><img src="images/supprimer.png" width="50px" height="50px"></a></td>
            </tr>

        <?php
         }
         ?>

    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>