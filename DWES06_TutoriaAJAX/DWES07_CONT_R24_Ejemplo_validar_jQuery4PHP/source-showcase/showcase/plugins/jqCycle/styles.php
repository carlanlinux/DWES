<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<style type="text/css">
    .pics {
        height: 232px;
        margin: 0;
        overflow: hidden;
        padding: 0;
        width: 232px;
    }

    .pics img {
        background-color: #EEEEEE;
        border: 1px solid #CCCCCC;
        height: 200px;
        left: 0;
        padding: 15px;
        top: 0;
        width: 200px;
    }

    .pics img {
        border-radius: 10px 10px 10px 10px;
    }
</style>

<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCYCLE); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog" align="center"') ?>
<?php echo YsJQCycle::initWidget('slideshow', 'class="pics"') ?>
<img src="http://cloud.github.com/downloads/malsup/cycle/beach1.jpg" width="200" height="200"/>
<img src="http://cloud.github.com/downloads/malsup/cycle/beach2.jpg" width="200" height="200"/>
<img src="http://cloud.github.com/downloads/malsup/cycle/beach3.jpg" width="200" height="200"/>
<img src="http://cloud.github.com/downloads/malsup/cycle/beach4.jpg" width="200" height="200"/>
<img src="http://cloud.github.com/downloads/malsup/cycle/beach5.jpg" width="200" height="200"/>
<?php echo YsJQCycle::endWidget() ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#btnOpenDialog")
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_width(300)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    );
echo
YsJQCycle::build()->in('#slideshow')->executeOnReady();
?>