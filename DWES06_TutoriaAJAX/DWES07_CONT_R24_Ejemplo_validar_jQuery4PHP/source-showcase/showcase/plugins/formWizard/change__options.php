<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_FORM_WIZARD); ?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsFormWizard::initWizard('demoForm', 'method="post" action="examples/response/ajaxResponse.php" class="bbq"') ?>
<div id="fieldWrapper" style="padding:5px">
    <?php echo YsFormWizard::initStep('first', 'First step - Name') ?>
    <label for="firstname">First name</label><br/>
    <input class="input_field_12em" name="firstname" id="firstname"/><br/>
    <label for="surname">Surname</label><br/>
    <input class="input_field_12em" name="surname" id="surname"/><br/>
    <?php echo YsFormWizard::endStep() ?>
    <?php echo YsFormWizard::initStep('finland', 'Step 2 - Personal information') ?>
    <label for="day_fi">Social Security Number</label><br/>
    <input name="day" id="day_fi" value="DD"/>
    <input name="month" id="month_fi" value="MM"/>
    <input name="year" id="year_fi" value="YYYY"/> -
    <input name="lastFour" id="lastFour_fi" value="XXXX"/><br/>
    <label for="countryPrefix_fi">Phone number</label><br/>
    <input name="countryPrefix" id="countryPrefix_fi" value="+358"/> -
    <input name="areaCode" id="areaCode_fi"/> -
    <input name="phoneNumber" id="phoneNumber_fi"/><br/>
    <label for="email">*Email</label><br/>
    <input class="input_field_12em email required" name="myemail" id="myemail"/><br/>
    <?php echo YsFormWizard::endStep() ?>
    <?php echo YsFormWizard::initStep('confirmation', 'Last step - Username') ?>
    <label for="username">User name</label><br/>
    <input name="username" id="username"/><br/>
    <label for="password">Password</label><br/>
    <input name="password" id="password" type="password"/><br/>
    <label for="retypePassword">Retype password</label><br/>
    <input name="retypePassword" id="retypePassword" type="password"/><br/>
    <?php echo YsFormWizard::endStep() ?>
</div>
<div id="demoNavigation" align="right" style="margin: 0 5px 5px 0">
    <br/>
    <input id="back" value="Back" type="reset"/>
    <input id="next" value="Next" type="submit"/>
    <input id="btnChangeOpt" value="Change Animation" type="button"/>
</div>
<?php echo YsFormWizard::endWizard() ?>
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
            )
    )
?>

<?php
echo
YsJQuery::newInstance()
    ->onClick()
    ->in('#btnChangeOpt')
    ->execute(
        YsFormWizard::changeOptions(array(
                'inAnimation' => array('height' => 'show'),
                'outAnimation' => array('height' => 'hide'),
                'inDuration' => 700,
                'outDuration' => 700,
                'easing' => 'easeOutBounce')
        )->in('#demoForm')
    )
?>

<?php
echo
YsFormWizard::build()->in('#demoForm')->execute()
?>

<?php
echo
YsUIButton::build()
    ->in('#demoNavigation > input')
    ->execute() ?>
    