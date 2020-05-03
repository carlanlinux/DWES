<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQFULL_CALENDAR);

$calendar = new YsFullCalendar('myCalendarId');

$event = new YsCalendarEvent('eventId', 'My Event Title');
$event->setStart(new DateTime());
$event->setEnd(new DateTime('+1 day'));
$event->setAllDay(false);
$event->setColor('red');
$calendar->addEvent($event);

$event = new YsCalendarEvent(123456, 'Event 2');
$event->setStart(new DateTime());
$event->setEnd(new DateTime('+2 hour'));
$event->setAllDay(false);
$event->setColor('green');

$calendar->addEvent($event);


?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $calendar->renderTemplate(); ?>
<br/><br/>Actions:<br/>
<input onclick="<?php echo $calendar->gotoPrev() ?>" type="button" value="Prev"/>
<input onclick="<?php echo $calendar->gotoNext() ?>" type="button" value="Next"/>
<input onclick="<?php echo $calendar->changeToDayView() ?>" type="button" value="Day"/>
<input onclick="<?php echo $calendar->changeToAgendaDayView() ?>" type="button" value="Agenda Day"/>
<input onclick="<?php echo $calendar->changeToWeekView() ?>" type="button" value="Week"/>
<input onclick="<?php echo $calendar->changeToAgendaWeekView() ?>" type="button" value="Agenda Week"/>
<input onclick="<?php echo $calendar->changeToMonthView() ?>" type="button" value="Month"/>
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