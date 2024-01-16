<!DOCTYPE html>
<html>
<head>
    <title>RevistApp</title>
</head>
<body>
    <h1>Revistapp</h1>
    <h2>Detalle del pokemon:</h2>
    <p>Nombre: {{ $pokemon->nombre }}</p>
    <p>Tipo: {{ $pokemon->tipo }}</p>
    <p>Ataque: {{ $pokemon->ataque }}</p>
    <p>Defensa: {{ $pokemon->defensa }}</p>
    <p>Adquisicion: {{ $pokemon->adquisicion }}</p>
    <a href="{{ route('pokemon.index') }}">Volver</a>
</body>
</html>
