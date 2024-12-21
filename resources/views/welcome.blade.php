<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa de Ayuda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #2d3748;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .buttons-container {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 10px;
        }

        .hero {
            text-align: center;
            padding: 50px 20px;
            flex: 1;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .hero img {
            max-width: 100%; 
            height: auto;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #f1f1f1;
            font-size: 0.9rem;
            margin-top: auto;
        }

        .modal-body {
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 15px;
            height: 500px; 
        }

        .modal-body-2 {
            padding: 30px;
            background-color: #f9f9f9;
            border-radius: 15px;
            height: 600px; 
        }

        .modal-header .btn-close {
            background-color: transparent;
            border: none;
        }

        .link-register {
            text-align: center;
            margin-top: 15px;
        }

        .modal-dialog {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .modal-content {
            width: 100%;
            max-width: 400px;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    @if (Auth::check())
        <script>window.location.href = "/dashboard";</script>
    @endif
    
    <!-- Encabezado -->
    <div class="header">
        Contraloría Municipal de Villavicencio
    </div>

    <!-- Botones de Inicio de Sesión y Registro -->
    <div class="buttons-container">
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</button>
        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#registerModal">Registrarse</button>
    </div>

    <!-- Sección principal -->
    <div class="hero">
        <h1>Bienvenido al Sistema de Gestión TIC</h1>

        <!-- Imagen de la Contraloría de Villavicencio -->
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo Contraloría de Villavicencio" class="img-fluid mb-4 w-50">

        <p>Gestión eficiente para la Contraloría Municipal</p>
    </div>

<!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de login -->
                <form method="POST" action="{{ route('login') }}" id="loginForm" onsubmit="login(event)">
                    @csrf
                    <div class="mb-3">
                        <label for="email_login" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email_login" name="email" placeholder="Ingresa tu correo"  autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <label for="password_login" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password_login" name="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div id="login-errors" class="text-danger mb-3"></div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>
                <div class="link-register">
                    <p>¿No tienes una cuenta? <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">Regístrate</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal de Registro -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Registrarse</h5>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body-2">
                <form method="POST" action="{{ route('register') }}" id="registerForm" onsubmit="register(event)">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre completo" required autocomplete="name">
                    </div>
                    <div class="mb-3">
                        <label for="email_register" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email_register" name="email" placeholder="Ingresa tu correo" required autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <label for="password_register" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password_register" name="password" placeholder="Crea una contraseña" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirma tu contraseña" required>
                    </div>
                    <div id="register-errors" class="text-danger mb-3"></div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </form>
                <div class="link-register">
                    <p><br>¿Ya tienes cuenta?<br> <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Inicia sesión</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>© 2024 Contraloría Municipal de Villavicencio. Todos los derechos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<script>
    function login(event) {
        event.preventDefault();
        
        let form = document.getElementById('loginForm');
        let formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                // Manejo de errores genéricos
                if (response.status === 422) {
                    return response.json().then(data => {
                        let errorsContainer = document.getElementById('login-errors');
                        errorsContainer.innerHTML = '';
                        for (let key in data.errors) {
                            data.errors[key].forEach(error => {
                                let errorElement = document.createElement('div');
                                errorElement.innerText = error;
                                errorsContainer.appendChild(errorElement);
                            });
                        }
                    });
                } else {
                    throw new Error('Error en el servidor.');
                }
            }
            return response.json();
        })
        .then(data => {
            // Aquí se redirige a la URL proporcionada por el backend
            if (data.redirect_url) {
                window.location.href = data.redirect_url;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>



<script>
    function register(event) {
        event.preventDefault();
        
        let form = document.getElementById('registerForm');
        let formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (response.status === 422) {
                return response.json().then(data => {
                    let errorsContainer = document.getElementById('register-errors');
                    errorsContainer.innerHTML = '';
                    for (let key in data.errors) {
                        data.errors[key].forEach(error => {
                            let errorElement = document.createElement('div');
                            errorElement.innerText = error;
                            errorsContainer.appendChild(errorElement);
                        });
                    }
                });
            } else if (response.ok) {
                return response.json().then(data => {
                    window.location.href = data.redirect_url;
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
</body>
</html>