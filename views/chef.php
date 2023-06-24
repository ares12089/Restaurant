<!DOCTYPE html>
<html lang="es">
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
            width: calc(100% + 100cm);
            margin-top: 1cm;s
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            width: 200px;
        }

        .button {
            background-color: orange;
            color: white;
            padding: 3px 10px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            position: relative;
            transition: transform 0.3s;
            left: 6cm;
        }


        .button:hover {
        transform: scale(1.2);
        }

        .custom-details {
        width: calc(100% + 5cm);
        margin-top: -2cm;
        transform: scale(1.5);

        }

        .content {
        text-align: left;
        margin: 0 auto;
        width: 80%;
        }



    </style>
</head>
<body>
    <center>

    <div class="container" style="margin-top: 4cm; margin-left: -5cm;">
    <details class="custom-details">
        <summary>Tiket 03<button class="button">Listo</button></summary>
        <div class="content" style="padding-left: 4cm;">
            <p>Hamburguesa</p>
            <p>Tipo: Hawaiana</p>
            <p>Extras: Salsa inglesa</p>
            <p>Bebidas: Gaseosa</p>
        </div>
    </details>
</div>

<div class="container" style="margin-top: 4cm; margin-left: -5cm;">
    <details class="custom-details">
        <summary>Tiket 03<button class="button">Listo</button></summary>
        <div class="content" style="padding-left: 4cm;">
            <p>Hamburguesa</p>
            <p>Tipo: Hawaiana</p>
            <p>Extras: Salsa inglesa</p>
            <p>Bebidas: Gaseosa</p>
        </div>
    </details>
</div>


<div class="container" style="margin-top: 4cm; margin-left: -5cm;">
    <details class="custom-details">
        <summary>Tiket 03<button class="button">Listo</button></summary>
        <div class="content" style="padding-left: 4cm;">
            <p>Hamburguesa</p>
            <p>Tipo: Hawaiana</p>
            <p>Extras: Salsa inglesa</p>
            <p>Bebidas: Gaseosa</p>
        </div>
    </details>
</div>

    </center>

</body>
</html>