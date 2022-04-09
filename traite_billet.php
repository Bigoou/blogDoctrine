<?php
session_start();
require "bootstrap.php";
$message=new Message() ;
$message->setTexte($_POST["contenu"]);
$message->setDatepost(new DateTime());
$user = $entityManager->find("Utilisateur",$_SESSION['id']);
$message->setUtilisateur($user);
// var_dump($message);
$entityManager->persist($message);
$entityManager->flush();

// $requete = "INSERT INTO billet VALUES (NULL, NOW(), :contenu, :ext_utilisateurs_billet, :ext_commentaires)";
//  $stmt = $db ->prepare($requete);
//  $stmt -> bindValue(':contenu', $_POST["contenu"], PDO::PARAM_STR);
//  $stmt -> bindValue(':ext_utilisateurs_billet', "", PDO::PARAM_STR);
//  $stmt -> bindValue(':ext_commentaires', "", PDO::PARAM_STR);

//  $stmt -> execute();
 header("Location: index.php"); 
?>