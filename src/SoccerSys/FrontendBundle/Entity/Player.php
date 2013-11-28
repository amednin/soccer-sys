<?php

namespace SoccerSys\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="player")
 */
class Player 
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
   * @ORM\Column(name="number", type="string", length=100)
   */
  protected $number;
  
  /**
   * @ORM\ManyToOne(targetEntity="Team", inversedBy="players")
   * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
   */
  protected $team;
  
  /**
   * @ORM\ManyToOne(targetEntity="SoccerSys\AdminBundle\Entity\EnumPosition", inversedBy="players")
   * @ORM\JoinColumn(name="enum_position_id", referencedColumnName="id")
   */
  protected $position;
  
  /**
   * @ORM\Column(name="created_at", type="datetime")
   */
  protected $createdAt;
  
  /**
   * @ORM\Column(name="upated_at", type="datetime")
   */
  protected $updatedAt;

  
  public function __construct()
  {
    $this->createdAt = new \DateTime("now");
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
     * @return Player
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
     * @return Player
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
     * Set number
     *
     * @param string $number
     * @return Player
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set team
     *
     * @param \SoccerSys\FrontendBundle\Entity\Team $team
     * @return Player
     */
    public function setTeam(\SoccerSys\FrontendBundle\Entity\Team $team = null)
    {
        $this->team = $team;
    
        return $this;
    }

    /**
     * Get team
     *
     * @return \SoccerSys\FrontendBundle\Entity\Team 
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set position
     *
     * @param \SoccerSys\AdminBundle\Entity\EnumPosition $position
     * @return Player
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Player
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Player
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}