<?php 
include "./assets/db/config.php";
include "./php/func-books.php";
include "./php/func-author.php";
include "./php/func-category.php";
include "./php/func-validation.php";
include "./php/func-file-upload.php";
$books = get_all_books($conn);
$authors = get_all_authors($conn);
$categories = get_all_categories($conn);

if (isset($_GET['title'])) {
    $title = $_GET['title'];
}else $title = '';

if (isset($_GET['description'])) {
    $description = $_GET['description'];
}else $description = '';

if (isset($_GET['author_id'])) {
    $author_id = $_GET['author_id'];
}else $author_id = 0;

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
}else $category_id = 0;

?>
<form action="./php/add-book.php" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded mt-5" style="width:90%; max-width:50rem;">
    <h1 class="text-center pb-4 display-4 fs-3">Add New Book</h1>
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
        <label class="form-label">Book Title</label>
        <input type="text" class="form-control" name="book_title" value="<?php echo $title; ?>">


    </div>
    <div class="mb-3">
        <label class="form-label">Book Description</label>
        <input type="text" class="form-control" name="book_description" value="<?php echo $description; ?>">


    </div>
    <div class="mb-3">
        <label class="form-label">Book Author</label>
       
        <select name="book_author" id="" class="form-control">
            <option value="0">Select Author</option>
            <?php if ($authors == 0) { ?>
            # do nothing!
            <?php }else { ?>
            <?php foreach ($authors as $author ) {
                if ($author_id == $author['id']) {  ?>
            <option selected value="<?php echo $author['id']; ?>"><?php echo $author['name']; ?></option>



            <?php }else { ?>
                <option  value="<?php echo $author['id']; ?>"><?php echo $author['name']; ?></option>
           <?php }  } } ?>
        </select>

    </div>
    <div class="mb-3">
        <label class="form-label">Book Category</label>
        <select name="book_category" id="" class="form-control">
            <option value="0">Select Category</option>
            <?php if ($categories == 0) { ?>
            # do nothing!
            <?php }else { ?>
                <?php foreach ($categories as $category ) {
                if ($category_id == $category['id']) {  ?>
            <option selected value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>



            <?php }else { ?>
                <option  value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
           <?php }  } } ?>
        </select>


    </div>
    <div class="mb-3">
        <label class="form-label">Book Cover</label>
        <input type="file" class="form-control" name="book_cover">


    </div>
    <div class="mb-3">
        <label class="form-label">Document</label>
        <input type="file" class="form-control" name="document">


    </div>
    <button type="submit" class="btn btn-primary ">Add New Book</button>


</form>