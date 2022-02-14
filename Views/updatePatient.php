<?php

require_once './templates/header.php';
require_once '../Controllers/patient.php';

?>

<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title text-success">Actualizar paciente</h2>
            <a href="./readPatients.php?operation=readPatients" class="btn btn-outline-success">Listar pacientes</a>
        </div>

        <div class="card-body">
            <div class="w-50 mx-auto">
                <form action="./updatePatient.php?operation=readPatient&patientId=<?php echo $_GET['patientId'] ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <span><?php echo $invalidNameError; ?></span>
                        <input type="text" name="name" id="name" class="form-control" value="<?php
                            if (empty($invalidNameError)) {
                                echo isset($_POST['updatePatient']) ? $_POST['name'] : $patient['name'];
                            }
                        ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="age">Idade</label>
                        <span><?php echo $invalidAgeError; ?></span>
                        <input type="number" name="age" id="age" class="form-control" value="<?php
                            if (empty($invalidAgeError)) {
                                echo isset($_POST['updatePatient']) ? $_POST['age'] : $patient['age'];
                            }
                        ?>">
                    </div>

                    <div class="form-group">
                        <label for="symptoms">Sintomas</label>
                        <span><?php echo $invalidSymptomsError; ?></span>
                        <textarea name="symptoms" id="symptoms" cols="30" rows="4" class="form-control"><?php 
                            if (empty($invalidSymptomsError)) {
                                echo isset($_POST['updatePatient']) ? $_POST['symptoms'] : $patient['symptoms'];
                            }
                        ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="diagnostic">Diagnostico</label>
                        <span><?php echo $invalidDiagnosticError; ?></span>
                        <input type="text" name="diagnostic" id="diagnostic" class="form-control" value="<?php
                            if (empty($invalidDiagnosticError)) {
                                echo isset($_POST['updatePatient']) ? $_POST['diagnostic'] : $patient['diagnostic'];
                            }
                        ?>">
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" name="updatePatient" class="btn btn-outline-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once './templates/footer.php'; ?>
