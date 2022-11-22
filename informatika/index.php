<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY `nama` ASC");
?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD</title>
</head>

<body class="p-3">
    <h1>Membuat CRUD dengan php+mysql</h1>
    <a class='btn btn-primary' href="add.php">Add New User</a><br /><br />
    <table class="table table-striped">
        <tr>
            <th>NIM</th>
            <th>Name</th>
            <th>Class</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['nim'] . "</td>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['kelas'] . "</td>";
            echo "<td>" . $user_data['email'] . "</td>";
            echo "<td><a class='btn btn-success' href='view.php?id=$user_data[id]'>View</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>
