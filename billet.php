<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="blog.css">
  <title>Document</title>
</head>
<body>
<nav>
        <h1>Le blog, le vrai</h1>
        <?php
        session_start();
        require 'bootstrap.php';
        ?>
        <div class="liens">
        <?php
        if(isset($_SESSION['id']))  { 
          if($_SESSION["id"] == 1){
                echo("<a href='users.php'>Gerer les utilisateurs</a>");
            }
             echo('<a class="bouton" href="deconnexion.php">Déconnexion</a>');
         }else{
             echo('<a href="archives.php">Les Archives</a>');
             echo('<a class="bouton" href="login.php">Connexion</a>');
         }
        ?>
        </div>
    </nav>

    <div class="bloc">

    <a class="bouton" href="index.php">Retourner au blog</a>


<?php 
// include("connexion.php");
// $req = "SELECT * FROM `billet` WHERE id_billet =".$_GET["billet"]."";
// $stmt=$db->query($req);
// $billet=$stmt->fetchAll(PDO::FETCH_ASSOC);
$rep = $entityManager->getRepository('Message');
$message = $rep->findOneBy(array('id'=>$_GET["billet"]));

?>


<div class="container">
<?php
    // $req2 = "SELECT * FROM commentaires WHERE ext_id_billet = '".$billet['id_billet']."'";
    // $stmt2=$db->query($req2);
    // $com=$stmt2->fetchAll(PDO::FETCH_ASSOC);
    $commentaires = $entityManager->getRepository('Commentaire')->createQueryBuilder('c')
    ->where('c.message = :id')
    ->setParameter('id', $message->getId())
    ->getQuery()
    ->getResult();

    
    echo"<div class='billet'>";
    echo"<h3>Billet n°".$message->getId()."</h3>";
    echo"<p class='p'>Publié le ".$message->getDatepost()->format('d/m/Y')."</p>";    
    echo"<p>Contenu : ".$message->getTexte()."</p>";
    echo"</div>";
    echo("<div class='commentaire'>");
    echo("<h1>Commentaires</h1>");
    foreach($commentaires as $commentaire){
      if(empty($commentaire->getAuteur())){
        echo"<p>Auteur : L'auteur a été supprimé.</p>";
      } else {
        echo"<p>Auteur : ".$commentaire->getAuteur()."</p>";
      }
      echo"<p class='p'>Publié le ".$commentaire->getDatepost()->format('d/m/Y')."</p>";
      echo"<p>".$commentaire->getTexte()."</p>";
      if(isset($_SESSION['id']))  { 
        if($_SESSION['id'] == 1 || $commentaire->getId() == $_SESSION['id']){
          echo"<a href='delete_com.php?id=".$commentaire->getId()."&billet=".$message->getId()."'>Supprimer ce commentaire</a>";
        }
      }   
  }
  echo"</div>";


  //   if(isset($_SESSION['id']))  { 
  //   echo('
  //   <div class="com_form">
  //   <form action="traite_commentaires.php?src=1&id_billet='.$billet["id_billet"].'" method="POST">
  //   <h5>Ajouter un commentaire au billet <br>
  //   <textarea name="contenu_com" id="contenu_com" cols="50" rows="3"></textarea><h5>
  //   <input type="submit" value="Validez" class="bouton">
  //   </form>
  //  </div>
  //   ');
  //   }
  //   echo"</div>";

?>

</body>
</html>