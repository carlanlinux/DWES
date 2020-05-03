<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<video controls="controls" id="video1" width="400" height="275">
    <source src="http://cdn.wijmo.com/movies/wijmo.theora.ogv" type='video/ogg; codecs="theora, vorbis"'>
    <source src="http://cdn.wijmo.com/movies/wijmo.mp4video.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
    HTML5 is required to see this video.
</video>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_draggable(false)
            ->_width(420)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIVideo::build('#video1')->_fullScreenButtonVisible(false)
    );
?>