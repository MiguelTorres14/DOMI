<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Verifica tu correo - DOMI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 450px;
        }

        h1 {
            color: #1e3a8a;
            font-size: 24px;
        }

        p {
            color: #64748b;
            line-height: 1.5;
        }

        .btn {
            background: #2563eb;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>📧 Verifica tu correo</h1>
        <p>¡Gracias por registrarte en DOMI! Antes de comenzar, por favor haz clic en el enlace que enviamos a tu correo electrónico.</p>

        @if (session('message'))
        <div class="alert">{{ session('message') }}</div>
        @endif

        <p>Si no recibiste el correo, podemos enviarte otro.</p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn">Reenviar correo de verificación</button>
        </form>

        <div style="margin-top: 20px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
            <form method="POST" action="{{ url('/logout') }}">
                @csrf
                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-weight: bold; font-size: 14px;">
                    Cerrar sesión e ir al Login
                </button>
            </form>
        </div>
    </div>
</body>

</html>