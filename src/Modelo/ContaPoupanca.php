<?php

namespace Moovin\Job\Backend\Modelo;

class ContaPoupanca extends Conta {

    /**
     * @inheritDoc
     */
    protected function getTaxa() {
        return 0.80;
    }

    /**
     * @inheritDoc
     */
    protected function getLimite() {
        return 1000;
    }

}
