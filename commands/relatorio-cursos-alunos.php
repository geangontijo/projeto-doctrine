<?php

use Projeto\Doctrine\Entity\Aluno;
use Projeto\Doctrine\Entity\Curso;
use Projeto\Doctrine\Entity\Telefone;
use Projeto\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->EntityManagerFactory();

$alunos = $entityManager->getRepository(Aluno::class);

$alunosList = $alunos->buscaCursosPorAluno();

foreach ($alunosList as $aluno) {
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
