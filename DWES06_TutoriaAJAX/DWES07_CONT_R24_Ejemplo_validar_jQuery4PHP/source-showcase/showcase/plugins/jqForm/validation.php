<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFORM); ?>

<script type="text/javascript" language="javascript">

    function validate(formData, jqForm, options) {
        var form = jqForm[0];
        if (!form.user.value || !form.pass.value) {
            alert('Please enter a value for both Username and Password');
            return false;
        }
        alert('Both fields contain values.');
    }

</script>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<div id="response">Try: admin | admin</div>
<form action="examples/response/loginResponse.php" method="post" name="frmName" id="myFormId">
    <p>User: <input type="text" value="User" name="user"></p>
    <p>Pass: <input type="password" value="" name="pass"></p>
    <p align="center">
        <input type="submit" id="btnSubmit" class="ui-button" value="Submit"/>
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
            ->_beforeSubmit(YsJsSintax::callFunction('validate'))
    )
?>