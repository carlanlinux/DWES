<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">

<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>Desarrollo Web Entorno Servidor </title>
     </head>
     <body>
<?php      
            /*
             *  Desarrollo Web en Entorno Servidor
             *  Tarea para DWES02 de Laura de Horna García
             */

    if(!empty($_POST['campoAgenda']))//1º incializamos el array de agenda comprobando si hay o no datos en el campo oculto.
    {  
        $nombreList =  $_POST['nombreList'] ;  
        $telefonoList =  $_POST['telefonoList'] ;
        
         for ($a = 0; $a< count($nombreList) ; $a++) {
         $arrayAgenda[$nombreList[$a]]=$telefonoList[$a];
        }

        
    }else  {
                 $nombreList=array();
                 $telefonoList =array();
                 $arrayAgenda= array();
    }
  
     
    if (isset($_POST['enviar'])) { //3º comprobamos si se ha pulsado el botón enviar.
         
        if (empty($_POST['nombre'])) //4º si no hay nombre mostramos una aviso.
            echo "<h1><b>No ha escrito ningun nombre en el formulario</b></h1>";  
        else{  
            /*
             * 5º si hay telefono al ser array asociativo se modificará si existe el nombre,
             *    si no se añadirá, no es necesario hacer ninguna comprobación.
             */
            if(!empty($_POST['telefono']))
                $arrayAgenda[$_POST['nombre']]=$_POST['telefono'];
            else   //6º sino hay telefono se eliminará del array el registro con el nombre escrito en la caja.  
                unset ($arrayAgenda[$_POST['nombre']]);         
         }
     }
                     
    if(!empty($arrayAgenda)){//7º si hay datos en el array se pintará una tabla con los datos de la agenda.
            echo "<table border='1' ><th>NOMBRE</th><th>TELÉFONO</th>";
        foreach ($arrayAgenda as $clave => $valor) 
            echo "<tr><td> $clave </td><td>  $valor </td></tr>";
            echo "</table>";
    }
         
 
?>
      <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>?XDEBUG_SESSION_START=netbeans-xdebug" method="POST"><!--8º llamamos a la misma página que estamos ejecutando en el action -->
               <p>Nombre: <input type="text" name="nombre" /></p>
               <p>Teléfono: <input type="text" name="telefono" /></p>
               <input type="submit" value="Enviar" name="enviar"/>
       
      <?php foreach ($arrayAgenda as $clave => $valor) {
          ?> 
               <input   type='hidden'  name='nombreList[]' value='<?= $clave?>' />  <br>
                <input   type='hidden'  name='telefonoList[]' value='<?= $valor?>' />  
        
     <?php }?>
      </form>
     </body>
</html>
