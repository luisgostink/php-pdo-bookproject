<?php 

//session_start(); 
if(isset($_POST['booked_Books'])) {
    require "/include/db.php";
} foreach ($_POST['bookedBooks'] as $book => $value) {

    $data = [
        'book_id' => $value
     ];

     $sql = "DELETE FROM book_reservation WHERE book_id = :book_id";
     $stmt = $dbConnection->prepare($sql); 
     $stmt->execute($data); 
}

header("Location: index.php");

?>