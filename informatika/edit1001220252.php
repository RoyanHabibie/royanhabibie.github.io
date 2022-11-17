<?php
// include database connection file
$connect = mysqli_connect("royanhabibie.my.id","royanhab_if","1nformatika","royanhab_if");

$query_interest = mysqli_query($connect, "SELECT * FROM interests WHERE nim = '1001220252'");
$result_interest = mysqli_fetch_assoc($query_interest);

$query_about = mysqli_query($connect, "SELECT * FROM about WHERE nim = '1001220252'");
$result_about = mysqli_fetch_assoc($query_about);

$query_skill = mysqli_query($connect, "SELECT * FROM skills WHERE nim = '1001220252'");
$results_skill = [];
while($result_skill = mysqli_fetch_assoc($query_skill)){
    $results_skill[] = $result_skill;
};

$query_award = mysqli_query($connect, "SELECT * FROM awards WHERE nim = '1001220252'");
$results_award = [];
while($result_award = mysqli_fetch_assoc($query_award)){
    $results_award[] = $result_award;
};

//cek  
if (isset($_POST['submit'])) {
    // ambil data dari formulir
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
    $link_foto = $_POST['link_foto'];

    // query
    $sql = "UPDATE about, interests, awards, skills, users SET
    users.nama  = '$fname $lname',
    about.fname = '$fname',
    about.lname = '$lname',
    about.alamat = '$alamat',
    about.about = '$about',
    users.email = '$email',
    about.email = '$email',
    about.link_in = '$link_in',
    about.link_git = '$link_git',
    about.link_twit = '$link_twit',
    about.link_fb = '$link_fb',
    awards.award = '$award',
    interests.interest = '$interest',
    skills.skill = '$skill',
    about.link_foto = '$link_foto'
    WHERE about.nim = 1001220252  AND interests.nim = about.nim  AND awards.nim = about.nim AND skills.nim = about.nim AND users.nim = about.nim
";

    $query = mysqli_query($connect, $sql);
    // mengecek apakah query berhasil diubah

}


$sql = "SELECT * FROM users WHERE nim=1001220252";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);

$nim = $row["nim"];
$kelas = $row["kelas"];

// update user data about
$sql = "SELECT * FROM about WHERE nim=1001220252";
$query = mysqli_query($connect, $sql);
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
$link_foto = $row["link_foto"];

//awards
$sql = "SELECT * FROM awards WHERE nim=1001220252";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);


//interest
$sql = "SELECT * FROM interests WHERE nim=1001220252";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);

$interest = $row["interest"];

//skills
$sql = "SELECT * FROM skills WHERE nim=1001220252";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);


?>
<html>

<head>
    <title>St. Hardianti</title>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <style>
    html,
    body {
      background-image: url(https://i.ibb.co/QbFgm9T/f8bb03ef4404af209315459ebe378d84.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      min-height: 100%;
      padding: 0;
      margin: 0;
      font-family: cursive;
      font-size: 14px;
    }

   

    p {
      margin: 0 0 5px;
    }

    .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    

    .fas {
      margin: 25px 10px 0;
      font-size: 72px;
      color: #fff;
    }

    .fa-envelope {
      transform: rotate(-20deg);
    }

    .fa-at,
    .fa-mail-bulk {
      transform: rotate(10deg);
    }

    input,
    textarea {
      width: calc(100% - 18px);
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #eb8db5;;
      outline: none;
    }

    input::placeholder {
      color: rgb(0, 0, 0);
    }

    button {
      width: 100%;
      padding: 10px;
      border: none;
      background: #EF8138;
      font-size: 16px;
      font-weight: 400;
      color: #EF8138;;
    }

    

    @media (min-width: 568px) {
      .main-block {
        flex-direction: row;
      }

      .left-part,
      form {
        width: 100%;
      }
    }
    
  </style>
</head>

<body>
    
    <br /><br />

    <form method="post" action='edit1001220252.php' enctype="multipart/form-data">
        <table class="table table-striped">

            <h2><center>EDIT DATA USER</center>
            </h2>

            <br></br>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value=<?= $nim ?> disabled></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" class="form-control" id="fname" name="fname" value="<?= $result_about["fname"] ?>" ></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" class="form-control" id="lname" name="lname" value="<?= $result_about["lname"] ?>" ></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" class="form-control" id="alamat" name="alamat" value="<?= $result_about["alamat"] ?>" ></td>
            </tr>
            <tr>
                <td>About</td>
                <td><textarea type="textarea" class="form-control" id="about" name="about" ><?= $result_about["about"] ?></textarea></td>
            </tr>
            <tr>
                <td>EEmail</td>
                <td><input type="text" class="form-control" id="email" name="email" value="<?= $result_about["email"] ?>" ></td>
            </tr>
            <tr>
                <td>Link_in</td>
                <td><input type="text" class="form-control" id="link_in" name="link_in" value="<?= $result_about["link_in"] ?>" ></td>
            </tr>
            <tr>
                <td>Link_git</td>
                <td><input type="text" class="form-control" id="link_git" name="link_git" value="<?= $result_about["link_git"] ?>" ></td>
            </tr>
            <tr>
                <td>Link_twit</td>
                <td><input type="text" class="form-control" id="link_twit" name="link_twit" value="<?= $result_about["link_twit"] ?>" ></td>
            </tr>
            <tr>
                <td>Link_fb</td>
                <td><input type="text" class="form-control" id="link_fb" name="link_fb" value="<?= $result_about["link_fb"] ?>" ></td>
            </tr>
            <tr>
                <td>Link_foto</td>
                <td> <input type="text" class="form-control" id="link_foto" name="link_foto" value="<?= $result_about["link_foto"] ?>" >
                </td>
            </tr>
            <!-- Awards -->
            <?php foreach($results_award as $award): ?>
            <tr>
                <td>Award</td>
                <td><input type="text" class="form-control" id="award" name="award" value="<?= $award["award"]?>" ></td>
            </tr>
            <?php endforeach; ?>

            <!-- Interest -->
            <tr>
                <td>Interest</td>
                <td><input type="text" class="form-control" id="interest" name="interest" value="<?= $result_interest["interest"] ?>" ></td>
            </tr>

            <!-- Skills -->
            <?php foreach($results_skill as $skill): ?>
            <tr>
                <td>Skill</td>
                <td><input type="text" class="form-control" id="skill" name="skill" value="<?= $skill["skill"] ?>" ></td>
            </tr>
            <?php endforeach; ?>

            <tr>
                <td>
                    <div class="text-center pt-2">
                        <button type="submit" name="submit" class="btn btn-light"><i class="fas fa-edit"></i> Update</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <br><br>
    <center><a class="btn btn-light" href="../index.php">Back to Home</a></center>
    <br><br>
</body>

</html>


</body>

</html>
