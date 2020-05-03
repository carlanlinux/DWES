<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php

YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQGRID);

$grid = new YsGrid('gridId', 'Title');

$idGridField = new YsGridField('id', 'Id');
$clientGridField = new YsGridField('client', 'Client');
$clientGridField->setEditable(true);
$accountGridField = new YsGridField('account', 'Account');
$accountGridField->setEditable(true);
$balanceGridField = new YsGridField('balance', 'Balance');
$balanceGridField->setEditable(true);

$grid->addGridFields($idGridField, $clientGridField, $accountGridField, $balanceGridField);

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

$navigator = new YsGridNavigator();
$navigator->noDefaultButtons();
$searchForm = new YsGridForm();
$searchForm->setMultipleSearch(true);
$searchForm->setMultipleGroup(true);
$searchForm->setShowQuery(true);
$searchForm->setTemplateNames(array("Template One", "Template Two"));
$searchForm->setTemplateFilters(array(
    array('groupOp' => 'AND',
        'rules' => array(
            array("field" => "client", "op" => "bw", "data" => "Client #1"),
            array("field" => "id", "op" => "eq", "data" => "1")
        )),
    array('groupOp' => 'AND',
        'rules' => array(
            array("field" => "client", "op" => "bw", "data" => "Client #10"),
            array("field" => "id", "op" => "eq", "data" => "10")
        )),
));
$navigator->setSearchForm($searchForm);


$grid->setNavigator($navigator);

?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $grid->renderTemplate() ?>
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
            ->_zIndex(100)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    )
?>

<?php echo $grid->execute() ?>