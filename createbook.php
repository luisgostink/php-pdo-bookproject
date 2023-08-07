<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>

    <scritpt>

    </script>

</head>
<body>

    <h1>Create Book</h1>
    
    <form id="createBook" action="index.php" method="post">
    <input type="hidden" name="createID" id="createID" value="0"></td>
    <table class="table">

        <tr>
            <td>ISBN: </td>
            <td><input type="text" name="isbn"></td>
        </tr>

        <tr>
            <td>Title: </td>
            <td><input type="text" id="title" name="title"></td>
        </tr>

        <tr>
            <td>Author: </td>
            <td><input type="text" id="author" name="author" ></td>

        </tr>

        <tr>
            <td>Year: </td>
            <td><input type="number" id="year" name="year"></td>
        </tr>
        </table>

        <input class="btn btn-primary"type="submit" value="Save">

    </form>
</body>
</html>