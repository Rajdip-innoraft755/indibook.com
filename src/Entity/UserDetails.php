<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserDetails
 * @ORM\Table(name="user_details", uniqueConstraints={@ORM\UniqueConstraint(name="emailId", columns={"emailId"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserDetailsRepository")
 */
class UserDetails
{
    /**
     * @var string
     *
     * @ORM\Column(name="userId", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="uniqueId", type="string", length=255, nullable=false)
     */
    private $uniqueid;

    /**
     * @var string
     *
     * @ORM\Column(name="fName", type="string", length=20, nullable=false)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="lName", type="string", length=20, nullable=false)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="emailId", type="string", length=50, nullable=false)
     */
    private $emailid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="profilePic", type="string", length=255, nullable=true)
     */
    private $profilepic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bio", type="string", length=255, nullable=true)
     */
    private $bio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Cookie", type="string", length=25, nullable=true)
     */
    private $cookie;

    public function getUserid(): ?string
    {
        return $this->userid;
    }
    public function setUserid(string $userid): self
    {
        $this->userid = $userid;

        return $this;
    }
    public function getUniqueid(): ?string
    {
        return $this->uniqueid;
    }

    public function setUniqueid(string $uniqueid): self
    {
        $this->uniqueid = $uniqueid;

        return $this;
    }

    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function setFname(string $fname): self
    {
        $this->fname = $fname;

        return $this;
    }

    public function getLname(): ?string
    {
        return $this->lname;
    }

    public function setLname(string $lname): self
    {
        $this->lname = $lname;

        return $this;
    }

    public function getEmailid(): ?string
    {
        return $this->emailid;
    }

    public function setEmailid(string $emailid): self
    {
        $this->emailid = $emailid;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getProfilepic(): ?string
    {
        return $this->profilepic;
    }

    public function setProfilepic(?string $profilepic): self
    {
        $this->profilepic = $profilepic;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getCookie(): ?string
    {
        return $this->cookie;
    }

    public function setCookie(?string $cookie): self
    {
        $this->cookie = $cookie;

        return $this;
    }


}
