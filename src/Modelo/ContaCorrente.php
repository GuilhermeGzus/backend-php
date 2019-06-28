<?php

namespace Moovin\Job\Backend\Modelo;

class ContaCorrente extends Conta {

    /**
     * @inheritDoc
     */
    protected function getTaxa() {
        return 2.50;
    }

    /**
     * @inheritDoc
     */
    protected function getLimite() {
        return 600;
    }

}
