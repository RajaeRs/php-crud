<!DOCTYPE html>
<html lang="en">

     

    <?php include ('index/header.php');?>


    <section class="list-of-books">
        <div class="header">
            <h2>Liste of Books :</h2>
            <a href="books.php"><button class="button">Add</button></a>
        </div>
        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Author's email</th>
                <th>Book's image</th>
                <th>Published At</th>
            </tr>
            <tr>
                <td><?php echo $title ?></td>
                <td><?php echo $author ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $image ?></td>
                <td><?php echo $date ?></td>
            </tr>
        </table>
    </section>





    <?php include ('index/footer.php'); ?>

    
    
    
</html>