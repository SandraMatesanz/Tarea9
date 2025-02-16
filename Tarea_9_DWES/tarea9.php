<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

/**
 * Obtiene datos de una API pública y los devuelve en formato JSON.
 *
 * Esta función hace una solicitud HTTP GET a la URL proporcionada y decodifica la respuesta JSON.
 *
 * @param string $url URL de la API desde donde obtener los datos.
 * @return mixed Datos de la API decodificados en formato de array asociativo, o null si ocurre un error.
 */
function obtenerDatosAPI($url) {
    $respuesta = file_get_contents($url);
    return $respuesta ? json_decode($respuesta, true) : null;
}

// API pública de Pokémon
$api_url = "https://pokeapi.co/api/v2/pokemon/pikachu";
$datos = obtenerDatosAPI($api_url);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Pokémon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 20px;
        }
        .contenedor {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        .alerta {
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .informacion {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        img {
            margin-top: 10px;
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <header>
            <h1>Información de Pokémon</h1>
        </header>
        <main>
            <h2>Detalles de Pikachu</h2>
            <?php if ($datos): ?>
                <div class="alerta informacion">
                    <p><strong>Nombre:</strong> <?= htmlspecialchars($datos['name']) ?></p>
                    <p><strong>Altura:</strong> <?= htmlspecialchars($datos['height']) ?></p>
                    <p><strong>Peso:</strong> <?= htmlspecialchars($datos['weight']) ?></p>
                    <img src="<?= htmlspecialchars($datos['sprites']['front_default']) ?>" alt="Imagen de Pikachu">
                </div>
            <?php else: ?>
                <div class="alerta error">No se pudo obtener la información del Pokémon.</div>
            <?php endif; ?>
        </main>
        <footer>
            <p>Tarea realizada por: Sandra Matesanz Huertas.</p>
        </footer>
    </div>
</body>
</html>
