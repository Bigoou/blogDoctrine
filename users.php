<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <link rel="stylesheet" href="blog.css">
  <title>Document</title>
</head>
<body>

<nav>
        <h1>Le blog, le vrai</h1>
        <?php
        session_start();
        include "bootstrap.php";
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
    <br> <br>
   <h1>Gestion des utilisateurs</h1> 

<?php
// include("connexion.php");
// $req = "SELECT * FROM `utilisateur` WHERE `id_utilisateur` > 1 ORDER BY `utilisateur`.`id_utilisateur` ASC";
// $stmt=$db->query($req);
// $user=$stmt->fetchAll(PDO::FETCH_ASSOC);
// foreach($user as $user){
//     echo"<div class='user'>";
//     // echo"<p>Identifiant : ".$user['id_utilisateur']."</p>";
//     echo"<p><b>Pseudonyme</b> : ".$user['pseudo']."</p>";
//     echo"<a href='delete_user.php?id=".$user['id_utilisateur']."'><span class='iconify' data-icon='akar-icons:trash-can'></span>  Supprimer cet utilisateur</a>";
//     echo"</div>";
// }
$repUser = $entityManager->getRepository('Utilisateur');
$users = $repUser->findAll();
foreach($users as $user){
    echo"<div class='user'>";
    // echo"<p>Identifiant : ".$user['id_utilisateur']."</p>";
    echo"<p><b>Pseudonyme</b> : ".$user->getLogin()."</p>";
    echo"<a href='delete_user.php?id=".$user->getId()."'><span class='iconify' data-icon='akar-icons:trash-can'></span>  Supprimer cet utilisateur</a>";
    echo"</div>";
}
?>

</div>

</body>
</html>