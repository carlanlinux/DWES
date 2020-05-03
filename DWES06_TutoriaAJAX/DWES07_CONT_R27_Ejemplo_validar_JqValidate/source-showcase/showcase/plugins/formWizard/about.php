<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_FORM_WIZARD); ?>
<?php $plugin = new YsFormWizard() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsFormWizard::VERSION ?>
<br/><br/>
License: <?php echo YsFormWizard::LICENSE ?>
<br/><br/>
Home Page: <a href="http://thecodemine.org/">http://thecodemine.org/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        The form wizard plugin is a jQuery plugin which can be used to create wizard like
        page flows for forms without having to reload the page in between wizard steps.
        <br/>
        The plugin is unobtrusive and gives the developer great freedom on how they set
        up the flow of the different steps in their wizards, as the plugin supports
        creating specific routes in the form; depending on the user input.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
Optional:
<br/>
<h6>
    <a class="children">jquery.bbq.js</a><br/>
    <a class="children">jquery.validate.js</a><br/>
    <a class="children">jquery.form.js</a>
</h6>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.form.wizard.js"></script>'); ?>
</pre>
<br/><br/>

<h2>Style sheets:</h2>
<pre>
</pre>

<br/><br/>
<h2>Class name:</h2> <h2><u><?php echo $className ?></u></h2>
<br/><br/>
<h2>Parent class:</h2> <h2><u><?php echo get_parent_class($plugin) ?></u></h2>
<br/><br/>
<h2>Available Options / Events:</h2>
<br/>
<?php foreach ($plugin->registerOptions() as $option): ?>

    <h6><a class="children"><?php echo $option['key'] ?></a></h6>

<?php endforeach; ?>
<br/><br/>
<h2>Available Methods:</h2>
<br/>
<?php foreach (get_class_methods($plugin) as $method): ?>
    <?php if ($method == '__call') break ?>
    <h6><a class="children"><?php echo sprintf("%s::%s()", $className, $method) ?></a></h6>
<?php endforeach; ?>
<br/><br/>
<h2>PHPDocs:</h2> Comming soon

