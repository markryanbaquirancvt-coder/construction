<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<body>
    <?php $user = getContractorByID($pdo, $_GET['contractor_id']); ?>
    <div style="border: 1px solid black; padding: 20px;">
        <h1>Delete Contractor: <?php echo $user['first_name']; ?>?</h1>
        <form action="core/handleForms.php?contractor_id=<?php echo $_GET['contractor_id']; ?>" method="POST">
            <input type="submit" name="deleteContractorBtn" value="Confirm Delete">
            <a href="index.php">Cancel</a>
        </form>
    </div>
</body>
</html>