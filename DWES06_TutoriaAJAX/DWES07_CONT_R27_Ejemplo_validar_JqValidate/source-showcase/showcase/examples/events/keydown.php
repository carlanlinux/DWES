<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<div>
    <input type="text" value="" id="txtKeyDown">
    check: <input type="checkbox" id="chkInput"/>
    <?php

    echo
    YsJQuery::newInstance()
        ->onKeypress()
        ->in('#txtKeyDown')
        ->execute(
            YsJsFunction::newInstance("alert('On key down, The event code is = ' + event.keyCode)", 'event')
        )
    ?>

</div>