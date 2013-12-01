<?php

namespace GeekHub\DreamBundle\Controller\Api;

use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations\View,
    FOS\RestBundle\Controller\Annotations\QueryParam,
    FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class DreamController extends FOSRestController
{
    /**
     * @ApiDoc(
     * description="Get dreams",
     * statusCodes={
     *      200="Returned when dreams are fetched and send to client",
     *  },
     *  section="Dream",
     *  output=""
     * )
     *
     * @QueryParam(name="count", requirements="\d+", default="8", description="Count of dreams")
     * @param ParamFetcher $paramFetcher
     * @View("DreamBundle:Dream:list.html.twig")
     * @return Response
     */
    public function getDreamsAction(ParamFetcher $paramFetcher, Request $request)
    {
        $count = $paramFetcher->get('count');
        $dreams = $this->get('doctrine_mongodb')->getRepository('DreamBundle:Dream')->findBy(array(), null, $count);

        return array('dreams' => $dreams->toArray());
    }
}