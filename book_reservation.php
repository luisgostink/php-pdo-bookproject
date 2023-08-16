<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reservation</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    
        <?php 

            require_once "./include/db.php";

            $sqlStatement = $dbConnection->query("SELECT * FROM books WHERE id NOT IN (SELECT book_id FROM book_reservation)");

            if (isset($_POST['bookedBooks']))
            {
                prettyPrint($_POST);

                foreach($_POST['bookedBooks'] as $book => $value) {
                $data = [
                   'email' => $_POST['email'],
                   'book_id' => $value

                ];

                $sql = "INSERT INTO book_reservation (email, book_id) VALUES (:email, :book_id)"; 
                $stmt = $dbConnection->prepare($sql); 
                $stmt->execute($data); 
            }
        }
            else {
                echo "No books selected"; 
            }

        ?>


</body>
</html>