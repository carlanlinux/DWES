<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<script type="text/javascript" language="javascript">
    function getCurrentTime() {
        var currentTime = new Date()
        return currentTime.toGMTString();
    }
</script>

<div id="responseDiv"></div>
<?php
echo
YsJQuery::newInstance()
    ->execute(
        YsJQuery::html(YsArgument::value('getCurrentTime'))
            ->in('#responseDiv')
            ->setInterval(1000, 'myIntervalVarname')
    );
?>

<input type="button" value="Kill interval" onclick="clearInterval(myIntervalVarname)"/>
