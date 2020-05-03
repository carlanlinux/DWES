<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsUIButton::buttonTag('uiBtn', 'Menu') ?>
<ul id="menu">
    <li><a><span class="ui-icon ui-icon-arrowthick-1-w wijmo-wijmenu-icon-left"></span><span class="wijmo-wijmenu-text">
      Menu1</span></a></li>
    <li><a><span class="ui-icon ui-icon-arrowrefresh-1-s wijmo-wijmenu-icon-left"></span><span
                    class="wijmo-wijmenu-text">
      Menu2</span></a>
        <ul>
            <li><a>submenu1</a></li>
            <li><a>submenu2</a>
                <ul>
                    <li><a>submenu21</a></li>
                    <li><a>submenu22</a></li>
                    <li><a>submenu23</a></li>
                    <li><a>submenu24</a></li>
                    <li><a>submenu25</a></li>
                </ul>
            </li>
            <li><a>submenu3</a></li>
            <li><a>submenu4</a>
                <ul>
                    <li><a>submenu41</a></li>
                    <li><a>submenu42</a></li>
                    <li><a>submenu43</a></li>
                    <li><a>submenu44</a></li>
                    <li><a>submenu45</a></li>
                    <li><a>submenu46</a></li>
                    <li><a>submenu47</a></li>
                    <li><a>submenu48</a></li>
                </ul>
            </li>
            <li><a>submenu5</a></li>
            <li><a>submenu6</a></li>
            <li><a>submenu7</a></li>
            <li><a>submenu8</a></li>
        </ul>
    </li>
    <li><a><span class="ui-icon ui-icon-comment wijmo-wijmenu-icon-left"></span><span
                    class="wijmo-wijmenu-text">Menu3</span></a></li>
    <li><a><span class="ui-icon ui-icon-person wijmo-wijmenu-icon-left"></span><span
                    class="wijmo-wijmenu-text">Menu4</span></a></li>
    <li><a><span class="ui-icon ui-icon-trash wijmo-wijmenu-icon-left"></span><span
                    class="wijmo-wijmenu-text">Menu5</span></a></li>
    <li><a><span class="ui-icon ui-icon-bookmark wijmo-wijmenu-icon-left"></span><span
                    class="wijmo-wijmenu-text">Menu6</span></a>
        <ul>
            <li><a>submenu61</a></li>
            <li><a>submenu62</a></li>
            <li><a>submenu63</a></li>
            <li><a>submenu64</a></li>
            <li><a>submenu65</a></li>
            <li><a>submenu66</a></li>
            <li><a>submenu67</a></li>
            <li><a>submenu68</a></li>
            <li><a>submenu69</a></li>
        </ul>
    </li>
    <li><a><span class="ui-icon ui-icon-clock wijmo-wijmenu-icon-left"></span><span
                    class="wijmo-wijmenu-text">Menu7</span></a></li>
    <li><a><span class="ui-icon ui-icon-minusthick wijmo-wijmenu-icon-left"></span><span class="wijmo-wijmenu-text">Menu8</span></a>
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

echo YsUIMenu::contextmenu('#menu', '#uiBtn')->execute();
echo YsUIButton::build('#uiBtn')
    ->_icons(array('secondary' => YsUIConstant::ICON_TRIANGLE_1_S))
    ->execute();
?>