<?php
// Mise en place d'une session utilisateurs + cookies. 
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
setcookie('nom_cookie', 'valeur', time() + (86400 * 30), '/');
?>

<!DOCTYPE html>
<html lang="fr">
  <!--Titre de la page = balise méta avec les mots clés pour le référencement-->
  <head>
    <title>Contactez-nous</title>
  </head>
  <body>
    <header>
    <img class="bandeau" src="LogoTriAUCH.JPG">
    <nav>
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="Page-Entrainement.php">Entrainements</a></li>
        <li><a href="Page-Resultat-Photos.php">Résultats et photos</a></li>
        <li><a href="Contactez-nous.php">Contact</a></li>
        <li><a href="News.php">News</a></li>
        <li><a href="Admin.php">Administration</a></li>
      </ul>
    </nav>
  </header>
  
  <h1 style =" color : red">Contactez-nous</h1>
    <!--Création du formulaire avec nom, email, objet message, avec un boutton retour et un script JS qui gère un msg automatique quand le formulaire et envoyer-->
    <form action="Contactez-nous.php" method="post"  class="formulaire">
      <label for="nom">Nom:</label>
      <input type="text" id="nom" name="nom" required><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>
      <label for="objet">Objet:</label>
      <input type="text" id="objet" name="objet" required><br><br>
      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea><br><br>
      <input type="submit" value="Envoyer">
    </form>
    <div id="thanks" style="display:none;">
        <p>Merci, nous reviendrons vers vous dans les plus brefs délais</p>
        <button onclick="window.location.href='Contactez-nous.php'">Retour</button>
    </div>
</body>

<!--Script pour gèrer un boutton retour a la fin du formulaire pour recharger la page de base-->
<script>
function showThanks() {
  document.getElementById("thanks").style.display = "block";
  return false;
}
function returnToContact() {
  location.href = '/contact';
}
</script>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auchtri32";

// Création de la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $objet = $_POST["objet"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contact (nom, email, objet, message) VALUES ('$nom', '$email', '$objet', '$message')";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Erreur lors de la préparation de la requête : " . $conn->error);
}


    if ($stmt->execute()) {
      echo '<div style="background-color: red; color: white; padding: 10px;">Message envoyé avec succès.</div>';
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();

?>



<!--Implémentation du css, ici on donne partout le code couleur rouge et blanc -->
<style> 
body {
   background-color: #f5f5f5;
}
header {
  background-color: white;
  padding: 20px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}
 /* CSS pour la nav */
nav ul {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  margin: 0 10px;
}

nav a {
  color: red;
  text-decoration: none;
  font-size: 18px;
  padding: 10px;
  transition: all 0.2s ease-in-out;
}

nav a:hover {
  background-color: red;
  color: white;
  border-radius: 5px;
}

nav a.active {
  background-color: red;
  color: white;
  border-radius: 5px;
}

#presentation {
  padding: 30px;
  text-align: center;
}

#presentation h1 {
  font-size: 36px;
  margin-bottom: 20px;
}

#presentation p {
  font-size: 18px;
  line-height: 1.5;
  margin-bottom: 20px;
}
    body{
  background-color: #F5F5F5;
}

form {
  width: 50%;
  max-width: 600px;
  margin: 50px auto;
  padding: 30px;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0px 0px 10px #BBBBBB;
}

label, input, textarea{
  font-size: 1.2em;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: none;
  display: block;
  width: 100%;
}

label {
  color: red;
  text-transform: uppercase;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="submit"] {
  background-color: red;
  color: white;
  border-radius: 25px;
  padding: 15px;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
  width: 50%;
  margin: 30px auto;
  display: block;
}

input[type="submit"]:hover {
  background-color: darkred;
}

textarea{
  height: 200px;
  
}


button[onclick="window.location.href='Contactez-nous.php'"]{
  background-color: red;
  color: white;
  padding: 10px 15px;
  border-radius: 25px;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
  border: none;
  margin-top: 20px;
}

button[onclick="window.location.href='Contactez-nous.php'"]:hover{
  background-color: darkred;
}

#thanks p{
  text-align: center;
  font-size: 1.5em;
  color: rgb(0, 0, 0);
  font-weight: bold;
  margin-bottom: 20px;
}

  h1{
  text-align: center;
  color: rgb(0, 0, 0);
  text-transform: uppercase;
  font-weight: bold;
  font-size: 3em;
  margin-bottom: 20px;
}

img{
  justify-content: left;
  display:left;;
}
input[type="text"], 
input[type="email"], 
input[type="tel"], 
textarea {
  border: 1px solid black;
}
</style>

<footer style="background-color: grey; color: red; padding: 20px; display: flex; justify-content: center;">
  <div style="margin-right: 20px;">
    <img src="LogoTriAUCH.jpg" alt="Logo du club" style="width: 50px;">
  </div>
  <div style="text-align: center;">
    Contact : 
    <br>
    Morello Clément : <a style="color: white;" href="tel:+33123456789">: 06 84 28 16 80 </a>
  <br>
  Trap Jérémy  : <a style="color: white;" href="tel:+33987654321">: 06 22 63 32 57</a>
  <br>
  Mail : <a style="color: white;" href="mailto:personne1@example.com">auch.triathlon32@gmail.com</a>
  <br>
    <br><br>
    <a style="color: white;" href="mentions_legales.html">Mentions légales</a>
  </div>
</footer>

