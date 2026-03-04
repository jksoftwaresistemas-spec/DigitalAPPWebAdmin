<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Novo Registro | DigitalAPPWebAdmin</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #ffffff;
        }

        .login-container {
            max-width: 450px;
            /* Um pouco mais largo para acomodar o formulário de registro */
            width: 100%;
            padding: 2rem;
        }

        .form-control {
            border-radius: 6px;
            padding: 10px;
            border: 1px solid #e5e7eb;
            font-size: 0.9rem;
        }

        .form-control:focus {
            border-color: #000;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.05);
            outline: none;
        }

        .btn-black {
            background-color: #000;
            color: #fff;
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            width: 100%;
            transition: opacity 0.2s;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-black:hover {
            opacity: 0.8;
            color: #fff;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">

    <div class="login-container">
        <div class="mb-8 flex flex-col items-center">
            <a href="/">
                <img src="{{ asset('logo.png') }}" alt="Logo DigitalAPP" class="h-20 w-auto mb-4">
            </a>

            <div class="text-center">
                <h2 class="text-xl font-bold tracking-tight text-gray-900 uppercase">
                    Novo <span class="text-gray-500 font-light">Cadastro</span>
                </h2>
                <p class="text-sm text-gray-600 mt-1">Crie sua conta corporativa</p>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                    class="form-control w-full @error('name') is-invalid @enderror" placeholder="Ex: João Silva">
                @error('name')
                <span class="text-danger text-[11px] mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail Corporativo</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    class="form-control w-full @error('email') is-invalid @enderror" placeholder="usuario@empresa.com">
                @error('email')
                <span class="text-danger text-[11px] mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="form-control w-full @error('password') is-invalid @enderror" placeholder="••••••••">
                @error('password')
                <span class="text-danger text-[11px] mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="form-control w-full" placeholder="••••••••">
            </div>

            <div class="flex flex-col gap-3 items-center justify-between mt-6">
                <button type="submit" class="btn btn-black">
                    FINALIZAR CADASTRO
                </button>

                <a class="text-sm text-gray-500 hover:text-black underline transition-colors" href="{{ route('login') }}"> Já possui uma conta? Entrar
                </a>
            </div>
        </form>

        <div class="mt-12 pt-6 border-t border-gray-100 text-center text-[10px] text-gray-400 uppercase tracking-widest">
            <p>&copy; {{ date('Y') }} DigitalAPP WebAdmin</p>
            <p class="mt-1">Cloud Firestore Connected</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>