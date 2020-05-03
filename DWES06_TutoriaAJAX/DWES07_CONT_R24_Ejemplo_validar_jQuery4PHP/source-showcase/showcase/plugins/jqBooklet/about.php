<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOOKLET); ?>
<?php $plugin = new YsJQBooklet() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQBooklet::VERSION ?>
<br/><br/>
License: <?php echo YsJQBooklet::LICENSE ?>
<br/><br/>
Home Page: <a href="http://builtbywill.com/code/booklet/">http://builtbywill.com/code/booklet/</a>
<br/><br/>
Author: <a href="http://builtbywill.com/">W. Grauvogel</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        Booklet is a jQuery tool for displaying content on the web in a flipbook layout.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<h6><a class="children">jQuery UI</a></h6>
<h6><a class="children">jQuery Easing Plugin</a></h6>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script language="javascript" type="text/javascript" src="jquery.booklet.min.js"></script>'); ?>
</pre>
<br/><br/>

<h2>Style sheets:</h2>
<pre>
<?php echo htmlentities('<link rel="stylesheet" type="text/css" href="jquery.booklet.css" />'); ?>
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

