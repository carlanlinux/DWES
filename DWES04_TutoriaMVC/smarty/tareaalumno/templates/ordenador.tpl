<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 5: Información ordenador.</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="contenedor">
    <div id="encabezado">
        <h1>{$producto->getnombrecorto()}</h1>
        <p>{$producto->getcodigo()}</p>
    </div>

    <div id="productos">
        <h2>Características:</h2>
        <p>Procesador: {$ordenador->getprocesador()}</p>
        <p>RAM: {$ordenador->getRAM()} GB</p>
        <p>Tarjeta gráfica: {$ordenador->getgrafica()}</p>
        <p>Unidad óptica: {$ordenador->getunidadoptica()}</p>
        <p>Sistema operativo: {$ordenador->getSO()}</p>
        <p>Otros: {$ordenador->getotros()}</p>
        <p>PVP: {$producto->getPVP()}</p>


        <h2>Descripción:</h2>
        <p>{$producto->getdescripcion()}</p>
    </div>

    <br class="divisor"/>
    <div id="pie">
        <form action='productos.php' method='post'>
            <input type='submit' name='volver' value='Volver'/>
        </form>
    </div>
</div>
</body>
</html>
