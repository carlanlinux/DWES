<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFORM); ?>
<?php $plugin = new YsJQForm() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQForm::VERSION ?>
<br/><br/>
License: <?php echo YsJQForm::LICENSE ?>
<br/><br/>
Home Page: <a href="http://jquery.malsup.com/form/">http://jquery.malsup.com/form/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        The jQuery Form Plugin allows you to easily and unobtrusively upgrade HTML
        forms to use AJAX. The main methods, ajaxForm and ajaxSubmit, gather information
        from the form element to determine how to manage the submit process. Both of
        these methods support numerous options which allows you to have full control
        over how the data is submitted. Submitting a form with AJAX doesn't get any
        easier than this!
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.form.js"></script>'); ?>
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

