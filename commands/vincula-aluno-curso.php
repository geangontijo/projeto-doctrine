<?php

use Projeto\Doctrine\Entity\Aluno;
use Projeto\Doctrine\Entity\Curso;
use Projeto\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->EntityManagerFactory();

$idAluno = $argv[1];
$idCurso = $argv[2];

/** * @var Aluno */
$aluno = $entityManager->find(Aluno::class, $idAluno);
/** * @var Curso */
$curso = $entityManager->find(Curso::class, $idCurso);

$aluno->addCurso($curso);

$entityManager->flush();
