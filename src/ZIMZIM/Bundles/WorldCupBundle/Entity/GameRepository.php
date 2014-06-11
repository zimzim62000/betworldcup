<?php


namespace ZIMZIM\Bundles\WorldCupBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\SecurityContext;

class GameRepository extends EntityRepository
{
    public function getListByUser($source, SecurityContext $securityContext){

        $tableAlias = $source->getTableAlias();

        $source->manipulateQuery(
            function ($query) use ($tableAlias, $securityContext) {
                return;
                $user = $securityContext->getToken()->getUser();
                $query
                    ->leftJoin($tableAlias.'.gameBets', 'gb')
                    ->andWhere('gb.user = :iduser')
                    ->setParameter('iduser', $user->getId());
            }
        );
        return $source;
    }


    public function getGameByDate(\DateTime $date){
        $query = $this->createQueryBuilder('g');
        $query->where('g.date < :date')
            ->setParameter('date', $date);
        return $query->getQuery()->getResult();
    }
}
