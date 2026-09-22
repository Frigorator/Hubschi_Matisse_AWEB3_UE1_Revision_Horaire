<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <?php
    
    require_once "./../includes/header.php";
    ?>
    voici les cours
    <a href="./..">Menu</a>

    <?php
    
        require_once "./../api/cours.php";
        require_once "./../includes/footer.php";
    ?>
</body>
</html>