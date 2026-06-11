<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpsonsDex — Registrar Personaje</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: Arial, sans-serif;
            background: #1a1a2e;
            color: #eee;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .wrapper { width: 100%; max-width: 550px; }
        h1 { color: #ffd700; text-align: center; font-size: 2rem; margin-bottom: 8px; }
        h2 { color: #aaa; text-align: center; font-weight: normal; margin-bottom: 25px; }
        .card {
            background: #16213e;
            border-radius: 12px;
            padding: 35px;
            border: 1px solid #ffd700;
        }
        .alert-success {
            background: #1a3a1a; color: #5cb85c;
            padding: 12px 16px; border-radius: 6px;
            margin-bottom: 20px; text-align: center;
        }
        label {
            display: block; margin-top: 18px; margin-bottom: 6px;
            font-weight: bold; color: #aaa; font-size: 13px;
            text-transform: uppercase;
        }
        input[type="text"], select {
            width: 100%; padding: 11px 14px; border-radius: 6px;
            border: 1px solid #0f3460; background: #1a1a2e;
            color: #eee; font-size: 15px;
        }
        input:focus, select:focus { outline: none; border-color: #ffd700; }
        .is-error { border-color: #e52521 !important; }
        .error-msg { color: #e52521; font-size: 12px; margin-top: 5px; }
        button[type="submit"] {
            width: 100%; padding: 13px; margin-top: 25px;
            background: #ffd700; color: #1a1a2e; border: none;
            border-radius: 6px; font-size: 16px; font-weight: bold; cursor: pointer;
        }
        button[type="submit"]:hover { opacity: 0.85; }
    </style>
</head>
<body>
<div class="wrapper">

    <h1>🍩 SimpsonsDex</h1>
    <h2>Registrar Personaje</h2>

    <div class="card">

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <form action="{{ route('personajes.store') }}" method="POST">

            @csrf

            <label for="nombre">Nombre del personaje</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre') }}"
                placeholder="Ej: Homer, Bart, Lisa..."
                class="{{ $errors->has('nombre') ? 'is-error' : '' }}"
            >
            @error('nombre')
                <p class="error-msg">⚠️ {{ $message }}</p>
            @enderror

            <label for="tipo">Tipo</label>
            <select
                id="tipo"
                name="tipo"
                class="{{ $errors->has('tipo') ? 'is-error' : '' }}"
            >
                <option value="">-- Selecciona tipo --</option>
                <option value="Familiar"  {{ old('tipo') == 'Familiar'  ? 'selected' : '' }}>Familiar</option>
                <option value="Amigo"     {{ old('tipo') == 'Amigo'     ? 'selected' : '' }}>Amigo</option>
                <option value="Jefe"      {{ old('tipo') == 'Jefe'      ? 'selected' : '' }}>Jefe</option>
                <option value="Vecino"    {{ old('tipo') == 'Vecino'    ? 'selected' : '' }}>Vecino</option>
                <option value="Enemigo"   {{ old('tipo') == 'Enemigo'   ? 'selected' : '' }}>Enemigo</option>
            </select>
            @error('tipo')
                <p class="error-msg">⚠️ {{ $message }}</p>
            @enderror

            <label for="color_de_pelo">Color de pelo</label>
            <input
                type="text"
                id="color_de_pelo"
                name="color_de_pelo"
                value="{{ old('color_de_pelo') }}"
                placeholder="Ej: Amarillo, Azul, Gris..."
                class="{{ $errors->has('color_de_pelo') ? 'is-error' : '' }}"
            >
            @error('color_de_pelo')
                <p class="error-msg">⚠️ {{ $message }}</p>
            @enderror

            <label for="trabajo">Trabajo</label>
            <input
                type="text"
                id="trabajo"
                name="trabajo"
                value="{{ old('trabajo') }}"
                placeholder="Ej: Inspector de seguridad nuclear..."
                class="{{ $errors->has('trabajo') ? 'is-error' : '' }}"
            >
            @error('trabajo')
                <p class="error-msg">⚠️ {{ $message }}</p>
            @enderror

            <button type="submit">🍩 Registrar Personaje</button>

        </form>
    </div>
</div>
</body>
</html>