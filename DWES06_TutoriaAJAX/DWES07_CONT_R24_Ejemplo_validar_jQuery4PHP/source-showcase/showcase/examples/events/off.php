<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<div>
    <input type="button" value="On" id="btnOn"/>&nbsp;
    <input type="button" value="Off" id="btnOff"/>
    <div id="offExample">Click me</div>
    <?php
    echo
    YsJQuery::newInstance()
        ->onClick()
        ->in('#btnOn')
        ->execute(
            YsJQuery::on()
                ->in('#offExample')
                ->eventType(YsJQueryConstant::CLICK_EVENT)
                ->eventData(array('foo' => 'bar'))
                ->handler(new YsJsFunction('alert(event.data.foo)', 'event'))
        )
    ?>

    <?php
    echo
    YsJQuery::newInstance()
        ->onClick()
        ->in('#btnOff')
        ->execute(
            YsJQuery::off()
                ->in('#offExample')
                ->eventType(YsJQueryConstant::CLICK_EVENT)
        )
    ?>
</div>