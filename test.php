<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Test</title>
</head>

<body class="p-3">
    <!-- <h1>
        Hai
    </h1> -->

    <?php
    /*$name = "UNTIRTA";
    $age = 40;

    echo "Hai " .$name. " your age is " .$age;
    echo "<br>";

    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "      <th scope='col'>#</th>";
    echo "      <th scope='col'>First</th>";
    echo "      <th scope='col'>Last</th>";
    echo "      <th scope='col'>Handle</th>";
    echo "  </tr>";
    echo " </thead>";
    echo "    <tbody>";
    $x = 1;
    while ($x <= 5) {
        echo "   <tr>";
        echo "      <th scope='row'>$x</th>";
        echo "      <td>Mark" .$x. "untirta</td>";
        echo "      <td>Otto" .$x. "untirta</td>";
        echo "      <td>@mdo" .$x. "untirta</td>";
        echo "  </tr>";
        $x++;
    }
    echo "</tbody>";
    echo "</table>";
    */ ?>

    <h1>Membuat CRUD dengan php+mysql</h1>
    <a class='btn btn-primary' href="">Add New User</a><br /><br />
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Update</th>
        </tr>
        <tr>
            <td>nama</td>
            <td>mobile</td>
            <td>email</td>
            <td>
                <a class='btn btn-warning' href=''>Edit</a>
                <a class='btn btn-danger' href=''>Delete</a>
            </td>
        </tr>
    </table>

</body>

</html>