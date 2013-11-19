<?php

namespace SoccerSys\AdminBundle\Entity;

/**
 * Description of Player
 *
 * @author amed
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
   * @ORM\Column(name="last_name", type="string", length=100)
   */
  protected $position;
  
  /**
   * @ORM\Column(name="last_name", type="string", length=100)
   */
  protected $number;
  
  /**
   * @ManyToOne(targetEntity="Team", inversedBy="players")
   * @JoinColumn(name="team_id", referencedColumnName="id")
   */
  protected $team;
}

?>
