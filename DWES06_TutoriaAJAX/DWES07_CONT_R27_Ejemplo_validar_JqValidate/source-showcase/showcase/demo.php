<?php error_reporting(E_ALL) ?>
<?php ini_set('display_errors', 1) ?>
<?php $isExampleDir = array('examples', 'examples-ui', 'plugin', 'components') ?>
<?php
if (isset($_GET['module']) && isset($_GET['method'])) {
    $module = $_GET['module'];
    $section = $_GET['section'];
    $method = $_GET['method'];
} else {
    $module = 'jQuery4PHP';
    $method = 'introduction';
    $section = 'about';
}

$isSource = (in_array($section, $isExampleDir));

include_once dirname(__FILE__) . '/../lib/YepSua/Labs/RIA/jQuery4PHP/jquery4php_required.php';

?>

<?php include_once('api-info.inc.php') ?>


<!DOCTYPE HTML>
<html class="js" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="Author" content="Omar Yepez">
    <meta name="keywords" content="jquery, php, jQuery4PHP, ajax, jquery for php,javascript, jqgrid, jqplot, jqueryUI">
    <title>jQuery4PHP | <?php echo ucfirst($module) . ' | ' . ucfirst(str_replace('_', ' ', $method)) ?></title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="showcase-assets/styles/reset.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="showcase-assets/styles/cmxformTemplate.css"/>
    <!-- highlight  -->
    <link rel="stylesheet" type="text/css" href="showcase-assets/styles/highlight/sh_ide-eclipse.min.css">
    <script type="text/javascript" src="showcase-assets/js/highlight/sh_main.min.js"></script>
    <script type="text/javascript" src="showcase-assets/js/highlight/sh_php.js"></script>
    <!-- highlight  -->

    <?php echo YsConfigAssets::includeAssets('*') // all js and styles for jQuery4PHP ?>

    <script type="text/javascript" src="showcase-assets/js/themeswitchertool.js"></script>
    <!-- jqplot for IE  -->
    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="jquery4php-assets/js/excanvas.min.js"></script>
    <![endif]-->
    <!-- jqplot for IE  -->


    <link rel="shortcut icon" href="http://jquery4php.sourceforge.net/favicon.ico" type="image/x-icon"/>
</head>
<body style="background-color:#ffffff" onload="sh_highlightDocument();">
<?php include(sprintf('%s/%s/%s.php', $section, $module, $method)) ?>
<?php
echo YsJQuery::fadeOut(300)->in('pre')->execute()
?>
</body>
</html>
