<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<button id="btnShowDemo">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsUIDateTimepicker::input('datepickerId') ?>
<input type="button" value="Set time" id="btnSet"/>
<input type="button" value="Get time" id="btnGet"/>

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
        YsUIDateTimepicker::datetimepicker('#datepickerId')->_ampm(true)
    )
?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnGet')
    ->execute(
        sprintf('alert(%s)', YsUIDateTimepicker::getDatetime('#datepickerId'))
    )
?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnSet')
    ->execute(
        YsUIDateTimepicker::setDatetime('#datepickerId', 'new Date()')
    )
?>