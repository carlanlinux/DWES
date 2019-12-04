</div>
<div id="footer">Copyright 2007, Widget Corp</div>
</body>
</html>

<?php
//Cerramos la conexión si la conexión se ha creado anteriormente. Así podemos usar este footer libremente
//En todas las páginas, sean HTML o PHP sin miedo a que pete
if(isset($connection)) mysqli_close($connection);
?>
