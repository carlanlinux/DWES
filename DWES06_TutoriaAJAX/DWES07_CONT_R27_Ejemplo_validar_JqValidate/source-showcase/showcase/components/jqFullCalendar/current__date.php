<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQFULL_CALENDAR);

$calendar = new YsFullCalendar('myCalendarId');
$calendar->setEditable(true);
$calendar->setCurrentDate(new DateTime('2000-01-01'));

$event = new YsCalendarEvent('eventId', 'Event 1');
$event->setStart(new DateTime('2000-01-01 01:00:00'));
$event->setEnd(new DateTime('2000-01-01 05:00:00'));
$event->setAllDay(false);
$event->setColor('red');
$calendar->addEvent($event);

$event = new YsCalendarEvent(123456, 'Event 2');
$event->setStart(new DateTime('2000-01-15 01:00:00'));
$event->setEnd(new DateTime('2000-01-16 05:00:00'));
$event->setAllDay(false);
$event->setColor('green');

$calendar->addEvent($event);


?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $calendar->renderTemplate(); ?>
<?php echo YsUIDialog::endWidget() ?>

<?php

echo
YsJQuery::newInstance()
    ->onClick() // On Click
    ->in('#btnOpenDialog') // In the button with id "btnOpenDialog"
    ->execute( // DO
        YsUIDialog::build('#dialogId') // Build and open the UI Dialog
        ->_modal(true)
            ->_width(670)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        $calendar->build()
    )
?>