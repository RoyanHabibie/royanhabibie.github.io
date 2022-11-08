<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add User</title>
</head>

<body>
    <a class="btn btn-primary" href="index.php">Go to Home</a>
    <br /><br />
    <form action="add.php" method="post" name="form1">
        <table class="table table-striped">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Class</td>
                <td><input type="text" name="kelas"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <button type="submit" class="btn btn-success" name="Submit" value="Add">Submit</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $nim = $_POST['nim'];
        $name = $_POST['nama'];
        $class = $_POST['kelas'];
        $email = $_POST['email'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO users(nim,nama,kelas,email) 
                VALUES('$nim','$name','$class','$email')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>

</html>