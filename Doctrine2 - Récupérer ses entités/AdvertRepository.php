<?php
// src/OC/PlatformBundle/Repository/AdvertRepository.php

namespace OC\PlatformBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder; // à ne pas oubier en cas de besoin

class AdvertRepository extends EntityRepository {
	public function myFindAll() {
		// Méthode 1 : en passant par l'EntityManager
		$queryBuilder = $this->_em->createQueryBuilder();
		
		$queryBuilder->select('a')
					 ->from($this->_entityName, 'a');
		
		// Dans un repository, $this->_entityName est le namespace de l'entité gérée 
		// Ici, il vaut donc OC\PlatformBundle\Entity\Advert
		
		// Méthode 2 : en passant par le raccourci (recommandé)
		$queryBuilder = $this->createQueryBuilder('a');
		
		// On n'ajoute pas de critère ou tri particulier, la construction de ma requête est donc finie.
		
		// On récupère la Query à partir du QueryBuilder
		$query = $queryBuilder->getQuery();
		
		// On récupère les résultats à partir de la Query
		$results = $query->getResult();
		
		// On retourne ces résultats
		return $results;
	}
	
	public function myFindOne($id) {
		$queryBuilder = $this->createQueryBuilder('a');
		$queryBuilder->where('a.id = :id')
					 ->setParameter('id', $id);
		
		return $queryBuilder->getQuery()
							->getResult();
	}
	
	public function findByAuthorAndDate($author, $year) {
		$qb = $this->createQueryBuilder('a');
		$qb->where('a.author = :author')
		   	 ->setParameter(':author', $author)
		   ->andwhere('a.date_publication < :year')
		   	 ->setParemeter('year', $year)
		   ->orderBy('a.date_publication', 'DESC');
		
		return $qb->getQuery()
				  ->getResult();
	}
	
	public function whereCurrentYear(QueryBuilder $qb) {
		$qb->andWhere('a.date_publication BETWEEN :start AND :end')
		     ->setParameter('start', new DateTime(date('Y') . '-01-01')) // date entre le 1er janvier de cette année
			 ->setParameter('end', new DateTime(date('Y') . '-12-31'));  // et le 31 décembre de cette année
		return $qb;
	}
	
	public function myFind() {
		$qb = $this->createQueryBuilder('a');
		// On peut ajoute ce qu'on veut avant
		$qb->where('a.author = :author')
			->setParamter('author', 'George');
		
		// On applique notre condition sur le QueryBuilder
		$this->whereCurrentYear($qb);
		
		// On peut ajouter ce qu'on veut après
		$qb->orderBy('a.date_publication', 'DESC');
		
		return $qb->getQuery()
			 	  ->getResult();
	}
	
	public function myFindAllDQL() {
		$query = $this->_em->createQuery('SELECT a FROM OCPlatformBundle:Advert a');
		$resulsts = $query->getResult();
		
		return $resuslts;
	}
	
	public function getAdvertWithApplications() {
		$qb = $this->createQueryBuilder('a');
		$qb->leftJoin('a._applications', 'app')
		   ->addSelect('app');
		
		return $qb->getQuery()
				  ->getResult();
	}	
	
	public function getAdvertWithCategories(array $categoryNames) {
		$qb = $this->createQueryBuilder('a');
			$qb->innerJoin('a._categories', 'cat')
		   ->addSelect('cat');
			
		//Puis on filtre sur le nom des catégories à l'aide d'un IN
		$qb->where($qb->expr()->in('cat._name', $categoryNames));
		// La syntaxe du IN et d'autres expressions se trouve dans la documentation Doctrines
		
		return $qb->getQuery()
				  ->getResult();
	}
}