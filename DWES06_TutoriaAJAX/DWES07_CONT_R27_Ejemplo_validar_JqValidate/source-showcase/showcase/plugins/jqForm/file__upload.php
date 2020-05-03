<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFORM); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<form enctype="multipart/form-data" method="POST" action="examples/response/fileUploadResponse.php" id="uploadForm">
    <input type="hidden" value="400000" name="MAX_FILE_SIZE">
    <p>File: <input type="file" name="file"></p>
    <p align="center">
        <input type="submit" id="btnSubmit" class="ui-button" value="Submit"/>
        <input type="button" id="btnClear" class="ui-button" value="Clear"
               onclick="<?php echo YsJQForm::resetForm('#uploadForm') ?>"/>
    </p>
    <div id="response"></div>
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
            ->in('#uploadForm')
            ->_target('#response')
    )
?>