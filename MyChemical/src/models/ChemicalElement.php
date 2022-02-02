<?php

class ChemicalElement
{


    private $name_chemical_element;
    private $sign_chemical_element;
    private $id_chemical_element;
    private $molar_mass;

    public function __construct(string $name_chemical_element, string $sign_chemical_element, int $id_chemical_element, float $molar_mass) {
        $this->name_chemical_element = $name_chemical_element;
        $this->sign_chemical_element = $sign_chemical_element;
        $this->id_chemical_element = $id_chemical_element;
        $this->molar_mass = $molar_mass;
    }


    public function getNameChemicalElement(): string
    {
        return $this->name_chemical_element;
    }

    public function getSignChemicalElement()
    {
        return $this->sign_chemical_element;
    }

    public function getIdChemicalElement()
    {
        return $this->id_chemical_element;
    }

    public function getMolarMass()
    {
        return $this->molar_mass;
    }
}