<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ParticipantRepository extends EntityRepository
{
    public function findEnabled()
    {
        return $this->createQueryBuilder('participant')
            ->where('participant.enable = :enable')
            ->setParameter('enable', true)
            ->getQuery()
            ->getResult()
        ;
    }
}