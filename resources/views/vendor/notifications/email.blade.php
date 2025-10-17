@component('mail::message')
# Restablecimiento de Contraseña

Hola!

Recibiste este correo porque recibimos una solicitud de restablecimiento de contraseña para tu cuenta.

@component('mail::button', ['url' => $actionUrl])
Restablecer Contraseña
@endcomponent

Este enlace para restablecer la contraseña expirará en 60 minutos.

Si no solicitaste un restablecimiento de contraseña, no es necesario tomar ninguna acción adicional.

Saludos,<br>
{{ config('app.name') }}

Si tienes problemas para hacer clic en el botón "Restablecer Contraseña", copia y pega la URL a continuación en tu navegador web:  
{{ $actionUrl }}
@endcomponent
