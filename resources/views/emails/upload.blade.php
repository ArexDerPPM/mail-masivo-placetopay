<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Emails CSV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 400px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        input[type=file] { margin-bottom: 15px; }
        .alert { padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .alert-success { background: #e0ffe0; color: #2d7a2d; }
        .alert-error { background: #ffe0e0; color: #a12d2d; }
    </style>
</head>
<body>
<div class="container">
    <h2>Subir Emails (CSV)</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('emails.upload') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" accept=".csv,text/csv">
        <button type="submit">Subir</button>
    </form>
    <form method="POST" action="{{ route('emails.deleteAll') }}" style="margin-top:15px;">
        @csrf
        <button type="submit" onclick="return confirm('¿Seguro que deseas borrar todos los emails?')" style="background:#a12d2d;color:#fff;">Borrar todos los emails</button>
    </form>
    <p style="margin-top:20px;font-size:0.95em;color:#555;">El archivo debe tener una columna llamada <b>email</b>.</p>
</div>
</body>
</html> 