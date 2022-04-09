<?php
$message=new Message() ;
$message->setTexte("ceci est mon premier message");
$message->setDatepost(new DateTime());
$user = $entityManager->find("Utilisateur", $_SESSION['id']);
$message->setUtilisateur($user);
// var_dump($message);
$entityManager->persist($message);
$entityManager->flush();
