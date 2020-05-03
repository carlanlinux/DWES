<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFULL_CALENDAR);

// Set your default timezone, for example:
date_default_timezone_set('America/Caracas');

$startDate = new DateTime();
$endDate = new DateTime('+1 hour');
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<div id="myFullCalendar"></div>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_width(670)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsJQFullCalendar::build()->in('#myFullCalendar')
            ->_defaultView('agendaDay')
            ->_editable(true)
            ->_events(array(
                array('title' => '1 Hour event',
                    'allDay' => false,
                    'start' => $startDate->format('U'),
                    'end' => $endDate->format('U'))
            ))
    )
?>