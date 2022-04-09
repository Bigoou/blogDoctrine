<?php
// include("connexion.php");
// $del = "DELETE FROM utilisateur WHERE id_utilisateur = '".$_GET['id']."'";
// $db->exec($del);
require "bootstrap.php";
$repUser = $entityManager->getRepository('utilisateur');
$user = $repUser->findBy(array('id' => $_GET['id']));
$entityManager->remove($user[0]);
$entityManager->flush();
header("Location: users.php");
?>