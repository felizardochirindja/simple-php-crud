<?php

class patient
{
    public $id;
    public $name;
    public $age;
    public $symptoms;
    public $diagnostic;

    private $databaseConnection;

    public function __construct($databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }

    public function create($name, $age, $symptoms, $diagnostic)
    {
        $queryCreate = "INSERT INTO patient
                        (name, age, symptoms, diagnostic) 
                        VALUES (:name, :age, :symptoms, :diagnostic)";

        $prepareStatment = $this->databaseConnection->prepare($queryCreate);

        $prepareStatment->bindParam(':name', $name);
        $prepareStatment->bindParam(':age', $age);
        $prepareStatment->bindParam(':symptoms', $symptoms);
        $prepareStatment->bindParam(':diagnostic', $diagnostic);
        $prepareStatment->execute();

        return true;
    }

    public function readAll(): array
    {
        $queryRead = "SELECT * FROM patient ORDER BY name";

        $prepareStatment = $this->databaseConnection->prepare($queryRead);
        $prepareStatment->execute();
        $doentes = $prepareStatment->fetchAll(PDO::FETCH_ASSOC);

        return $doentes;
    }

    public function readOne($id)
    {
        $queryReadOne = "SELECT * FROM patient WHERE id = :id";

        $prepareStatment = $this->databaseConnection->prepare($queryReadOne);
        $prepareStatment->bindParam(':id', $id);
        $prepareStatment->execute();
        $doente = $prepareStatment->fetch(PDO::FETCH_ASSOC);

        return $doente;
    }

    public function update($id, $name, $age, $symptoms, $diagnostic)
    {
        $queryUpdate = "UPDATE patient SET 
                        name        = :name, 
                        age         = :age, 
                        symptoms    = :symptoms, 
                        diagnostic  = :diagnostic 
                        WHERE id    = :id";

        $prepareStatment = $this->databaseConnection->prepare($queryUpdate);

        $prepareStatment->bindParam(':name', $name);
        $prepareStatment->bindParam(':age', $age);
        $prepareStatment->bindParam(':symptoms', $symptoms);
        $prepareStatment->bindParam(':diagnostic', $diagnostic);
        $prepareStatment->bindParam(':id', $id);
        $prepareStatment->execute();

        return true;
    }

    public function delete($id)
    {
        $queryDelete = "DELETE FROM patient WHERE id = :id";

        $prepareStatment = $this->databaseConnection->prepare($queryDelete);
        $prepareStatment->bindParam(':id', $id);
        $prepareStatment->execute();

        return true;
    }
}
