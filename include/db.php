<?php

require "./include/tools.php";

// Verbinde mit mySQL, mit Hilfe eines PHP PDO Object
// Connect SQL with help from a PHP PDO Object
$dbHost = getenv('DB_HOST');
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');

$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);

// Setze den Fehlermodus für Web Devs
// Sets the ErrorMode for WebDevs
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo "<p>db.php: \$dbConnection created</p>";

// Funktion, welche $_POST-Daten ausliest und die Datenbank aktualisiert.
// Achtung: $dbConnection muss als argument übergeben werden!
function updateBook($dbConnectionParam) {
    // $_POST auslesen.
    
    // prettyPrint($_POST);

    if (isset($_POST['deleteID']) && $_POST['deleteID'] > 0){
        // Delete the book with the associated 'deleteID'.
        $deleteID = $_POST['deleteID'];
    
        // echo "<p>\deleteID = $deleteID</p>"; // DEVONLY

        $sqlStatement = $dbConnectionParam->query("DELETE FROM `books` WHERE `id` = $deleteID");
        $sqlStatement->execute();
   
    }
    elseif (isset($_POST['editID'])) {
        // Buchdaten in der Datenbank aktualisieren
        $editID = $_POST['editID'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year = $_POST['year'];
        
        $sqlStatement = $dbConnectionParam->query("UPDATE `books` SET `title` = '$title', `author` = '$author', `year` = '$year' WHERE `id` = $editID");
        $sqlStatement->execute();
    }
    else {
        // Keine weitere aktionen mit der Datenbank. 
    }


}

function createBook($dbConnectionParam) {
    if (isset ($_POST ['createID']) &&
    isset($_POST['isbn']) && 
    isset($_POST['title']) &&
    isset($_POST['author'])&&
    isset ($_POST['year'])) {

    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    
    // prepare sql and bind parameters
  $sqlStatement = $dbConnectionParam->prepare("INSERT INTO books (isbn, title, author, year)
  VALUES (:isbn, :title, :author, :year)");
    $sqlStatement->bindParam(':isbn', $isbn);
    $sqlStatement->bindParam(':title', $title);
    $sqlStatement->bindParam(':author', $author);
    $sqlStatement->bindParam(':year', $year);

    $sqlStatement->execute();

    echo "New book created successfully";

    }
}


// Feldnamen übersetzen
define(
    "NAME_MAP",
    array(
        // Schlüssel: Feldnamen => Wert: Deutsche Übersetzung
        "title" => "Titel",
        "genre" => "Genre",
        "author" => "Autor",
        "description" => "Beschreibung",
        "publisher" => "Publisher",
        "ISBN" => "ISBN",
        "price" => "Preis",
        "currency" => "Währung",
        "out_of_print" => "vergriffen"
    )
);

function translateColumnName($columnName) {
    return NAME_MAP[$columnName];
}

// ucfirst()


?>