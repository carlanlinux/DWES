<pre>
<?php echo htmlentities(file_get_contents(__FILE__, true, null, 92)) ?>
</pre>
<br/>


<?php YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQBOX); ?>

<?php echo YsUIButton::initButtonset('buttons', 'style="display:none"') ?>
<a class="types" href="#inline1" title="Lorem ipsum dolor sit amet">Inline</a>
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
            ->_autoSize(false)
            ->_width(400)
            ->_height(100),
        YsUIButton::build()->in('.types'),
        YsJQuery::show()->in('#buttons')
    );
?>