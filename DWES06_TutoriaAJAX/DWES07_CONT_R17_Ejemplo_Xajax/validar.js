function enviarFormulario() {
    /* Se cambia el botón de Enviar a "un momento..." y se deshabilita
     *  hasta que llegue la respuesta
     */
    xajax.$('enviar').disabled = true;
    xajax.$('enviar').value = "Un momento...";

    /* Aquí se hace la llamada de forma asíncrona a la función registrada de PHP
     * Cuando se llama a la función el procesamiento del formulario continúa sin 
     * esperar espuesta, por eso se deshabilita el botón de envío del formulario.
     * Cuando se recibe la respuesta se producen en el formulario los cambios 
     * que nos haya llegado en la respuesta.
     * El método getFormValues de xajax se encarga de obtener los datos de un 
     * formulario a través del id.
     */
    xajax_validarFormulario(xajax.getFormValues("datos"));

    return false;
}

