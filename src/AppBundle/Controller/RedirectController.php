<?php
/**
 * Created by PhpStorm.
 * User: radiusario
 * Date: 16/09/2017
 * Time: 18:30
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RedirectController extends Controller
{
    /**
     * @Route("/{url}", name="remove_trailing_slash",
     *     requirements={"url" = ".*\/$"}, methods={"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeTrailingSlashAction(Request $request)
    {
        $pathInfo = $request->getPathInfo();
        $requestUri = $request->getRequestUri();

        $url = str_replace($pathInfo, rtrim($pathInfo, ' /'), $requestUri);

        return $this->redirect($url, 301);
    }
}