<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login | DigitalAPPWebAdmin</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #ffffff; /* Fundo branco puro para remover o cinza */
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
        }

        /* Estilização dos inputs para manter o padrão sem depender de componentes externos */
        .form-control {
            border-radius: 6px;
            padding: 10px;
            border: 1px solid #e5e7eb;
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
                    Painel <span class="text-gray-500 font-light">Administrativo</span>
                </h2>
                <p class="text-sm text-gray-600 mt-1">Acesso Restrito Corporativo</p>
            </div>
        </div>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail Corporativo</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                    class="form-control w-full @error('email') is-invalid @enderror" placeholder="usuario@empresa.com">
                @error('email')
                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                <input id="password" type="password" name="password" required 
                    class="form-control w-full @error('password') is-invalid @enderror" placeholder="••••••••">
                @error('password')
                    <span class="text-danger text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-black shadow-sm focus:ring-black">
                    <span class="ms-2 text-sm text-gray-600">Manter conectado</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-500 hover:text-black underline" href="{{ route('password.request') }}">
                        Esqueceu a senha?
                    </a>
                @endif
            </div>

            <button type="submit" class="btn btn-black">
                ACESSAR SISTEMA
            </button>
        </form>

        <div class="mt-12 pt-6 border-t border-gray-100 text-center text-[10px] text-gray-400 uppercase tracking-widest">
            <p>&copy; {{ date('Y') }} DigitalAPP WebAdmin</p>
            <p class="mt-1">Cloud Firestore Connected</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>