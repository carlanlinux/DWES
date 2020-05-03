<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFORM); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<div id="response">Try: admin | admin</div>
<form action="examples/response/loginResponse.php" method="post" name="frmName" id="myFormId">
    <p>User: <input type="text" value="User" name="user"></p>
    <p>Pass: <input type="password" value="" name="pass"></p>
    <p align="center">
        <input type="submit" id="btnSubmit" class="ui-button" value="Submit"/>
        <input type="reset" id="btnReset" class="ui-button" value="Reset"
               onclick="<?php echo YsJQForm::resetForm('#myFormId') ?>"/>
        <input type="button" id="btnClear" class="ui-button" value="Clear"
               onclick="<?php echo YsJQForm::clearForm('#myFormId') ?>"/>
        <input type="button" id="test" onclick="if(confirm('Pregunta')){$('#myFormId').submit()}"/>
    </p>
</form>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnOpenDialog")
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_width(300)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIButton::build('.ui-button')
    )
?>

<?php
echo
YsJQuery::newInstance()
    ->execute(
        YsJQForm::ajaxForm()
            ->in('#myFormId')
            ->_target('#response')
            ->_success(
                new YsJsFunction(YsUIDialog::close('#dialogId')
                    ->condition('jQuery("#response").text() == "Authenticated"')
                    ->setTimeout(1000)
                )
            )
    )
?>