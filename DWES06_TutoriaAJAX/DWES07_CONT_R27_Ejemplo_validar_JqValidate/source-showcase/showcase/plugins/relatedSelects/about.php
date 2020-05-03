<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_RELATED_SELECTS); ?>
<?php $plugin = new YsRelatedSelects() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsRelatedSelects::VERSION ?>
<br/><br/>
License: <?php echo YsRelatedSelects::LICENSE ?>
<br/><br/>
Home Page: <a href="http://pines.sourceforge.net/pnotify/">http://pines.sourceforge.net/pnotify/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        jQuery Related Selects is a plugin that allows you to create any number of
        select boxes whose options are determined upon the selected value of another.
        You pass an array or object of select box names, and the select boxes will
        depend on each other in the order in which they are passed in.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.relatedselects.js"></script>'); ?>
</pre>
<br/><br/>

<h2>Style sheets:</h2>
<pre>
<?php echo htmlentities(''); ?>
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

