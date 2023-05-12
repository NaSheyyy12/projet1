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
        <li><a href="index.php">Accueil</a></li>
        <li><a href="Page-Entrainement.php">Entrainements</a></li>
        <li><a href="Page-Resultat-Photos.php">Résultats et photos</a></li>
        <li><a href="Contactez-nous.php">Contact</a></li>
        <li><a href="News.php">News</a></li>
        <li><a href="Admin.php">Administration</a></li>
      </ul>
    </nav>
  </header>
  <body>
  <!--Présentation du club -->
  <div id="presentation">
    <h1>Bienvenue sur notre site de Triathlon</h1>
    <p>Notre club de triathlon basé à Auch dans le Gers en France, est dédié aux amateurs et professionnels du triathlon. Nous proposons des entraînements, des compétitions et des résultats pour tous les niveaux.</p>
    <p>Rejoignez-nous pour améliorer votre condition physique, rencontrer des personnes partageant la même passion et vivre de nouvelles expériences.</p>
  </div>
</div>

<!--bloc Pour prendre ou renouveler sa licence-->
  <div class="licence-container">
    <h2 class="licence-title"style="color: red;">Pour prendre ou renouveler sa licence, suivez les étapes suivantes :</h2>
    <div class="licence-block">
        <p>Effectuer sa demande de licence sur l’Espace Tri 2.0 de la F.F.Tri. :<a href="https://espacetri.fftri.com/">fftri</a></p>
        <p>Nouvelle licence : cliquez sur « Se licencier ».</p>
        <p>Déjà licencié F.F.Tri. : cliquez sur « Se connecter » avec vos identifiants pour renouveler sa licence de la nouvelle saison</p>
        <p>Compléter ou vérifier tous les champs de chaque page. Sélectionner le club AUCH TRIATHLON.</p>
        <p>Imprimer le formulaire de demande de licence F.F.Tri. que vous avez reçu par messagerie et le signer.</p>
        <p>Compléter, pour les mineurs, l’autorisation parentale de contrôle antidopage et la signer.</p>
        <p>Faire un certificat médical (avec la mention triathlon en compétition afin de participer à des courses pour les nouveaux). Pour les renouvellements de licence, le certificat est valable 3 ans. Un exemplaire de certificat médical Club se trouve dans la rubrique "Docs à télécharger".</p>
        <p>Compléter la fiche d’inscription: à télécharger dans la rubrique "Docs à télécharger"</p>
        <p>Possibilité de payer sa licence en ligne</p>
        <p>Les tarifs pour la saison :</p>
        <ul>
            <li>Licence compétition Adulte : 150€</li>
            <li>Licence accueil loisir : 50€</li>
        </ul>
    </div>
</div>

<h1 class="h1caroussels">Nos Sponsors</h1>
<div class="carousel-wrapper">
    <span id="item-1"></span>
    <span id="item-2"></span>
    <div class="carousel-item item-1">
      <a href="#item-3" class="arrow-prev arrow"></a>
      <a href="#item-2" class="arrow-next arrow"></a>
    </div>

    <div class="carousel-item item-2">
      <a href="#item-1" class="arrow-prev arrow"></a>
      <a href="#item-3" class="arrow-next arrow"></a>
    </div>

    <div class="carousel-item item-3">
      <a href="#item-2" class="arrow-prev arrow"></a>
      <a href="#item-1" class="arrow-next arrow"></a>
    </div>

    </body>
 </html>


<style>
  /* CSS pour le carrousels */
  .h1caroussels{
  color: #f00;
  font-size: 36px;
  margin-bottom: 20px;
  text-align: center;
  font-size: 2rem;
  color: #f00;
  text-transform: uppercase;
  margin-bottom: 10px;
}
.carousel-wrapper {
  height: 700px;
  position: relative;
  width: 900px;
  display: block;
  margin: 50px auto ;
  border: 2px solid black;
}

.carousel-item {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 50px 50px;
  opacity: 0;
  transition: all 0.5s ease-in-out;
}
.arrow{
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 30px;
}
.arrow-prev {
  left: 30px;
  position: absolute;
  top: 50%;
  transform: translateY(-50%) rotate(135deg);

}
.arrow-next {
  right: 30px;
  position: absolute;
  top: 50%;
  transform: translateY(-50%) rotate(-45deg);
}

[id^= "item"] {
  display: none;
}
.item-1 {
  z-index: 2;
  opacity: 1;
  background: url('CF.jpg');
  background-size: cover;
}
.item-2 {
  background: url('Logo-credit-mutuel-une.png');
  background-size: cover;
}
.item-3 {
  background: url('CF.jpg');
  background-size: cover;
}
*:target ~ .item-1{
  opacity: 0;
}
#item-1:target ~ .item-1 {
  opacity: 1;

}
#item-2:target ~ .item-2, #item-3:target ~ .item-3 {
  z-index: 3;
  opacity: 1;
} 
.licence-title{
  margin-left: auto;
    margin-right: auto;
    width: 900px
}
  /* CSS pour le bloc de licence */
.licence-block {
    background-color: #fff;
    padding: 20px;
    border: 2px solid #f00;
    border-radius: 10px;
    margin-left: auto;
    margin-right: auto;
    width: 900px
}

/* Titre pour le bloc de licence */
.licence-block h2 {
    text-align: center;
    font-size: 2rem;
    color: #f00;
    text-transform: uppercase;
    margin-bottom: 10px;
    
}

/* Style pour le texte dans le bloc de licence */
.licence-block p {
    font-size: 1.2rem;
    line-height: 1.5;
    text-align: justify;
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
  color: #f00;
  font-size: 36px;
  margin-bottom: 20px;
}

#presentation p {
  font-size: 18px;
  line-height: 1.5;
  margin-bottom: 20px;
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
