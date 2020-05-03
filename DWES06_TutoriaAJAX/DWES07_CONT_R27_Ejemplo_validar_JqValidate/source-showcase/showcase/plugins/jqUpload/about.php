<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQUPLOAD); ?>
<?php $plugin = new YsUpload("treeId") ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsUpload::VERSION ?>
<br/><br/>
License: <?php echo YsUpload::LICENSE ?>
<br/><br/>
Home Page: <a href="http://www.plupload.com">http://www.plupload.com</a>
<br/><br/>
<h2>Introduction</h2>
<div style="text-align:justify">
    <p>
        Allows you to upload files using HTML5 Gears, Silverlight, Flash,
        BrowserPlus or normal forms, providing some unique features such as upload
        progress, image resizing and chunked uploads.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/><br/>

<h2>Javascripts source:</h2>

<pre>
<?php echo htmlentities('
<script type="text/javascript" src="plupload.full.js"></script>
<script type="text/javascript" src="jquery.ui.plupload.js"></script>'); ?>
</pre>

<br/><br/>

<h2>Style sheets:</h2>
<pre>
<?php echo htmlentities('<link rel="stylesheet" type="text/css" href="jquery.ui.plupload.css" />'); ?>
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

