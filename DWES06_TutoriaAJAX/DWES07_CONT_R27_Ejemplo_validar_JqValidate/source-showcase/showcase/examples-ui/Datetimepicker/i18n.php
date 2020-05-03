<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>

<?php
//Loading assets when the document is ready
echo
YsJQueryAssets::loadScriptsOnReady(
    'jquery4php-assets/js/ui/i18n/jquery.ui.datepicker-es.js',
    // callback: ENABLE THE BUTTON
    YsJQuery::removeAttr('disabled')->in('#btnOpenDialog')
);
?>

<button id="btnShowDemo">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsUIDateTimepicker::input('datepickerId') ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnShowDemo')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIDateTimepicker::datetimepicker('#datepickerId')
            ->_ampm(true)
            ->_timeOnlyTitle('Seleccione La Hora')
            ->_timeText('Inicio')
            ->_hourText('Hora')
            ->_minuteText('Minutos')
            ->_secondText('Segundos')
            ->_currentText('Actual')
            ->_closeText('Cerrar')
    )
?>