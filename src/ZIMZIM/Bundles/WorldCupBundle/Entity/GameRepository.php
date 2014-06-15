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


    public function getGamePlayedByDate(\DateTime $date){
        $query = $this->createQueryBuilder('g');
        $query->where('g.date < :date')
            ->andWhere('g.scoreTeamA IS NOT NULL')
            ->andWhere('g.scoreTeamB IS NOT NULL')
            ->setParameter('date', $date)
            ->orderBy('g.date', 'DESC');
        return $query->getQuery()->getResult();
    }

    public function getListGameOfTheDay(\DateTime $date){

        $tomorow = clone $date;
        $tomorow = $tomorow->add(new \DateInterval('P1D'));

        $query = $this->createQueryBuilder('g');
        $query->where('g.date > :dateDay')
            ->andWhere('g.date < :dateTomorow')
            ->setParameter('dateDay', $date)
            ->setParameter('dateTomorow', $tomorow)
            ->orderBy('g.date', 'ASC');
        return $query->getQuery()->getResult();
    }

}
