<?php
$message=new Message() ;
$message->setTexte("ceci est mon premier message");
$message->setDatepost(new DateTime());
$user = $entityManager->find("Utilisateur",1);
$message->setUtilisateur($user);
// var_dump($message);
$entityManager->persist($message);
$entityManager->flush();
