<?php
    // session_start();

    $mysqli = new mysqli('localhost', 'RajaeRs', 'ibtihal@RRR2001', 'crud-php') or die(mysqli_error($mysqli));
    
    # FOR ADD ACTION :

    $title = $email = $author = $date = $image = '';
    $update = false;
    // had lvar hatta hiya bach min ndir submit yab9aw les donnée maktobin ila kan chi ralat fchi input mat3awadch déclaration man jdid rani kanliyiha nit bhal value fal input ltaht fal forme


    $errors = array('title'=>'' , 'author'=>'', 'email'=>'' , 'image'=>'' , 'date'=>'');
    //zadt had $errors bach ila b9at chi input khawya na9dar ntala3 message ya3lam biaannah khassha ta3mar
    //whatta bach na9dar nathakam fles données li khasshom ya3amro bhal filter mais ana li kanathakam kifach ndir zadt ri variabl bach nssahal rwina

    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $author = $_POST['author'];
        $email = $_POST['email'];
        $image = $_POST['image'];
        $date = $_POST['date'];


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
            //hadi ma3raftch filter kifach nhaddad ri les img li yadakhlo 
        }   
        else{
            $image = $_POST['image'];
            // ma3raftch lach makatab9ach bayna ki khwatatha 3assabtini )^^
        }

        // check date
        if(empty($_POST['date'])){
            $errors['date'] = 'in date is required <br />';
        }   
        else{
            $date = $_POST['date'];
            // echo htmlspecialchars($_POST['date']);
        }

        if(array_filter($errors)){
            //ila kan chi error rah aytal3o les message li dégâ declarithom
        } else {
            $mysqli->query("INSERT INTO book (title, author, email, image, date) VALUES('$title', '$author', '$email', '$image', '$date')") or die($mysqli->error);

            header("Location: /php-crud/list-of-books.php");
            // header('Location: list-of-books.php');   
            //hna ila kollach kan mazyan ayamchi la page li britha normalement ayamchi la page li fiha tableux dyal gaa3 laktob
        }
        



    }//and of POST check

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM book WHERE id=$id") or die($mysqli->error());
        header("Location: /php-crud/list-of-books.php");

    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $result = $mysqli->query("SELECT * FROM book WHERE id=$id") or die($mysqli->error());
        // if (count($result)==1){
            $row = $result->fetch_array();
            $title = $row['title'];
            $author = $row['author'];
            $email = $row['email'];
            // $image = $row['image'];
            $date = $row['date'];
            $update = true;

        // }
        
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $title = $_POST["title"];
        $author = $_POST["author"];
        $email = $_POST["email"];
        $image = $_POST["image"];
        $date = $_POST["date"];

        $mysqli->query("UPDATE book SET Title='$title', Author='$author', image='$image', date='$date' WHERE id=$id")
        or die($mysqli->error);


        header("Location: /php-crud/list-of-books.php");

    }

    
?>