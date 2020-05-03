<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnShowDemo">Show Demo</button>

<?php
//Loading assets when the document is ready
echo
YsJQueryAssets::loadScriptsOnReady(
    'jquery4php-assets/js/ui/i18n/jquery.ui.datepicker-es.js',
    // callback: ENABLE THE BUTTON
    YsJQuery::removeAttr('disabled')->in('#btnOpenDialog')
);
?>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsUIDatepicker::input('datepickerId') ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnShowDemo')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_beforeclose(new YsJsFunction(YsUIDatepicker::hideDaterangepicker()))
            ->_modal(true)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIDatepicker::daterangepicker('#datepickerId')
            ->_presetRanges(
                YsUIDateRangepicker::configureDefaultPresetRanges(array(
                    'Today' => 'Hoy',
                    'Last 7 days' => 'Ultimos 7 Dias',
                    'Month to date' => 'Este mes',
                    'Year to date' => 'Este año',
                    'The previous Month' => 'El Mes Anterior'
                ))
            )
            ->_presets(array(
                'specificDate' => 'Dia',
                'allDatesBefore' => 'Dias Antes De',
                'allDatesAfter' => 'Dias Despues de',
                'dateRange' => 'Rango De Fechas'
            ))
            ->_rangeStartTitle('Desde')
            ->_rangeEndTitle('Hasta')
            ->_nextLinkText('Sig.')
            ->_prevLinkText('Ant.')
            ->_doneButtonText('Listo')
    );
?>