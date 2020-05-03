<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php
//For use the plugin
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQMASK);
?>


Sintax:<br/>
<b>Masks:</b><br/>
<?php
echo
YsJQMask::setMasks(array(
    'phone' => array('mask' => '(99) 9999-9999'),
    'phone-us' => array('mask' => '(99) 9999-9999')
))
?>
<br/><b>Rules:</b><br/>
<?php
echo
YsJQMask::setRules(array(
    'z' => new YsArgument('/[a-z]/', false),
    '@' => new YsArgument('/[0-9a-zA-Z]/', false)
))
?>