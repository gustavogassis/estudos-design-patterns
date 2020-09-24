<?php

interface IDoor
{
    public function getDescription();
}

class WoodenDoor implements IDoor
{
    public function getDescription()
    {
        echo "I am a wooden door";
    }
}

class IronDoor implements IDoor
{
    public function getDescription()
    {
        echo "I am a iron door";
    }
}

interface IDoorFittingExpert
{
    public function getDescription();
}

class Welder implements IDoorFittingExpert
{
    public function getDescription()
    {
        echo "I can only fit iron doors";
    }
}

class Carpenter implements IDoorFittingExpert
{
    public function getDescription()
    {
        echo "I can only fit wooden doors";
    }
}

interface IDoorFactory
{
    public function makeDoor();
    public function makeFittingExpert();
}

class WoodenDoorFactory implements IDoorFactory
{
    public function makeDoor()
    {
        return new WoodenDoor();
    }

    public function makeFittingExpert()
    {
        return new Carpenter();
    }
}

class IronDoorFactory implements IDoorFactory
{
    public function makeDoor()
    {
        return new IronDoor();
    }

    public function makeFittingExpert()
    {
        return new Welder();
    }
}

$woodenFactory = new WoodenDoorFactory();

$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription();  // Output: I am a wooden door
$expert->getDescription(); // Output: I can only fit wooden doors

$ironFactory = new IronDoorFactory();

$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription();  // Output: I am an iron door
$expert->getDescription(); // Output: I can only fit iron doors