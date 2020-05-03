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

/* The Data (Local Type) */
$grid->addGridFields($invGridField, $nameGridField, $dateGridField, $accountGridField, $balanceGridField); // <- multiple


/* jqGrid options */
$grid->setWidth(700);
$grid->setUrl("examples/response/gridJSONResponse.php");
$grid->setDataType(YsGridConstants::DATA_TYPE_JSON);
$grid->setHeight('auto');
$grid->setRowNum(30);
$grid->setRowList(array(3, 5, 10));
$grid->setViewRecords(true);
$grid->setSortname('name');
$grid->setShrinktofit(false);

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
    );
?>