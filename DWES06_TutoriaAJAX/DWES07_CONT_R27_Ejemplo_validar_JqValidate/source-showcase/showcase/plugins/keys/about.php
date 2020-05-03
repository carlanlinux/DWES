<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_KEYS); ?>
<?php $plugin = new YsKeys() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsKeys::VERSION ?>
<br/><br/>
License: <?php echo YsKeys::LICENSE ?>
<br/><br/>
Home Page: <br/>
<a href="https://github.com/jeresig/jquery.hotkeys">hotkeys</a><br/>
<a href="http://boedesign.com/blog/2009/12/30/keystrokes-for-jquery/">keystrokes for jquery</a>
<br/><br/>
<h2>About the plugin</h2>

<h3>Hotkeys</h3>
<div style="text-align:justify">
    <p>
        jQuery Hotkeys is a plug-in that lets you easily add and remove handlers for
        keyboard events anywhere in your code supporting almost any key combination.
    </p>
</div>
<h3>Keystrokes</h3>
<div style="text-align:justify">
    <p>
        Keystrokes is a jQuery plugin that can capture a sequence of keys that are
        pressed. It would come in pretty handy if you were doing a web application and
        wanted to allow the users to use hot keys. It can even detect combo keys like
        ‘shift+ctrl’. It would operate exactly as you type it. In this case, the user
        would hold down shift, hit ctrl and the event you specified would fire.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.hotkeys.js"></script>
<script type="text/javascript" src="jquery.keystrokes.js"></script>'); ?>
</pre>
<br/><br/>

<h2>Style sheets:</h2>
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

