<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQFULL_CALENDAR);

// 1st Calendar
$calendar = new YsFullCalendar('myCalendarId');
$calendar->setEditable(true);

// 2nd Calendar
$calendar2 = new YsFullCalendar('myCalendar2Id');
$calendar2->setEditable(true);

//events
$event = new YsCalendarEvent('eventId', 'Event 1');
$event->setStart(new DateTime());
$event->setEnd(new DateTime('+1 day'));
$event->setAllDay(false);
$event->setColor('red');

$event2 = clone $event;

$calendar->addEvent($event);
$calendar2->addEvent($event2);

$event = new YsCalendarEvent(123456, 'Event 2');
$event->setStart(new DateTime('now'));
$event->setEnd(new DateTime('+2 hour'));
$event->setAllDay(false);
$event->setColor('green');

$event2 = clone $event;

$calendar->addEvent($event);
$calendar2->addEvent($event2);

?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsUITabs::initWidget('tabsId') ?>

<?php echo YsUITabs::initHeader() ?>
<?php echo YsUITabs::tab('Calendar 1', '#tabs-1') ?>
<?php echo YsUITabs::tab('Calendar 2', '#tabs-2', $closeable = true, 'title="My Title"') ?>
<?php echo YsUITabs::endHeader() ?>

<?php echo YsUITabs::initTabContent('tabs-1') ?>
<?php echo $calendar->draw(); ?>
<?php echo YsUITabs::endTabContent() ?>

<?php echo YsUITabs::initTabContent('tabs-2') ?>
<?php echo $calendar2->draw(); ?>
<?php echo YsUITabs::endTabContent() ?>

<?php echo YsUITabs::endWidget() ?>
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
        YsUITabs::build('#tabsId')
    )
?>