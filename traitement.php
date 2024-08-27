<?php

session_start();

if (($_POST['prenom']) == "" || ($_POST['nom']) == "") {
    $_SESSION['Err'] = "N'oublie pas d'écrire ton nom et prénom";
    header("location: http://localhost/interroentrainement");
} else {
    // print("Vous avez bien remplie le formulaire");
    $_SESSION["Err"] = "";

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $phrase1 = $_POST['phrase1'];
    $phrase2 = $_POST['phrase2'];
    $phrase3 = $_POST['phrase3'];
    $phrase4 = $_POST['phrase4'];
    $phrase5 = $_POST['phrase5'];
    $phrase6 = $_POST['phrase6'];
    $score = 0;

    setcookie('nom', $nom, time() + 100, null, null, false, true);
    setcookie('prenom', $prenom, time() + 100, null, null, false, true);

    if ($phrase1 == "non") {
        $score++;
    }
    if ($phrase2 == "non") {
        $score++;
    }
    if ($phrase3 == "oui") {
        $score++;
    }
    if ($phrase4 == TRUE) {
        $score++;
    }
    if ($phrase5 == FALSE) {
        $score++;
    }
    if ($phrase6 == TRUE) {
        $score++;
    }

    echo "<br/>"."score : ".$score."/6";
    $_SESSION["score"] = $score;

}

if ($score < 6) {
    $_SESSION["Err"] = "Ton score est de : ".$score.", essaie encore !";
    header("location: http://localhost/interroentrainement");
}
 else {
    try {
        $db = new PDO('mysql:dbname=eleve;host=localhost;charset=utf8', 'root', '');
    } catch (PDOException $e) {
        die("Une erreur est survenue lors de la connexion à la base de données");
    }
    global $db;
    $r = array('nom'=>$nom, 'prenom'=>$prenom);
    $sql = "INSERT INTO users (nom, prenom) VALUES (:nom, :prenom)";
    $req = $db->prepare($sql);
    $req->execute($r);
    
    header("location: http://localhost/interroentrainement/bravo.php");
}
 
?>