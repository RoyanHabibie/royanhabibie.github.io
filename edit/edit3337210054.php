<?php

// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['submit'])) {

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

// update user data
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
    WHERE about.nim = $nim AND interests.nim = $nim  AND awards.nim = $nim AND skills.nim = $nim";
$query = mysqli_query($conn, $sql);

// checking query

}

// Check if form is submitted for user update, then redirect to homepage after update
if (!isset($_GET['nim'])) {
    header('Location: ../index.php');
}

// about
$nim = $_GET['nim'];

// update user data 
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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDIT CV ALYA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    .card{
    margin-left: 15px;
    margin-bottom: 15px;
    }
    .navbar{
    position: relative;
    display: block;
    width: 80%;
    border-radius: auto;
    text-align: center;
    margin: auto;
    margin-bottom: 0px;
    font-size: medium;
    }
      @media only screen and (min-width: 768px) {
    /*For  desktop: (ukuran layar lebih besar dari 768px)*/
    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;} 
    .col-13 {width: 25%;}
    .col-17 {width: 27.5%}
    }
    </style>
  </head>
  <body style="background-color: #7facd7;">
    <div class="col-12 navbar" style="background-color: #33539e;">
      <nav class="container-fluid col-12">
        <h2 style="padding: 2%; color: whitesmoke; padding-left: 40%;" class="text-center"><center>EDIT CV ALYA</center></h2>
      </nav>
    </div>
    <div style="padding: 15%; padding-top: 2%;">
    <div class="card" >
      <div class="card-header"><h5>Form Update!</h5></div>
      <div class="card-body">
        <form method="post" action="edit3337210054.php" enctype="multipart/form-data" style="padding: 0.5%;">
          <tr>
            <td><input type="hidden" name="nim" value=<?php echo $_GET['nim']; ?></td>
            <td></td>
          </tr>
          <tr>
            <label>First Name</label>
            <td><input type="text" class="form-control" id="fname" name="fname" value="<?= $fname ?>" required></td>
          </tr>
          <p></p>
          <tr>
            <label>Last Name</label>
            <td><input type="text" class="form-control" id="lname" name="lname" value="<?= $lname ?>" required></td>
          </tr>
          <p></p>
          <tr>
            <label>Alamat</label>
            <input class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" required rows="3"></input>
          </tr>
          <p></p>
          <tr>
            <label>About</label>
            <input type="text" class="form-control" id="about" name="about" value="<?= $about ?>" required>
          </tr>
          <p></p>
          <tr>
            <label>Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" required>
          </tr>
          <p></p>
          <tr>
            <label>Linkedin</label>
            <td><input type="text" class="form-control" id="link_in" name="link_in" value="<?= $link_in ?>" required></td>
          </tr>
          <p></p>
          <tr>
            <label>Github</label>
            <td><input type="text" class="form-control" id="link_git" name="link_git" value="<?= $link_git ?>" required></td>
          </tr>
          <p></p>
          <tr>
            <label>Twitter</label>
            <td><input type="text" class="form-control" id="link_twt" name="link_twt" value="<?= $link_twt ?>" required></td>
          </tr>
          <p></p>
          <tr>
            <label>Facebook</label>
            <td><input type="text" class="form-control" id="link_fb" name="link_fb" value="<?= $link_fb ?>" required></td>
          </tr>
          <p></p>
          <tr>
            <label>Awards</label>
            <td><input type="text" class="form-control" id="award" name="award" value="<?= $award ?>" required></td>
          </tr>
          <p></p>
          <tr>
            <label>Interest</label>
            <td><input type="text" class="form-control" id="interest" name="interest" value="<?= $interest ?>" required></td>
          </tr>
          <tr>
            <label>Skills</label>
            <td><input type="text" class="form-control" id="skill" name="skill" value="<?= $skill ?>" required></td>
          </tr>
          <div style="padding: 2%; width: 100%;" class="btn-group">
            <a class="btn btn-primary" href="../index.php" style="color: whitesmoke;">Back to Home</a>
            <button name="submit" name="submit" class="btn btn-success">Update!</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
