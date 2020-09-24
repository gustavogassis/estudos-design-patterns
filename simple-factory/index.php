<?php

class Car
{
    public function driveTo(string $destination){
        echo "Driving to $destination";
    }
}

class CarFactory
{
    public function makeCar() {
        return new Car();
    }
}

$carFactory = new CarFactory();
$car = $carFactory->makeCar();
$car->driveTo('Rio de Janeiro');