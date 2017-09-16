<?php

namespace AppBundle\Controller;

use AppBundle\Service\FolderService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/search/{research}", name="search", defaults={"research": null})
     * @param FolderService $folderService
     * @param string $research
     * @return Response
     */
    public function searchAction(FolderService $folderService, $research = null)
    {
        $folders = $folderService->search($research);
        $serializer = $this->get('jms_serializer');
        $jsonFolders = $serializer->serialize($folders, 'json');

        return new Response($jsonFolders);
    }
}
