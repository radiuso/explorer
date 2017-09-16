<?php

namespace AppBundle\Service;

use AppBundle\Entity\Folder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class FolderService
{
    /** @var  EntityManager */
    protected  $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function getFoldersQuery()
    {
        return $this->em->getRepository(Folder::class)
            ->createQueryBuilder('f')
            ->select('f, c')
            ->leftJoin('f.children', 'c')
            ->leftJoin('c.children', 'c2')
            ->where('f.parent IS NULL');
    }

    /**
     * @return array
     */
    public function getFolders() {
        return $this->getFoldersQuery()
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $val string value
     * @return array
     */
    public function search($val)
    {
        return $this->getFoldersQuery()
            ->andWhere('c.name LIKE :filename OR c2.name LIKE :filename')
            ->setParameters([
                'filename' => "%$val%",
            ])
            ->getQuery()
            ->getResult();
    }
}