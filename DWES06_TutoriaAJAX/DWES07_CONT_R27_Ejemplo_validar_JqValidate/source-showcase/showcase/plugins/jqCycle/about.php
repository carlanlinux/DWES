<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQCYCLE); ?>
<?php $plugin = new YsJQCycle() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQCycle::VERSION ?>
<br/><br/>
License: <?php echo YsJQCycle::LICENSE ?>
<br/><br/>
Home Page: <a href="http://jquery.malsup.com/cycle/">http://jquery.malsup.com/cycle/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        The jQuery Cycle Plugin is a slideshow plugin that supports many different types
        of transition effects. It supports pause-on-hover, auto-stop, auto-fit,
        before/after callbacks, click triggers and much more.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.cycle.all.js"></script>'); ?>
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

