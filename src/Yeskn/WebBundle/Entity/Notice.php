<?php

/*
 * This file is part of project yeskn/vmoex.
 *
 * (c) Jaggle <jaggle@yeskn.com>
 *
 * created at 2018-05-27 04:27:25
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yeskn\WebBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Notice
 * @package Yeskn\WebBundle\Entity
 *
 * @ORM\Table(name="notice")
 * @ORM\Entity(repositoryClass="Yeskn\WebBundle\Repository\NoticeRepository")
 */
class Notice
{
    const TYPE_COMMENT_POST = 1;
    const TYPE_FAVORITE_POST = 2;
    const TYPE_THANKS_POST = 3;
    const TYPE_COMMENT_REPLAY = 4;
    const TYPE_THUMBUP_COMMENT = 5;
    const TYPE_BROADCAST = 6;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="type", type="smallint")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Yeskn\WebBundle\Entity\User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="Yeskn\WebBundle\Entity\User")
     * @ORM\JoinColumn(name="push_to", referencedColumnName="id")
     */
    private $pushTo;

    /**
     * @var bool
     * @ORM\Column(name="is_read", type="boolean", options={"default":false})
     */
    private $isRead;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Yeskn\WebBundle\Entity\Post")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     */
    private $object;

    /**
     * @var
     * @ORM\OneToOne(targetEntity="Yeskn\WebBundle\Entity\Comment")
     */
    private $content;

    /**
     * @var
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;



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
     * Set type
     *
     * @param integer $type
     *
     * @return Notice
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set objectId
     *
     * @param Post $object
     *
     * @return Notice
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get objectId
     *
     * @return Post
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Notice
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
     * Set createdBy
     *
     * @param \Yeskn\WebBundle\Entity\User $createdBy
     *
     * @return Notice
     */
    public function setCreatedBy(\Yeskn\WebBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Yeskn\WebBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set pushTo
     *
     * @param \Yeskn\WebBundle\Entity\User $pushTo
     *
     * @return Notice
     */
    public function setPushTo(\Yeskn\WebBundle\Entity\User $pushTo = null)
    {
        $this->pushTo = $pushTo;

        return $this;
    }

    /**
     * Get pushTo
     *
     * @return \Yeskn\WebBundle\Entity\User
     */
    public function getPushTo()
    {
        return $this->pushTo;
    }

    /**
     * Set isRead
     *
     * @param boolean $isRead
     *
     * @return Notice
     */
    public function setIsRead($isRead)
    {
        $this->isRead = $isRead;

        return $this;
    }

    /**
     * Get isRead
     *
     * @return boolean
     */
    public function getIsRead()
    {
        return $this->isRead;
    }

    /**
     * Set content
     *
     * @param \Yeskn\WebBundle\Entity\Comment $content
     *
     * @return Notice
     */
    public function setContent(\Yeskn\WebBundle\Entity\Comment $content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return \Yeskn\WebBundle\Entity\Comment
     */
    public function getContent()
    {
        return $this->content;
    }
}