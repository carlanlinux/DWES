<?php error_reporting(E_ALL) ?>
<?php ini_set('display_errors', 1) ?>

<?php
include_once dirname(__FILE__) . '/../../../lib/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php';
YsJQueryAutoloader::register();
YsJQuery::useComponent(YsJQueryConstant::COMPONENT_JQTREE);

$nodes = array();
$leagues = array('es' => 'Liga Española de fútbol', 'de' => 'Bundesliga', 've' => 'Liga Venezolana de fútbol');
$nodes = $leagues;


$team['es'] = array(
    'fcb' => 'Fútbol Club Barcelona',
    'rmcf' => 'Real Madrid Club de Fútbol',
    'rcdm' => 'Real Club Deportivo Mallorca'
);
$team['de'] = array(
    'bm' => 'Bayern München',
    'bd' => 'Borussia Dortmund',
    'vw' => 'VfL Wolfsburgo'
);
$team['ve'] = array(
    'cfc' => 'Caracas FC',
    'dt' => 'Deportivo Táchira Fútbol Club',
    're' => 'Real Esppor',
);

$team['bm'] = array('Hans-Jörg Butt', 'Arjen Robben', 'Miroslav Klose');
$team['bd'] = array('Roman Weidenfeller', 'Mats Hummels', 'Lucas Barrios');
$team['vw'] = array('Diego Benaglio', 'Mario Mandžukić', 'Diego Benaglio');

$team['fcb'] = array('Víctor Valdés', 'Lionel Messi', 'Xavi Hernández');
$team['rmcf'] = array('Iker Casillas', 'Sergio Ramos', 'Cristiano Ronaldo');
$team['rcdm'] = array('Germán Lux', 'Rubén González', 'Iván Ramis');

$team['cfc'] = array('Renny Vega', 'Fernando Aristeguieta', 'Giovanny Romero');
$team['dt'] = array('Manuel Sanhouse', 'César González', 'Julio Gutiérrez');
$team['re'] = array('Javier Toyo', 'Cristian Cásseres', 'Darío Figueroa');

$id = '';
if (isset($_GET['id']) && $_GET['operation'] != 'first_request') {
    $id = YsTreeNode::deleteListPrefix($_GET['id']);
    $nodes = $team[$id];
}


$root = new YsTreeNode('rootId');
foreach ($nodes as $id => $caption) {
    $node = new YsTreeNode($id, $caption, $root);
    if (isset($team[$id])) {
        $node->setClosed();
    } else {
        $node->setType('player');
        $node->setLeaf(true);
    }
}
$tree = new YsTree('treeId', $root);

header('Content-Type: application/xml;');
echo YsTreeResponse::buildXMLResponse($tree);
?>