<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Tarea: muestraordenador.php -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tarea Tema 5: Detalle de producto tipo ordenador</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagdetalleproducto">

<div id="contenedor">
    <div id="encabezado">
        <h1>{$ordenador->getnombrecorto()}</h1>
        <h2>Código: {$ordenador->getcodigo()}</h2>
    </div>
    <div id="detalle">
        <h2>Características:</h2>
        <p>Procesador: {$ordenador->getprocesador()}</p>
        <p>RAM: {$ordenador->getRAM()} GB.</p>
        <p>Tarjeta gráfica: {$ordenador->getgrafica()}</p>
        <p>Unidad óptica: {$ordenador->getunidadoptica()}</p>
        <p>Sistema operativo: {$ordenador->getSO()}</p>
        <p>Otros: {$ordenador->getotros()}</p>
        <p>PVP: {$ordenador->getPVP()}</p>
        <h2>Descripcion:</h2>
        <p>{$ordenador->getdescripcion()}</p>
    </div>
</div>
</body>