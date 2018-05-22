<?php
/**
 * Created by PhpStorm.
 * User: topikana
 * Date: 22/05/18
 * Time: 14:06
 */

namespace AppBundle\Serializer\Handler;


use AppBundle\Entity\Article;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonSerializationVisitor;

class ArticleHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'AppBundle\Entity\Article',
                'method' => 'serialize',
            ]
        ];
    }

    public function serialize(JsonSerializationVisitor $visitor, Article $article, array $type, Context $context )
    {
        $date = new \DateTime();

        return
        [
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'field' => $date->format('l jS \of F Y h:i:s A')

        ];
    }
}