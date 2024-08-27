<!DOCTYPE html>
<head>
<link rel="stylesheet" href="style.css">
<title>Evaluations CE1</title>
<script type="text/javascript">
    function fonctionpopup() {
  if (confirm("Etes vous sur d'effacer vos reponses ?")) {
    txt = "les reponses ont ete effacees";
  } else {
  }
}

function fonctiononchange() {
    if (document.getElementById("prenom").value.match(/[0-9]/)) {
        document.getElementById("prenom").style.color = "red";
    } else if (document.getElementById("prenom").value.match(/[a-zA-Z]/)) {
        document.getElementById("prenom").style.color = "green";
    }
}

</script>
</head>
<body>
<section class="quiz">

<?php 
session_start();
$nomErr = $prenomErr = "";

?>

<form action="traitement.php" method="POST">
    <span class="error"><?php echo $_SESSION["Err"]."<br/>"; ?></span>
<label for="prenom">Prénom : </label><br>
<input type="text" id="prenom" name="prenom" onchange="fonctiononchange()" value=<?php if (isset($_COOKIE['prenom'])) { echo $_COOKIE['prenom']; } else {echo "";}; ?>><br>
<label for="nom">Nom : </label><br>
<input type="text" id="nom" name="nom" value=<?php if (isset($_COOKIE['nom'])) { echo $_COOKIE['nom']; } else {echo "";}; ?> ><br><br>
<fieldset>
Dis si les phrases suivantes sont correctes :</br>
<ul>
<li> je suis en CE1 </li>
</ul>
<input type="radio" id="oui" name="phrase1" value="oui">
<label for="oui">Oui</label><br>
<input type="radio" id="non" name="phrase1" value="non">
<label for="non">Non</label><br>
<ul>
<li> Je CE1 suis en. </li>
</ul>
<input type="radio" id="oui" name="phrase2" value="oui">
<label for="oui">Oui</label><br>
<input type="radio" id="non" name="phrase2" value="non">
<label for="non">Non</label><br>
<ul>
<li> Je suis en CE1. </li>
</ul>
<input type="radio" id="oui" name="phrase3" value="oui">
<label for="oui">Oui</label><br>
<input type="radio" id="non" name="phrase3" value="non">
<label for="non">Non</label>
</fieldset>
<br><br>
<fieldset>

Coche quand la pharse est interrogative :</br>
Où est Brian ? <input type="checkbox" name="phrase4"> <br>
Il pleut aujourd'hui. <input type="checkbox" name="phrase5"> <br>
Quelle heure est-il ? <input type="checkbox" name="phrase6">
</fieldset>
<br><br>
<input type="submit" value="Vérifier">
<input onclick="fonctionpopup()" type="reset" value="effacer les réponses" >
</form>
</section>
</body>
</html>