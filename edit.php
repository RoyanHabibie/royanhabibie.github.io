<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $email = $_POST['email'];

    // update user data
    $result = mysqli_query($conn, "UPDATE kelas SET nama='$name',email='$email',kelas='$class' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM kelas WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $name = $user_data['nama'];
    $email = $user_data['email'];
    $class = $user_data['kelas'];
}
?>
<html>

<head>
    <title>Edit User Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <a class="btn btn-primary" href="index.php">Go to Home</a>
    <br /><br />

    <form name="update_user" method="post" action="edit.php">
        <table class="table table-striped">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name; ?>></td>
            </tr>
            <tr>
                <td>Class</td>
                <td><input type="text" name="class" value=<?php echo $class; ?>></td>

            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>