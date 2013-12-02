<?php

namespace SoccerSys\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="game")
 */
class Match 
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
  /**
   * @ORM\OneToMany(targetEntity="Team", mappedBy="match")
   */
  protected $teams;  
  
  /**
   * @ORM\Column(name="result_team2", type="smallint", nullable=true)
   */
  protected $resultTeam2;    
  
  /**
   * @ORM\Column(name="result_team1", type="smallint", nullable=true)
   */
  protected $resultTeam1;    
    
  /**
   * @ORM\Column(name="match_date", type="datetime")
   */
  protected $matchDate;
  
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
      $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set resultTeam2
     *
     * @param integer $resultTeam2
     * @return Match
     */
    public function setResultTeam2($resultTeam2)
    {
        $this->resultTeam2 = $resultTeam2;
    
        return $this;
    }

    /**
     * Get resultTeam2
     *
     * @return integer 
     */
    public function getResultTeam2()
    {
        return $this->resultTeam2;
    }

    /**
     * Set resultTeam1
     *
     * @param integer $resultTeam1
     * @return Match
     */
    public function setResultTeam1($resultTeam1)
    {
        $this->resultTeam1 = $resultTeam1;
    
        return $this;
    }

    /**
     * Get resultTeam1
     *
     * @return integer 
     */
    public function getResultTeam1()
    {
        return $this->resultTeam1;
    }

    /**
     * Set matchDate
     *
     * @param \DateTime $matchDate
     * @return Match
     */
    public function setMatchDate($matchDate)
    {
        $this->matchDate = $matchDate;
    
        return $this;
    }

    /**
     * Get matchDate
     *
     * @return \DateTime 
     */
    public function getMatchDate()
    {
        return $this->matchDate;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Match
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
     * @return Match
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
     * Add teams
     *
     * @param \SoccerSys\FrontendBundle\Entity\Team $teams
     * @return Match
     */
    public function addTeam(\SoccerSys\FrontendBundle\Entity\Team $teams)
    {
        $this->teams[] = $teams;
    
        return $this;
    }

    /**
     * Remove teams
     *
     * @param \SoccerSys\FrontendBundle\Entity\Team $teams
     */
    public function removeTeam(\SoccerSys\FrontendBundle\Entity\Team $teams)
    {
        $this->teams->removeElement($teams);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeams()
    {
        return $this->teams;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function updateDateBeforeSave()
    {
      $this->updatedAt = new \DateTime('now');
    }
}