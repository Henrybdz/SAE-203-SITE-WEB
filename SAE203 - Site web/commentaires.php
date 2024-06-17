<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_mclaren_website;charset=utf8', 'root', '');
} catch (Exception $err) {
    die('Erreur de la connexion MySQL : ' . $err->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = htmlspecialchars($_POST['comment']);
    $stmt = $bdd->prepare("INSERT INTO commentaires (commentaire) VALUES (?)");
    $stmt->execute([$comment]);
}

$reponse = $bdd->query("SELECT * FROM commentaires");
$comments = $reponse->fetchAll(PDO::FETCH_ASSOC);

$bdd = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Commentaires</title>
</head>
<body>
    <header>
        <div class="parent-header">
            <a href="index.php">HOME</a>
            <a href="index.php#modeles">MODELS</a>
            <a href="Contact.html">ADD CAR</a>
            <a href="commentaires.php">COMMENTS</a>
            <img class="img-header" src="./img/pngegg.png"></img>
        </div>
    </header>

    <main>
        <div class="comment-section">
            <h2>Ajouter un commentaire</h2>
            <form method="post" action="commentaires.php">
                <textarea name="comment" required></textarea>
                <button type="submit">Envoyer</button>
            </form>

            <h2>Commentaires des utilisateurs (anonymes)</h2>
            <?php foreach ($comments as $comment) : ?>
                <div class="comment">
                    <p><?= htmlspecialchars($comment['commentaire']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
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
    <script src="./js/script.js"></script>
</body>
</html>
