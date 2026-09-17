<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        voici le menu principale
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        voici le menu principale
        <form action="api/classes.php" Method="POST">
            <label for="">annee_scolaire</label>
            <input type="text" name="annee_scolaire">
            <label for="">nom</label>
            <input type="text" name="nom">
            <button type="submit"></button>
        </form>
        <a href="./pages/classes.php">classes</a>
        <a href="./pages/cours.php">cours</a>
        <a href="./pages/horaire.php">horaire</a>
</body>
</html>
<?php
    
    require_once "api/classes.php";
    require_once "api/cours.php";
    require_once "api/creneaux.php";
?> 
</body>
</html>