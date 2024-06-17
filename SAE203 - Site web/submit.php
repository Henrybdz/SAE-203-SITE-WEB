<?php
// Inclure le fichier de configuration pour les paramètres de connexion à la base de données
include 'config.php';

// Vérifier que la méthode de requête est bien POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Récupérer les données du formulaire
    $model = $_POST['model'];
    $color = $_POST['color'];
    $mileage = $_POST['mileage'];
    $message = $_POST['message'];

    // Préparer et exécuter la requête SQL
    $stmt = $conn->prepare("INSERT INTO Ajouter_voiture (model, color, mileage, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $model, $color, $mileage, $message);

    if ($stmt->execute()) {
        echo "<p class='texte-bdd'>Les données ont été envoyées à la base de donnée avec succès.<br> Merci de participer à l'ajout de nouvelles voitures sur le site internet.</p> <a href='javascript:history.back()'>Retour</a>";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Méthode de requête non autorisée";
}
?>