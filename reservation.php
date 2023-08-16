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

            <a href= "/index.php" class="btn btn-primary">Go Back</a> <br>
        
            <form action="index.php" method="post">
                <label for="email">E-Mail: </label>
                <input type="email" name="email" placeholder="email" required> 
                <input type="submit" value="Reserve Book" class="btn btn-primary"> <br>

            <table class="table table-success table-striped">
                   <!-- TABLE HEAD WIHT THE FIELD NAMES -->
                    <thead>
                        <tr class="table-dark">
                            <?php
                            
                                require_once "./include/db.php";

                                // Alle Daten tu den Büchen aus der Datenbank auslesen (SELECT)
                                $sqlStatement = $dbConnection->query("SELECT * FROM `books` WHERE id NOT IN (SELECT book_id FROM book_reservation)");

                                //Den Tabellenkopf vollständig ausgehen
                                //https://www.php.net/manual/en...
                                $columnCount = $sqlStatement->columnCount();

                                echo "<th>Select</th>";

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

                        <!-- TABLE WITH DATA -->
                    <tbody>  
                        <?php 
                            // Falls $row === null wird die Bedingung in () von PHP als false interpretiert.
                            // Damit kann die while-Schleife verlassen werden.
                            
                            // ->fetch() holt immer genau eine Tabellenzeile aus der Datenbank.  
                            while ($row = $sqlStatement->fetch(PDO::FETCH_ASSOC)) { //vertical row by row
                                echo "<tr>"; 
                                
                                $id = $row['id'];
                                echo"<td><input type='checkbox' name='bookedBooks[]' value='$id'></td>";

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
            </form>    

    

</body>
</html>