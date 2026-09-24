<!DOCTYPE html>
<html lang="es"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="color-scheme" content="light dark">
<meta name="supported-color-schemes" content="light dark">
<meta name="x-apple-disable-message-reformatting">
<title>Actualización técnica del iframe de autenticación 3DS · 25 de agosto</title>
<!--[if mso]>
<style>body,table,td,a,p,div,li{font-family:Arial,Helvetica,sans-serif !important;}</style>
<![endif]-->
<style>
  @media only screen and (max-width:620px){
    .container{width:100% !important;}
    .px{padding-left:24px !important;padding-right:24px !important;}
    .h1{font-size:25px !important;line-height:32px !important;}
    .code{font-size:11px !important;}
  }
</style>
</head>
<body style="margin:0;padding:0;background-color:#e9eaee;">
<span style="display:none;font-size:1px;color:#e9eaee;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden;">El 25 de agosto habilitamos Passkeys en el iframe del 3DS Server. Verifique dos atributos en su integración antes de esa fecha.</span>

<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#e9eaee;">
<tbody><tr>
<td align="center" style="padding:32px 12px;">

<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" class="container" style="width:600px;max-width:600px;background-color:#f6f6f6;"><!-- Cabecera con logo -->
  <tbody><tr>
    <td style="background-color:#394256;padding:22px 40px;" class="px">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody><tr>
          <td align="left" valign="middle" style="padding-bottom:14px;">
            <img src="https://placetopay.dev/_astro/Logo-PlacetopaybyEvertec-dark.BdZxYtBt.png" width="150" alt="Placetopay by Evertec" style="display:block;width:150px;max-width:150px;height:auto;border:0;outline:none;text-decoration:none;">
          </td>
        </tr>
        <tr>
          <td align="left" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:14px;letter-spacing:3px;color:#FF6C0C;text-transform:uppercase;font-weight:bold;">Boletín técnico para comercios</td>
        </tr>
      </tbody></table>
    </td>
  </tr>

  <!-- Título -->
  <tr>
    <td style="background-color:#2365FF;padding:32px 40px;" class="px">
      <p style="margin:0 0 12px 0;font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:14px;letter-spacing:3px;text-transform:uppercase;font-weight:bold;color:#c8daff;">Autenticación 3D Secure</p>
      <p class="h1" style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:29px;line-height:36px;font-weight:bold;letter-spacing:-0.5px;color:#ffffff;">Hemos habilitado un nuevo mecanismo de seguridad para tus pagos en línea</p>
    </td>
  </tr>

  <!-- Entrada -->
  <tr>
    <td style="padding:34px 40px 0 40px;" class="px">
      <p style="margin:0 0 16px 0;font-family:Arial,Helvetica,sans-serif;font-size:17px;line-height:26px;color:#394256;">Estimado comercio,</p>
      <p style="margin:0 0 14px 0;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;color:#3c4152;">Las marcas de tarjetas incorporaron el desafío de autenticación con <strong style="color:#394256;">Passkeys</strong>. Para soportarlo, actualizaremos la configuración del <strong style="color:#394256;">iframe del 3DS Server</strong>: el desafío se mostrará en una ventana emergente dentro del mismo flujo 3DS que usa hoy.</p>
      <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;color:#3c4152;">La actualización la ejecutamos nosotros. De su lado solo se requiere una verificación en las políticas de seguridad de su sitio o aplicación.</p>
    </td>
  </tr>

  <!-- Fecha -->
  <tr>
    <td style="padding:26px 40px 0 40px;" class="px">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#ffffff;border-radius:20px;">
        <tbody><tr>
          <td style="padding:24px 30px;font-family:Arial,Helvetica,sans-serif;">
            <p style="margin:0 0 8px 0;font-size:11px;line-height:14px;letter-spacing:3px;text-transform:uppercase;font-weight:bold;color:#FF6C0C;">Fecha del despliegue</p>
            <p style="margin:0;font-size:22px;line-height:29px;font-weight:bold;letter-spacing:-0.5px;color:#394256;">Martes 25 de agosto · 07:00 (GMT-5)</p>
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>

  <!-- Qué se debe hacer -->
  <tr>
    <td style="padding:30px 40px 0 40px;" class="px">
      <p style="margin:0 0 6px 0;font-family:Arial,Helvetica,sans-serif;font-size:11px;line-height:14px;letter-spacing:3px;text-transform:uppercase;font-weight:bold;color:#FF6C0C;">Qué se debe hacer</p>
      <p style="margin:0 0 18px 0;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;color:#3c4152;">Antes del 25 de agosto, por favor confirme con su equipo técnico que la configuración de seguridad no restrinja los siguientes atributos del iframe:</p>

      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody><tr>
          <td width="26" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;color:#2365FF;font-weight:bold;">1.</td>
          <td valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;color:#3c4152;padding-bottom:12px;">Revise las cabeceras y políticas de seguridad (CSP, permisos de <em>frame</em>) de su portal o aplicación.</td>
        </tr>
        <tr>
          <td width="26" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;color:#2365FF;font-weight:bold;">2.</td>
          <td valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;color:#3c4152;padding-bottom:12px;">Permita los atributos <strong style="color:#394256;">allow</strong> y <strong style="color:#394256;">sandbox</strong> indicados a continuación.</td>
        </tr>
             </tbody></table>

      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#111827;border-radius:20px;">
        <tbody><tr>
          <td style="padding:24px 26px;">
            <p class="code" style="margin:0 0 14px 0;font-family:'Courier New',Courier,monospace;font-size:13px;line-height:21px;color:#ffffff;word-break:break-word;">allow="payment *; publickey-credentials-create *; publickey-credentials-get *"</p>
            <p class="code" style="margin:0;font-family:'Courier New',Courier,monospace;font-size:13px;line-height:21px;color:#ffffff;word-break:break-word;">sandbox="allow-forms allow-scripts allow-same-origin allow-pointer-lock allow-popups"</p>
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>

  <!-- Aplica a -->
  <tr>
    <td style="padding:26px 40px 0 40px;" class="px">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#ffedea;border-radius:20px;">
        <tbody><tr>
          <td style="padding:22px 30px;font-family:Arial,Helvetica,sans-serif;">
            <p style="margin:0 0 6px 0;font-size:11px;line-height:14px;letter-spacing:3px;text-transform:uppercase;font-weight:bold;color:#c3422d;">Aplica a su integración si usa</p>
            <p style="margin:0;font-size:16px;line-height:26px;color:#5c3a33;"><strong>API directa al 3DS Server</strong> o <strong>Web Checkout con Lightbox</strong>. En estos casos, una política de seguridad restrictiva puede impedir que el desafío se muestre.</p>
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>

  <!-- No requiere acción -->
  <tr>
    <td style="padding:14px 40px 0 40px;" class="px">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#f3fcf5;border-radius:20px;">
        <tbody><tr>
          <td style="padding:22px 30px;font-family:Arial,Helvetica,sans-serif;">
            <p style="margin:0 0 6px 0;font-size:11px;line-height:14px;letter-spacing:3px;text-transform:uppercase;font-weight:bold;color:#4e8a4e;">No requiere acción si usa</p>
            <p style="margin:0;font-size:16px;line-height:26px;color:#33452f;">Micrositios, Links de Pago, QR, Plugins o Componentes. Tampoco habrá cambios en el flujo transaccional ni en la mensajería existente.</p>
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>

  <!-- Contacto y firma -->
  <tr>
    <td style="padding:32px 40px 0 40px;" class="px">
      <p style="margin:0 0 18px 0;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;color:#3c4152;">Si tiene dudas sobre su integración o requiere apoyo en la validación, nuestro equipo puede acompañarlo antes de la fecha de despliegue.</p>
      <table role="presentation" cellpadding="0" cellspacing="0" border="0">
        <tbody><tr>
          <td align="center" bgcolor="#ff6c0c" style="border-radius:999px;background-color:#FF6C0C;">
            <a href="mailto:atencionplacetopay@ppm.com.ec?subject=Consulta%20actualizaci%C3%B3n%20iframe%203DS" style="display:block;padding:16px 36px;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:20px;font-weight:bold;color:#ffffff;text-decoration:none;border-radius:999px;">Contactar al equipo de soporte</a>
          </td>
        </tr>
      </tbody></table>
      <p style="margin:16px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:24px;color:#6B7280;text-align:right;">
              </p>
      <p style="margin:22px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;color:#394256;">Agradecemos su atención y colaboración.<br><strong>PPM / Placetopay</strong></p>
    </td>
  </tr>

  <!-- Pie -->
  <tr>
    <td style="padding:32px 40px 40px 40px;" class="px">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody><tr><td style="border-top:1px solid #d3d5da;font-size:0;line-height:0;height:1px;">&nbsp;</td></tr>
      </tbody></table>
      <p style="margin:22px 0 6px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:19px;color:#6B7280;">Quito, Ecuador</p>
      <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:19px;color:#6B7280;">
        <a href="#preferencias" style="color:#6B7280;text-decoration:underline;">Gestionar preferencias</a> · <a href="#unsubscribe" style="color:#6B7280;text-decoration:underline;">Cancelar suscripción</a>
      </p>
    </td>
  </tr>

</tbody></table>

</td>
</tr>
</tbody></table>

</body></html>