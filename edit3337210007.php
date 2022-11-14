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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Edit CV Mohamad Restu Zikri Novdian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <body>
        <section class="about-section" id="about">
        <div class="card">
            <div class="row mt-5">
                <div class="col-lg-10 mx-auto mb-10">
                    <div class="card card-body">
                        <form method="post" action="edit3337210007.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <h1 class="col-lg-10">Formulir Mohamad Restu Zikri Novdian</h1>
                                <p class="col-lg-10">Isi From Edit Dibawah ini:</p>
                            </div>
                            <input type="hidden" name="nim" value="3337210007">
                            <table class="table table">
                                <tbody><tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="fname" class="col-sm-3 col-form-label">Nama Depan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="fname" name="fname" value="Mohamad Restu" required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="lname" class="col-sm-3 col-form-label">Nama Belakang :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname" name="lname" value="Zikri Novdian" required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="alamat" class="col-sm-3 col-form-label">Alamat Rumah:</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" autocomplete="off" id="alamat" name="alamat" required="">TCP Blok D2 No 41 Ds.Pelawad Ke.Ciruas Kab.Serang-Banten</textarea>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="about" class="col-sm-3 col-form-label">Tentang  Saya:</label>
                                            <div class="col-sm-9">
                                                <textarea type="textarea" class="form-control" id="about" name="about" required="">"I am interested as a data scientist who can manage and manage business by exploring data"</textarea>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="email" class="col-sm-3 col-form-label">Email :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="email" name="email" value="3337210007@untirta.ac.id" required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="link_in" class="col-sm-3 col-form-label">LinkedIn :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="link_in" name="link_in" value="-" required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="link_git" class="col-sm-3 col-form-label">Github :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="link_git" name="link_git" value="-" required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="link_twit" class="col-sm-3 col-form-label">Twitter :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="link_twit" name="link_twit" value="-" required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="link_twit" class="col-sm-3  col-form-label">Facebook :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="link_fb" name="link_fb" value="-" required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12"> 
                                            <label for="award" class="col-sm-3 col-form-label">Penghargaan :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="award" name="award" value="Certified Data Science Asociate"  required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="interest" class="col-sm-3 col-form-label">Interest :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="interest" name="interest" value="Data Science Specialist, and Big Data Analyst" required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group row col-lg-12">
                                            <label for="skill" class="col-sm-3 col-form-label">Skills :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="skill" name="skill" value="Python, SQL, R, Hadoop, Spark" required="">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                                            <a class="btn btn-secondary" href="../index.php" role="button"><i class="fas fa-chevron-circle-left"></i> Go To Home</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody></table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>
    
</body>
</html>
