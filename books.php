<?php 
    $title = $email = $author = $date = $image = '';
    $errors = array('title'=>'' , 'author'=>'', 'email'=>'' , 'image'=>'' , 'date'=>'');

    if(isset($_POST['submit'])){

        // check titel
        if(empty($_POST['title'])){
            $errors['title'] = 'in title is required <br />';
        }   else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
                $errors['title'] = 'the title must be a letters and spaces only';
            }
        }

        // check auther
        if(empty($_POST['author'])){
            $errors['author'] = 'in author is required <br />';
        }   else{
            $author = $_POST['author'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$author)){
                $errors['author'] = 'the name of author must be a letters and spaces only';
            }
        }

        // check auther's email
        if(empty($_POST['email'])){
            $errors['email'] = 'in email is required <br />';
        }   else{
            $email = $_POST['email'];
            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email must be a valid email address';
            }
        }

        // check image
        if(empty($_POST['image'])){
            $errors['image'] = 'in image is required <br />';
        }   
        else{
            $image = $_POST['image'];
            // echo htmlspecialchars($_POST['image']);
        }

        // check date
        if(empty($_POST['date'])){
            $errors['date'] = 'in date is required <br />';
        }   
        else{
            $date = $_POST['date'];
            // echo htmlspecialchars($_POST['date']);
        }
    }
?>




<!DOCTYPE html>
<html lang="en">

     

    <?php include ('index/header.php');?>

    <section class="main">
        <div class="header">
            <h2>New Book :</h2>
            <button class="button">Add</button>
        </div>
        <form class="form-add" action="books.php" method="POST">
            <label for="texte">Title :</label>
            <input type="text" name="title" value="<?php echo $title ?>">
            <div class="errors"><?php echo $errors['title']; ?></div>

            <label for="texte">Author :</label>
            <input type="text" name="author" value="<?php echo $author ?>">
            <div class="errors"><?php echo $errors['author']; ?></div>

            <label for="texte">Author's email :</label>
            <input type="text" name="email" value="<?php echo $email ?>">
            <div class="errors"><?php echo $errors['email']; ?></div>

            <label for="file">image</label>
            <input  type="file" src="" alt="" name="image" class="img" value="<?php echo $image ?>">
            <div class="errors" ><?php echo $errors['image']; ?></div>

            <label for="number">Published At :</label>
            <input type="date" name="date" id="" value="<?php echo $date ?>">
            <div class="errors" ><?php echo $errors['date']; ?></div>

            <div >
                <input type="submit" name="submit" value="submit" class="button">
            </div>
        </form>
        <!-- <button>Add</button> -->
        
    </section>

    <?php include ('index/footer.php'); ?>

    
    
    
</html>