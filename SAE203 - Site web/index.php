<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_mclaren_website;charset=utf8', 'root', '');
} catch (Exception $err) {
    die('Erreur de la connexion MySQL : ' . $err->getMessage());
}

$reponse = $bdd->query("SELECT * FROM cartes_voitures");

$table = $reponse->fetchAll(PDO::FETCH_ASSOC);

$bdd = null;

$resultat = "<div class='card-section'>";
$resultat .= "<div class='cartes'>";

foreach ($table as $ligne) {
    $image_path = "./img/" . htmlspecialchars($ligne['image_url']);
    if (file_exists($image_path)) {
        $resultat .= "<div class='carte' id='m" . htmlspecialchars($ligne['modele']) . "' style='background-image: url(" . $image_path . ");'>";
        $resultat .= "<p class='modele'>" . htmlspecialchars($ligne['modele']) . "</p>";
        $resultat .= "<p class='description'>McLaren est une marque emblématique de voitures de sport, reconnue pour ses designs innovants et ses performances exceptionnelles. Chaque modèle offre une expérience de conduite inégalée.</p>";
        $resultat .= "<a href='voitures.php?modele=" . urlencode($ligne['modele']) . "'><button class='bouton-carte'>En savoir plus</button></a>";
        $resultat .= "</div>";
    } else {
        // Gérer le cas où l'image n'existe pas
        $resultat .= "<div class='carte' id='m" . htmlspecialchars($ligne['modele']) . "'>";
        $resultat .= "<p class='modele'>" . htmlspecialchars($ligne['modele']) . "</p>";
        $resultat .= "<p class='description'>L'image de cette voiture n'est pas disponible.</p>";
        $resultat .= "<a href='voitures.php?modele=" . urlencode($ligne['modele']) . "'><button class='bouton-carte'>En savoir plus</button></a>";
        $resultat .= "</div>";
    }
}

$resultat .= "</div>";
$resultat .= "</div>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/jpg" href="./img/mclaren-brand-symbol-logo-black-design-british-car-automobile-illustration-with-orange-background-free-vector.jpg " />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <title>SAE203 - WEBSITE</title>
</head>

<body>
    <header>
        <div class="parent-header">
            <a href="">HOME</a>
            <a href="#modeles">MODELS</a>
            <a href="./Contact.html">ADD CAR</a>
            <a href="commentaires.php">COMMENTS</a>
            <img class="img-header" src="./img/pngegg.png"></img>
        </div>
    </header>

    <main>
        <div class="parent-main">
            <H1 class="texte-main">MCLAREN <span id="GTR">GTR</span></H1>
            <img src="./img/06db7fdae44fe0670c3385e93d3b89cc.png" alt="" class="img-main">
        </div>
        <div class="spec">
            <p>Power : 650hp</p>
            <p>Acceleration : 2,4s</p>
            <p>Engine : 4.0 liters</p>
            <p>La McLaren P1 GTR est une version piste de la McLaren P1 qui est la descendante de la McLaren F1 GTR.
                Elle n'est pas homologuée pour la voie publique. Mais certains acquéreurs de cette voiture ont réussi à
                l’homologuer grâce à certains sacrifices (siège passager en plus, plaque d'immatriculation, etc.) Elle
                dispose d'un aileron arrière doté d'un système de DRS utilisé en Formule 1.</p>
        </div>
        <div class="text-modeles">
            <h1 id="modeles" class="modèles">MODELS</h1>
        </div>
        <?=$resultat?>
    </main>

    <footer>
        <div class="footer">
            <div class="row">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>

            <div class="row">
                <ul>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>

            <div class="row">
                INFERNO Copyright © 2021 Inferno - All rights reserved || Designed By: Henry Budzynski
            </div>
        </div>
    </footer>

    <Script src="./js/script.js"></Script>
</body>

</html>
 