<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugins
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQVALIDATE);
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFORM);
?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>

<form class="cmxform" id="commentForm" method="post" action="examples/response/commentResponse.php">
    <div id="response">
        <fieldset>
            <legend>Please provide your name, email address (wont be published) and a comment</legend>
            <p>
                <label for="cname">Name (required, at least 2 characters)</label>
                <input id="cname" name="name"/>
            <p>
                <label for="cemail">E-Mail (required)</label>
                <input id="cemail" name="email"/>
            </p>
            <p>
                <label for="curl">URL (optional)</label>
                <input id="curl" name="url" class="url" value=""/>
            </p>
            <p>
                <label for="ccomment">Your comment (required)</label>
                <textarea cols="2" rows="2" id="ccomment" name="comment">
      </textarea>
            </p>
            <p align="center">
                <input class="submit" type="submit" value="Submit"/>
            </p>
        </fieldset>
        <p id="numError">Errors: </p>
    </div>
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
        YsJQValidate::build()->in('#commentForm')
            ->_rules(
                array('name' => array('required' => true, 'minlength' => 2),
                    'email' => array('required' => true, 'email' => true),
                    'url' => array('url' => true),
                    'comment' => 'required')
            ),
        YsJQForm::clearForm()->in('#commentForm'),
        YsJQForm::ajaxForm()->in('#commentForm')->_target('#response')
    )
?>

<?php
echo
YsJQuery::bind('invalid-form.validate')
    ->in('#commentForm')
    ->handler(
        YsJQuery::html(
            YsArgument::likeVar('"Number of Errors:" +' . YsJQValidate::numberOfInvalids('#commentForm'))
        )->in('#numError')
    )
    ->execute()
?>