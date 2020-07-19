<?php

use Projeto\Doctrine\Helper\EntityManagerFactory;
use Projeto\Doctrine\Entity\Aluno;
use Projeto\Doctrine\Entity\Telefone;

require_once __DIR__ . '/../vendor/autoload.php';

$aluno = new Aluno();
$aluno->setNome($argv[1]);
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->EntityManagerFactory();

for ($i = 2; $i < $argc; $i++) {
    $numero = $argv[$i];
    $telefone = new Telefone();
    $telefone->setNumero($numero);
    $aluno->addTelefone($telefone);
}


$entityManager->persist($aluno);

$entityManager->flush();
