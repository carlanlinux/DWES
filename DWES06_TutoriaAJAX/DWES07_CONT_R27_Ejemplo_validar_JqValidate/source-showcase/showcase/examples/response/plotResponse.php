<?php error_reporting(E_ALL) ?>
<?php ini_set('display_errors', 1) ?>
<?php
include_once dirname(__FILE__) . '/../../../lib/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php';
YsJQueryAutoloader::register();

YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQPLOT);
$rowId = isset($_POST['rowid']) ? $_POST['rowid'] : 1;
$plot = new YsPlot('plotId' . $rowId, 'Data Via AJAX | Row ' . $rowId);

$serie = new YsPlotSerie();
for ($i = 0; $i <= 5; $i++) {
    $serie->addData(rand(1, 10));
}

$plot->addSerie($serie);

?>

<table width="100%">
    <tr>
        <td><?php echo $plot->draw(); ?></td>
    </tr>
</table>