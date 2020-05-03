<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<input type="button" id="btnPopup" onclick="$('#popupId').wijpopup('show');" value="PopUp"/>
<?php echo YsUIDialog::endWidget() ?>

<?php echo YsUIPopUp::initWidget('popupId', 'style="display:none"') ?>
<?php echo YsUIPanel::initWidget() ?>
<table border="0">
    <tr>
        <td>User:</td>
        <td><input type="text"/></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input type="text"/></td>
    </tr>
</table>
<?php echo YsUIPanel::endWidget() ?>
<?php echo YsUIPopUp::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIButton::build('#btnPopup'),
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_draggable(false)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    );
echo
YsJQuery::newInstance()
    ->execute(
        YsUIPopUp::build('#popupId')
            ->_hideEffect(YsUIConstant::BLIND_EFFECT)
            ->_showEffect(YsUIConstant::BLIND_EFFECT)
            ->_autoHide(true)
            ->_position(array(
                'of' => new YsJQuery('#btnPopup'),
                'offset' => '0 4'
            ))
    );
?>