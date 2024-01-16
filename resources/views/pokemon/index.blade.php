<html>

<head>
    <title>RevistApp</title>
</head>

<body>
    <h1>Revistapp</h1>
    <h2>Listado de pokemon:</h2>
    <table>
        <tr>
            <th>Enlace</th>
            <th>Título</th>
        </tr>
        @foreach ($pokemones as $pokemon)
        <tr>
            <td><a href="{{ route('pokemon.show', $pokemon['id']) }}">Ver</a></td>
            <td>{{ ($pokemon['nombre']) }}</td>
        </tr>
        @endforeach
        </ul>
</body>

</html>