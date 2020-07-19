<?php

use Doctrine\DBAL\Logging\DebugStack;
use Projeto\Doctrine\Entity\Aluno;
use Projeto\Doctrine\Entity\Curso;
use Projeto\Doctrine\Entity\Telefone;
use Projeto\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->EntityManagerFactory();

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$class = Aluno::class;
$dql = "SELECT aluno, telefones, cursos FROM $class aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos";

$alunos = $entityManager->createQuery($dql)->getResult();
foreach ($alunos as $aluno) {
    echo "ID: {$aluno->getId()} \nNOME: {$aluno->getNome()}\n";

    $telefones = $aluno->getTelefones()->map(function (Telefone $telefone) {
        return $telefone->getNumero();
    })->toArray();

    echo "\tTELEFONES: " . implode(', ', $telefones) . "\n";

    $cursos = $aluno->getCursos()->map(function (Curso $curso) {
        return $curso->getNome();
    })->toArray();

    echo "\tCURSOS: " . implode(', ', $cursos) . "\n\n";
}

echo "\n\n";

foreach ($debugStack->queries as $query) {
    echo $query['sql'] . "\n";
}
