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

<h1>AUCH TRIATHLON</h1>

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







  <style> 
  body {
   background-color: #f5f5f5;
}
  #resultats-photos {
  text-align: center;
  padding: 50px;
}

#resultats-photos h1 {
  margin-bottom: 30px;
  color: red;
}

#catalogue-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

#year-select {
  margin-right: 10px;
  padding: 5px;
  border: 1px solid red;
  border-radius: 5px;
  color: red;
  background-color: white;
}

#update-button {
  background-color: red;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

#catalogue {
  width: 80%;
  margin: 30px auto;
  display: flex;
  flex-wrap: wrap;
}

#catalogue img {
  width: 30%;
  height: auto;
  margin: 5px;
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

  h1{
  text-align: center;
  color: red;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 3em;
  margin-bottom: 20px;
}
</style>
