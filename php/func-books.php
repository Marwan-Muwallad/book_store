<?php 
function get_all_books($con)
{
    $sql  = "SELECT * FROM books ORDER BY id DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
       $books = $stmt->fetchAll();
    }else {
        $books = 0;
    }
    return $books;
}

# Get Book bu ID
function get_book($con ,$id)
{
    $sql  = "SELECT * FROM books WHERE id=? ";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
    if ($stmt->rowCount() > 0) {
       $book = $stmt->fetch();
    }else {
        $book = 0;
    }
    return $book;
}

?>