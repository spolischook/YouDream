<?php

namespace GeekHub\UserBundle\Controller\Api;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\FOSRestController,
    FOS\RestBundle\Controller\Annotations\View,
    FOS\RestBundle\Controller\Annotations\QueryParam,
    FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use GeekHub\UserBundle\Document\User;

class UserController extends FOSRestController
{
    /**
     * @ApiDoc(
     * description="Get users",
     * statusCodes={
     *      200="Returned when users are fetched and send to client",
     *  },
     *  section="User",
     *  output=""
     * )
     * @return array
     */
    public function getUsersAction()
    {
        $users = $this->get('doctrine_mongodb')->getRepository('GeekHubUserBundle:User')->findAll();

        return array('users' => $users->toArray());
    }

    /**
     * @ApiDoc(
     * description="Get user",
     * statusCodes={
     *      200="Returned when user is fetched and send to client",
     *      404="Returned when user with slug not found"
     *  },
     *  section="User",
     *  output=""
     * )
     * @param $user
     * @ParamConverter("user", class="GeekHubUserBundle:User", converter="doctrine.odm", options={"mapping": {"user" : "slug"}})
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @return mixed|void
     */
    public function getUserAction(User $user)
    {
        return array('user' => $user);
    }
}
