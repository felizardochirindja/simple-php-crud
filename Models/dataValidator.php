<?php

$validAge = 0;
$validName = $validSymptoms = $validDiagnostic = '';
$invalidNameError = $invalidAgeError = $invalidSymptomsError = $invalidDiagnosticError = '';

// validar nome

function validateName() {
    if (empty($_POST['name'])) {
        global $invalidNameError;
        $invalidNameError = 'Campo obrigatorio!';
    } else {
        $cleanName = cleanCaracters($_POST['name']);
        validateNameCaracters($cleanName);
    }
}

function validateNameCaracters($cleanName) {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $cleanName)) {
        global $invalidNameError;
        $invalidNameError = 'Apenas letras e espacos em branco!';
    } else {
        global $validName;
        $validName = $cleanName;
    }
}

// validar idade

function validateAge() {
    if (empty($_POST['age'])) {
        global $invalidAgeError;
        $invalidAgeError = 'Campo obrigatorio!';
    } else {
        global $validAge;
        $validAge = $_POST['age'];
    }
}

// validar sintomas

function validateSymptoms() {
    if (empty($_POST['symptoms'])) {
        global $invalidSymptomsError;
        $invalidSymptomsError = 'Campo obrigatorio!';
    } else {
        $cleanSymptoms = cleanCaracters($_POST['symptoms']);
        validateSymptomsCracters($cleanSymptoms);
    }
}

function validateSymptomsCracters($cleanSymptoms) {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $cleanSymptoms)) {
        global $invalidSymptomsError;
        $invalidSymptomsError = 'Apenas letras e espacos em branco!';
    } else {
        global $validSymptoms;
        $validSymptoms = $cleanSymptoms;
    }
}

// validar diagnostico

function validateDiagnostic() {
    if (empty($_POST['diagnostic'])) {
        global $invalidDiagnosticError;
        $invalidDiagnosticError = 'Campo obrigatorio!';
    } else {
        $cleanDiagnostic = cleanCaracters($_POST['diagnostic']);
        validateDiagnosticCracters($cleanDiagnostic);
    }
}

function validateDiagnosticCracters($cleanDiagnostic) {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $cleanDiagnostic)) {
        global $diagnosticError;
        $diagnosticError = 'Apenas letras e espacos em branco!';
    } else {
        global $validDiagnostic;
        $validDiagnostic = $cleanDiagnostic;
    }
}

//========//

function cleanCaracters($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
