<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<ul id="menu">
    <li><a href="#">File</a>
        <ul>
            <li>
                <div>
                    <span class="ui-icon ui-icon-arrowthick-1-w wijmo-wijmenu-icon-left"></span><a href="#"
                                                                                                   class="wijmo-wijmenu-text">New</a><span
                            class="wijmo-wijmenu-icon-right">Ctrl+N</span>
                </div>
            </li>
            <li>
                <div>
                    <a href="#" class="wijmo-wijmenu-text">Open</a><span class="wijmo-wijmenu-icon-right">Ctrl+O</span>
                </div>
            </li>
            <li>
                <div>
                    <a href="#" class="wijmo-wijmenu-text">Save</a><span class="wijmo-wijmenu-icon-right">Ctrl+S</span>
                </div>
            </li>
            <li><a href="#">Edit</a>
                <ul>
                    <li>
                        <div>
                            <a href="#" class="wijmo-wijmenu-text">Undo</a><span
                                    class="wijmo-wijmenu-icon-right">Ctrl+Z</span>
                        </div>
                    </li>
                    <li></li>
                    <li>
                        <div>
                            <a href="#" class="wijmo-wijmenu-text">Cut</a><span
                                    class="wijmo-wijmenu-icon-right">Ctrl+X</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <a href="#" class="wijmo-wijmenu-text">Copy</a><span
                                    class="wijmo-wijmenu-icon-right">Ctrl+C</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <a href="#" class="wijmo-wijmenu-text">Paste</a><span class="wijmo-wijmenu-icon-right">Ctrl+V</span>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </li>

</ul>

<?php echo YsUIDialog::endWidget() ?>


<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnOpenDialog')
    ->execute(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            ),
        YsUIDialog::maximize('#dialogId')
    );

echo YsUIMenu::build('#menu')->execute();
?>