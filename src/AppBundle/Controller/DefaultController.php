<?php

namespace AppBundle\Controller;

use AppBundle\Service\FolderService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

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

    /**
     * @Route("/search/{research}", name="search")
     * @param FolderService $folderService
     * @param string $research
     * @return JsonResponse
     */
    public function searchAction(FolderService $folderService, $research)
    {
        $folders = $folderService->search($research);
        return new JsonResponse([
            'folders' => $folders,
        ]);
    }
}
