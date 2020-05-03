<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCALCULATOR); ?>
<?php $plugin = new YsJQCalculator() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQCalculator::VERSION ?>
<br/><br/>
License: <?php echo YsJQCalculator::LICENSE ?>
<br/><br/>
Home Page: <a href="http://keith-wood.name/calculator.html">http://keith-wood.name/calculator.html</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        A jQuery plugin that attaches a popup calculator to an input field.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
Optional:
<h6>
    <a class="children">jQuery UI (if you want the calculator with themeroller styles)</a><br/>
</h6>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.calculator.js"></script>'); ?>
</pre>
<br/><br/>

<h2>Style sheets:</h2>
<pre>
<?php echo htmlentities('<link rel="stylesheet" type="text/css" href="jquery.calculator.css" />'); ?>
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

