<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    
    <script>
        function setDeleteBookID(id) {
            let element = document.getElementById("deleteID");
            element.value = id;
            
            let editForm = document.getElementById("edit-form");
            editForm.submit();
        } 
    </script>
</head>
<body>

    <?php 
        //Baue die Verbindung zur Datenbank auf. 
        require "./include/db.php";

        //$_GET liefert die 'id' aus der URL 'bookview.php?id=$id'
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        else{
            //id fehlt: Abbrechen und PHP verlassen
            $id = 1;
            //exit("Achtung: der Identifikator 'id fehlt in der URL."); 
        }

        echo "id = $id<br>"; //DEVONLY

        //Alle Daten (ganze Tabellenzeile) zum Buch mit der erhaltenen $id mit ->query() abfragen.
        $sqlStatement = $dbConnection->query("SELECT * FROM `books` WHERE `id` = $id");

        // Daten zum gewählten Buch abholen mit ->fetch().
        // $row ist ein Array mit einer Schlüssel-Wert Liste.
        $row = $sqlStatement->fetch(PDO::FETCH_ASSOC);
    ?>

        <h1>Edit Books</h1>

    <form id="edit-form" action="index.php" method="post">
        <table class="table">
        <tr>
            <td>ID: 
            <input type="hidden" name="editID" value="<?php echo $id; ?>">
            <input type="hidden" name="deleteID" id="deleteID" value="0"></td>
            <td><?php echo $id; ?></td>
        </tr>

        <tr>
            <td>ISBN: </td>
            <td><input type="text" name="isbn" value="<?php echo $row['isbn'] ?>"></td>
        </tr>

        <tr>
            <td>Title: </td>
            <td><input type="text" id="title" name="title" value="<?php echo $row['title'] ?>"></td>
        </tr>

        <tr>
            <td>Author: </td>
            <td><input type="text" id="author" name="author" value="<?php echo $row['author'] ?>"></td>

        </tr>

        <tr>
            <td>Year: </td>
            <td><input type="number" id="year" name="year" value="<?php echo $row['year'] ?>"></td>
        </tr>
        </table>

        <input class="btn btn-primary"type="submit" value="Save">

        <button type="button" class="btn btn-secondary" 
        onclick="setDeleteBookID(<?php echo $id; ?>);">Delete</button>


    </form>



</body>
</html>