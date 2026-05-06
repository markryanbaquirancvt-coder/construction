<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Project Houses</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Back to Contractors</a>
    <?php $contractor = getContractorByID($pdo, $_GET['contractor_id']); ?>
    <h1>Contractor: <?php echo $contractor['first_name'] . " " . $contractor['last_name']; ?></h1>

    <div style="border: 1px solid black; padding: 20px;">
        <h3>Add New Project House</h3>
        <form action="core/handleForms.php?contractor_id=<?php echo $_GET['contractor_id']; ?>" method="POST">
            <p>Project Name: <input type="text" name="projectName" required></p>
            <p>House Type: <input type="text" name="houseType" required></p>
            <input type="submit" name="insertProjectBtn" value="Add Project">
        </form>
    </div>

    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <tr>
            <th>ID</th><th>Project Name</th><th>House Type</th><th>Actions</th>
        </tr>
        <?php $projects = getProjectsByContractor($pdo, $_GET['contractor_id']); foreach ($projects as $proj) { ?>
        <tr>
            <td><?php echo $proj['project_id']; ?></td>
            <td><?php echo $proj['project_name']; ?></td>
            <td><?php echo $proj['house_type']; ?></td>
            <td>
                <a href="editproject.php?project_id=<?php echo $proj['project_id']; ?>&contractor_id=<?php echo $_GET['contractor_id']; ?>">Edit</a> | 
                <a href="deleteproject.php?project_id=<?php echo $proj['project_id']; ?>&contractor_id=<?php echo $_GET['contractor_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>