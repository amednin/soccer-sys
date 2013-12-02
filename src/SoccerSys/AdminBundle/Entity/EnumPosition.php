<?php

namespace SoccerSys\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="enum_position")
 */
class EnumPosition 
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
  protected $position;
  
  /**
   * @ORM\Column(type="text")
   */
  protected $description;
  
  /**
   * @ORM\OneToMany(targetEntity="SoccerSys\FrontendBundle\Entity\Player", mappedBy="position")
   **/
  protected $players;
  
  /**
   * @ORM\OneToMany(targetEntity="SoccerSys\FrontendBundle\Entity\Pimp", mappedBy="position")
   **/
  protected $pimps;
  
  /**
   * @ORM\Column(name="created_at", type="datetime")
   */
  protected $createdAt;
  
  /**
   * @ORM\Column(name="upated_at", type="datetime")
   */
  protected $updatedAt;
  
  /**
   * Constructor
   */
  public function __construct()
  {
    $this->players = new \Doctrine\Common\Collections\ArrayCollection();
    $this->pimps = new \Doctrine\Common\Collections\ArrayCollection();
    $this->createdAt = new \DateTime("now");
    $this->updatedAt = new \DateTime('now');
  }
  
  public function __toString() 
  {
    return $this->position;
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
     * Set position
     *
     * @param string $position
     * @return EnumPosition
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return EnumPosition
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add players
     *
     * @param \SoccerSys\FrontendBundle\Entity\Player $players
     * @return EnumPosition
     */
    public function addPlayer(\SoccerSys\FrontendBundle\Entity\Player $players)
    {
        $this->players[] = $players;
    
        return $this;
    }

    /**
     * Remove players
     *
     * @param \SoccerSys\FrontendBundle\Entity\Player $players
     */
    public function removePlayer(\SoccerSys\FrontendBundle\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Add pimps
     *
     * @param \SoccerSys\FrontendBundle\Entity\Pimp $pimps
     * @return EnumPosition
     */
    public function addPimp(\SoccerSys\FrontendBundle\Entity\Pimp $pimps)
    {
        $this->pimps[] = $pimps;
    
        return $this;
    }

    /**
     * Remove pimps
     *
     * @param \SoccerSys\FrontendBundle\Entity\Pimp $pimps
     */
    public function removePimp(\SoccerSys\FrontendBundle\Entity\Pimp $pimps)
    {
        $this->pimps->removeElement($pimps);
    }

    /**
     * Get pimps
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPimps()
    {
        return $this->pimps;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return EnumPosition
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
     * @return EnumPosition
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
    
    /**
     * @ORM\PrePersist
     */
    public function updateDateBeforeSave()
    {
      $this->updatedAt = new \DateTime('now');
    }
}