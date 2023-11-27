<?php
require_once('./conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $usr_id = $_POST['Membre_ID'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prénom'];
    $email = $_POST['email'];
    $phone = $_POST['téléphone'];
    $role = $_POST['rôle'];
    $teamId = $_POST['équipe_ID'];
    $statut = $_POST['statut'];

    try {
        // SQL statement to update a record in the 'personnel' table
        $stmt = $conn->prepare("UPDATE personnel 
                                SET nom = ?, prénom = ?, email = ?, téléphone = ?, rôle = ?, équipe_ID = ?, statut = ? 
                                WHERE Membre_ID = ?");
        
        // Bind parameters
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $phone);
        $stmt->bindParam(5, $role);
        $stmt->bindParam(6, $teamId);
        $stmt->bindParam(7, $statut);
        $stmt->bindParam(8, $usr_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to display_tables.php after modifying user
            header("Location: dash.php");
            exit();
        } else {
            echo "Execute failed";
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Close the connection (optional)
$conn = null;
?>