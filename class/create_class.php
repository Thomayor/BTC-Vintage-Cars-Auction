<?php
class Car{

protected string $model;
protected string $brand;
protected int $power;
protected int $year;
protected string $img;
protected string $description;
protected int $price;


public function __construct($model,$brand,$power,$year,$img,$description,$price){

    $this->model=$model;
    $this->brand=$brand;
    $this->power=$power;
    $this->year=$year;
    $this->img=$img;
    $this->description=$description;
    $this->price=$price;

}

public function viewCar(){

   echo "<p>" . $this->model . "</p>";
   echo "<p>" . $this->brand ."</p>";
   echo "<p>" .  $this->power."</p>";
   echo "<p>" .  $this->year ."</p>";
   echo "<p>" .  $this->img ."</p>";
   echo "<p>" .  $this->description ."</p>";
   echo "<p>" .  $this->price ."</p>";
}

public function getModel()
{
    
    return $this->model;
}

public function setModel($model)
{
    if ($model != ""){

        $this->model= $model;
    }
}

public function getBrand()
{
    
    return $this->brand;
}

public function setBrand($brand)
{
    if ($brand != ""){

        $this->brand= $brand;
    }
}

public function getPower()
{
    
    return $this->power;
}

public function setPower($power)
{
    if ($power != ""){

        $this->power= $power;
    }
}

public function getYear()
{
    
    return $this->year;
}

public function setYear ($year)
{
    if ($year != ""){

        $this->year= $year;
    }
}

public function getImg()
{
    
    return $this->img;
}

public function setImg($img)
{
    if ($img != ""){

        $this->img= $img;
    }
}

public function getDescription()
{
    
    return $this->description;
}

public function setDescription($description)
{
    if ($description != ""){

        $this->description= $description;
    }
}

public function getPrice()
{
    
    return $this->price;
}

public function setPrice($price)
{
    if ($price != ""){

        $this->price= $price;
    }
}


}

?>