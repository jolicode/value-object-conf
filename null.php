<?php

include "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Model\Nullable\CapsuleType;
use Model\Nullable\User;

$paths = array("Model/Nullable");
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
    $entityManager->getClassMetadata('Model\Nullable\User'),
    $entityManager->getClassMetadata('Model\Nullable\CapsuleType')
);
$tool->dropSchema($classes);
$tool->createSchema($classes);

function sep($message = '') {
    echo "\n\n############ ".$message."\n";
}

$user = new User();
$user->setName("Loick");

$entityManager->persist($user);
$entityManager->flush();
$entityManager->clear();

$userFromORM = $entityManager->find(User::class, $user->getId());
sep("User with null VO");
var_dump($userFromORM);

$ristretto = CapsuleType::fromValues('Ristretto', 'black', 'puissant et contrasté', 10);
$user->setFavoriteCapsuleType($ristretto);

$entityManager->persist($user);
$entityManager->flush();
$entityManager->clear();

$userFromORM = $entityManager->find(User::class, $user->getId());
sep("User with non null VO");
var_dump($userFromORM);

$qb = $entityManager->createQueryBuilder();
$qb->from(User::class, 'u')->select('u')->where('u.hasFavoriteCapsuleType = :has');
$qb->setParameter('has', true);

sep("User fetched from DQL");
var_dump($qb->getQuery()->getOneOrNullResult());
