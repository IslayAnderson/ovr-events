<?php

class Event
{
    public $title;
    public $id;
    public $description;
    public $game;
    public $categories;
    public $date;
    public $time;
    public $author;
    public $image1;
    public $image2;
    public $image3;
    public $image4;
    public $image5;
    public $approved;

    function __construct($id = null, $title = null, $description = null, $game = null, $categories = null, $date = null, $time = null, $author = null, $image1 = null, $image2 = null, $image3 = null, $image4 = null, $image5 = null, $approved = null){
        $data = new DataAccess();
        if($id == null){
            $sql = "INSERT INTO `events`(`title`, `description`, `game`, `categories`, `date`, `time`, `author`, `image1`, `image2`, `image3`, `image4`, `image5`, `approved`) 
                                    VALUES ($title, $description, $game, $categories, $date, $time, $author, $image1, $image2, $image3, $image4, $image5, $approved)";
            $results = $data->Fetch($sql, null);
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->game = $game;
            $this->categories = $categories;
            $this->date = $date;
            $this->time = $time;
            $this->author = $author;
            $this->image1 = $image1;
            $this->image2 = $image2;
            $this->image3 = $image3;
            $this->image4 = $image4;
            $this->image5 = $image5;
            $this->approved = $approved;
        }else{
            $sql = "select * from events where id = ".$id;
            $results = $data->Fetch($sql, null);
            $this->id = $id;
            $this->title = $results[0]->title;
            $this->description = $results[0]->description;
            $this->game = $results[0]->game;
            $this->categories = $results[0]->categories;
            $this->date = $results[0]->date;
            $this->time = $results[0]->time;
            $this->author = $results[0]->author;
            $this->image1 = $results[0]->image1;
            $this->image2 = $results[0]->image2;
            $this->image3 = $results[0]->image3;
            $this->image4 = $results[0]->image4;
            $this->image5 = $results[0]->image5;
            $this->approved = $results[0]->approved;

        }

    }

    public static function getRecent(){
        $target = date('Y-m-d',strtotime('-1 week'));
        $sql = "SELECT * from events where date > '".$target."' order by date desc";
        $data = new DataAccess();
        $results = $data->Fetch($sql, null);
        return $results;
    }

    public static function getSelects(){
        $sql = "SELECT * from categories";
        $sql2 = "SELECT * from games";
        $data = new DataAccess();
        $results = $data->Fetch($sql, null);
        $results2 = $data->Fetch($sql2, null);
        return array('categories'=>$results, 'games'=>$results2);
    }
}