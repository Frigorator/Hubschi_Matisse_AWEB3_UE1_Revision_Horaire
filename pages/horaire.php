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
    voici les horraire
    <a href="./..">Menu</a>
        <form action="" Method="POST">
            <label for="">classes_id</label>
            <input type="text" name="classes_id">
            <label for="">cours_id</label>
            <input type="text" name="cours_id">
            <label for="">jour</label>
            <input type="text" name="jour">
            <label for="">heure_debut</label>
            <input type="text" name="heure_debut">
            <label for="">heure_fin</label>
            <input type="text" name="heure_fin">
            <label for="">salle</label>
            <input type="text" name="salle">
            <button type="submit"></button>
        </form>
                        <p>update</p>
            <label for="">classes_id</label>
            <input type="text" name="classes_id">
            <label for="">cours_id</label>
            <input type="text" name="cours_id">
            <label for="">jour</label>
            <input type="text" name="jour">
            <label for="">heure_debut</label>
            <input type="text" name="heure_debut">
            <label for="">heure_fin</label>
            <input type="text" name="heure_fin">
            <label for="">salle</label>
            <input type="text" name="salle">
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
require_once "./../api/creneaux.php";
require_once "./../includes/footer.php";
    ?>
    
</body>
</html>