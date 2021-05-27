<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if it's true then redirect to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../");
    exit;
}

// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese su usuario.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingrese su contraseña.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT u.id, u.username, u.name, u.password, r.name AS role FROM tbl_users u INNER JOIN tbl_roles r ON r.id = u.role_id WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $name, $hashed_password, $role);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["name"] = $name;
                            $_SESSION['role'] = $role;

                            // Redirect user to welcome page
                            header("location: ../");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else {
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
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
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../img/BBB.jpg" rel="icon">
    <link href="../style.css" rel="stylesheet">
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

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <img class="mb-4" src="../img/logo_login.png">
            <h1 class="h3 mb-3 fw-normal">
                Iniciar Sesión</h1>
            <div class="form-floating <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="username" class="form-control" id="floatingInput" value="<?php echo $username; ?>" placeholder="Usuario">
                <!-- <label for="floatingInput">Usuario</label> -->
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-floating  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
                <!-- <label for="floatingPassword">Contraseña</label> -->
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            <p>¿Aún no tienes cuenta? <a href="register.php">Registrar</a>.</p>
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