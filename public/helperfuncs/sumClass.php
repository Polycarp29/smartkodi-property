<?php 

class SumArr
{
    public $data;
    public $sum;

    public function __construct($data)
    {
        $this->data = $data;
        $this->sum = 0;
    }
    public function addParam()
    {
        for($x=0; $x<count($this->data); $x++)
        {
            $this->sum += $this->data[$x];
        }
    }
    public function SumData()
    {
        return $this->sum;
    }
}

