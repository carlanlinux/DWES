<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<div>
    <input type="button" value="Bind" id="btnOn">
    <div id="onExample">Click me</div>
    <?php
    echo
    YsJQuery::newInstance()
        ->onClick()
        ->in('#btnOn')
        ->execute(
            YsJQuery::on()
                ->in('#onExample')
                ->eventType('click')
                ->eventData(array('foo' => 'bar'))
                ->handler(new YsJsFunction('alert(event.data.foo)', 'event'))
        )
    ?>
</div>