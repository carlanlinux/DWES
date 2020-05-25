<?php
try {
    require_once '../pdo_connect.php';
    // Set up prepared statements transfer from one account to another
    $amount = 200;
    $payee = 'John White';
    $payer = 'Jane Black';
    $debit = 'UPDATE savings SET balance = balance - :amount WHERE name = :payer';
    $getBalance = 'SELECT balance FROM savings WHERE name = :payer';
    $credit = 'UPDATE savings SET balance = balance + :amount WHERE name = :payee';

    $pay = $db->prepare($debit);
    $pay->bindParam(':amount', $amount);
    $pay->bindParam(':payer', $payer);

    $check = $db->prepare($getBalance);
    $check->bindParam(':payer', $payer);

    $receive = $db->prepare($credit);
    $receive->bindParam(':amount', $amount);
    $receive->bindParam(':payee', $payee);

    // Comenzamos la transacicón
    $db->beginTransaction();
    // Comenzamos la transacicón
    $pay->execute();
    //Comprobamos si ha sido existosa usando rowcount, que nos devuelve true si se realiza la acción o false si no
    // (en el caso de los INSERT, DELETE, UPDATE)
    // Si tenemos algún registro actualizado ejecutamos la segunda transacción, si no, hacemos un rollback y pintamos un mensaje
    if (!$pay->rowCount()) {
        $db->rollBack();
        $error = "Transaction failed: could not update $payer's balance.";
    } else {
        // Check the remaining balance in the payer's account
        $check->execute();
        //Guardamos en una variable el saldo de la cuenta de la que restamos para hacer posteriormente la comprobación de que haya saldo.
        $bal = $check->fetchColumn();
        //Se usa para liberar la conexión con el servidor y permitir hacer otras queries pero deja el objeto del statement
        //En un estado que permite que se ejecute de nuevo si es necesario. No lo necesitan todas las bases de datos,
        // pero para conseguir una mayor compatibilidad no está de más ponerlo
        $check->closeCursor();

        // Roll back the transaction if the balance is negative
        if ($bal < 0) {
            $db->rollBack();
            $error = "Transaction failed: insufficient funds in $payer's account.";
        } else {
            $receive->execute();
            if (!$receive->rowCount()) {
                $db->rollBack();
                $error = "Transaction failed: could not update $payee's balance.";
                //Si rowcount es 1, entonces hacemos un commit para la transacción

            } else {
                $db->commit();
            }
        }
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO Transaction</title>
    <link href="../styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO Transactions</h1>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<table>
    <tr>
        <th>Name</th>
        <th>Balance</th>
    </tr>
<!--    Si no tuvieramos el closeCursor() arriba no permitiría hacer la query otra query si estamos en una BD que no sea MySQL-->
    <?php foreach ($db->query('SELECT name, balance FROM savings') as $row) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td>$<?php echo number_format($row['balance'], 2); ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>