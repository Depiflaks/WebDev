<?php

class PostTable
{   
    public function __construct(private mysqli $connection)
    {
        
    }

    private function getPostByFeatured(string $f)
    {
        
        $sql = "SELECT * FROM post WHERE featured={$f}";
        $result = $this->connection->query($sql);
        $arr = [];
        while($row = $result->fetch_assoc())
        {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function getMostRecentPosts()
    {
        return $this->getPostByFeatured("0");
    }

    public function getFeaturedPosts()
    {
        return $this->getPostByFeatured("1");
    }

    public function getPostById($id)
    {
        $sql = 'SELECT * FROM post WHERE post_id = ' . $id;
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    public function saveData($param): int
    {
        $sql = 'INSERT INTO post 
        (title, subtitle, author, publish_date, background_url, author_url, featured, contents) 
        VALUES (
        "' . $param['title'] . '", 
        "' . $param['subtitle'] . '", 
        "' . $param['author'] . '", 
        "' . $param['publish_date'] . '", 
        "none", 
        "none", 
        "' . $param['featured'] . '", 
        "' . $param['contents'] . '");';
        $this->connection->query($sql);
        return (int)$this->connection->insert_id;
    }

    public function addImagesUrl(string $hero, string $avatar, int $id): void
    {
        $sql = "UPDATE post SET background_url='{$hero}', author_url='{$avatar}' 
        WHERE post_id={$id};";
        echo $sql;
        $this->connection->query($sql);
    }

    public function getMaxId() {
        return (int)$this->connection->insert_id;
    }
}