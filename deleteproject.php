<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<body>
    <?php $proj = getProjectByID($pdo, $_GET['project_id']); ?>
    <div style="border: 1px solid black; padding: 20px;">
        <h1>Delete Project: <?php echo $proj['project_name']; ?>?</h1>
        <form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&contractor_id=<?php echo $_GET['contractor_id']; ?>" method="POST">
            <input type="submit" name="deleteProjectBtn" value="Confirm Delete">
            <a href="viewprojects.php?contractor_id=<?php echo $_GET['contractor_id']; ?>">Cancel</a>
        </form>
    </div>
</body>
</html>