<?php

namespace AppBundle\Entity;

use AppBlundle\Entity\Membre;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     *  
     * Une commande n'a qu'un seul membre
     * On dit que on est du coté propriétaire
     * 
     * @ORM\ManyToOne(targetEntity="Membre", inversedBy="commandes")
     * @ORM\JoinColumn(name="membre_id", referencedColumnName="id")
     *  on a la clé etrangère (name) et primary kley (ColumnName)
     */
    private $membreId; // objet Membre




    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnregistrement", type="datetime", nullable=false)
     */
    private $dateenregistrement;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=50, nullable=false)
     */
    private $etat;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set membreId
     *
     * @param integer $membreId
     *
     * @return Commande
     */
    public function setMembreId(Membre $membreId)
    {
        $this->membreId = $membreId;

        return $this;
    }

    /**
     * Get membreId
     *
     * @return integer
     */
    public function getMembreId()
    {
        return $this->membreId;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Commande
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set dateenregistrement
     *
     * @param \DateTime $dateenregistrement
     *
     * @return Commande
     */
    public function setDateenregistrement($dateenregistrement)
    {
        $this->dateenregistrement = $dateenregistrement;

        return $this;
    }

    /**
     * Get dateenregistrement
     *
     * @return \DateTime
     */
    public function getDateenregistrement()
    {
        return $this->dateenregistrement;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Commande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
