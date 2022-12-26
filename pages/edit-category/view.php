<?php 
include "./assets/db/config.php";
include "./php/func-category.php";


$id = $_GET['id'];
$category =  get_category($conn, $id);
if (!isset($_GET['id'])) {
    header("Location: ./?page=admin");
    exit;
}
 
if ($category == 0) {
    header("Location:./?page=admin");
    exit;
}

?>
<form action="./php/edit-category.php" method="POST" class="shadow p-4 rounded mt-5" style="width:90%; max-width:50rem;">
    <h1 class="text-center pb-4 display-4 fs-3">Edit Category</h1>
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
        <input type="text"  name="category_id" value="<?php echo $category['id']; ?>" hidden>
        <input type="text" class="form-control" name="category_name" value="<?php echo $category['name']; ?>">


    </div>
    <button type="submit" class="btn btn-primary ">Update</button>


</form>