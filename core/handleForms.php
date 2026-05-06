<?php
require_once 'dbConfig.php';
require_once 'models.php';

/* --- CONTRACTOR HANDLERS --- */
if (isset($_POST['insertContractorBtn'])) {
    if (insertContractor($pdo, $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['spec'], $_POST['email'], $_POST['bdate'])) {
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['editContractorBtn'])) {
    if (updateContractor($pdo, $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['spec'], $_POST['email'], $_POST['bdate'], $_GET['contractor_id'])) {
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['deleteContractorBtn'])) {
    if (deleteContractor($pdo, $_GET['contractor_id'])) {
        header("Location: ../index.php");
        exit();
    }
}

/* --- PROJECT HANDLERS --- */
if (isset($_POST['insertProjectBtn'])) {
    if (insertProject($pdo, $_POST['projectName'], $_POST['houseType'], $_GET['contractor_id'])) {
        header("Location: ../viewprojects.php?contractor_id=" . $_GET['contractor_id']);
        exit();
    }
}

if (isset($_POST['editProjectBtn'])) {
    if (updateProject($pdo, $_POST['projectName'], $_POST['houseType'], $_GET['project_id'])) {
        header("Location: ../viewprojects.php?contractor_id=" . $_GET['contractor_id']);
        exit();
    }
}

if (isset($_POST['deleteProjectBtn'])) {
    if (deleteProject($pdo, $_GET['project_id'])) {
        header("Location: ../viewprojects.php?contractor_id=" . $_GET['contractor_id']);
        exit();
    }
}
?>