<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>
<div>
    <img style="background-color:black"
         src="images/jquery4php-logo.jpg"
         width="215" height="53" id="imgMouseOver">
    <p id="logForMouseOver" style="color:green"></p>
    <?php
    echo
    YsJQuery::newInstance()
        ->onMouseover()
        ->in('#imgMouseOver')
        ->execute(
            YsJQuery::append('Mouse over ')->in('#logForMouseOver')
        )
    ?>
</div>