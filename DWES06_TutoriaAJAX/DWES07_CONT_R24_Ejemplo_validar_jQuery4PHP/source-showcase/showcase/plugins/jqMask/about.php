<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQMASK); ?>
<?php $plugin = new YsJQMask() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQMask::VERSION ?>
<br/><br/>
License: <?php echo YsJQMask::LICENSE ?>
<br/><br/>
Home Page: <a href="http://plugins.jquery.com/project/meioMask">http://plugins.jquery.com/project/meioMask</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        meioMask is a simple use plugin for creating and applying masks at text input
        fields.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
Optional:
<h6>
    <a class="children">jquery.metadata.js</a>
</h6>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.meio.mask.js"></script>'); ?>
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

