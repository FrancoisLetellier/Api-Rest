<?php
/**
 * Created by PhpStorm.
 * User: topikana
 * Date: 16/05/18
 * Time: 16:44
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Article;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ArticleController
 * @package AppBundle\Controller4
 */
class ArticleController extends Controller
{
    /**
     * @Route("/articles", name="article_create")
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        $data = $request->getContent();
        $article = $this->get('jms_serializer')
            ->deserialize($data, 'AppBundle\Entity\Article', 'json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);
    }

    /**
     * @Route("/articles/{id}", name="article_show")
     */
    public function showAction()
    {
        $article = new Article();
        $article
            ->setTitle('Mon premier article')
            ->setContent('Le contenu de mon article.')
        ;
        $data = $this->get('jms_serializer')->serialize($article, 'json', SerializationContext::create()->setGroups('detail'));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }



    /**
     * @Route("/articles", name="article_list")
     */
    public function listAction()
    {
        $article = $this->getDoctrine()->getRepository('AppBundle:Article')->findAll();
        $data = $this->get('jms_serializer')->serialize($article, 'json', SerializationContext::create()->setGroups('list'));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }




}