<?php 
require_once 'dbConfig.php';

/* --- CONTRACTOR FUNCTIONS --- */
function getAllContractors($pdo) {
    $sql = "SELECT * FROM contractors ORDER BY date_added DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getContractorByID($pdo, $contractor_id) {
    $sql = "SELECT * FROM contractors WHERE contractor_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$contractor_id]);
    return $stmt->fetch();
}

function insertContractor($pdo, $fName, $lName, $gender, $spec, $email, $bdate) {
    $sql = "INSERT INTO contractors (first_name, last_name, gender, specialization, email, birth_date) VALUES (?,?,?,?,?,?)";
    return $pdo->prepare($sql)->execute([$fName, $lName, $gender, $spec, $email, $bdate]);
}

function updateContractor($pdo, $fName, $lName, $gender, $spec, $email, $bdate, $contractor_id) {
    $sql = "UPDATE contractors SET first_name=?, last_name=?, gender=?, specialization=?, email=?, birth_date=? WHERE contractor_id=?";
    return $pdo->prepare($sql)->execute([$fName, $lName, $gender, $spec, $email, $bdate, $contractor_id]);
}

function deleteContractor($pdo, $contractor_id) {
    return $pdo->prepare("DELETE FROM contractors WHERE contractor_id = ?")->execute([$contractor_id]);
}

/* --- PROJECT HOUSE FUNCTIONS --- */
function getProjectsByContractor($pdo, $contractor_id) {
    $sql = "SELECT * FROM project_houses WHERE contractor_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$contractor_id]);
    return $stmt->fetchAll();
}

function getProjectByID($pdo, $project_id) {
    $sql = "SELECT * FROM project_houses WHERE project_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$project_id]);
    return $stmt->fetch();
}

function insertProject($pdo, $name, $type, $contractor_id) {
    $sql = "INSERT INTO project_houses (project_name, house_type, contractor_id) VALUES (?,?,?)";
    return $pdo->prepare($sql)->execute([$name, $type, $contractor_id]);
}

function updateProject($pdo, $name, $type, $project_id) {
    $sql = "UPDATE project_houses SET project_name = ?, house_type = ? WHERE project_id = ?";
    return $pdo->prepare($sql)->execute([$name, $type, $project_id]);
}

function deleteProject($pdo, $project_id) {
    return $pdo->prepare("DELETE FROM project_houses WHERE project_id = ?")->execute([$project_id]);
}
?>