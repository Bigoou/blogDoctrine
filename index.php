<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="blog.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <title>LEBLOG.</title>
</head>
<body>

<?php
include "bootstrap.php";
    session_start();
?>

<div class="class1">

<nav>
        <h1>LEBLOG.</h1>

        <div class="liens">
        <?php
         if(isset($_SESSION['id']))  { 
        if($_SESSION["id"] == 1){
            echo('<a href="users.php">Gerer les utilisateurs</a>');
        }
        echo('<a href="archives.php">Les Archives</a>');
            echo('<a class="bouton" id="bouton" href="deconnexion.php">Déconnexion</a>');
        }else{
            echo('<a class="bouton" id="bouton" href="login.php">Connexion</a>');
        }
        ?>
        </div>
    </nav>

    <div class="bloc0">
        <div class="section1">
            <div class="txt">
            <?php
            if(isset($_SESSION['id']))  { 
            echo"<header> Bonjour ".$_SESSION["pseudo"]. " ! </header> </br>";
           // echo"<h3>Identifiant : ".$_SESSION['id']."</h3>"; 
           }
           ?>
           <p> Découvrez dans ce blog les meilleures prompts pour progresser en écriture. </p>
           <a class="bouton" href="archives.php">Acceder aux archives</a></div>
        </div>
        
        <div class="section2">
            <img class="img1" src="image_1.png" alt="">
        </div>
    </div>
    </div>

    <div class="bloc1">

    <?php
            if(isset($_SESSION['id']))  { 
            if($_SESSION["id"] == 1){
            echo('
            <form class="creation_billet" action="traite_billet.php" method="POST">
                <h2>CRÉATION DU BILLET</h2>
                <textarea name="contenu" id="contenu" cols="100" rows="10" placeholder="Ecrivez votre prompt en 250 caractères..." maxlength="250"></textarea>
                </br></br>
                <input type="submit" id="bouton" value="Poster la prompt" class="bouton">
            </form>');
            echo("<div>");
                }
            }
         ?>

        <h1>Les trois dernières prompts</h1><div id="rectangle"></div>
        <div class="billets">
        <?php 
        //     $req = "SELECT * FROM `billet` ORDER BY `billet`.`date` DESC LIMIT 3";
        //     $stmt=$db->query($req);
        //     $billet=$stmt->fetchAll(PDO::FETCH_ASSOC);
        //     foreach($billet as $billet){
        //         $src=3;
        //         include("affiche_billet.php");
        // }       
        $messages = $entityManager->getRepository('message')->findBy([], ['id' => 'DESC'], 3);
        foreach($messages as $message){
            // $src=3;
            // include("affiche_billet.php");
            echo"<div class='billet'>";
            echo"<h2>Prompt n° ".$message->getId()."</h2>";
            echo"<p class='p'>Publié le ".$message->getDatepost()->format('d/m/Y')."</p>";
            echo"<p>".$message->getTexte()."</p>";
            if(isset($_SESSION['id']))  { 
                echo('
                <div class="com_form">
                <form action="traite_commentaires.php?id='.$message->getId().'" method="POST">
                ');
              
                echo("<a href=billet.php?billet=".$message->getId().">Afficher les commentaires</a></br></div>
                ");
                
              
                echo('
                <h5>Commentaire </br>
                <textarea name="contenu_com" id="contenu_com" cols="38" rows="3" placeholder="Ecrivez ce qui vous passe par la tête..."></textarea></h5>
                <input type="submit" value="Validez" class="bouton">
                </form>
                ');
              
              
              
                if($_SESSION["id"] == 1){
                echo("</br></br>"."<a href='delete.php?id=".$message->getId(). "'><span class='iconify' data-icon='akar-icons:trash-can'></span>  Supprimer le billet</a> </br></br>");
                }
              }
              echo'</div>';
        }

        ?>
        </div>
    </br></br>
    <a class="bouton" href="archives.php">Voir plus de prompts</a>

    </div>

    
</body>
</html>