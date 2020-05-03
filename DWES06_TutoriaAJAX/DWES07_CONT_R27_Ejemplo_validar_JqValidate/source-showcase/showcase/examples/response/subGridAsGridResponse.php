<?php error_reporting(E_ALL) ?>
<?php ini_set('display_errors', 1) ?>
<?php
include_once dirname(__FILE__) . '/../../../lib/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php';
YsJQueryAutoloader::register();

YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQGRID);

$rowId = isset($_POST['rowid']) ? $_POST['rowid'] : 1;

$grid = new YsGrid('subGridId' . $rowId);

$idGridField = new YsGridField('id', 'Id');
$clientGridField = new YsGridField('client', 'Client');
$dayGridField = new YsGridField('day', 'Day');
$balanceGridField = new YsGridField('balance', 'Balance');

$grid->addGridFields($idGridField, $clientGridField, $dayGridField, $balanceGridField);

$recordList = new YsGridRecordList();
$day = date('Y-m-d');
for ($i = 1; $i <= 10; $i++) {
    $record = new YsGridRecord();
    $record->setAttribute('id', $rowId);
    $record->setAttribute('client', 'Client #' . $rowId);
    $record->setAttribute('day', $day);
    $record->setAttribute('balance', rand(1, 1000));

    $grid->addRecord($record);
}

$grid->setWidth("500");
$grid->setDataType('local');
$grid->setMultiselect(true);
$grid->setCaption("Internal Grid for the Client #" . $rowId);
echo $grid->draw();

?>