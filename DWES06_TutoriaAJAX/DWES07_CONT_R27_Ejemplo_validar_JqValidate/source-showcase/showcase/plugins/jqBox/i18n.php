<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOX); ?>

<?php
//Loading assets when the document is ready
echo
YsJQueryAssets::loadScriptsOnReady(
    'jquery4php-assets/js/plugins/fancybox/i18n/jquery.fancybox-es.js',
    // callback: ENABLE THE BUTTON
    YsJQuery::removeAttr('disabled')->in('#btnOpenDialog')
);
?>


<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog" align="center"') ?>
<a rel="imagesGroup" class="fancybox-thumb" href="http://cloud.github.com/downloads/malsup/cycle/beach1.jpg">
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach1.jpg" width="100" height="100"/>
</a>
<a rel="imagesGroup" class="fancybox-thumb" href="http://cloud.github.com/downloads/malsup/cycle/beach2.jpg">
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach2.jpg" width="100" height="100"/>
</a>
<a rel="imagesGroup" class="fancybox-thumb" href="http://cloud.github.com/downloads/malsup/cycle/beach3.jpg">
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach3.jpg" width="100" height="100"/>
</a>
<a rel="imagesGroup" class="fancybox-thumb" href="http://cloud.github.com/downloads/malsup/cycle/beach4.jpg">
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach4.jpg" width="100" height="100"/>
</a>
<a rel="imagesGroup" class="fancybox-thumb" href="http://cloud.github.com/downloads/malsup/cycle/beach5.jpg">
    <img src="http://cloud.github.com/downloads/malsup/cycle/beach5.jpg" width="100" height="100"/>
</a>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnOpenDialog")
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_width(600)
            ->_modal(true)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsJQBox::build('a[rel=imagesGroup]')
            ->_helpers(array('buttons' => array()))
    );
?>