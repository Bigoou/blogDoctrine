<?php
require "bootstrap.php";
 if($_GET['pseudo'] != null && $_GET['password'] != null) {
    // $req1 = "SELECT * FROM utilisateur WHERE pseudo='{$_GET['pseudo']}'";
    // $stmt1=$db->query($req1);
    // if($stmt1->rowcount() > 0){
    //     header("Location: inscription.php?erreur=pseudo"); 
    // }else{
      $repUser = $entityManager->getRepository('utilisateur');
      $user = $repUser->findBy(array('login' => $_GET['pseudo']));
      if(empty($user)){
       $utilisateur= new Utilisateur() ;
       $utilisateur->setLogin($_GET['pseudo']);
       $utilisateur->setPasswd($_GET['password']);
       $entityManager->persist($utilisateur);
       $entityManager->flush();
       header("Location: login.php"); 
       }
    }else{
    header("Location: inscription.php?erreur=null"); 
    }


?>
