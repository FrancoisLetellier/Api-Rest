<?php
/**
 * Created by PhpStorm.
 * User: topikana
 * Date: 22/05/18
 * Time: 14:49
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Author;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class AuthorController extends Controller
{
    /**
     * @Route("/authors/{id}", name="author_show")
     */
    public function showAction(Author $author)
    {
        $data = $this->get('serializer')->serialize($author, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/authors", name="author_create" )
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        $data = $request->getContent();
        $author = $this->get('serializer')
            ->deserialize($data, 'AppBundle\Entity\Author', 'json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($author);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);
    }
}