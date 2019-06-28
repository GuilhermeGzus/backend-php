<?php

namespace Moovin\Job\Backend\Modelo;

abstract class Conta {

    /** @var float */
    private $saldo;

    function getSaldo() {
        return $this->saldo;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    /**
     * Realiza o saque de um valor na conta.
     * 
     * @param float $valor
     * 
     * @return string
     */
    public function sacar($valor) {
        if (
                $this->saldo >= $valor &&
                $valor <= $this->getLimite() &&
                $valor + $this->getTaxa() <= $this->saldo
        ) {
            $this->saldo -= ($valor + $this->getTaxa());
            return "Saque efetuado: B$ " . $valor . "<br>Seu saldo atual �: B$ " . $this->saldo;
        } else {
            return "Saldo insuficiente";
        }
    }

    /**
     * Realiza o dep�sito de um valor na conta.
     * 
     * @param float $valor
     * 
     * @return string
     */
    public function depositar($valor) {
        $this->saldo += $valor;
        return "Dep�sito efetuado: B$ " . $valor . "<br> Seu saldo atual �: B$ " . $this->saldo;
    }

    /**
     * Realiza uma transfer�ncia de um valor da conta atual para uma nova conta.
     * 
     * @param float $valor
     * @param Conta $conta
     * 
     * @return string
     */
    public function transferir($valor, $conta) {
        if ($this->saldo >= $valor) {
            $this->saldo -= $valor;
            $conta->depositar($valor);
            return "Transfer�ncia efetuada: B$ " . $valor . "<br> Seu saldo atual �: B$ " . $this->saldo;
        } else {
            return "Saldo insuficiente";
        }
    }

    /**
     * Retorna a taxa de transa��o.
     * 
     * @return float
     */
    abstract protected function getTaxa();

    /**
     * Retorna o limite do saque.
     * 
     * @return float
     */
    abstract protected function getLimite();
}
