<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQRING);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<div style="margin-top:100px">
    <ul id="ringId" style="list-style: none">
        <li><img width="120" height="170"
                 src="http://upload.wikimedia.org/wikipedia/en/0/0c/The_Fellowship_Of_The_Ring.jpg" alt=""/>
        <li>
        <li><img width="120" height="170" src="http://upload.wikimedia.org/wikipedia/en/0/0d/EsdlaIII.jpg" alt=""/>
        <li>
        <li><img width="120" height="170" src="http://upload.wikimedia.org/wikipedia/en/2/2a/LOTRTTTmovie.jpg" alt=""/>
        <li>
    </ul>
</div>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_width(750)
            ->_height(350)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsJQRing::build()->in('#ringId')
    );

?>