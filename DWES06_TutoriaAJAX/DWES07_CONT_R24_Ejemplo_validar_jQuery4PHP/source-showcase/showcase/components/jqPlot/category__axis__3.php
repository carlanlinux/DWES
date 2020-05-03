<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQPLOT);

$plot1 = new YsPlot('plot1Id', 'Category X Axis');
$serie1 = new YsPlotSerie();

$serie1->addData('Uno', 4);
$serie1->addData('Dos', 25);
$serie1->addData('Tres', 13);
$serie1->addData('Cuatro', 22);
$serie1->addData('Cinco', 14);
$serie1->addData('Seis', 17);
$serie1->addData('Siete', 15);

$serie1->setLineWidth(4);

$marker = new YsPlotMarker();
$marker->setStyle(YsPlotMarker::$STYLE_CIRCLE);

$serie1->setMarkerOptions($marker);

$xaxis = new YsPlotAxis();
$xaxis->setRenderer(YsPlotRenderer::getCategoryAxisRenderer());

$serie1->setXaxis($xaxis);

$plot1->setSeries($serie1);

?>
<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<table width="90%">
    <tr>
        <td><?php echo $plot1->renderTemplate(); ?></td>
    </tr>
    <tr>
        <td>
            Plugins dependencies:<br/>
            - jqplot.categoryAxisRenderer.min.js<br/>
        </td>
    </tr>
</table>
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
            ->_height(500)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        $plot1->build()
    )
?>