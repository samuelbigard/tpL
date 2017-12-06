<?php

namespace App\Repository;

class ParticipantRepository extends \Doctrine\ORM\EntityRepository
{
    public function findEnabled(){
        return $this->createQueryBuilder("participant")
            ->where("participant.enabled = ':enabled'")
            ->setParameter("enabled" => true)
            ->getQuery()
            ->getResult();
    }
}