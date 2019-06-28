<?php

require_once __DIR__ . '/vendor/autoload.php';

use Moovin\Job\Backend\Modelo;

$contaA = new Modelo\ContaCorrente();
$contaB = new Modelo\ContaCorrente();

$contaA->setSaldo(800);
$contaB->setSaldo(250);

echo "<br><br>";
echo "Saldo conta A: B$ " . $contaA->getSaldo();
echo "<br>";
echo "Saldo conta B: B$ " . $contaB->getSaldo();
echo "<br><br>";

echo $contaA->sacar(100);
echo "<br>";
echo $contaA->depositar(50);
echo "<br>";
echo $contaA->transferir(50, $contaB);

echo "<br><br>";
echo "Saldo final conta A: B$ " . $contaA->getSaldo();
echo "<br>";
echo "Saldo final conta B: B$ " . $contaB->getSaldo();
