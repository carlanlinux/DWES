<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQVALIDATE);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>

<form class="cmxform" id="commentForm" method="get" action="">
    <fieldset>
        <legend>Please provide your name, email address (wont be published) and a comment</legend>
        <p>
            <label for="cname">Name (required, at least 2 characters)</label>
            <input id="cname" name="name" class="required" minlength="2"/>
        <p>
            <label for="cemail">E-Mail (required)</label>
            <input id="cemail" name="email" class="required email"/>
        </p>
        <p>
            <label for="curl">URL (optional)</label>
            <input id="curl" name="url" class="url" value=""/>
        </p>
        <p>
            <label for="ccomment">Your comment (required)</label>
            <textarea cols="2" rows="2" id="ccomment" name="comment" class="required"></textarea>
        </p>
        <p>
            <input class="submit" type="submit" value="Submit"/>
        </p>
    </fieldset>
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
        YsJQValidate::validate('#commentForm')
            ->setUITheme()
    )
?>