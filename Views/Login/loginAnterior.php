<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <!-- Include Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel='stylesheet' href='Views/Login/index.css'>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <!-- Go to fontawesom.com to search for icons and copy the code to include the icon in your code  -->
                        <i class="fas fa-envelope"></i>
                        <input name="loginUsuario" type="text" required autocomplete="off">
                        <label>Usuario</label>
                    </div>
                    <div class="inputbox">
                        <i class="fas fa-lock"></i>
                        <input name="loginPassword" type="password" required>
                        <label>Password</label>
                    </div>
                    <div class="forget">
                        <label><input type="checkbox">Remember Me</label>
                        <a href="#">Forgot Password</a>
                    </div>
                    <div class="row">
                        <?php

                            $login = new UsuarioControlador();
                            $login->login();

                        ?>
                    <button type="submit" >Log In</button>
                    </div>
                    <div class="register">
                        <p>Don't have an account? <a href="#">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>