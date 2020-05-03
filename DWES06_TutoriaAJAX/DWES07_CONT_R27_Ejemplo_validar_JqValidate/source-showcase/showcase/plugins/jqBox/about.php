<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOX); ?>
<?php $plugin = new YsJQBox() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQBox::VERSION ?>
<br/><br/>
License: <?php echo YsJQBox::LICENSE ?>
<br/><br/>
Home Page: <a href="http://fancybox.net/">http://fancybox.net/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        FancyBox is a tool for displaying images, html content and multi-media in a Mac-style "lightbox" that floats
        overtop of web page.
        It was built using the jQuery library. Licensed under both MIT and GPL licenses
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('
<script type="text/javascript" src="jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="jquery.fancybox-thumbs.js"></script>'); ?>
</pre>
<br/><br/>

<h2>Style sheets:</h2>
<pre>
<?php echo htmlentities('
<link rel="stylesheet" type="text/css" href="jquery.fancybox.css" />
<link rel="stylesheet" type="text/css" href="jquery.fancybox-buttons.css" />
<link rel="stylesheet" type="text/css" href="jquery.fancybox-thumbs.css" />'); ?>
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

