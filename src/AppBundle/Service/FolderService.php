<?php

namespace AppBundle\Service;

use AppBundle\Entity\Folder;
use Doctrine\ORM\EntityManager;

class FolderService
{
    /** @var  EntityManager */
    protected  $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getFolders() {
        return $this->em->getRepository(Folder::class)
            ->createQueryBuilder('f')
            ->select('f, c')
            ->leftJoin('f.children', 'c')
            ->leftJoin('c.children', 'c2')
            ->where('f.parent IS NULL')
            ->getQuery()
            ->getResult();
    }
}