<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQEDITOR); ?>
<?php $plugin = new YsJQEditor() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQEditor::VERSION ?>
<br/><br/>
License: <?php echo YsJQEditor::LICENSE ?>
<br/><br/>
Home Page: <a href="http://sourceforge.net/projects/elrte/">http://sourceforge.net/projects/elrte/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        elRTE is a WYSIWYG HTML editor for Web written using jQuery.
        It features rich text editing, options for changing its appearance and style,
        insertion and management of HTML elements with formatting, viewing and editing
        HTML code.
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
<?php echo htmlentities('<script type="text/javascript" src="jquery.elrte.js"></script>'); ?>     
</pre>
<br/><br/>
<h2>Style sheets:</h2>
<pre>
<?php echo htmlentities('<link rel="stylesheet" type="text/css" href="jquery.elrte.css" />'); ?>
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

