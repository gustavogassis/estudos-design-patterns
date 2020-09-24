<?php

abstract class Builder
{

    public final function build()
    {
        $this->test();
        $this->lint();
        $this->assemble();
        $this->deploy();
    }

    public abstract function test();
    public abstract function lint();
    public abstract function assemble();
    public abstract function deploy();
}

class AndroidBuilder extends Builder
{
    public function test()
    {
        echo 'Rodando testes do android';
    }

    public function lint()
    {
        echo 'Análisando o código do android';
    }

    public function assemble()
    {
        echo 'Montando a build do android';
    }

    public function deploy()
    {
        echo 'Fazendo o deploy da build do android para o servidor';
    }
}

class IosBuilder extends Builder
{
    public function test()
    {
        echo 'Rodando testes do ios';
    }

    public function lint()
    {
        echo 'Análisando o código do ios';
    }

    public function assemble()
    {
        echo 'Montando a build do ios';
    }

    public function deploy()
    {
        echo 'Fazendo o deploy da build do ios para o servidor';
    }
}

$androidBuilder = new AndroidBuilder();
$androidBuilder->build();

// Output:
// Rodando testes do android
// Análisando o código do android
// Montando a build do android
// Fazendo o deploy da build do android para o servidor

$iosBuilder = new IosBuilder();
$iosBuilder->build();

// Output:
// Rodando testes do ios
// Análisando o código do ios
// Montando a build do ios
// Fazendo o deploy da build do ios para o servidor