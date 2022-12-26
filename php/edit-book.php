<?php 
include "../assets/db/config.php";
include "../php/func-validation.php";
include "../php/func-file-upload.php";


if (isset($_POST['book_id']) && isset($_POST['book_title']) &&  isset($_POST['book_author']) 
&& isset($_POST['book_description']) && isset($_POST['book_category']) && isset($_FILES['book_cover']) && isset($_FILES['document'])
&& isset($_POST['current_cover']) && isset($_POST['current_document']) ) {
    $id = $_POST['book_id'];
    $title = $_POST['book_title'];
    $author = $_POST['book_author'];
    $description = $_POST['book_description'];
    $category = $_POST['book_category'];
    $current_cover = $_POST['current_cover'];
    $current_document = $_POST['current_document'];

    #Simple form validation
    $text = "Book Title";
    $location = "../?page=edit-book";
    $ms = "&id=$id&error";
    is_empty_book($title,$text,$location, $ms, "");
    
    $text = "Book Description";
    $location = "../?page=edit-book";
    $ms = "&id=$id&error";
    is_empty_book($description,$text,$location, $ms, "");
    
    $text = "Book Author";
    $location = "../?page=edit-book";
    $ms = "&id=$id&error";
    is_empty_book($author,$text,$location, $ms, "");
    
    $text = "Book Category";
    $location = "../?page=edit-book";
    $ms = "&id=$id&error";
    is_empty_book($category,$text,$location, $ms, "");

    if (!empty($_FILES['book_cover']['name'])) {
       
       
        if (!empty($_FILES['document']['name'])) {
            $allowed_image_exs = array("jpg", "jpeg","png"); 
            $path = "cover";                    
            $book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);

            $allowed_file_exs = array("pdf", "docx","pptx");
            $path = "documents";
            $document = upload_file($_FILES['document'], $allowed_file_exs, $path);

            if ($book_cover['status'] == "error" || $document['status'] == "error" ) {
                $em = $book_cover['data'];
                
                
                header("Location: ../?page=edit-book&error=$em&id=$id");
                exit;
        
            }else {
               $c_p_book_cover = "../upload/cover/$current_cover";
               $c_p_document = "../upload/documents/$current_document";

               unlink($c_p_book_cover);
               unlink($c_p_document);

            $document_URL = $document['data'];
            $book_cover_URL = $book_cover['data'];
            $sql = "UPDATE books SET title=?, author_id=?, description=?,category_id=?, cover=?,document=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$title,$author, $description, $category,$book_cover_URL,$document_URL,$id]);
            if ($res) {
                $sm = " The Book Successfully Updated!";
                header("Location:../?page=edit-book&success=$sm&id=$id");
                exit;
               }else {
                $em = "Unknown Error Occured";
                header("Location:../?page=edit-book&error=$em&id=$id");
                exit;
               }


            }
        }else {
            #update the just book cover
            $allowed_image_exs = array("jpg", "jpeg","png"); 
            $path = "cover";                    
            $book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);

            

            if ($book_cover['status'] == "error" ) {
                $em = $book_cover['data'];
                
                
                header("Location: ../?page=edit-book&error=$em&id=$id");
                exit;
        
            }else {
               $c_p_book_cover = "../upload/cover/$current_cover";
               

               unlink($c_p_book_cover);
      
            $book_cover_URL = $book_cover['data'];
            $sql = "UPDATE books SET title=?, author_id=?, description=?,category_id=?, cover=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$title,$author, $description, $category,$book_cover_URL,$id]);
            if ($res) {
                $sm = " The Book Successfully Updated!";
                header("Location:../?page=edit-book&success=$sm&id=$id");
                exit;
               }else {
                $em = "Unknown Error Occured";
                header("Location:../?page=edit-book&error=$em&id=$id");
                exit;
               }


            }


        }
     }elseif (!empty($_FILES['document']['name'])) {
         # update just the file
         $allowed_file_exs = array("pdf", "docx","pptx");
         $path = "documents";
         $document = upload_file($_FILES['document'], $allowed_file_exs, $path);
         

         if ($document['status'] == "error" ) {
             $em = $document['data'];
             
             
             header("Location: ../?page=edit-book&error=$em&id=$id");
             exit;
     
         }else {
            $c_p_document = "../upload/documents/$document";
            

            unlink($c_p_document);
   
         $document_URL = $document['data'];
         $sql = "UPDATE books SET title=?, author_id=?, description=?,category_id=?, document=? WHERE id=?";
         $stmt = $conn->prepare($sql);
         $res = $stmt->execute([$title,$author, $description, $category,$document_URL,$id]);
         if ($res) {
             $sm = " The Book Successfully Updated!";
             header("Location:../?page=edit-book&success=$sm&id=$id");
             exit;
            }else {
             $em = "Unknown Error Occured";
             header("Location:../?page=edit-book&error=$em&id=$id");
             exit;
            }


         }
     }else {
        $sql = "UPDATE books SET title=?, author_id=?, description=?,category_id=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$title,$author, $description, $category,$id]);
        if ($res) {
            $sm = " The Book Successfully Updated!";
            header("Location:../?page=edit-book&success=$sm&id=$id");
            exit;
           }else {
            $em = "Unknown Error Occured";
            header("Location:../?page=edit-book&error=$em&id=$id");
            exit;
           }
     }
    

}else {
    header("Location:../?page=admin");
    exit;
}

?>