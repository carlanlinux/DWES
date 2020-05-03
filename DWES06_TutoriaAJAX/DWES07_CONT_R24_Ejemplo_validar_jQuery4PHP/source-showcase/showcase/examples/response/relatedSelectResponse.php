<?php
sleep(2);
$options = array();

$teams['es'] = array(
    'fcb' => 'Fútbol Club Barcelona',
    'rmcf' => 'Real Madrid Club de Fútbol',
    'rcdm' => 'Real Club Deportivo Mallorca'
);
$teams['de'] = array(
    'bm' => 'Bayern München',
    'bd' => 'Borussia Dortmund',
    'vw' => 'VfL Wolfsburgo'
);
$teams['ve'] = array(
    'cfc' => 'Caracas FC',
    'dt' => 'Deportivo Táchira Fútbol Club',
    're' => 'Real Esppor',
);

$players['de']['bm'] = array('Hans-Jörg Butt', 'Arjen Robben', 'Miroslav Klose');
$players['de']['bd'] = array('Roman Weidenfeller', 'Mats Hummels', 'Lucas Barrios');
$players['de']['vw'] = array('Diego Benaglio', 'Mario Mandžukić', 'Diego Benaglio');

$players['es']['fcb'] = array('Víctor Valdés', 'Lionel Messi', 'Xavi Hernández');
$players['es']['rmcf'] = array('Iker Casillas', 'Sergio Ramos', 'Cristiano Ronaldo');
$players['es']['rcdm'] = array('Germán Lux', 'Rubén González', 'Iván Ramis');

$players['ve']['cfc'] = array('Renny Vega', 'Fernando Aristeguieta', 'Giovanny Romero');
$players['ve']['dt'] = array('Manuel Sanhouse', 'César González', 'Julio Gutiérrez');
$players['ve']['re'] = array('Javier Toyo', 'Cristian Cásseres', 'Darío Figueroa');

if (!isset($_GET['optTeams'])) {
    $options = $teams[$_GET['optLeagues']];
} else {
    $options = $players[$_GET['optLeagues']][$_GET['optTeams']];
}
?>

<?php foreach ($options as $value => $option): ?>
    <option value="<?php echo $value ?>">
        <?php echo $option ?>
    </option>
<?php endforeach; ?>