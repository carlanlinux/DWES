<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQRING);
$imgs = array(
    'http://upload.wikimedia.org/wikipedia/en/0/0c/The_Fellowship_Of_The_Ring.jpg',
    'http://upload.wikimedia.org/wikipedia/en/2/2a/LOTRTTTmovie.jpg',
    'http://upload.wikimedia.org/wikipedia/en/0/0d/EsdlaIII.jpg',
);

$titles = array(
    'The Fellowship of the Ring (2001)',
    'The Two Towers (2002)',
    'Return of the King (2003)',
)
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<br/><br/><br/><br/><br/><br/>
<div style="margin: 100px 50px 50px 50px">
    <ul id="ringId" style="list-style: none">
        <?php foreach ($imgs as $i => $img): ?>
            <li>
                <?php echo YsUIPanel::initWidget('panelId' . $i, 'style="cursor:pointer;height:260px;width:160px;" align="center"') ?>
                <?php echo YsUIPanel::title('Film ' . ($i + 1), YsUIConstant::ICON_VIDEO) ?>
                <?php echo YsUIPanel::initContent() ?>
                <img width="120" height="170" style="margin-top:10px" src="<?php echo $img ?>" alt=""/>
                <?php echo YsUIPanel::endContent() ?>
                <?php echo YsUIPanel::initFooter() ?>
                <?php echo $titles[$i] ?>
                <?php echo YsUIPanel::endFooter() ?>
                <?php echo YsUIPanel::endWidget() ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::open('#dialogId')
    );

echo
YsUIDialog::build('#dialogId')
    ->_modal(true)
    ->_width(750)
    ->_height(450)
    ->_buttons(array(
        'Ok' => new YsJsFunction('alert("Hello world")'),
        'Close' => new YsJsFunction(YsUIDialog::close('this'))))
    ->executeOnReady();

echo YsJQRing::shapeWaterWheel('#ringId')->executeOnReady();
?>