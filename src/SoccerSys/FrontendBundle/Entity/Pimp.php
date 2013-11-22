<?php

namespace SoccerSys\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pimp")
 */
class Pimp 
{
  
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
  /**
   * @ORM\Column(type="string", length=100)
   */
  protected $name;
  
  /**
   * @ORM\Column(name="last_name", type="string", length=100)
   */
  protected $lastName;
  
  /**
   * @ORM\ManyToOne(targetEntity="SoccerSys\AdminBundle\Entity\EnumPosition", inversedBy="pimps")
   * @ORM\JoinColumn(name="enum_position_id", referencedColumnName="id")
   */
  protected $position;
  
  /**
   * @ORM\OneToMany(targetEntity="Team", mappedBy="pimp")
   */
  protected $team;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->team = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set name
     *
     * @param string $name
     * @return Pimp
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Pimp
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set position
     *
     * @param \SoccerSys\AdminBundle\Entity\EnumPosition $position
     * @return Pimp
     */
    public function setPosition(\SoccerSys\AdminBundle\Entity\EnumPosition $position = null)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return \SoccerSys\AdminBundle\Entity\EnumPosition 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add team
     *
     * @param \SoccerSys\FrontendBundle\Entity\Team $team
     * @return Pimp
     */
    public function addTeam(\SoccerSys\FrontendBundle\Entity\Team $team)
    {
        $this->team[] = $team;
    
        return $this;
    }

    /**
     * Remove team
     *
     * @param \SoccerSys\FrontendBundle\Entity\Team $team
     */
    public function removeTeam(\SoccerSys\FrontendBundle\Entity\Team $team)
    {
        $this->team->removeElement($team);
    }

    /**
     * Get team
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeam()
    {
        return $this->team;
    }
}