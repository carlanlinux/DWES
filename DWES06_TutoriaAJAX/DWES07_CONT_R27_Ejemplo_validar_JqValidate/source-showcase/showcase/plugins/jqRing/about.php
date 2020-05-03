<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQRING); ?>
<?php $plugin = new YsJQRing("treeId") ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQRing::VERSION ?>
<br/><br/>
License: <?php echo YsJQRing::LICENSE ?>
<br/><br/>
Home Page: <a href="http://fredhq.com/projects/roundabout/">http://fredhq.com/projects/roundabout/</a>
<br/><br/>
Author: <a href="#">Fred LeBlanc</a>
<br/><br/>
<h2>Introduction</h2>
<div style="text-align:justify">
    <p>
        Roundabout is a jQuery plugin that converts a structure of static HTML elements
        into a highly customizable turntable-like interactive area.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/><br/>

<h2>Javascripts source:</h2>

<pre>
<?php echo htmlentities('
<script type="text/javascript" src="jquery.roundabout.min.js"></script>
<script type="text/javascript" src="jquery.roundabout-shapes.min.js"></script>'); ?>
</pre>

<br/><br/>

<h2>Style sheets:</h2>
<pre>
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

