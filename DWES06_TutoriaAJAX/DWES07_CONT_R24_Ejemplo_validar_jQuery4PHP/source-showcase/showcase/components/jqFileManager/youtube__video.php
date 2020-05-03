<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<button id="btnOpenDialog">See the Video</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<object style="height: 390px; width: 640px">
    <param name="movie" value="http://www.youtube.com/v/spH5nJXSZJY?version=3">
    <param name="allowFullScreen" value="true">
    <param name="allowScriptAccess" value="always">
    <embed src="http://www.youtube.com/v/spH5nJXSZJY?version=3" type="application/x-shockwave-flash"
           allowfullscreen="true" allowScriptAccess="always" width="640" height="360">
</object>
<?php echo YsUIDialog::endWidget() ?>
<p>
    Sorry, this example is disabled for security. Download the latest showcase or click in <b>See the Video</b>.
</p>

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
            )
    )
?>