<?php
require "bootstrap.php";
$repCom = $entityManager->getRepository('commentaire');
$commentaires = $repCom->findBy(array('id' => $_GET['id']));
$entityManager->remove($commentaires[0]);
$entityManager->flush();
header("Location: billet.php?billet=".$_GET['billet'].""); 
?>