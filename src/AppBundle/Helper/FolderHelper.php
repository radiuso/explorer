<?php

namespace AppBundle\Helper;

use AppBundle\Entity\Folder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class FolderHelper
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
            ->select('f, c, c2, file, filec, filec2')
            ->leftJoin('f.children', 'c')
            ->leftJoin('c.children', 'c2')
            ->leftJoin('f.files', 'file')
            ->leftJoin('c.files', 'filec')
            ->leftJoin('c2.files', 'filec2')
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
        $qb = $this->getFoldersQuery();

        if ($val !== '' && $val !== null) {
            $qb
                ->andWhere('f.name LIKE :filename 
                OR c.name LIKE :filename
                OR c2.name LIKE :filename
                OR file.name LIKE :filename
                OR filec.name LIKE :filename
                OR filec2.name LIKE :filename')
                ->setParameters([
                    'filename' => "%$val%",
                ]);
        }

        return $qb->getQuery()->getResult();
    }
}