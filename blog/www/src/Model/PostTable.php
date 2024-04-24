<?php

class PostTable
{   
    private function getPostFromFeatured(mysqli $connection, $f)
    {
        $sql = 'SELECT * FROM post WHERE featured = ' . $f;
        # доделать с prepare
        $result = $connection->query($sql);
        $arr = [];
        while($row = $result->fetch_assoc())
        {
            array_push($arr, $row);
        }
        return $arr;
    }

    public function getMostRecentPosts(mysqli $connection)
    {
        return $this->getPostFromFeatured($connection, 0);
    }

    public function getFeaturedPosts(mysqli $connection)
    {
        return $this->getPostFromFeatured($connection, 1);
    }

    public function getPostById(mysqli $connection, $id)
    {
        $sql = 'SELECT * FROM post WHERE post_id = ' . $id;
        $result = $connection->query($sql);
        return $result->fetch_assoc();
    }

    public function saveData(mysqli $connection, $param)
    {
        $sql = 'INSERT INTO post 
        (title, subtitle, author, publish_date, background_url, author_url, featured, contents) 
        VALUES (
        "' . $param['title'] . '", 
        "' . $param['subtitle'] . '", 
        "' . $param['author'] . '", 
        "' . $param['publish_date'] . '", 
        "' . $param['background_url'] . '", 
        "' . $param['author_url'] . '", 
        "' . $param['featured'] . '", 
        "' . $param['contents'] . '");';
        echo $sql;
        $connection->query($sql);
    }

    public function getMaxId(mysqli $connection) {
        $sql = 'SELECT MAX(`post_id`) FROM post';
        $result = $connection->query($sql);
        return $result->fetch_assoc();
    }
}