<?php

use Countable;
use Iterator;

class EstacaoDeRadio
{
    protected $frequencia;

    public function __construct(float $frequencia)
    {
        $this->frequencia = $frequencia;
    }

    public function getFrequencia() : float
    {
        return $this->frequencia;
    }
}

class EstacaoList implements Countable, Iterator
{
    protected $estacoes = [];
    protected $contador;

    public function addEstacao(EstacaoDeRadio $estacao)
    {
        $this->estacoes[] = $estacao;
    }

    public function removeEstacao(EstacaoDeRadio $toRemove)
    {
        $toRemoveFrequencia = $toRemove->getFrequencia();
        $this->estacoes = array_filter($this->estacoes, function (EstacaoDeRadio $estacao) use ($toRemoveFrequencia) {
            return $estacao->getFrequencia() !== $toRemoveFrequencia;
        });
    }

    public function count() : int
    {
        return count($this->estacoes);
    }

    public function current() : EstacaoDeRadio
    {
        return $this->estacoes[$this->contador];
    }

    public function key()
    {
        return $this->contador;
    }

    public function next()
    {
        $this->contador++;
    }

    public function rewind()
    {
        $this->contador = 0;
    }

    public function valid(): bool
    {
        return isset($this->estacoes[$this->contador]);
    }
}

$estacaoList = new EstacaoList();

$estacaoList->addEstacao(new EstacaoDeRadio(89));
$estacaoList->addEstacao(new EstacaoDeRadio(101));
$estacaoList->addEstacao(new EstacaoDeRadio(102));
$estacaoList->addEstacao(new EstacaoDeRadio(103.2));

foreach($estacaoList as $estacao) {
    echo $estacao->getFrequencia() . PHP_EOL;
}

$estacaoList->removeEstacao(new EstacaoDeRadio(89));