<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        
        h1 {
            font-size: 24px;
            color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .form-group label {
            color: #b3b3b3;
        }
        
        .form-control {
            background-color: #333333;
            border: none;
            color: #e0e0e0;
            padding: 12px;
            border-radius: 4px;
        }
        
        .form-control:focus {
            background-color: #444444;
            outline: none;
            box-shadow: none;
            border-color: #6200ee;
        }

        .btn-primary {
            background-color: #6200ee;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #3700b3;
        }

        .alert-success {
            background-color: #388e3c;
            color: #ffffff;
            border: none;
        }

        .invalid-feedback {
            color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mt-5">Restablecer Contraseña</h1>
                
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Nueva Contraseña</label>
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirmar Contraseña</label>
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Restablecer Contraseña</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
