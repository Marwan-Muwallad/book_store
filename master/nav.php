<?php 

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email']) ) { 
    if ($page=="admin" || $page == 'add-author' || $page == 'add-category' || $page == 'add-book' || $page == 'edit-category' 
    || $page == 'edit-author' || $page == 'edit-book' || $page == 'search') { ?>
<nav class="navbar navbar-expand-lg bg-light ">
    <div class="container-fluid">
        <a class="navbar-brand <?php if($page == "admin") echo "active"; ?>" href="./?page=admin">ADMIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link <?php if ($page == "store") echo "active";?> " aria-current="page" href="#">Store</a>
                <a class="nav-link <?php if ($page == "add-book") echo "active"; ?>" href="./?page=add-book">Add
                    Book</a>
                <a class="nav-link <?php if ($page == "add-category") echo "active"; ?>" href="./?page=add-category">Add
                    Catagory</a>
                <a class="nav-link <?php if ($page == "add-author") echo "active"; ?>" href="./?page=add-author">Add
                    Author</a>
                <a class="nav-link" href="./logout.php">logout</a>

            </div>
        </div>
    </div>
</nav>
<?php } ?>

<?php }else { ?>
<nav class="navbar navbar-expand-lg bg-light ">
    <div class="container-fluid">
        <a class="navbar-brand" href="./?page=main">PSU-online Book Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Store</a>
                <a class="nav-link" href="#">Contact</a>
                <a class="nav-link" href="./login.php">login</a>

            </div>
        </div>
    </div>
</nav>

<?php } ?>