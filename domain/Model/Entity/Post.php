<?php

namespace Domain\Model\Entity;

use DateTime;
use Domain\Model\ValueObject\PostComment;
use Domain\Model\ValueObject\PostThreadId;
use Domain\Model\ValueObject\PostId;
use Domain\Model\Entity\User;

final class Post
{
    private $id;
    private $user;
    private $threadId;
    private $comment;
    private $images;
    private $createdAt;

    public function __construct(PostId $id, User $user, PostThreadId $threadId, PostComment $comment, array $images, ?DateTime $createdAt)
    {
        $this->id = $id;
        $this->user = $user;
        $this->threadId = $threadId;
        $this->comment = $comment;
        $this->images = $images;
        $this->createdAt = $createdAt;
    }

    public function id(): PostId
    {
        return $this->id;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function threadId(): PostThreadId
    {
        return $this->threadId;
    }

    public function comment(): PostComment
    {
        return $this->comment;
    }

    public function images(): array
    {
        return $this->images;
    }

    public function createdAt(): ?DateTime
    {
        return $this->createdAt;
    }

    //判定メソッドの例（コメントが２０文字以上か、trueかfalseを返す)
    //文字数制限が変わったらココを変えればよいだけ
    // public function isLongComment(): bool
    // {
    //     return (mb_strlen($this->comment) > 20);
    // }
}
