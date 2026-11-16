<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verifica tu cuenta en DOMI</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6fb; font-family: 'Inter', Arial, sans-serif;">
    
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f6fb; padding: 40px 0;">
        <tr>
            <td align="center">
                <!-- Contenedor principal -->
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                    
                    <!-- Encabezado azul -->
                    <tr>
                        <td align="center" style="background-color: #1e3a8a; padding: 30px;">
                            <!-- Ícono/Logo simulado (puedes cambiar el src por un logo real si tienes) -->
                            <div style="background: rgba(255,255,255,0.15); width: 50px; height: 50px; border-radius: 50%; display: inline-block; line-height: 50px; text-align: center; font-size: 24px; color: #ffffff; margin-bottom: 10px;">
                                🎓
                            </div>
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px; letter-spacing: 1px;">DOMI</h1>
                        </td>
                    </tr>

                    <!-- Contenido -->
                    <tr>
                        <td style="padding: 40px 40px 30px 40px;">
                            <h2 style="color: #0f172a; margin-top: 0; font-size: 22px;">¡Hola, {{ $user->name }}!</h2>
                            <p style="color: #475569; font-size: 15px; line-height: 1.6;">
                                Estás a un solo paso de comenzar tu camino autodidacta en DOMI. 
                                Para asegurarnos de que eres tú, por favor confirma tu dirección de correo electrónico haciendo clic en el siguiente botón:
                            </p>

                            <!-- Botón de acción -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin: 30px 0;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ $url }}" style="background-color: #2563eb; color: #ffffff; text-decoration: none; padding: 14px 30px; border-radius: 8px; font-weight: bold; font-size: 16px; display: inline-block;">
                                            Verificar mi correo
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="color: #64748b; font-size: 13px; line-height: 1.6;">
                                Si el botón no funciona, copia y pega este enlace en tu navegador:<br>
                                <a href="{{ $url }}" style="color: #2563eb; word-break: break-all;">{{ $url }}</a>
                            </p>
                            
                            <p style="color: #64748b; font-size: 13px; margin-top: 30px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                                Si tú no creaste esta cuenta, puedes ignorar este mensaje.
                            </p>
                        </td>
                    </tr>

                    <!-- Pie de página -->
                    <tr>
                        <td align="center" style="background-color: #f8fafc; padding: 20px; border-top: 1px solid #e2e8f0;">
                            <p style="color: #94a3b8; font-size: 12px; margin: 0;">
                                © {{ date('Y') }} DOMI - Plataforma de aprendizaje autodidacta.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>