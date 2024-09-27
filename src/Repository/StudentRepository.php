<?php

namespace Alura\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository
{
    /**
     * @return Student[]
     */
    public function studentsAndCourses()
    {
        return $this->createQueryBuilder('student')
        ->addSelect('phone')
        ->addSelect('course')
        ->leftJoin('student.phones','phone')
        ->leftJoin('student.courses','course')
        ->getQuery()
        ->getResult()
        ;
    }
}
