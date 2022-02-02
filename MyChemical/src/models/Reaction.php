<?php

class Reaction
{

    private $name_reaction;
    private $chemical_formula;
    private $id_reaction;
    private $description;
    private $img_reaction;


    public function __construct(string $name_reaction, string $chemical_formula, ?int $id_reaction, string $description, string $img_reaction) {
        $this->name_reaction = $name_reaction;
        $this->chemical_formula = $chemical_formula;
        $this->id_reaction = $id_reaction;
        $this->description = $description;
        $this->img_reaction = $img_reaction;
    }


    public function getNameReaction(): string
    {
        return $this->name_reaction;
    }

    public function getChemicalFormula()
    {
        return $this->chemical_formula;
    }

    public function getIdReaction()
    {
        return $this->id_reaction;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImgReaction()
    {
        return $this->img_reaction;
    }

}