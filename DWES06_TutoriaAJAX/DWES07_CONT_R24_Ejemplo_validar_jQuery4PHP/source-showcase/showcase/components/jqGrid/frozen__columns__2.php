<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the component
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQGRID);

/* The Grid */
$grid = new YsGrid('gridId', 'Title'); // <- id|name and caption

/* The columns */
$invGridField = new YsGridField('id', 'Id');
$invGridField->setFrozen(true);
$invGridField->setWidth(200);
$nameGridField = new YsGridField('name', 'Name');
$nameGridField->setFrozen(true);
$nameGridField->setWidth(200);
$dateGridField = new YsGridField('invDate', 'Date');
$accountGridField = new YsGridField('account', 'Account');
$balanceGridField = new YsGridField('balance', 'Balance');

$grid->addGridFields($invGridField, $nameGridField, $dateGridField, $accountGridField, $balanceGridField); // <- multiple

$records = new YsGridRecordList();
for ($i = 1; $i <= 10; $i++) {
    $record = new YsGridRecord();
    $record->setAttribute('id', '12345' . $i);
    $record->setAttribute('invDate', '2011-01-01');
    $record->setAttribute('name', 'Client ' . $i);
    $record->setAttribute('account', '12345678' . $i);
    $record->setAttribute('balance', '50' . $i);
    $records->append($record);
}
$grid->setRecordList($records);

/* jqGrid options */
$grid->setWidth(700);
$grid->setDataType(YsGridConstants::DATA_TYPE_LOCAL);
$grid->setHeight('auto');
$grid->setRowList(array());
$grid->setViewRecords(true);
$grid->setSortname('id');
$grid->setUseColSpanStyle(true);
$grid->setShrinktofit(false);

$grid->showLineNumbers();
$grid->setMaxPerPage(3);
$grid->setMaxPerPageList(3, 5, 10);


?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo $grid->renderTemplate(); ?>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_width('auto')
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        $grid->build()
    )
?>