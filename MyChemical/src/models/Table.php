<?php

class Table
{
    private $id_table;
    private $name_table;
    private $image_table;
    private $image_content_table;

    public function __construct(string $name_table, string $image_table,  ?int $id_table, string $image_content_table) {
        $this->name_table = $name_table;
        $this->image_table = $image_table;
        $this->id_table = $id_table;
        $this->image_content_table = $image_content_table;
    }


    public function getNameTable(): string
    {
        return $this->name_table;
    }

    public function getImageTable()
    {
        return $this->image_table;
    }

    public function getIdTable()
    {
        return $this->id_table;
    }

    public function getImageContentTable()
    {
        return $this->image_content_table;
    }
}