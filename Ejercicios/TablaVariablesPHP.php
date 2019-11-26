<?php
foreach ($_SERVER as $variable => $valor) {
    print "<tr>";
    print "<td>".$variable."</td>";
    print "<td>".$valor."</td>";
    print "</tr>";
}