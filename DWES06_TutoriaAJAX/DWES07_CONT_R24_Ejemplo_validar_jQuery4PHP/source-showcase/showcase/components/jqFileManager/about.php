<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQFILEMANAGER); ?>
<?php YsJQuery::useComponent(YsJQueryConstant::PLUGIN_JQFILEMANAGER); ?>
<?php $plugin = new YsJQFileManager() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQFileManager::VERSION ?>
<br/><br/>
License: <?php echo YsJQFileManager::LICENSE ?>
<br/><br/>
Home Page: <a href="http://sourceforge.net/projects/elfinder/">http://sourceforge.net/projects/elfinder/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        elFinder is a file manager for web similar to that you use on your computer.
        Written in JavaScript using jQuery UI, it just work's in any modern browser.
        Its creation is inspired by simplicity and convenience of Finder.app program
        used in Mac OS X.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<h6>
    <a class="children">jQuery UI</a><br/>
</h6>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.elfinder.js"></script>'); ?>     
</pre>
<br/><br/>
<h2>Style sheets:</h2>
<pre>
<?php echo htmlentities('<link rel="stylesheet" type="text/css" href="jquery.elfinder.css" />'); ?>
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
<?php foreach (get_class_methods(new YsFileManager()) as $method): ?>
    <?php if ($method == '__call') break ?>
    <h6><a class="children"><?php echo sprintf("%s::%s()", $className, $method) ?></a></h6>
<?php endforeach; ?>
<br/><br/>
<h2>PHPDocs:</h2> Comming soon

