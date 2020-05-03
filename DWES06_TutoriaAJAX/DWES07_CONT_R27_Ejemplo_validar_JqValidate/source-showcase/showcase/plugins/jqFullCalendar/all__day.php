<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFULL_CALENDAR);

// Set your default timezone, for example:
date_default_timezone_set('America/Caracas');

$date = new DateTime('2011-10-31 01:00:00');
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
                array('title' => 'Long Event',
                    'allDay' => false,
                    'start' => $date->format('U'))
            ))
    )
?>