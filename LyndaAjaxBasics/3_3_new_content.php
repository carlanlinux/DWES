<?php
    $content = array(
        'short' => 'New Content',
        'regular' => 'This is the new content wich has been loaded by Ajax',
        'long' => 'This content is the result of making an Ajax query to a PHP page 
        with dramatically generated text as response'
    );

    //Importnte usar echo para enviarlo como respuesta.
echo json_encode($content);