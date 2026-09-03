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
        <form action="api/classes.php" Methods="POST">
            <label for="">code</label>
            <input type="text" name="code">
            <label for="">nom</label>
            <input type="text" name="label">
            <button type="submit"></button>
        </form>
</body>
</html>
<?php
    
    require_once "api/classes.php";
    require_once "api/cours.php";
    require_once "api/creneaux.php";
?> 
</body>
</html>