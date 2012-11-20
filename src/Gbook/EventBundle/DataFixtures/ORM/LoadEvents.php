<?php
namespace Gbook\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gbook\EventBundle\Entity\Event;

class LoadUserData implements FixtureInterface
{
/**
* {@inheritDoc}
*/
public function load(ObjectManager $manager)
{
    $message = 'A controller is a fancy name for a PHP function or
    method that handles incoming requests and returns responses
    (often HTML code). Instead of using the PHP global variables
    and functions (like $_GET or header()) to manage these HTTP
    messages, Symfony uses objects: Request and Response. The
    simplest possible controller might create the response by hand,
    based on the request';

    for ($i = 0; $i < 100; $i++) {
        $post = new Event();
        $post->setName("FixturesUser$i");
        $post->setEmail("Fixturesuser$i@test.ru");
        $post->setTextbox($message);

        $manager->persist($post);
    }
    $manager->flush();
    }
}