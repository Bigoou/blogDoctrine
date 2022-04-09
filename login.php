<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<style>
    body {
        font-family: 'Arial';
        display: flex;
        background-image: url(bg.jpg);
        background-size: 100vw 100vh;
        background-repeat: no-repeat;
    }

    .container {
        padding: 50px;
        margin: auto;
        margin-top: 10%;
        border-radius : 10px;
        background-color: white;
    }

    h1 {
        margin: 0px;
    }

    input {
        margin-top: 2%;
        border-radius: 5px;
        padding-top: 7px;
        padding-bottom: 5px;
        border: #272727c5 solid 1px;
        width: 100%;
    }

    #bouton {
        background-color: #272727;
        border: none;
        color: white;
        width: 100%;
        padding-top: 10px;
        padding-bottom: 10px;
        justify-content: center;
    }

    a {
        text-decoration: none;
        color: #272727;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <div class="container">
        <h1>Se connecter</h1>
        <p>Connectez-vous pour acceder au blog !</p>

        <form action="traite_login.php" method="GET">
            Login <br>
            <input type="text" name="login" id="login" placeholder="pseudo"></br> <br>
            Mot de passe <br>
            <input type="password" name="password" id="password" placeholder="******">
            </br> <br>
            <?php
    if(isset($_GET["erreur"])){
        echo"Le ".$_GET["erreur"]." n'est pas bon.";
    }
?>
            <input type="submit" value="Connexion" id="bouton">
            <br> <br>
        </form>

        Pas de compte ? <a href="inscription.php">Inscrivez-vous</a>
        <br><br>
        <a href="index.php">Accéder en tant qu'invité</a>
    </div>
</body>

</html>