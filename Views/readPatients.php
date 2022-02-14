<?php

require_once './templates/header.php';
require_once '../Controllers/patient.php';

?>

<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title text-success">Pacientes Diagnosticados</h3>
            <a href="./diagnosePatient.php" class="btn btn-outline-success">Diagnosticar</a>
        </div>
        
        <div class="card-body text-center">
            <table class="table table-hover">
                <thead>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Sintomas</th>
                    <th>Diagnostico</th>
                    <th>Accoes</th>
                </thead>

                <tbody>

                    <?php if (empty($patients)) : ?>
                        <tr class="alert alert-warning text-center">
                            <td colspan="5">Nenhum paciente diagnosticado</td>
                        </tr>
                    <?php else : ?>

                        <?php foreach($patients as $patient) : ?>
                            <tr>
                                <td><?php echo $patient['name']; ?></td>
                                <td><?php echo $patient['age']; ?></td>
                                <td><?php echo $patient['symptoms']; ?></td>
                                <td><?php echo $patient['diagnostic']; ?></td>

                                <td>
                                    <a href="./updatePatient.php?operation=readPatient&patientId=<?php echo $patient['id']; ?>"
                                        class="btn btn-outline-info btn-sm">Editar
                                    </a>
                                    <a href="./readPatients.php?operation=removePatient&patientId=<?php echo $patient['id']; ?>"
                                        class="btn btn-outline-danger btn-sm">Apagar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once './templates/footer.php'; ?>
