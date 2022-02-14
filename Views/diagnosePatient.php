<?php

require_once './templates/header.php';
require_once '../Controllers/patient.php';

?>

<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title text-success">Diagnosticar paciente</h2>
            <a href="./readPatients.php?operation=readPatients" class="btn btn-outline-success">Listar pacientes</a>
        </div>

        <div class="card-body">
            <div class="w-50 mx-auto">
                <form action="diagnosePatient.php" method="POST">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <span><?php echo $invalidNameError; ?></span>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="age">Idade</label>
                        <span><?php echo $invalidAgeError; ?></span>
                        <input type="number" name="age" id="age" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="symptoms">Sintomas</label>
                        <span><?php echo $invalidSymptomsError; ?></span>
                        <textarea name="symptoms" id="symptoms" cols="30" rows="4" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="diagnostic">Diagnostico</label>
                        <span><?php echo $invalidDiagnosticError; ?></span>
                        <input type="text" name="diagnostic" id="diagnostic" class="form-control">
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" name="diagnosePatient" class="btn btn-outline-success">Diagnosticar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once './templates/footer.php'; ?>
