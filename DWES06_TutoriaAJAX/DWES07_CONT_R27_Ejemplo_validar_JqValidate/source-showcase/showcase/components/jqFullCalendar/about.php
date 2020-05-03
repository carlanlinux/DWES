<?php YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQFULL_CALENDAR); ?>
<?php $plugin = new YsFullCalendar("id") ?>
<?php $className = get_class($plugin) ?>
Version: <?php echo YsJQFullCalendar::VERSION ?>
<br/><br/>
License: <?php echo YsJQFullCalendar::LICENSE ?>
<br/><br/>
Home Page: <a href="http://arshaw.com/fullcalendar/">http://arshaw.com/fullcalendar/</a>
<br/><br/>
Author: <a href="http://arshaw.com/">Adam Shaw</a>
<br/><br/>
<h2>Introduction</h2>
<div style="text-align:justify">
    <p>
        FullCalendar is a jQuery plugin that provides a full-sized, drag & drop calendar
        like the one below. It uses AJAX to fetch events on-the-fly for each month and
        is easily configured to use your own feed format (an extension is provided for
        Google Calendar). It is visually customizable and exposes hooks for
        user-triggered events (like clicking or dragging an event).
        It is open source and dual licensed under the MIT or GPL Version 2 licenses.
    </p>
</div>
<br/><br/>
<h2>Plugin dependencies:</h2>
<br/>
<h6>
    <a class="children">jQuery UI (optional)</a><br/>
</h6>
<br/><br/>

<h2>Javascripts source:</h2>

<pre>
<?php echo htmlentities('<script type="text/javascript" src="jquery.fullcalendar.min.js"></script>'); ?>
</pre>

<br/><br/>

<h2>Style sheets:</h2>

<pre>
<?php echo htmlentities('<link rel="stylesheet" type="text/css" href="jquery.fullcalendar.css" />'); ?>
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

