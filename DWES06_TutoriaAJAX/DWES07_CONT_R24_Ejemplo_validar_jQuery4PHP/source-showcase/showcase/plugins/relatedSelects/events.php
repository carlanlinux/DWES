<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_RELATED_SELECTS); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<form id="example-1">
    <div id="lblLoading"></div>
    <table>
        <tr>
            <td><label for="optLeagues">Leagues:</label></td>
            <td>
                <select name="optLeagues">
                    <option value="es">Liga Española de fútbol</option>
                    <option value="de">Bundesliga</option>
                    <option value="ve">Liga Venezolana de fútbol</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="optTeams">Teams:</label></td>
            <td>
                <select name="optTeams" id="optTeams">
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="optPlayers">Players:</label></td>
            <td>
                <select id="optPlayers" name="optPlayers">
                </select>
            </td>
        </tr>
    </table>
</form>
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
        YsRelatedSelects::relate()->in('#example-1')
            ->_selects(array('optLeagues', 'optTeams', 'optPlayers'))
            ->_dataType('html')
            ->_defaultOptionText('Choose an Option')
            ->_onChange(new YsJsFunction(
                YsJQuery::html(
                    YsJQuery::html()->in('#optPlayers option:selected')
                )->in('#lblLoading')
            ))
            ->_onLoadingStart(new YsJsFunction(
                YsJQuery::html('Searching...')->in('#lblLoading')
            ))
            ->_onLoadingEnd(new YsJsFunction(
                YsJQuery::html('Success!')->in('#lblLoading')
            ))
            ->_onChangeLoad('examples/response/relatedSelectResponse.php')
    )
?>