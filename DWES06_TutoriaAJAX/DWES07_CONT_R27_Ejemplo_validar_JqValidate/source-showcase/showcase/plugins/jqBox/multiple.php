<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOX); ?>

<?php echo YsUIButton::initButtonset('buttons', 'style="display:none"') ?>
<a class="types" href="#inline1" title="Lorem ipsum dolor sit amet">Inline</a>
<a class="types fancybox.ajax" href="examples/response/plotResponse.php">Plot</a>
<a class="types fancybox.ajax" href="examples/response/subGridAsGridResponse.php">Grid</a>
<a class="types fancybox.iframe" href="http://fancyapps.com">Iframe</a>
<a class="types fancybox.iframe" href="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf">.swf</a>
<a class="types fancybox.iframe" href="http://www.youtube.com/embed/aDgl4VqWwj4?autoplay=1">Video</a>
<a class="types fancybox.iframe"
   href="http://maps.google.com/?output=embed&f=q&source=s_q&hl=en&geocode=&q=London+Eye,+County+Hall,+Westminster+Bridge+Road,+London,+United+Kingdom&hl=lv&ll=51.504155,-0.117749&spn=0.00571,0.016512&sll=56.879635,24.603189&sspn=10.280244,33.815918&vpsrc=6&hq=London+Eye&radius=15000&t=h&z=17">Google
    Map</a>
<a class="types fancybox.ajax" href="not/found">404</a>
<?php echo YsUIButton::endButtonset() ?>

<div style="display: none;">
    <div id="inline1">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Etiam quis mi eu elit tempor facilisis id et neque.
        Nulla sit amet sem sapien.
        Vestibulum imperdiet porta ante ac ornare.
        Nulla et lorem eu nibh adipiscing ultricies nec at lacus.
        Cras laoreet ultricies sem, at blandit mi eleifend aliquam.
        Nunc enim ipsum, vehicula non pretium varius, cursus ac tortor.
        Vivamus fringilla congue laoreet.
        Quisque ultrices sodales orci, quis rhoncus justo auctor in.
        Phasellus dui eros, bibendum eu feugiat ornare, faucibus eu mi.
        Nunc aliquet tempus sem, id aliquam diam varius ac.
        Maecenas nisl nunc, molestie vitae eleifend vel, iaculis sed magna.
        Aenean tempus lacus vitae orci posuere porttitor eget non felis.
        Donec lectus elit, aliquam nec eleifend sit amet, vestibulum sed nunc.
    </div>
</div>

<?php
echo
YsJQuery::newInstance()
    ->execute(
        YsJQBox::build('.types')
            ->_maxWidth(800)
            ->_maxHeight(600)
            ->_fitToView(false)
            ->_width('70%')
            ->_height('70%')
            ->_autoSize(false)
            ->_closeClick(false)
            ->_openEffect('none')
            ->_closeEffect('none'),
        YsUIButton::build()->in('.types'),
        YsJQuery::show()->in('#buttons')
    );
?>