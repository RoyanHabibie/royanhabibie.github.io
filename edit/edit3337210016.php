<?php
// include database connection file
include_once("../config.php");

//cek  
if (isset($_POST['submit'])) {
    // ambil data dari formulir
    $nim = $_POST['nim'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $alamat = $_POST['alamat'];
    $about = $_POST['about'];
    $email = $_POST['email'];
    $link_in = $_POST['link_in'];
    $link_git = $_POST['link_git'];
    $link_twit = $_POST['link_twit'];
    $link_fb = $_POST['link_fb'];
    $award = $_POST['award'];
    $interest = $_POST['interest'];
    $skill = $_POST['skill'];

    // query
    $sql = "UPDATE about, interests, awards, skills SET
                fname = '$fname',
                lname = '$lname',
                alamat = '$alamat',
                about = '$about',
                email = '$email',
                link_in = '$link_in',
                link_git = '$link_git',
                link_twit = '$link_twit',
                link_fb = '$link_fb',
                award = '$award',
                interest = '$interest',
                skill = '$skill'
                WHERE about.nim = $nim AND interests.nim = $nim  AND awards.nim = $nim AND skills.nim = $nim
            ";
    $query = mysqli_query($conn, $sql);
    // mengecek apakah query berhasil diubah

}


// Check if form is submitted for user update, then redirect to homepage after update
if (!isset($_GET['nim'])) {
    header('Location: ../index.php');
}
// about
$nim = $_GET['nim'];

// update user data about
$sql = "SELECT * FROM about WHERE nim=$nim";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$fname = $row["fname"];
$lname = $row["lname"];
$alamat = $row["alamat"];
$about = $row["about"];
$email = $row["email"];
$link_in = $row["link_in"];
$link_git = $row["link_git"];
$link_twit = $row["link_twit"];
$link_fb = $row["link_fb"];

//awards
$sql = "SELECT * FROM awards WHERE nim=$nim";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$award = $row['award'];

//interest
$sql = "SELECT * FROM interests WHERE nim=$nim";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$interest = $row["interest"];

//skills
$sql = "SELECT * FROM skills WHERE nim=$nim";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$skill = $row["skill"];

?>
<html>

<head>
    <title>Edit User Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <a class="btn btn-primary" href="../index.php">Go to Home</a>
    <br /><br />

    <form method="post" action='edit3337210016.php' enctype="multipart/form-data">
        <table class="table table-striped">
            <tr>
                <td><input type="hidden" name="nim" value=<?php echo $_GET['nim']; ?>></td>
                <td></td>
            </tr>
            <tr>
                <td>first name</td>
                <td><input type="text" class="form-control" id="fname" name="fname" value="<?= $fname ?>" required></td>
            </tr>
            <tr>
                <td>last name</td>
                <td><input type="text" class="form-control" id="lname" name="lname" value="<?= $lname ?>" required></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" required></td>
            </tr>
            <tr>
                <td>about</td>
                <td><textarea type="textarea" class="form-control" id="about" name="about" required><?= $about ?></textarea></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" required></td>
            </tr>
            <tr>
                <td>link_in</td>
                <td><input type="text" class="form-control" id="link_in" name="link_in" value="<?= $link_in ?>" required></td>
            </tr>
            <tr>
                <td>link_git</td>
                <td><input type="text" class="form-control" id="link_git" name="link_git" value="<?= $link_git ?>" required></td>
            </tr>
            <tr>
                <td>link_twit</td>
                <td><input type="text" class="form-control" id="link_twit" name="link_twit" value="<?= $link_twit ?>" required></td>
            </tr>
            <tr>
                <td>link_fb</td>
                <td><input type="text" class="form-control" id="link_fb" name="link_fb" value="<?= $link_fb ?>" required></td>
            </tr>

            <!-- Awards -->
            <tr>
                <td>award</td>
                <td><input type="text" class="form-control" id="award" name="award" value="<?= $award ?>" required></td>
            </tr>

            <!-- Interest -->
            <tr>
                <td>interest</td>
                <td><input type="text" class="form-control" id="interest" name="interest" value="<?= $interest ?>" required></td>
            </tr>

            <!-- Skills -->
            <tr>
                <td>skill</td>
                <td><input type="text" class="form-control" id="skill" name="skill" value="<?= $skill ?>" required></td>
            </tr>
            <tr>
                <td>
                    <div class="text-center pt-2">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-edit"></i> Edit</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>


</body>

</html>
