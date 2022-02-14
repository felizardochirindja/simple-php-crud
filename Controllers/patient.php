<?php

require_once '../Database/MySQLConnector.php';
require_once '../Models/Patient.php';
require_once '../Models/dataValidator.php';

$mySQLConnector     = new MySQLConnector();
$dataBaseConnection = $mySQLConnector->returnConnection();
$patientModel       = new Patient($dataBaseConnection);

// diagnostica doente

if (isset($_POST['diagnosePatient'])) {
    validateName();
    validateAge();
    validateSymptoms();
    validateDiagnostic();

    if (
        !empty($validName)       &&
        !empty($validAge)        &&
        !empty($validSymptoms)   &&
        !empty($validDiagnostic)
    ) {
        $isPatientDiagnosed = $patientModel->create(
            $validName,
            $validAge,
            $validSymptoms,
            $validDiagnostic
        );
    }
}

if (isset($_GET['operation'])) {
    $operation = $_GET['operation'];

    // listar todos pacientes
    
    if ($operation == 'readPatients') {
        $patients = $patientModel->readAll();
    }

    // apagar paciente
    
    if ($operation == 'removePatient') {  
        $patientModel->delete($_GET['patientId']);

        header('location: readPatients.php?operation=readPatients');
    }

    // listar um paciente

    if ($operation == 'readPatient') {
        $patient = $patientModel->readOne($_GET['patientId']);
    } 
}

if (isset($_POST['updatePatient'])) {
    validateName();
    validateAge();
    validateSymptoms();
    validateDiagnostic();

    if (
        !empty($validName)       &&
        !empty($validAge)        &&
        !empty($validSymptoms)   &&
        !empty($validDiagnostic)
    ) {
        $isPatientUpdated = $patientModel->update(
            $_GET['patientId'],
            $validName,
            $validAge,
            $validSymptoms,
            $validDiagnostic
        );
    }
}
