<?php
// Get the ID from the URL parameter
$id = $_GET['id'];

// print_r($id);die();
// Fetch data from the database based on the ID
// Assuming you have a function to retrieve data based on ID in your model
// die($id);
// $data = $this->lembur->getLemburId($id);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Print Data</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <h1>Data to Print</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tanggal/Jam</th>
                        <th>Gawian</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </body>
</html>