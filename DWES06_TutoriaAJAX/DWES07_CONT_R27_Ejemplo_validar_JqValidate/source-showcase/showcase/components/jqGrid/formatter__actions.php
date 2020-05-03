<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php

YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQGRID);

$grid = new YsGrid('gridId', 'Title');

$actionsGridField = new YsGridField('  ', 'Actions');
$actionsGridField->setWidth(80);
$gridFormatter = new YsGridFormatter();

$gridFormatter->setType(YsGridConstants::FORMATTER_ACTIONS);
$gridFormatter->setKeys(true);
$actionsGridField->setGridFormatter($gridFormatter);

$idGridField = new YsGridField('id', 'Id');

$clientGridField = new YsGridField('client', 'Client');
$clientGridField->setEditable(true);

$accountGridField = new YsGridField('account', 'Account');
$accountGridField->setEditable(true);

$balanceGridField = new YsGridField('balance', 'Balance');

$grid->addGridFields($actionsGridField, $idGridField, $clientGridField, $accountGridField, $balanceGridField);

$recordList = new YsGridRecordList();

for ($i = 1; $i <= 10; $i++) {
    $record = new YsGridRecord();
    $record->setAttribute('id', $i);
    $record->setAttribute('client', 'Client #' . $i);
    $record->setAttribute('account', time() + rand(1, 100000000));
    $record->setAttribute('balance', rand(1, 1000));
    $recordList->append($record);
}

$grid->setRecordList($recordList);

$grid->setWidth("100%");
$grid->setDataType(YsGridConstants::DATA_TYPE_LOCAL);
$grid->setRowNum($i - 1);
$grid->setRowList(array(3, 5, 10));
$grid->setViewRecords(true);
$grid->setSortname('client');


?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $grid->draw() ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_width(720)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    )
?>