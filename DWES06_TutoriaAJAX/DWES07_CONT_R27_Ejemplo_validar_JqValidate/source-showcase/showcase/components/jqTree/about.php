<?php YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE); ?>
<?php $plugin = new YsTree("treeId") ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQTree::VERSION ?>
<br/><br/>
License: <?php echo YsJQTree::LICENSE ?>
<br/><br/>
Home Page: <a href="http://www.jstree.com/">http://www.jstree.com/</a>
<br/><br/>
Author: <a href="http://www.vakata.com/">Ivan Bozhanov</a>
<br/><br/>
<h2>Introduction</h2>
<div style="text-align:justify">
    <p>jsTree is a javascript based, cross browser tree component.
        It is packaged as a <strong>jQuery plugin</strong>.<br><strong>jsTree is
            absolutely free</strong> (licensed same as jQuery &ndash; under the
        terms of either the MIT License or the GNU General Public License (GPL)
        Version 2).
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<h6>
    <a class="children">jQuery UI (if you want the tree with themeroller styles)</a><br/>
</h6>
<br/><br/>

<h2>Javascripts source:</h2>

<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.jstree.js"></script>'); ?>
</pre>

<br/><br/>

<h2>Style sheets:</h2>

<pre>
<?php echo htmlentities('<link rel="stylesheet" type="text/css" href="jstree/themes/default/style.css" />'); ?>
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

