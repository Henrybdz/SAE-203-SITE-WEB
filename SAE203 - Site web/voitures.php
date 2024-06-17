<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <header>
        <div class="parent-header">
            <a href="index.php">HOME</a>
            <a href="index.php#modeles">MODELS</a>
            <a href="Contact.html">ADD CAR</a>
            <img class="img-header" src="./img/pngegg.png" alt="logo"></img>
        </div>
    </header>

    <main>
        <div class="car-details">
            <?php
            // Vérifie si le paramètre "modele" est présent dans l'URL
            if (isset($_GET['modele'])) {
                // Connexion à la base de données
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=bdd_mclaren_website;charset=utf8', 'root', '');
                } catch (Exception $err) {
                    die('Erreur de la connexion MySQL : ' . $err->getMessage());
                }

                // Récupération du modèle de voiture depuis l'URL
                $modele = $_GET['modele'];

                // Préparation et exécution de la requête SQL pour récupérer les détails de la voiture
                $requete = $bdd->prepare("SELECT * FROM cartes_voitures WHERE modele = ?");
                $requete->execute([$modele]);
                $voiture = $requete->fetch(PDO::FETCH_ASSOC);

                // Affichage des détails de la voiture
                echo "<div class='car-info'>";
                echo "<div class='car-image'>";
                echo "<img src='" . htmlspecialchars($voiture['modele']) . "' alt='Image de " . htmlspecialchars($voiture['modele']) . "'>";
                echo "</div>";
                echo "<div class='car-text'>";
                echo "<h2 class='couleur2'>Modèle : " . htmlspecialchars($voiture['modele']) . "</h2>";
                echo "<p class='couleur2'>Couleur : " . htmlspecialchars($voiture['couleur']) . "</p>";
                echo "<p class='couleur2'>Kilomètre : " . htmlspecialchars($voiture['kilometrage']) . "</p>";
                echo "<p class='couleur2'>Description : " . htmlspecialchars($voiture['description']) . "</p>";
                echo "</div>";
                echo "</div>";

                // Fermeture de la connexion à la base de données
                $bdd = null;
            } else {
                echo "<p>Aucun modèle de voiture sélectionné.</p>";
            }
            ?>
        </div>
    </main>

    <footer>
        <div class="footer">
            <!-- Votre footer ici -->
        </div>
    </footer>

    <script src="./js/script.js"></script>
</body>

</html>
