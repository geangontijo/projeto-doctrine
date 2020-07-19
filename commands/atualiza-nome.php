<?php

use Projeto\Doctrine\Entity\Aluno;
use Projeto\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->EntityManagerFactory();
$id = $argv[1];
$replace = $argv[2];

$aluno = $entityManager->find(Aluno::class, $id);
$aluno->setNome($replace);

$entityManager->flush();
