<?php 
include "../assets/db/config.php";
include "../php/func-validation.php";
include "../php/func-file-upload.php";


if (isset($_POST['book_title']) && isset($_POST['book_author'])  && isset($_POST['book_description'])  && isset($_POST['book_category']) 
                                && isset($_FILES['book_cover']) && isset($_FILES['document']) ) {                                
                                    
    $title = $_POST['book_title'];
    $author = $_POST['book_author'];
    $description = $_POST['book_description'];  
    $category = $_POST['book_category'];
    // $cover = $_FILES['book_cover'];
    // $document = $_FILES['document'];

    #making URL Data Format
    $user_input = 'title='.$title. '&category_id='.$category. '&description='.$description. '&author_id='.$author;

    #Simple form validation
    $text = "Book Title";
    $location = "../?page=add-book";
    $ms = "error";
    is_empty_book($title,$text,$location, $ms, $user_input);
    
    $text = "Book Description";
    $location = "../?page=add-book";
    $ms = "error";
    is_empty_book($description,$text,$location, $ms, $user_input);
    
    $text = "Book Author";
    $location = "../?page=add-book";
    $ms = "error";
    is_empty_book($author,$text,$location, $ms, $user_input);
    
    $text = "Book Category";
    $location = "../?page=add-book";
    $ms = "error";
    is_empty_book($category,$text,$location, $ms, $user_input);
  
//     echo "<pre>";
//    print_r($_FILES['book_cover']);
    $allowed_image_exs = array("jpg", "jpeg","png"); 
    $path = "cover";                    
    $book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);
    
    if ($book_cover['status'] == "error") {
        $em = $book_cover['data'];
        
        header("Location: ../?page=add-book&error=$em&$user_input");
        exit;

    }else {
        $allowed_file_exs = array("pdf", "docx","pptx");
        $path = "documents";
        $document = upload_file($_FILES['document'], $allowed_file_exs, $path);
        
        if ($document['status'] == "error") {
            $em = $document['data'];
            
            header("Location: ../?page=add-book&error=$em&$user_input");
            exit;
    
        }else {

           $document_URL = $document['data'];
           $book_cover_URL = $book_cover['data'];

           $sql = "INSERT INTO books (title,author_id,description,category_id,cover,document) VALUES (?,?,?,?,?,?) "; 
           $stmt = $conn->prepare($sql);
           $res = $stmt->execute([$title,$author, $description, $category,$book_cover_URL,$document_URL]);
           if ($res) {
            $sm = " The Book Successfully Created!";
            header("Location:../?page=add-book&success=$sm");
            exit;
           }else {
            $em = "Unknown Error Occured";
            header("Location:../?page=add-book&error=$em");
            exit;
           }
        }


    }
  
}else {
    header("Location:../?page=admin");
    exit;
}

?>