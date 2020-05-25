<!DOCTYPE html>
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>

<body>
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Intérprete</th>
        <th>Año</th>        
    </tr>
    <?php
      // $listado es una variable asignada desde el controlador ItemsController.
      while($item = $listado->fetch()) {
    ?>
    <tr>
        <td><?php echo $item['id']?></td>
        <td><?php echo $item['titel']?></td>
        <td><?php echo $item['interpret']?></td>
        <td><?php echo $item['jahr']?></td>        
    </tr>
    <?php
      }
    ?>
</table>
</body>
</html>