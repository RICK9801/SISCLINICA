<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="logo">
                <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" width="50">
            </div>
            <h5 class="text-center">¿Olvidaste tu contraseña?</h5>
            <p class="text-center small">Ingresa tu correo y te enviaremos un enlace para restablecer tu contraseña.</p>

              @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Enviar Enlace de Restablecimiento</button>
                </form>
            
        </div>
    </div>

    {{-- <script>
        document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');

            successMessage.classList.add('d-none');
            errorMessage.classList.add('d-none');

            if (email.trim() === "") {
                errorMessage.textContent = "El correo electrónico es obligatorio.";
                errorMessage.classList.remove('d-none');
                return;
            }

            fetch("{{ route('password.email') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    successMessage.classList.remove('d-none');
                } else {
                    errorMessage.textContent = "Ocurrió un error al enviar el enlace.";
                    errorMessage.classList.remove('d-none');
                }
            })
            .catch(error => {
                errorMessage.textContent = "Hubo un problema, inténtalo de nuevo.";
                errorMessage.classList.remove('d-none');
            });
        });
    </script> --}}
</body>

</html>
