<?php

class Calculator
{

    private $name_calculator;
    private $image_calculator;
    private $id_calculator;
    private $endpoint_calculator;

    public function __construct(string $name_calculator, string $image_calculator, int $id_calculator, string $endpoint_calculator) {
        $this->name_calculator = $name_calculator;
        $this->image_calculator = $image_calculator;
        $this->id_calculator = $id_calculator;
        $this->endpoint_calculator = $endpoint_calculator;
    }


    public function getNameCalculator(): string
    {
        return $this->name_calculator;
    }

    public function getImageCalculator()
    {
        return $this->image_calculator;
    }

    public function getIdCalculator()
    {
        return $this->id_calculator;
    }

    public function getEndpointCalculator()
    {
        return $this->endpoint_calculator;
    }

}