<?php
require_once 'Repository.php';
require_once __DIR__ . '/../models/ChemicalElement.php';

class ChemicalElementsRepository extends Repository
{

    public function getAllChemicalElements(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM "chemical_element";
        ');
        $stmt->execute();
        $chemical_elements = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($chemical_elements as $chemical_element) {
            $result[] = new ChemicalElement(
                $chemical_element['name_chemical_element'],
                $chemical_element['sign_chemical_element'],
                $chemical_element['id_chemical_element'],
                $chemical_element['molar_mass']
            );
        }
        return $result;
    }

}