

<!DOCTYPE html>
<html lang="en">

     

    <?php include ('index/header.php');?>
    <?php require_once 'process.php';?>
    <?php 
        $mysqli = new mysqli('localhost', 'RajaeRs', 'ibtihal@RRR2001', 'crud-php') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM book") or die($mysqli->error);
    ?>

    

    <section class="list-of-books">
        <div class="header">
            <h2>Liste of Books :</h2>
            <a href="books.php"><button class="button">Add</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Author's email</th>
                    <th>Book's image</th>
                    <th>Published At</th>  
                    <th colspan='2'>Action</th>             
                </tr>
            </thead>
    <?php 
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['image']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td>
                    <a href="books.php?edit=<?php echo $row['id'];?>" class="button">Edit</a>
                    <a href="process.php?delete=<?php echo $row['id'];?>" class="button">Delete</a>

                </td>
            </tr>
        <?php endwhile; ?>   
        </table>
    </section>

    <?php
        function pre_r( $array ){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>



    <?php include ('index/footer.php'); ?>

    
    
    
</html>