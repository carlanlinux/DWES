<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_RELATED_SELECTS); ?>

<button id="btnOpenDialog">Show Demo</button>
<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<form id="example-1">
    <table>
        <tr>
            <td><label for="optLeagues">Leagues:</label></td>
            <td>
                <select name="optLeagues">
                    <option value="">Choose a league</option>
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
                    <option value="">Choose an option</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="optPlayers">Players:</label></td>
            <td>
                <select name="optPlayers">
                    <option value="">Choose an option</option>
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
            ->_loadingMessage('Please wait')
            ->_onChangeLoad('examples/response/relatedSelectResponse.php')
    )
?>