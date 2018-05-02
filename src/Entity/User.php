<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    private $website;
    /**
     * @ORM\Column(type="string")
     */
    private $linkedIn;
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }
    /**
     * @param mixed $website
     */
    public function setWebsite($website): void
    {
        $this->website = $website;
    }
    /**
     * @return mixed
     */
    public function getLinkedIn()
    {
        return $this->linkedIn;
    }
    /**
     * @param mixed $linkedIn
     */
    public function setLinkedIn($linkedIn): void
    {
        $this->linkedIn = $linkedIn;
    }
}