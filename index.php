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
</head>
<body>



    <table class="table table-success table-striped">
            <!-- TABELLENKOPF MIT FELDNAMEN -->
            <thead>
                <tr class="table-dark">
                    <?php
                 
                        require "./include/db.php";

                        //Fall möglich, die Daten von letzten editbook.php-Aufruf aktualisieren.
                        updateBook($dbConnection);
                        createBook($dbConnection); 

                        // Alle Daten tu den Büchen aus der Datenbank auslesen (SELECT)
                        $sqlStatement = $dbConnection->query("SELECT * FROM `books`");

                        //Den Tabellenkopf vollständig ausgehen
                        //https://www.php.net/manual/en...
                        $columnCount = $sqlStatement->columnCount();

                        for ($c = 0; $c < $columnCount; $c++) {
                            //array mit Spalten-Metadaten holen
                            // URL . . . .
                            $columnMeta = $sqlStatement->getColumnMeta($c);

                            //Aus den Spalten-Metadaten den Wert für 'name' auslesen und ausgeben
                            $columnName = $columnMeta['name'];
                            echo "<th>$columnName</th>";
                        }
                        
                            echo "</tr>";
                    ?>        
                </tr>
            </thead>

            <!-- TABELLENZELLEN MIT DATEN -->
        <tbody>  
            <?php 
                // Falls $row === null wird die Bedingung in () von PHP als false interpretiert.
                // Damit kann die while-Schleife verlassen werden.
                
                // ->fetch() holt immer genau eine Tabellenzeile aus der Datenbank.  
                while ($row = $sqlStatement->fetch(PDO::FETCH_ASSOC)) { //vertical row by row
                    echo "<tr>";  

                    //Durch den Array hindurch die Angaben zu einem Buch in eine Tabellenzelle ausgeben.
                    foreach ($row as $columnName => $value) {
                        if ($columnName === 'title') {
                            $id = $row['id'];
                            echo "<td><a href='editbook.php?id=$id'>$value</a></td>";
                        }
                        else {  //id, autor, year, etc...
                            echo "<td>$value</td>";
                        }
                    }

                    echo "</tr>";

                }

            ?>
        </tbody>
    </table>    

    <a class="btn btn-primary"type="submit"  href='/createbook.php'>Create New Book</a>

</body>
</html>