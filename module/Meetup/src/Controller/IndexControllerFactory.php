<?php

declare(strict_types=1);

namespace Meetup\Controller;

use Meetup\Entity\Film;
use Meetup\Form\MeetupForm;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

final class IndexControllerFactory
{
    public function __invoke(ContainerInterface $container) : IndexController
    {
        $filmRepository = $container->get(EntityManager::class)->getRepository(Film::class);
        $filmForm = $container->get(MeetupForm::class);

        return new IndexController($filmRepository, $filmForm);
    }
}
