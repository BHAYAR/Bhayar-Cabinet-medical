
<?php
$servername = "localhost"; // ou l'adresse IP du serveur
$username = "root"; // le nom d'utilisateur MySQL
$password = ""; // le mot de passe MySQL
$dbname = "cabinet_med"; // le nom de la base de données


// Crée une connexion
$conn = new mysqli($servername, $username, $password, $dbname);


// Prépare et exécute la requête
$sql = "SELECT id, nom_prenom FROM medecins";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crée le menu déroulant

    
    echo '<div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
            <select name="medecin_id" class="form-control" required>
            <option value="">Médecin</option>';
    while($row = $result->fetch_assoc()) {
        print_r($row["id"]);
        echo '<option value="' . $row["id"] . '"  >   ' . $row["nom_prenom"] . '</option>';
    }
    echo '      
                </select>
            </div>
          </div>';
} else {
    echo "0 résultats";
}
$conn->close();
?>


