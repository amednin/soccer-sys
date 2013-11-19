<?php

namespace SoccerSys\AdminBundle\Entity;

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
   **/
  protected $players;
  
  protected $pimp;
}

?>
