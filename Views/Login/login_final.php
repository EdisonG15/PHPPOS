<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF--8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vuexy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* --- Reset Básico y Estilos Globales --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f7fa;
        }
        
        /* --- Animación de Entrada --- */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- Contenedor Principal --- */
        /* .login-container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            min-height: 80vh;
            background-color: #fff;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            overflow: hidden;
        } */

        .login-container {
    display: flex;
    width: 100%;
    max-width: 1400px;   /* 👈 más ancho */
    min-height: 90vh;    /* 👈 más alto */
    background-color: #fff;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
    border-radius: 8px;
    overflow: hidden;
}
        /* --- Panel Izquierdo (Ilustración) --- */
        .left-panel {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            background-color: #f8f7fa;
        }

        .logo {
            font-weight: 600;
            font-size: 1.5rem;
            color: #7367f0;
        }
        
        .illustration {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration img {
            max-width: 85%;
            height: auto;
        }

        /* --- Panel Derecho (Formulario) --- */
        .right-panel {
            flex: 1;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            width: 100%;
            max-width: 400px;
               
            /* Aplicamos la animación de entrada */
            animation: fadeIn 0.7s ease-in-out forwards;
        }

        .form-box h1 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-box .subheading {
            font-size: 0.9rem;
            color: #6e6b7b;
            margin-bottom: 24px;
        }

        .input-group {
            margin-bottom: 16px;
        }

        /* **CORRECCIÓN DE ETIQUETA** */
        .input-group label {
            display: block;      /* Fuerza a la etiqueta a estar en su propia línea */
            margin-bottom: 6px;  /* Crea el espacio vertical entre la etiqueta y el campo */
            font-size: 0.85rem;
            font-weight: 500;
            color: #5e5873;
        }

        /* **CORRECCIÓN DE ÍCONO** */
 

.input-wrapper {
    width: 100%; /* Para que ocupe todo el ancho */
}

.input-wrapper input {
    width: 100%;         /* Igual que el usuario */
    display: block;      /* Para que se expanda completo */
    padding-right: 40px; /* Espacio reservado para el icono */
    box-sizing: border-box; /* Asegura que padding no recorte el ancho */
}

        .input-group input {
            width: 100%;
            padding: 10px 12px;
            font-size: 1rem;
            border: 1px solid #d8d6de;
            border-radius: 6px;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Animación */
        }
        
        .input-group input:focus {
            outline: none;
            border-color: #7367f0;
            box-shadow: 0 0 0 2px rgba(115, 103, 240, 0.25);
        }
        
        /* .password-toggle {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6e6b7b;
        } */

        .password-toggle {
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6e6b7b;
}

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .options .remember-me {
            display: flex;
            align-items: center;
            color: #5e5873;
        }

        .options .remember-me input {
            margin-right: 8px;
        }
        
        .options a {
            color: #7367f0;
            text-decoration: none;
        }
        
        .options a:hover {
            text-decoration: underline;
        }

        .signin-btn {
            width: 100%;
            padding: 12px;
            background-color: #7367f0;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease; /* Animación */
        }

        .signin-btn:hover {
            background-color: #6254e8;
            transform: translateY(-2px);
        }

        .create-account {
            text-align: center;
            font-size: 0.9rem;
            color: #5e5873;
            margin-bottom: 20px;
        }

        .create-account a {
            color: #7367f0;
            text-decoration: none;
            font-weight: 500;
        }
        
        .create-account a:hover {
            text-decoration: underline;
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            color: #b9b9c3;
            margin-bottom: 20px;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #d8d6de;
        }

        .separator:not(:empty)::before { margin-right: .25em; }
        .separator:not(:empty)::after { margin-left: .25em; }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 16px;
        }

        .social-icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            transition: transform 0.3s ease; /* Animación */
        }

        .social-icon:hover {
            transform: scale(1.1);
        }

        .social-icon.facebook { background-color: #3b5998; }
        .social-icon.twitter { background-color: #1da1f2; }
        .social-icon.google { background-color: #db4437; }
        
        /* Ocultar panel izquierdo en pantallas pequeñas */
        @media (max-width: 992px) {
            .left-panel { display: none; }
            .right-panel { padding: 20px; }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="left-panel">
            <div class="logo"></div>
            <div class="illustration">
                <img src="Views/Login/img/Investment data-rafiki.png" alt="Agricultural Illustration">

                <!-- <img src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/pages/login-v2.svg" alt="Login Illustration">
                  -->
            </div>
        </div>

        <div class="right-panel">
            <div class="form-box">
                <h1>Bienvenido al Sistema! 👋</h1>
                <p class="subheading">Inicia sesión en tu cuenta y comienza la aventura.</p>

                <form method="post">
                    <div class="input-group">
                        <label for="loginUsuario">Email or Username</label>
                        <input id="loginUsuario" name="loginUsuario" type="text" required autocomplete="off" placeholder="Enter your email or username">
                    </div>

                    <div class="input-group">
                        <label for="loginPassword">Password</label>
                        <div class="input-wrapper">
                            <input id="loginPassword" name="loginPassword" type="password" required placeholder="············">
                            <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                        </div>
                    </div>

                    <div class="options">
                        <label class="remember-me">
                            <input type="checkbox"> Remember Me
                        </label>
                        <a href="#">Forgot Password?</a>
                    </div>

                    <?php
                        // Tu bloque de código PHP para manejar el login va aquí
                        // require_once 'controllers/UsuarioControlador.php';
                        $login = new UsuarioControlador();
                        $login->login();
                    ?>
                    
                    <button type="submit" class="signin-btn">Sign in</button>
                </form>

                <div class="create-account">
                    <p>New on our platform? <a href="#">Create an account</a></p>
                </div>

                <div class="separator">or</div>

                <div class="social-login">
                    <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon google"><i class="fab fa-google"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Script para mostrar/ocultar contraseña
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#loginPassword');

        togglePassword.addEventListener('click', function (e) {
            // Cambiar el tipo del input
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Cambiar el icono del ojo
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>