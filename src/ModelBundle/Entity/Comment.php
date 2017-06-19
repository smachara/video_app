<?php

namespace ModelBundle\Entity;

/**
 * Comment
 */
class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $videoId;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $body;

    /**
     * @var \DateTime
     */
    private $createdAt;


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
     * Set videoId
     *
     * @param integer $videoId
     *
     * @return Comment
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;

        return $this;
    }

    /**
     * Get videoId
     *
     * @return int
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Comment
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Comment
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Comment
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
}

