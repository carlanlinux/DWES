<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOX); ?>

<?php echo YsUIButton::initButtonset('buttons', 'style="display:none"') ?>
<a class="types fancybox.iframe"
   href="http://maps.google.com/?output=embed&f=q&source=s_q&hl=en&geocode=&q=London+Eye,+County+Hall,+Westminster+Bridge+Road,+London,+United+Kingdom&hl=lv&ll=51.504155,-0.117749&spn=0.00571,0.016512&sll=56.879635,24.603189&sspn=10.280244,33.815918&vpsrc=6&hq=London+Eye&radius=15000&t=h&z=17">Google
    Map</a>
<?php echo YsUIButton::endButtonset() ?>

<?php
echo
YsJQuery::newInstance()
    ->execute(
        YsJQBox::build('.types')
            ->_width(640)
            ->_height(390)
            ->_autoSize(false),
        YsUIButton::build('.types')
            ->_icons(array('primary' => YsUIConstant::ICON_SEARCH)),
        YsJQuery::show()->in('#buttons')
    );
?>