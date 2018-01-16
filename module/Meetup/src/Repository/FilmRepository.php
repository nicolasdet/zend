<?php

declare(strict_types=1);

namespace Meetup\Repository;

use Meetup\Entity\Film;
use Doctrine\ORM\EntityRepository;

final class FilmRepository extends EntityRepository
{

    public function add($film) : void
    {
        $this->getEntityManager()->persist($film);
        $this->getEntityManager()->flush($film);
    }

    public function createFilmFromNameAndDescription(string $name, string $description)
    {
        return new Film($name, $description);
    }
}
