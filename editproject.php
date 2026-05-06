<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Edit Project House</title></head>
<body>
    <?php $proj = getProjectByID($pdo, $_GET['project_id']); ?>
    <form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&contractor_id=<?php echo $_GET['contractor_id']; ?>" method="POST">
        <p>Project Name: <input type="text" name="projectName" value="<?php echo $proj['project_name']; ?>"></p>
        <p>House Type: <input type="text" name="houseType" value="<?php echo $proj['house_type']; ?>"></p>
        <input type="submit" name="editProjectBtn" value="Update Project">
        <a href="viewprojects.php?contractor_id=<?php echo $_GET['contractor_id']; ?>">Cancel</a>
    </form>
</body>
</html>