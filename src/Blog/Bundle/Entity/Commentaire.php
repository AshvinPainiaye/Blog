<?php

namespace Blog\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Commentaire
*
* @ORM\Table(name="commentaire")
* @ORM\Entity(repositoryClass="Blog\Bundle\Repository\CommentaireRepository")
*/
class Commentaire
{
  /**
  * @var int
  *
  * @ORM\Column(name="id", type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $id;

  /**
  * @var string
  *
  * @ORM\Column(name="commentaire", type="string", length=255)
  */
  private $commentaire;


  /**
  * @var \DateTime
  *
  * @ORM\Column(name="date", type="datetime")
  */
  private $date;


  /**
  * @ORM\ManyToOne(targetEntity="User", inversedBy="commentaire")
  * @ORM\JoinColumn(name="users_id", referencedColumnName="id")
  */
  private $user;

  /**
  * @ORM\ManyToOne(targetEntity="Article", inversedBy="commentaire")
  * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
  */
  private $article;


  /**
   * @var
   * @ORM\ManyToMany(targetEntity="User", mappedBy="commentairelikes")
   */
  public $likes;


  /**
   * @var
   * @ORM\ManyToMany(targetEntity="Article", mappedBy="articlelikes")
   */
  public $likesArticle;

  /**
  * Get id
  *
  * @return int
  */
  public function getId()
  {
    return $this->id;
  }

  /**
  * Set commentaire
  *
  * @param string $commentaire
  *
  * @return Commentaire
  */
  public function setCommentaire($commentaire)
  {
    $this->commentaire = $commentaire;

    return $this;
  }

  /**
  * Get commentaire
  *
  * @return string
  */
  public function getCommentaire()
  {
    return $this->commentaire;
  }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commentaire
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Set user
     *
     * @param \Blog\Bundle\Entity\User $user
     *
     * @return Commentaire
     */
    public function setUser(\Blog\Bundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Blog\Bundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set article
     *
     * @param \Blog\Bundle\Entity\Article $article
     *
     * @return Commentaire
     */
    public function setArticle(\Blog\Bundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \Blog\Bundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->likes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add like
     *
     * @param \Blog\Bundle\Entity\User $like
     *
     * @return Commentaire
     */
    public function addLike(\Blog\Bundle\Entity\User $like)
    {
        $this->likes[] = $like;

        return $this;
    }

    /**
     * Remove like
     *
     * @param \Blog\Bundle\Entity\User $like
     */
    public function removeLike(\Blog\Bundle\Entity\User $like)
    {
        $this->likes->removeElement($like);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Add likesArticle
     *
     * @param \Blog\Bundle\Entity\Article $likesArticle
     *
     * @return Commentaire
     */
    public function addLikesArticle(\Blog\Bundle\Entity\Article $likesArticle)
    {
        $this->likesArticle[] = $likesArticle;

        return $this;
    }

    /**
     * Remove likesArticle
     *
     * @param \Blog\Bundle\Entity\Article $likesArticle
     */
    public function removeLikesArticle(\Blog\Bundle\Entity\Article $likesArticle)
    {
        $this->likesArticle->removeElement($likesArticle);
    }

    /**
     * Get likesArticle
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLikesArticle()
    {
        return $this->likesArticle;
    }
}
