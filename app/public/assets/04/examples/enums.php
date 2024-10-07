<?php

enum Status
{
    case DRAFT;
    case PUBLISHED;
    case ARCHIVED;

    public function color(): string
    {
        return match ($this) {
            self::DRAFT => 'grey',
            self::PUBLISHED => 'green',
            self::ARCHIVED => 'red',
        };
    }
}

class BlogPost
{
    public function __construct(
        public Status $status,
    )
    {
    }
}

$post = new BlogPost(Status::DRAFT);
echo $post->status->color();
