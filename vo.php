<?php
include "vendor/autoload.php";

use Model\Capsule;
use Model\CapsuleType;
use Model\CoffeeMaker;

$ristretto  = CapsuleType::fromValues('Ristretto', 'black', 'puissant et contrasté', 10);
$roma       = CapsuleType::fromValues('Roma', 'purple', 'intense et crémeux', 9);

var_dump($ristretto == $roma);
var_dump($ristretto === $roma);

/**
 * Equality
 */
class VO {
    private $test;
    public function __construct($test) {
        $this->test = $test;
    }
}

$one = new VO('coucou');
$two = new VO('coucou');

var_dump($one == $two);
var_dump($one === $two);


var_dump($one->__construct('omg'));
var_dump($one == $two);
var_dump($one);

$refObject   = new ReflectionObject($one);
$refProperty = $refObject->getProperty('test');
$refProperty->setAccessible(true);
$refProperty->setValue($one, 'yolo');

var_dump($one);

$coffeeMakerKrups = new CoffeeMaker();
$coffeeMakerKrups->setModel('KRUPS U');
$coffeeMakerKrups->setCurrentCapsule(new Capsule());
