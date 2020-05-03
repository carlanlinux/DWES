<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQMONITOR); ?>
<?php $plugin = new YsJQMonitor() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQMonitor::VERSION ?>
<br/><br/>
License: <?php echo YsJQMonitor::LICENSE ?>
<br/><br/>
Home Page: <a href="http://paulirish.com/2009/jquery-idletimer-plugin/">http://paulirish.com/2009/jquery-idletimer-plugin/</a>
<br/><br/>
Author: <a href="http://paulirish.com/contact-me/">Paul Irish</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        jQuery idleTimer plugin
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script language="javascript" type="text/javascript" src="jquery.idleTimer.js"></script>'); ?>
</pre>
<br/><br/>

<h2>Style sheets:</h2>
<pre>
<?php echo htmlentities(''); ?>
</pre>

<br/><br/>
<h2>Class name:</h2> <u><?php echo $className ?></u>
<br/><br/>
<h2>Parent class:</h2> <u><?php echo get_parent_class($plugin) ?></u>
<br/><br/>
<h2>Available Methods:</h2>
<br/>
<?php foreach (get_class_methods($plugin) as $method): ?>
    <?php if ($method == '__call') break ?>
    <h6><a class="children"><?php echo sprintf("%s::%s()", $className, $method) ?></a></h6>
<?php endforeach; ?>
<br/><br/>
<h2>PHPDocs:</h2> Comming soon

