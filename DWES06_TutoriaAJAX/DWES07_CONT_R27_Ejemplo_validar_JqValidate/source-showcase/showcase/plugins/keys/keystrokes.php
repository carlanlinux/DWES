<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_KEYS); ?>

<span><b>Run the Konami code:</b> To open the dialog.</span>
<h1><b> ↑ ↑ ↓ ↓ ← → ← → b a</b></h1>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<p align="justify">
    The Konami Code, known in Japan as the Konami Command (コナミコマンド Konami Komando?),
    is a cheat code that appears in many Konami video games,[1] although the code
    also appears in some non-Konami games.[2] The code was first used in the 1986
    release of Gradius for the Nintendo Entertainment System[3] but was popularized
    among North American players in the NES version of Contra, for which it was also
    dubbed both the "Contra Code" and "30 Lives Code".
</p>
<?php echo YsUIDialog::endWidget() ?>

<?php
echo
YsKeys::keystrokes()
    ->_keys('arrow up',
        'arrow up',
        'arrow down',
        'arrow down',
        'arrow left',
        'arrow right',
        'arrow left',
        'arrow right',
        'b', 'a')
    ->_handler(
        YsUIDialog::build('#dialogId')
            ->_modal(true)
            ->_title("Title")
            ->_width(300)
            ->_height('auto')
            ->_buttons(array(
                    'Ok' => new YsJsFunction('alert("Hello world")'),
                    'Close' => new YsJsFunction(YsUIDialog::close('this')))
            )
    )->execute()
?>