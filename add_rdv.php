<?php
// Récupérer les données du formulaire
$nom_prenom = $_POST['nom_prenom'];
$email = $_POST['emaill'];
$telephone = $_POST['telephone'];
$departement = $_POST['departement'];
$medecin = $_POST['medecin_id'];
$date = $_POST['date_rdv'];
$message = $_POST['message'];

// Connexion à la base de données
$servername = "localhost"; // ou l'adresse IP du serveur
$username = "root"; // le nom d'utilisateur MySQL
$password = ""; // le mot de passe MySQL
$dbname = "cabinet_med"; // le nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Préparation de la requête SQL
$sql = "INSERT INTO rendez_vous (nom_prenom, email, tel, departement, id_medecin, date, message) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nom_prenom, $email, $telephone, $departement, $medecin, $date, $message);

// Exécution de la requête
if ($stmt->execute()) {
    echo "Rendez-vous enregistré dans la base de données avec succès!";
} else {
    echo "Erreur : " . $stmt->error;
}

// Fermeture de la connexion
$stmt->close();
$conn->close();
?>
