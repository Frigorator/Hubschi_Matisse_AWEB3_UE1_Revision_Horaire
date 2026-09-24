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
                <p>ajouter</p>
                    <form action="" Method="POST">
            <label for="">code</label>
            <input type="text" name="code">
            <label for="">nom</label>
            <input type="text" name="nom">
            <button type="submit"></button>
        </form>
                        <p>update</p>
                    <form action="" Method="PUT">
            <label for="">code</label>
            <input type="text" name="code">
            <label for="">nom</label>
            <input type="text" name="nom">
            <label for="">id</label>
            <input type="text" name="id">
            <button type="submit"></button>
        </form>
                        <p>ajouter</p>
                    <form action="" Method="DELETE">
            <label for="">id</label>
            <input type="text" name="id">
            <button type="submit"></button>
        </form>

    <?php
    
        require_once "./../api/cours.php";
        require_once "./../includes/footer.php";
    ?>
</body>
</html>