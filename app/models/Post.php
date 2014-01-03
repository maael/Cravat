<?php
class Post{
    protected $id;
    protected $blog_id;
    protected $user_id;
    protected $title;
    protected $content;
    protected $created;
    public function getId()
    {
        return $this->id;
    }
    public function getBlogId()
    {
        return $this->blog_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getCreated()
    {
        return $this->created;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setContent($content)
    {
        $this->content = $content;
    } 
}