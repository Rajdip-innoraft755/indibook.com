<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="postAuthorId", columns={"postAuthorId"})})
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @var string
     *
     * @ORM\Column(name="postId", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $postid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postContent", type="string", length=255, nullable=true)
     */
    private $postcontent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postImage", type="string", length=255, nullable=true)
     */
    private $postimage;

    /**
     * @var int|null
     *
     * @ORM\Column(name="postReact", type="integer", nullable=true)
     */
    private $postreact;

    /**
     * @var int|null
     *
     * @ORM\Column(name="postComment", type="integer", nullable=true)
     */
    private $postcomment;

    /**
     * @var UserDetails
     *
     * @ORM\ManyToOne(targetEntity="UserDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="postAuthorId", referencedColumnName="userId")
     * })
     */
    private $postauthorid;

    public function getPostid(): ?string
    {
        return $this->postid;
    }

    public function getPostcontent(): ?string
    {
        return $this->postcontent;
    }

    public function setPostcontent(?string $postcontent): self
    {
        $this->postcontent = $postcontent;

        return $this;
    }

    public function getPostimage(): ?string
    {
        return $this->postimage;
    }

    public function setPostimage(?string $postimage): self
    {
        $this->postimage = $postimage;

        return $this;
    }

    public function getPostreact(): ?int
    {
        return $this->postreact;
    }

    public function setPostreact(?int $postreact): self
    {
        $this->postreact = $postreact;

        return $this;
    }

    public function getPostcomment(): ?int
    {
        return $this->postcomment;
    }

    public function setPostcomment(?int $postcomment): self
    {
        $this->postcomment = $postcomment;

        return $this;
    }

    public function getPostauthorid(): ?UserDetails
    {
        return $this->postauthorid;
    }

    public function setPostauthorid(?UserDetails $postauthorid): self
    {
        $this->postauthorid = $postauthorid;

        return $this;
    }


}
