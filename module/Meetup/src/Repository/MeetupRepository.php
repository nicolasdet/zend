<?php

declare(strict_types=1);

namespace Meetup\Repository;

use Meetup\Entity\Meetup;
use Doctrine\ORM\EntityRepository;
use \DateTime;

final class MeetupRepository extends EntityRepository
{

    public function add($meetup) : void
    {
        $this->getEntityManager()->persist($meetup);
        $this->getEntityManager()->flush($meetup);
    }

    public function delete ($meetup) : void
    {
    	$this->getEntityManager()->remove($meetup);
        $this->getEntityManager()->flush($meetup);
    }

    public function update($meetup) : void
    {
        $this->getEntityManager()->persist($meetup);
        $this->getEntityManager()->flush($meetup);
    }
    public function createMeetupFromNameAndDescriptionDate(string $name, string $description, datetime $date_debut, datetime $date_fin)
    {

        return new Meetup($name, $description, $date_debut, $date_fin);
    }
}
