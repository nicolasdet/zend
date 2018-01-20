<?php

declare(strict_types=1);

namespace Meetup\Entity;

use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * Class Meetup
 *
 * Attention : Doctrine génère des classes proxy qui étendent les entités, celles-ci ne peuvent donc pas être finales !
 *
 * @package Application\Entity
 * @ORM\Entity(repositoryClass="\Meetup\Repository\MeetupRepository")
 * @ORM\Table(name="meetup")
 */
class Meetup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     **/
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=2000, nullable=false)
     */
    private $description = '';

     /**
     * @ORM\Column(type="datetime")
     */
    private $date_debut = '';

     /**
     * @ORM\Column(type="datetime")
     */
    private $date_fin = '';
    
    public function __construct(string $title, string $description = '', datetime $date_debut, datetime $date_fin)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->title = $title;
        $this->description = $description;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
    }


    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

        public function getDateDebut() : datetime
    {
        return $this->date_debut;
    }

    public function setDateDebut(datetime $date_debut) : void
    {
        $this->date_debut = $date_debut;
    }

        public function getDateFin() : datetime
    {
        return $this->date_fin;
    }

    public function setDdateFin(datetime $date_fin) : void
    {
        $this->date_fin = $date_fin;
    }
}
