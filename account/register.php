<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ../");
  exit;
}

// Include config file
//require_once "../config.php";
$config = include '../config.php';

// Define variables and initialize with empty values
$username = $name = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "Por favor ingrese un usuario.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM tbl_users WHERE username = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = trim($_POST["username"]);
      $param_name = trim($_POST["name"]);
      $param_roleid = "9";

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "Este usuario ya fue tomado.";
        } else {
          $username = trim($_POST["username"]);
          $name = trim($_POST["name"]);

          if (($_FILES['foto']['name'] != "")) {
            // Where the file is going to be stored
            $target_dir = "../account/user_pics/";
            $file = $_FILES['foto']['name'];
            $path = pathinfo($file);
            $filename = $username;
            $ext = "jpg"; //$path['extension'];
            $temp_name = $_FILES['foto']['tmp_name'];
            $path_filename_ext = $target_dir . $filename . "." . $ext;

            // Check if file already exists
            if (file_exists($path_filename_ext)) {
              unlink($path_filename_ext);
              move_uploaded_file($temp_name, $path_filename_ext);
            } else {
              move_uploaded_file($temp_name, $path_filename_ext);
            }
          }
        }
      } else {
        echo "Al parecer algo salió mal.";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Por favor ingresa una contraseña.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "La contraseña al menos debe tener 6 caracteres.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password`
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Confirma tu contraseña.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "No coincide la contraseña.";
    }
  }

  // Check input errors before inserting in database
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO tbl_users (username, name, password, role_id) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Set parameters
      $param_username = $username;
      $param_name = $name;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_name, $param_password, $param_roleid);


      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: login.php");
      } else {
        echo "Algo salió mal, por favor inténtalo de nuevo.";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Close connection
  mysqli_close($link);
}

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  // $orgSQL = "SELECT id, attr FROM tbl_catalogos WHERE catalog_code = 'ORG'";

  // $sentenciaORG = $conexion->prepare($orgSQL);
  // $sentenciaORG->execute();

  // $orgresult = $sentenciaORG->fetchAll();

  // $areaSQL = "SELECT id, attr FROM tbl_catalogos WHERE catalog_code = 'AREA'";

  // $sentenciaAREA = $conexion->prepare($areaSQL);
  // $sentenciaAREA->execute();

  // $arearesult = $sentenciaAREA->fetchAll();
} catch (PDOException $error) {
  $error = $error->getMessage();
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.82.0">
  <title>Registro</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <link href="../img/BBB.jpg" rel="icon">



  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <img class="mb-4" src="../img/logo_login.png">
      <h1 class="h3 mb-3 fw-normal">Crear cuenta</h1>

      <div class="form-floating <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Ususario" value="<?php echo $username; ?>">
        <span class="help-block" style="color: red;"><?php echo $username_err; ?></span>
      </div>
      <div class="form-floating ">
        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nombre">
      </div>
      <div class="form-floating">
        <input type="file" name="foto" class="form-control" id="floatingInput" placeholder="Foto">
      </div>
      <div class="form-floating <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Contraseña" value="<?php echo $password; ?>">
        <span class="help-block" style="color: red;"><?php echo $password_err; ?></span>
      </div>
      <div class="form-floating <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
        <input type="password" name="confirm_password" class="form-control" id="floatingPassword" placeholder="Repite la contraseña" value="<?php echo $confirm_password; ?>">
        <span class="help-block" style="color: red;"><?php echo $confirm_password_err; ?></span>
      </div>
      <div class="form-group">
        <button class="btn btn-lg btn-primary" type="submit">Registrar</button>
        <button class="btn btn-lg btn-secondary" type="reset">Limpiar</button>
      </div>
      <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>

      <p class="mt-5 mb-3 text-muted">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script> BBB Industries.
      <div class="credits">
        Desarrollado por <a href="http://emirhernandez.epizy.com/" target="_blank">Emir Hernandez</a>
      </div>
      </p>
    </form>
  </main>



</body>

</html>