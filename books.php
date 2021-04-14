



<!DOCTYPE html>
<html lang="en">

     

    <?php include ('index/header.php');?>

    <?php require_once 'process.php';?>

    <section class="main">
        <div class="header">
            <h2>New Book :</h2>
            <a href="list-of-books.php"><button class="button">Cancel</button></a>
        </div> 
        <form class="form-add" action="process.php" enctype="multipart/from-data" method="POST" href='list-of-books.php'>
            
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label for="texte">Title :</label>
            <input type="text" name="title" value="<?php echo $title ?>">
            <div class="errors"><?php echo $errors['title']; ?></div>

            <label for="texte">Author :</label>
            <input type="text" name="author" value="<?php echo $author ?>">
            <div class="errors"><?php echo $errors['author']; ?></div>

            <label for="texte">Author's email :</label>
            <input type="text" name="email" value="<?php echo $email ?>">
            <div class="errors"><?php echo $errors['email']; ?></div>

            <label for="validatedCustomFile">image</label>
            <input  type="file" src="" alt="" name="image" class="img" id="validatedCustomFile" required value="<?php echo $image ?>">
            <div class="errors" ><?php echo $errors['image']; ?></div>

            <label for="number">Published At :</label>
            <input type="date" name="date" id="" value="<?php echo $date ?>">
            <div class="errors" ><?php echo $errors['date']; ?></div>

            <!-- <div >
                <input type="submit" name="submit" value="Add" class="button">
            </div> -->

            <?php if($update == true):?>
            <button class="button" id="special" type="submit" name="update">UPDATE</button>
            <?php else: ?>
            <button class="button" id="special" type="submit" name="submit">ADD</button>
            <?php endif?>

        </form>
        <!-- <button>Add</button> -->
        
    </section>

    <?php include ('index/footer.php'); ?>

    
    
    
</html>