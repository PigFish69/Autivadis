<?php
class activity {
    private $id;
    private $name;
    private $location;
    private $food;
    private $price;
    private $description;
    private $image;
    private $startTime;
    private $endTime;

    function __construct($sqlResult = null)
    {
        try {
            if ($sqlResult)
            {
                $activityArr = $sqlResult->fetch_row();
                $this->id = $activityArr[0];
                $this->name = $activityArr[1];
                $this->location = $activityArr[2];
                $this->food = $activityArr[3];
                $this->price = $activityArr[4];
                $this->description = $activityArr[5];
                $this->image = $activityArr[6];
                $this->startTime = $activityArr[7];
                $this->endTime = $activityArr[8];
            } else {
                return $this;
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error: ".$th;
        }
    }

    function setActivity($id, $name, $location, $food, $price, $description, $image, $startTime, $endTime) 
    {
        try {
            $this->id = $id;
            $this->name = $name;
            $this->location = $location;
            $this->food = $food;
            $this->price = $price;
            $this->description = $description;
            $this->image = $image;
            $this->startTime = $startTime;
            $this->endTime = $endTime;
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error: ".$th;
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the value of food
     */ 
    public function getFood()
    {
        return $this->food;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Get the value of startTime
     */ 
    public function getStartTime()
    {
        return $this->startTime;
    }
    
    /**
     * Get the value of endTime
     */ 
    public function getEndTime()
    {
        return $this->endTime;
    }

    public function getDate()
    {

        return date("d-m-Y H:i", strtotime($this->startTime)) . " tot " . date("d-m-Y H:i", strtotime($this->endTime)) ;
    }
}
?>