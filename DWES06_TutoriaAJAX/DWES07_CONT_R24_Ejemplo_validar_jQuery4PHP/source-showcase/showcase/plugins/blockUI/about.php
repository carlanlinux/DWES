<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_BLOCKUI); ?>
<?php $plugin = new YsBlockUI() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsBlockUI::VERSION ?>
<br/><br/>
License: <?php echo YsBlockUI::LICENSE ?>
<br/><br/>
Home Page: <a href="http://jquery.malsup.com/block/">http://jquery.malsup.com/block/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        The jQuery BlockUI Plugin lets you simulate synchronous behavior when using AJAX,
        without locking the browser[1]. When activated, it will prevent user activity with
        the page (or part of the page) until it is deactivated. BlockUI adds elements
        to the DOM to give it both the appearance and behavior of blocking user
        interaction.
        <br/><br/>
        [1] Using the XMLHttpRequest object in synchronous mode causes the entire browser to lock until the remote call
        completes. This is usually not a desirable behavior.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.blockUI.js"></script>'); ?>
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

