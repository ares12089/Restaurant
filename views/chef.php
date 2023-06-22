<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef</title>

</head>
<body>
    
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            width: 200px;
        }

        .button {
            background-color: orange;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            position: relative;
            transition: transform 0.3s;
            left: 3cm;
        }


        .button:hover {
        transform: scale(1.2);
        }


    </style>
</head>
<body>
    <center>
    <div class="container" style="margin-top: 3cm;">
        <details>
            <summary>Tiket 03<button class="button">Listo</button></summary>
            <p>Hambuerguesa</p>
            <p>Tipo: Hawaiana</p>
            <p>Extras: Salsa inglesa</p>
            <p>Bebidas: Gaseosa</p>
        </details>
    </div>

    <div class="container">
        <details>
            <summary>Tiket 05<button class="button">Listo</button></summary>
            <p>Hambuerguesa</p>
            <p>Tipo: Hawaiana</p>
            <p>Extras: Salsa inglesa</p>
            <p>Bebidas: Gaseosa</p>
        </details>
    </div>

    <div class="container">
        <details>
            <summary>Tiket 02<button class="button">Listo</button></summary>
            <p>Hambuerguesa</p>
            <p>Tipo: Hawaiana</p>
            <p>Extras: Salsa inglesa</p>
            <p>Bebidas: Gaseosa</p>
        </details>
    </div>

    <div class="container">
        <details>
            <summary>Tiket 01<button class="button">Listo</button></summary>
            <p>Hambuerguesa</p>
            <p>Tipo: Hawaiana</p>
            <p>Extras: Salsa inglesa</p>
            <p>Bebidas: Gaseosa</p>
        </details>
    </div>
    </center>

</body>
</html>