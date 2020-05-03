<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQVALIDATE); ?>
<?php $plugin = new YsJQValidate() ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQValidate::VERSION ?>
<br/><br/>
License: <?php echo YsJQValidate::LICENSE ?>
<br/><br/>
Home Page: <a href="http://bassistance.de/jquery-plugins/jquery-plugin-validation/">http://bassistance.de/jquery-plugins/jquery-plugin-validation/</a>
<br/><br/>
<h2>About the plugin</h2>
<div style="text-align:justify">
    <p>
        This jQuery plugin makes simple clientside form validation trivial, while
        offering lots of option for customization. That makes a good choice if you’re
        building something new from scratch, but also when you’re trying to integrate
        it into an existing application with lots of existing markup. The plugin comes
        bundled with a useful set of validation methods, including URL and email
        validation, while providing an API to write your own methods. All bundled
        methods come with default error messages in english and translations into 36
        locales.
        <br/><br/>
        The jQuery Validate plugin is written and maintained by Jörn Zaefferer, a member
        of the jQuery team, lead developer on the jQuery UI team and maintainer of QUnit.
        It was started back in the early days of jQuery in 2006, and updated and
        improved since then.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
Optional:
<h6>
    <a class="children">jquery.metadata.js</a>
</h6>
<br/><br/>

<h2>Javascripts source:</h2>
<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.validate.js"></script>'); ?>
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

