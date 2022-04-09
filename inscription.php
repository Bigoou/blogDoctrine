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
        border-radius: 10px;
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
        <h1>S'inscrire</h1>
        <p>Inscrivez-vous pour acceder au blog !</p>
        <form action="insert_login.php" method="GET">
            Login<input type="text" name="pseudo" id="pseudo" placeholder="pseudo"></br><br>
            Mot de passe <input type="password" name="password" id="password" placeholder="******">
            </br>
            <br>
            <?php
                if(isset($_GET["erreur"]) && $_GET["erreur"] == "null"){
                    echo"Aucun champ renseigné.";
                }
                if(isset($_GET["erreur"]) && $_GET["erreur"] == "pseudo"){
                    echo"Ce pseudonyme existe déjà.";
                }
            ?>
            <input type="submit" value="S'inscrire" id="bouton">
        </form>
        <br>
        <br>
        Déja un compte ? <a href="login.php">Connectez-vous</a> <br> <br>
        <a href="index.php">Accéder en tant qu'invité</a>
    </div>

</body>

</html>