<html>
<head>
    <title>RevistApp</title>
</head>
<body>
    <h1>Revistapp</h1>
    <h2>Crear un pokemon:</h2>

    <form method="POST" action="{{ route('pokemon.store') }}">
        @csrf
        <p><label>Nombre: </label><input type="text" name="nombre"></p>
        <p><label>Tipo: </label><input type="text" name="tipo"></p>
        <p><label>Ataque: </label><input type="number" name="ataque"></p>
        <p><label>Defensa: </label><input type="number" name="defensa"></p>
        <p><label>Adquisicion: </label><input type="date" name="adquisicion"></p>

        <button type="submit">Crear pokemon</button>
    </form>
    <a href="{{ route('pokemon.index') }}">Volver</a>
</body>
</html>
