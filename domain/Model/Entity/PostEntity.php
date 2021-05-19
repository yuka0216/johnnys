<?php

namespace Domain\Model\Entity;

class Post
{

    private $id;
    private $userId;
    private $threadId;
    private $comment;

    public function __construct(PostId $id, PostUserId $userId, PostThreadId $threadId, PostComment $comment)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->threadId = $threadId;
        $this->comment = $comment;
    }
}
