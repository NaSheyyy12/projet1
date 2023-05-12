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
<html lang='fr'>
<head>
  <title>Accueil - Site de Triathlon</title>
</head>
<body>
  <header>
  <img class="bandeau" src="LogoTriAUCH.JPG">
    <nav>
      <ul>
        <li><a href="index.php" class="active">Accueil</a></li>
        <li><a href="Page-Entrainement.php">Entrainements</a></li>
        <li><a href="Page-Resultat-Photos.php">Résultats et photos</a></li>
        <li><a href="Contactez-nous.php">Contact</a></li>
        <li><a href="News.php">News</a></li>
        <li><a href="Admin.php">Administration</a></li>

      </ul>
    </nav>
  </header>
  <h1>Ajouter Des News</h1>
      <form method="post" action="News.php">  
      Titre du news : <input name="titre" required/><br/>  
       contenu :<br/>  
      <textarea name="contenu" rows="10" cols="45" required> </textarea> <br/>  
          Ajout l'image : <input type="file" name="url" accept="image/*"><br/>
       <input type="submit" value="Envoyer"/>  
</form>  

<h1>Ajouter Des Résultats</h1>
      <form method="post" action="Page-Resultat-Photos.php">  
      Titre du résultats : <input name="titre" required/><br/>  
       contenu :<br/>  
      <textarea name="contenu" rows="10" cols="45" required> </textarea> <br/>  
       <input type="submit" value="Envoyer"/>  
</form>  

  </header>
</body>
</html>

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titre = $_POST["titre"];
  $contenu = $_POST["contenu"];
  $url = $_POST["url"];
  $timestamp = time(); // Ajout de la date de publication

  $sql = "INSERT INTO news (titre, contenu, url, timestamp) VALUES ('$titre', '$contenu', '$url', '$timestamp')";
  
  $stmt = $conn->prepare($sql);
  if ($stmt === false) {
      die("Erreur lors de la préparation de la requête : " . $conn->error);
  }

  if ($stmt->execute() === false) {
      die("Erreur lors de l'exécution de la requête : " . $stmt->error);
  }

  $stmt->close();
}



$conn->close();

?>

  <style>  
  form {
  background-color: white;
  border-radius: 5px;
  padding: 20px;
  margin: auto;
  max-width: 600px; /* Pour limiter la largeur du formulaire */
}

textarea[name="contenu"] {
  border: 1px solid black;
  padding: 10px;
  resize: none;
}

input[type="text"], textarea {
  border: none;
  border-radius: 5px;
  padding: 10px;
  margin: 5px;
  width: 100%;
  font-size: 16px;
  font-weight: bold;
  color: black;
  background-color: white;
}

input[type="submit"] {
  border: none;
  border-radius: 5px;
  padding: 10px;
  margin-top: 10px;
  width: 100%;
  font-size: 16px;
  font-weight: bold;
  color: white;
  background-color: #FF0000; /* rouge */
  transition: all 0.3s ease-in-out;
}

input[type="submit"]:hover {
  cursor: pointer;
  background-color: #DC143C; /* rouge foncé */
}

label {
  font-size: 16px;
  font-weight: bold;
  color: black;
}

body {
  background-color: #EFEFEF; /* gris clair */
}

h1 {
  font-size: 24px;
  font-weight: bold;
  color: #FF0000; /* rouge */
  text-align: center;
  margin: 20px;
}

  header {
  background-color: white;
  padding: 20px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
}

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

h1 {
  color : red
}
form {
  max-width: 500px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
}

input[type="text"], textarea {
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  width: 100%;
  font-size: 18px;
}

input[type="submit"] {
  background-color: #FF4136;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 18px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #FF6347;
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
