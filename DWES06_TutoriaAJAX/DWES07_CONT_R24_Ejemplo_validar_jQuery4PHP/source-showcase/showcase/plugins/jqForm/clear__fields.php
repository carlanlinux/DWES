<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFORM); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<div id="response">Try: admin | admin</div>
<form action="examples/response/loginResponse.php" method="post" name="frmName" id="myFormId">
    <p>User: <input type="text" value="User" id="txtUser" name="user"></p>
    <p>Pass: <input type="password" value="Pass" id="txtPass" name="pass"></p>
    <p align="center">
        <input type="button" class="ui-button" value="Clear"
               onclick="<?php echo YsJQForm::clearFields('#myFormId #txtPass') ?>"/>
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