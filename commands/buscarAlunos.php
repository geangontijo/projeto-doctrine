<?php

use Projeto\Doctrine\Entity\Aluno;
use Projeto\Doctrine\Entity\Telefone;
use Projeto\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->EntityManagerFactory();

$alunoRepository = $entityManager->getRepository(Aluno::class);

$alunos = $alunoRepository->findAll();
foreach ($alunos as $aluno) {
    $telefones = $aluno->getTelefones()->map(function (Telefone $telefone) {
        return $telefone->getNumero();
    })->toArray();
    echo "ID: {$aluno->getId()} \nNOME: {$aluno->getNome()} \n";
    echo "TELEFONE: " . implode(', ', $telefones);
    echo "\n\n";
}
