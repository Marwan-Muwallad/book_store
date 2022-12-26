<?php 
include "./assets/db/config.php";
include "./php/func-author.php";


$id = $_GET['id'];
$author =  get_author($conn, $id);
if (!isset($_GET['id'])) {
    header("Location: ./?page=admin");
    exit;
}
 
if ($author == 0) {
    header("Location:./?page=admin");
    exit;
}

?>
<form action="./php/edit-author.php" method="POST" class="shadow p-4 rounded mt-5" style="width:90%; max-width:50rem;">
    <h1 class="text-center pb-4 display-4 fs-3">Edit Author</h1>
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
        <input type="text"  name="author_id" value="<?php echo $author['id']; ?>" hidden>
        <input type="text" class="form-control" name="author_name" value="<?php echo $author['name']; ?>">


    </div>
    <button type="submit" class="btn btn-primary ">Update</button>


</form>