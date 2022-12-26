<?php 
include "./assets/db/config.php";
include "./php/func-books.php";
include "./php/func-author.php";
include "./php/func-category.php";
$books = get_all_books($conn);
$authors = get_all_authors($conn);
$categories = get_all_categories($conn);

?>
<form method="GET" style="width:100%; max-width:100rem;">
    <div class="input-group my-4">
        <input type="text" class="form-control" placeholder="Search Book..." aria-label="Search Book..."
            aria-describedby="basic-addon2" name="key">
        <button class="input-group-text btn btn-primary" id="basic-addon2">Search</button>

    </div>

</form>

<?php if ($books == 0) { ?>
div class="alert alert-warning text-center p-5 " role="alert">
<img src="./img/box.png" width="100"><br>
There is no Book in Database!
</div>

<?php }else { ?>
<h4>All Books</h4>
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
<table class="table table-bordered shadow">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Description</th>
            <th scope="col">Catagory</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        $i = 0;
        foreach($books as $book) { 
        $i++;    
            ?>


        <tr>
            <td scope="row"><?php echo $i; ?></th>
            <td>

                <img width="100" src="./upload/cover/<?php echo $book['cover']; ?>">


                <a class="link-dark d-block text-center" href="./upload/documents/<?php echo $book['document']; ?>">
                    <?php echo $book['title'];?></a>
            </td>
            <td><?php  $book['author_id']; ?>
                <?php if ($authors == 0) {
                echo "Undefined";
            }else {
                foreach($authors as $author){
                    if ($author['id'] == $book['author_id']) {
                        echo $author['name'];
                    }
                }
            }?>
            </td>
            <td><?php echo $book['description']; ?></td>
            <td><?php $book['category_id']; ?>
                <?php if ($categories == 0) {
                echo "Undefined";
            }else {
                foreach($categories as $category){
                    if ($category['id'] == $book['category_id']) {
                        echo $category['name'];
                    }
                }
            } ?>


            </td>
            <td>
                <a href="./?page=edit-book&id=<?php echo $book['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="./php/delete-book.php?id=<?php echo $book['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php }?>
</table>
<?php } ?>

<?php if ($categories == 0) { ?>
<div class="alert alert-warning text-center p-5 " role="alert">
    <img src="./img/box.png" width="100"><br>
    There is no Book in Database!
</div>
<?php }else { ?>
<h4 class="mt-5">All Categories</h4>
<table class="table table-bordered shadow">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Categories</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        $j = 0;
        foreach($categories as $category) { 
          $j++;  
            ?>

        <tr>
            <td scope="row"><?php echo $j?></th>
            <td><?php echo $category['name']; ?></td>


            <td>
                <a href="./?page=edit-category&id=<?php echo $category['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="./php/delete-category.php?id=<?php echo $category['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php }?>
</table>
<?php } ?>

<?php if ($authors === 0) { ?>
<div class="alert alert-warning text-center p-5 " role="alert">
    <img src="./img/box.png" width="100"><br>
    There is no Book in Database!
</div>
<?php }else { ?>
<h4 class="mt-5">All Authors</h4>
<table class="table table-bordered shadow">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Authors</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        $k = 0;
        foreach($authors as $author) { 
          $k++;  
            ?>

        <tr>
            <td scope="row"><?php echo $k?></th>
            <td><?php echo $author['name']; ?></td>


            <td>
                <a href="./?page=edit-author&id=<?php echo $author['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="./php/delete-author.php?id=<?php echo $author['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php }?>
</table>
<?php } ?>
</form>