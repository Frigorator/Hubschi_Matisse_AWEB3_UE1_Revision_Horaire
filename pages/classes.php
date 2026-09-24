<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
            <?php
    
    require_once "./../includes/header.php";
    ?>
<body>
    voici les classe
            <a href="./..">Menu</a>
            <p>ajouter</p>
                    <form action="" Method="POST">
            <label for="">annee_scolaire</label>
            <input type="text" name="annee_scolaire">
            <label for="">nom</label>
            <input type="text" name="nom">
            <button type="submit"></button>
        </form>
            <p>modifier</p>
            <form action="" Method="PUT">
            <label for="">annee_scolaire</label>
            <input type="text" name="annee_scolaire">
            <label for="">nom</label>
            <input type="text" name="nom">
            <label for="">id</label>
            <input type="text" name="id">
            <button type="submit"></button>
        </form>
        <p>delete</p>
        <form action="" Method="DELETE">
        <label for="">id</label>
            <input type="text" name="id">
            <button type="submit"></button>
        </form>
            <?php
    
    require_once "./../api/classes.php";
    require_once "./../includes/footer.php";
    ?>
</body>
</html>