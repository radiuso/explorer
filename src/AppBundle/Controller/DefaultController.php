<?php

namespace AppBundle\Controller;

use AppBundle\Service\FolderService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param FolderService $folderService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(FolderService $folderService)
    {
        $folders = $folderService->getFolders();
        return $this->render('default/index.html.twig', [
            'folders' => $folders,
        ]);
    }
}
