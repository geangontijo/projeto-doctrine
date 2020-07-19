<?php

namespace Projeto\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Projeto\Doctrine\Entity\Aluno;

class AlunoRepository extends EntityRepository
{
    public function buscaCursosPorAluno()
    {
        $query = $this->createQueryBuilder('a')
            ->join('a.telefones', 't')
            ->join('a.cursos', 'c')
            ->addSelect('t')
            ->addSelect('c')
            ->getQuery();
        return $query->getResult();
    }
}
