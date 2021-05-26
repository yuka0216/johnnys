<?php

namespace Domain\Model\Entity;

use DateTime;
use Domain\Model\ValueObject\PostComment;
use Domain\Model\ValueObject\PostThreadId;
use Domain\Model\ValueObject\PostUserId;
use Domain\Model\ValueObject\PostId;
use phpDocumentor\Reflection\Types\Boolean;

class Post
{
    private $id;
    private $userId;
    private $threadId;
    private $comment;
    private $createdAt;

    public function __construct(PostId $id, PostUserId $userId, PostThreadId $threadId, PostComment $comment, ?DateTime $createdAt)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->threadId = $threadId;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
    }

    public function id(): PostId
    {
        return $this->id;
    }

    public function userId(): PostUserId
    {
        return $this->userId;
    }

    public function threadId(): PostThreadId
    {
        return $this->threadId;
    }

    public function comment(): PostComment
    {
        return $this->comment;
    }

    public function createdAt(): ?DateTime
    {
        return $this->createdAt;
    }

    //判定メソッドの例（コメントが２０文字以上か、trueかfalseを返す)
    //文字数制限が変わったらココを変えればよいだけ
    public function isLongComment(): bool
    {
        return (mb_strlen($this->comment) > 20);
    }
}
