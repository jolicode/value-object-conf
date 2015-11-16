<?php

include "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Model\Capsule;
use Model\CapsuleType;
use Model\CoffeeMaker;
use Model\User;
use Model\UserBis;

$paths = array("Model");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'dbname'   => 'vo',
    'host'     => 'localhost',
    'user'     => 'root',
    'password' => '',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$tool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
$classes = array(
    $entityManager->getClassMetadata('Model\CoffeeMaker'),
    $entityManager->getClassMetadata('Model\User'),
    $entityManager->getClassMetadata('Model\UserBis'),
    $entityManager->getClassMetadata('Model\Capsule'),
    $entityManager->getClassMetadata('Model\CapsuleType')
);
$tool->dropSchema($classes);
$tool->createSchema($classes);

function sep($message = '') {
    echo "\n\n############ ".$message."\n";
}

$coffeeMakerKrups = new CoffeeMaker();
$coffeeMakerKrups->setModel('KRUPS U');

$capsule   = new Capsule();
$ristretto = CapsuleType::fromValues('Ristretto', 'black', 'puissant et contrasté', 10);

$capsule->setType($ristretto);

$coffeeMakerKrups->setCurrentCapsule($capsule);

$entityManager->persist($coffeeMakerKrups);
$entityManager->persist($capsule);
$entityManager->flush();

sep("Coffee Maker persisted");
var_dump($coffeeMakerKrups);
$entityManager->clear();

$newCapsuleFromORM = $entityManager->find(Capsule::class, $capsule->getId());

sep("Capsule fetched from ORM");
var_dump($newCapsuleFromORM);

$entityManager->clear();
$qb = $entityManager->createQueryBuilder();
$qb->from(Capsule::class, 'c')->select('c')->where('c.type.name = :name');
$qb->setParameter('name', 'Ristretto');

sep("Capsule fetched from DQL");
var_dump($qb->getQuery()->getOneOrNullResult());

/**
 * USER
 */
$clooney = new User();
$clooney->setName('George Clooney');

$clooney->setFavoriteCapsuleType(
    CapsuleType::fromValues('custom', 'black', 'Made only for me', 12)
);

$entityManager->persist($clooney);
$entityManager->flush();

sep("User with favorite type persisted");
var_dump($clooney);

$damien = new UserBis();
$damien->setName('Damien');

$damien->setFavoriteCapsuleTypeAsObject(
    CapsuleType::fromValues('custom', 'black', 'Most metal coffee ever made', 12)
);

$entityManager->persist($damien);
$entityManager->flush();

sep("User with favorite type as object persisted");
var_dump($damien);

$loick = new UserBis();
$loick->setName('Loick');

try {
    $entityManager->persist($loick);
    $entityManager->flush();

    var_dump($loick);
} catch (\Exception $e) {
    echo $e->getMessage();

    /**
     * We can't save the user without the VO :-(
     */
}

$loick = new User();
$loick->setName('Loick');

try {
    $entityManager->persist($loick);
    $entityManager->flush();

    var_dump($loick);
} catch (\Exception $e) {
    echo $e->getMessage();

    /**
     * We can't save the user without the VO :-(
     */
}

