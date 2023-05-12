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
<?php        
  
$mysqli = new mysqli("localhost", "root", "", "auchtri32");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
  
// le nombre de news (3) qu'on veut afficher dans une page  
$MessagesPerPage = 3;   
// On récupère le nombre total de messages  
$return = $mysqli->query('SELECT COUNT(*) AS nb_messages FROM news');  
$data = $return->fetch_assoc();  
$Messages = $data['nb_messages'];  
// On calcule le nombre de pages à créer  
$Pages  = ceil($Messages / $MessagesPerPage);  
// Puis on fait une boucle pour écrire les liens vers chacune des pages  
echo 'Page : ';  
for ($i = 1 ; $i <= $Pages ; $i++)  
{  
    echo '<a href="news.php?page=' . $i . '">' . $i . '</a> ';  
}  
  
// On récupère les 3 dernières news  
   
if (isset($_GET['page']))  
{  
        $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse ( exemple news.php?page=4)  
}  
else // si non la variable n'existe pas, c'est la première fois qu'on charge la page  
{  
        $page = 1; // On affiche la page 1, la page par defaut  
}  
   
$firstmessage = ($page - 1) * $MessagesPerPage;  
   
$result = $mysqli->query('SELECT * FROM news ORDER BY id DESC LIMIT ' . $firstmessage . ', ' . $MessagesPerPage);  
   
while ($data = $result->fetch_assoc())  
{  
  
?>  
  
  
  
    <h2>  
      
       <?php  
       echo stripslashes($data['titre']); //on recupère titre   
       ?>  
    </h2>   
  
      
  
<em> Ajouté le <?php   
echo date('d/m/Y à H\hi', $data['timestamp']); //on recupère la date   
?></em>  <BR>  
  
    <?php   
    $url = $data['url'];  
    // s'il n'y a l'url de l'image, on affiche le contenu  
if (empty($url))  
   {    
   $contenu = nl2br(stripslashes($data['contenu']));  
    echo $contenu;  
   }  
else// sinon on affiche l'image puis le contenu  
{  
?>  
<img  alt="image de news" src="<?php echo $url ?>"/>  
 <?php   
   $contenu = nl2br(stripslashes($data['contenu']));  
    echo $contenu;    
}  
//Nous affichons le lien nous dirigeant vers les commentaires  
?>    
 <br/><em><a href="commentaires.php?news=<?php echo $data['id']; ?>">Commentaires</a></em>  
 <?php   
} // Fin de la boucle des news  
  
$mysqli->close();// on ferme la connexion  
?>      



<style>
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
