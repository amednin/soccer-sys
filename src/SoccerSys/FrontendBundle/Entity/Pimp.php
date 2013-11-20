<?php

namespace SoccerSys\AdminBundle\Entity;

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
   * @ManyToOne(targetEntity="SoccerSys\AdminBundle\Entity\EnumPosition", inversedBy="pimps")
   * @JoinColumn(name="enum_position_id", referencedColumnName="id")
   */
  protected $position;
}

?>
