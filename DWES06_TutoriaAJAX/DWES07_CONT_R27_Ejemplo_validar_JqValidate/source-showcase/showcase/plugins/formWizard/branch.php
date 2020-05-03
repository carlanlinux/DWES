<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_FORM_WIZARD); ?>

<button id="btnOpenDialog">Show Demo</button>

<?php echo YsUIDialog::initWidget('dialogId', 'style="display:none" title="Basic dialog"') ?>
<?php echo YsFormWizard::initWizard('demoForm', 'method="post" action="examples/response/ajaxResponse.php" class="bbq"') ?>
<div id="fieldWrapper" style="padding:5px">
    <?php echo YsFormWizard::initStep('first', 'Common first step - Name and Country') ?>
    <label for="firstname">First name</label><br/>
    <input class="input_field_12em" name="firstname" id="firstname"><br/>
    <label for="surname">Surname</label><br/>
    <input class="input_field_12em" name="surname" id="surname"><br/>
    <label for="country">Country</label><br/>
    <select class="input_field_12em link required" name="country" id="country">
        <option value=""></option>
        <option value="sweden">Sweden</option>
        <option value="finland">Finland</option>
    </select><br/>
    <?php echo YsFormWizard::endStep() ?>
    <?php echo YsFormWizard::initSubmitStep('sweden', 'Swedish last step - Information') ?>
    <label for="day_se">Social Security Number</label><br/>
    <input class="input_field_25em" name="day" id="day_se" value="DD">
    <input class="input_field_25em" name="month" id="month_se" value="MM">
    <input class="input_field_3em" name="year" id="year_se" value="YYYY"> -
    <input class="input_field_3em" name="lastFour" id="lastFour_se" value="XXXX"><br/>
    <label for="countryPrefix_se">Phone number</label><br/>
    <input class="input_field_35em" name="countryPrefix" id="countryPrefix_se" value="+358"> -
    <input class="input_field_3em" name="areaCode" id="areaCode_se"> -
    <input class="input_field_12em" name="phoneNumber" id="phoneNumber_se"><br/>
    <label for="email_se">*Email</label><br/>
    <input class="input_field_12em required email" name="email" id="email_se"><br/>
    <label for="username_se">User name</label><br/>
    <input class="input_field_12em" name="username" id="username_se"><br/>
    <label for="password_se">Password</label><br/>
    <input class="input_field_12em" name="password" id="password_se" type="password"><br/>
    <label for="retypePassword_se">Retype password</label><br/>
    <input class="input_field_12em" name="retypePassword" id="retypePassword_se" type="password"><br/>
    <?php echo YsFormWizard::endStep() ?>
    <?php echo YsFormWizard::initStep('finland', 'Finnish Step 2 - Personal information') ?>
    <label for="day_se">Social Security Number</label><br/>
    <input class="input_field_25em" name="day" id="day_se" value="DD">
    <input class="input_field_25em" name="month" id="month_se" value="MM">
    <input class="input_field_3em" name="year" id="year_se" value="YYYY"> -
    <input class="input_field_3em" name="lastFour" id="lastFour_se" value="XXXX"><br/>
    <label for="countryPrefix_se">Phone number</label><br/>
    <input class="input_field_35em" name="countryPrefix" id="countryPrefix_se" value="+358"> -
    <input class="input_field_3em" name="areaCode" id="areaCode_se"> -
    <input class="input_field_12em" name="phoneNumber" id="phoneNumber_se"><br/>
    <label for="email_se">*Email</label><br/>
    <input class="input_field_12em required email" name="email" id="email_se"><br/>
    <label for="username_se">User name</label><br/>
    <input class="input_field_12em" name="username" id="username_se"><br/>
    <label for="password_se">Password</label><br/>
    <input class="input_field_12em" name="password" id="password_se" type="password"><br/>
    <label for="retypePassword_se">Retype password</label><br/>
    <input class="input_field_12em" name="retypePassword" id="retypePassword_se" type="password"><br/>
    <?php echo YsFormWizard::endStep() ?>
    <?php echo YsFormWizard::initStep('confirmation', 'Finnish last step - Username') ?>
    <label for="username">User name</label><br/>
    <input class="input_field_12em" name="username" id="username"><br/>
    <label for="password">Password</label><br/>
    <input class="input_field_12em" name="password" id="password" type="password"><br/>
    <label for="retypePassword">Retype password</label><br/>
    <input class="input_field_12em" name="retypePassword" id="retypePassword" type="password"><br/>
    <?php echo YsFormWizard::endStep() ?>
</div>
<div id="demoNavigation" align="right" style="margin: 0 5px 5px 0">
    <br/>
    <input id="back" value="Back" type="reset"/>
    <input id="next" value="Next" type="submit"/>
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
YsFormWizard::build()->in('#demoForm')
    ->_formPluginEnabled(true)
    ->_validationEnabled(true)
    ->_focusFirstInput(true)
    ->_formOptions(array(
        'success' => new YsJsFunction('alert("Success")'),
        'beforeSubmit' => new YsJsFunction('alert("Before submit")'),
        'dataType' => 'json',
        'resetForm' => true
    ))
    ->execute() ?>

<?php echo YsUIButton::build()->in('#demoNavigation > input')->execute() ?>
    