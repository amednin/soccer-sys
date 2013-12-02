<?php

namespace SoccerSys\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="team")
 */
class Team 
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
   * @ORM\Column(type="text")
   */
  protected $description;
  
  /**
   * @ORM\OneToMany(targetEntity="Player", mappedBy="team")
   */
  protected $players;
  
  /**
   * @ORM\ManyToOne(targetEntity="Pimp", inversedBy="teams")
   * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
   */
  protected $pimp;
  
  /**
   * @ORM\ManyToOne(targetEntity="Match", inversedBy="teams")
   * @ORM\JoinColumn(name="match_id", referencedColumnName="id")
   **/
  protected $match;
  
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
    $this->createdAt = new \DateTime("now");
    $this->updatedAt = new \DateTime('now');
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
     * @return Team
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
     * Set description
     *
     * @param string $description
     * @return Team
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
     * @return Team
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
     * Set pimp
     *
     * @param \SoccerSys\FrontendBundle\Entity\Pimp $pimp
     * @return Team
     */
    public function setPimp(\SoccerSys\FrontendBundle\Entity\Pimp $pimp = null)
    {
        $this->pimp = $pimp;
    
        return $this;
    }

    /**
     * Get pimp
     *
     * @return \SoccerSys\FrontendBundle\Entity\Pimp 
     */
    public function getPimp()
    {
        return $this->pimp;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Team
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
     * @return Team
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
     * Set match
     *
     * @param \SoccerSys\FrontendBundle\Entity\Match $match
     * @return Team
     */
    public function setMatch(\SoccerSys\FrontendBundle\Entity\Match $match = null)
    {
        $this->match = $match;
    
        return $this;
    }

    /**
     * Get match
     *
     * @return \SoccerSys\FrontendBundle\Entity\Match 
     */
    public function getMatch()
    {
        return $this->match;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function updateDateBeforeSave()
    {
      $this->updatedAt = new \DateTime('now');
    }
}