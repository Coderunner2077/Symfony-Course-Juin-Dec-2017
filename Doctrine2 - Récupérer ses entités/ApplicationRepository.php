<?php
// src/OC/PlatformBundle/Repository/ApplicationRepository.php

namespace OC\PlatformBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ApplicationRepository extends EntityRepository {
	public function getApplicationWithAdvert($limit) {
		$limit = (int) $limit;
		$qb = $this->createQueryBuilder('a');
		$qb->leftJoin('a._advert', 'ad')
		   ->addSelect('ad')
		   ->setMaxResult($limit)
		   ->orderBy('a._date', 'DESC');
		
		return $qb->getQuery()
				  ->getResult();
	}
}