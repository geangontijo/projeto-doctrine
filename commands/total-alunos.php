<?php

use Projeto\Doctrine\Entity\Aluno;
use Projeto\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->EntityManagerFactory();

$class = Aluno::class;
$dql = "SELECT COUNT(a) FROM $class a";
$count = $entityManager->createQuery($dql)->getSingleScalarResult();
echo 'Total de alunos ' . $count;
