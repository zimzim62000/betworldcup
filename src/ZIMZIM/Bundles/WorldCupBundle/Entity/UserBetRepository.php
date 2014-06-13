<?php


namespace ZIMZIM\Bundles\WorldCupBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\SecurityContext;

class UserBetRepository extends EntityRepository
{
    public function getDataUserBetGame($source, SecurityContext $securityContext){
        return $source;
    }

}
