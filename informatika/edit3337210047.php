<?php 
$host = 'royanhabibie.my.id';
$db = 'royanhab_if';
$usr = 'royanhab_if';
$pwd = '1nformatika';

// parameter = hostname, username, password, database
$conn = mysqli_connect($host, $usr, $pwd, $db); //true|false

if (!$conn) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    return $result;
}

function Update($data){
    global $conn;

    $nim = $data["nim"];
    $fname = htmlspecialchars($data["fname"]);
    $lname = htmlspecialchars($data["lname"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $about = htmlspecialchars($data["about"]);
    $email = htmlspecialchars($data['email']);
    $link_in = htmlspecialchars($data['linkedin']);
    $link_twit = htmlspecialchars($data['twitter']);
    $link_fb = htmlspecialchars($data['fb']);
    $link_git = htmlspecialchars($data['github']);
    $link_foto = htmlspecialchars($data['foto']);
    $award = htmlspecialchars($data['awards']);
    $interest = htmlspecialchars($data['interest']);
    $skill = htmlspecialchars($data['skill']);
    $query = "UPDATE about, awards, interests, skills SET
                fname = '$fname',
                lname = '$lname',
                alamat = '$alamat',
                about = '$about',
                email = '$email',
                link_in = '$link_in',
                link_git = '$link_git',
                link_twit = '$link_twit',
                link_fb = '$link_fb',
                link_foto = '$link_foto',
                award = '$award',
                interest = '$interest',
                skill = '$skill'
                WHERE about.nim = $nim AND awards.nim = $nim AND interests.nim = $nim AND skills.nim = $nim
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }
  
function Update_user($data){
  global $conn;
  $nim_get = htmlspecialchars($data['nim']);
  $kelas_get = htmlspecialchars($data['kelas_user']);
  $email_get = htmlspecialchars($data['email_user']);
  $query = "UPDATE users SET
              kelas = '$kelas_get',
              email = '$email_get'
              WHERE users.nim = $nim_get
  ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

if(isset($_POST["submit"])){
  
  // cek apakah data berhasil ditambah atau tidak
  if(Update($_POST) > 0 || Update_user($_POST) > 0){
    echo "
    <script>
    alert('data berhasil di Ubah');
    document.location.href = '../index.php'
    </script>
    ";
  }else{
    echo "
    <script>
    alert('data gagal di Ubah');
    document.location.href = '../index.php'
    </script>
    ";
  }
}
$nim = "3337210047";
$about = query("SELECT * FROM about WHERE nim=$nim");
$awards = query("SELECT * FROM awards WHERE nim=$nim");
$interests = query("SELECT * FROM interests WHERE nim=$nim");
$skills = query("SELECT * FROM skills WHERE nim=$nim");

// Update User
$query_user = mysqli_query($conn, "SELECT * FROM users WHERE nim=$nim");
$query_nama = mysqli_query($conn, "SELECT fname, lname, nim FROM about WHERE nim = $nim");
$user = mysqli_fetch_assoc($query_user);
$nama = mysqli_fetch_assoc($query_nama);
$id_user = $user["id"];
$nim_about = $nama["nim"];
$kelas_user = $user["kelas"];
$email_user = $user["email"];
$fname = $nama["fname"];
$lname = $nama["lname"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <style>
      body{
        background-color: rgb(121, 221, 255);
      }
      .container {
        max-width: 80%;
        margin: 80px auto;
        background-color: whitesmoke;
        color: black;
        padding: 40px;
        border-radius: 5px;
      }
      .about, .awards, .interest, .skill, .foto, .user{
        margin-top: 50px;
        background-color: rgb(121, 221, 255);
        padding: 20px 30px;
        border-radius: 20px;
      }
      .container-about{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }
      .input-box{
        width: 30%;
      }
      .input-box-2{
        width: 100%;
      }
      .button{
        margin-top: 20px;
      }
      .back {
        text-decoration: none;
        color: white;
        text-align: center;
      }
      .back:hover{
        color: white;
      }
      @media( max-width: 800px){
        .input-box{
          width: 45%;
        }
      }
      @media( max-width: 600px){
        .input-box{
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Form Edit Data</h1>
      <form action="" method="post">
        <?php while( $data = mysqli_fetch_array($about)) : ?>
            <input type="hidden" name="nim" value="<?= $data["nim"]; ?>">
            <div class="about">
                <h3>About :</h3>
                <div class="container-about">
                    <div class="mb-3 input-box">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" required value="<?= $data["fname"];?>" />
                    </div>
                    <div class="mb-3 input-box">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" required value="<?= $data["lname"];?>" />
                    </div>
                    <div class="mb-3 input-box">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required value="<?= $data["alamat"];?>" />
                    </div>
                    <div class="mb-3 input-box">
                        <label for="about" class="form-label">About</label>
                        <input type="text" class="form-control" id="about" name="about" required value="<?= $data["about"];?>" />
                    </div>
                    <div class="mb-3 input-box">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required value="<?= $data["email"];?>" />
                    </div>
                    <div class="mb-3 input-box">
                        <label for="linkedin" class="form-label">Link LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" required value="<?= $data["link_in"];?>" />
                    </div>
                    <div class="mb-3 input-box">
                        <label for="twitter" class="form-label">Link Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="<?= $data["link_twit"];?>" />
                    </div>
                    <div class="mb-3 input-box">
                        <label for="fb" class="form-label">Link Facebook</label>
                        <input type="text" class="form-control" id="fb" name="fb" value="<?= $data["link_fb"];?>" />
                    </div>
                    <div class="mb-3 input-box">
                        <label for="github" class="form-label">Link Github</label>
                        <input type="text" class="form-control" id="github" name="github" required value="<?= $data["link_git"];?>" />
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <div class="awards">
            <h3>Awards</h3>
            <?php while($data = mysqli_fetch_array($awards)) : ?>
            <div class="mb-3 input-box-2">
                <input type="text" class="form-control" id="awards" name="awards" required value="<?= $data["award"];?>" />
            </div>
            <?php endwhile; ?>
        </div>
        <div class="interest">
            <h3>Interests</h3>
            <?php while($data = mysqli_fetch_array($interests)) : ?>
            <div class="mb-3 input-box-2">
                <input type="text" class="form-control" id="interest" name="interest" required value="<?= $data["interest"];?>" />
            </div>
            <?php endwhile; ?>
        </div>
        <div class="skill">
            <h3>Skills</h3>
            <?php while($data = mysqli_fetch_array($skills)) : ?>
            <div class="mb-3 input-box-2">
                <input type="text" class="form-control" id="skill" name="skill" required value="<?= $data["skill"];?>" />
            </div>
            <?php endwhile; ?>
        </div>
        <div class="user">
            <h3>User</h3>
            <input type="hidden" name="nim" value="<?= $nim_about; ?>">
            <div class="mb-3 input-box-2">
                <input type="text" class="form-control" name="nama_user" disabled value="<?= $fname;?> <?= $lname; ?>" />
            </div>
            <div class="mb-3 input-box-2">
                <input type="text" class="form-control" name="kelas_user" required value="<?= $kelas_user;?>" />
            </div>
            <div class="mb-3 input-box-2">
                <input type="email" class="form-control" name="email_user" required value="<?= $email_user;?>" />
            </div>
        </div>
        <div class="foto">
            <h3>Link Foto</h3>
            <div class="mb-3 input-box-2">
                <input type="text" class="form-control" id="foto" name="foto"/>
            </div>
        </div>
        <div class="button">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="../index.php" role="button"><i class="fas fa-chevron-circle-left"></i> Back</a>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
