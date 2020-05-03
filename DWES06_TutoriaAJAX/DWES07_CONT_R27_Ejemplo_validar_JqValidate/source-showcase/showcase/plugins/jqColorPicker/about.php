<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCOLORPICKER); ?>
<?php $plugin = new YsJQColorPicker() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQColorPicker::VERSION ?>
<br/><br/>
License: <?php echo YsJQColorPicker::LICENSE ?>
<br/><br/>
Home Page: <a href="http://www.eyecon.ro/colorpicker/">http://www.eyecon.ro/colorpicker/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        A simple component to select color in the same way you select color in Adobe
        Photoshop
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.colorpicker.min.js"></script>'); ?>
</pre>
<br/><br/>
<h2>Style sheets:</h2>
<pre>
<?php echo htmlentities('<link rel="stylesheet" type="text/css" href="jquery.colorpicker.css" />'); ?>
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

