<?php 
include "./assets/db/config.php";



?>
<form action="./php/add-author.php" method="POST" class="shadow p-4 rounded mt-5" style="width:90%; max-width:50rem;">
    <h1 class="text-center pb-4 display-4 fs-3">Add New Author</h1>
    <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
            <?php } ?>
    <div class="mb-3">
        <label class="form-label">Author Name</label>
        <input type="text" class="form-control" name="author_name">


    </div>
    <button type="submit" class="btn btn-primary ">Add Author</button>


</form>