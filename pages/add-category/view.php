<?php 
include "./assets/db/config.php";
include "./php/func-books.php";
include "./php/func-author.php";
include "./php/func-category.php";
$books = get_all_books($conn);
$authors = get_all_authors($conn);
$categories = get_all_categories($conn);

?>
<form action="./php/add-category.php" method="POST" class="shadow p-4 rounded mt-5" style="width:90%; max-width:50rem;">
    <h1 class="text-center pb-4 display-4 fs-3">Add New Category</h1>
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
        <label class="form-label">Category Name</label>
        <input type="text" class="form-control" name="category_name">


    </div>
    <button type="submit" class="btn btn-primary ">Add Category</button>


</form>