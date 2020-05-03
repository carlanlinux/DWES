<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQEDITOR);

$editor = new YsEditor('editorId');

$panel = new YsEditorPanel('myPanel');
$panel2 = new YsEditorPanel('myPanel2');
$panel3 = new YsEditorPanel('myPanel3');

$panel->addButtons(YsEditorButton::$ABOUT);
$panel2->addButtons(YsEditorButton::$CSS, YsEditorButton::$TABLE);
$panel3->addButtons(YsEditorButton::$COPY, YsEditorButton::$PASTE);

$toolbar = new YsEditorToolbar('myToolbarName');
$toolbar->addPanels($panel, $panel2, $panel3);

$editor->setToolbar($toolbar);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $editor->initWidget() ?>
<table>
    <tr>
        <td style="background-color: red">
            Hello World
        </td>
    </tr>
</table>
<?php echo $editor->endWidget() ?>
<?php echo YsUIDialog::endWidget() ?>

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
            ),
        $editor->build()
    )
?>