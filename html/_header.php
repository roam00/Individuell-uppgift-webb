<ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="comments.php">Show comments</a></li>
        <li><a href="writeComment.php">Write a comment</a></li>
        <?php
        if(!isset($_SESSION['username'])){
            echo "<li style='float: right;'><a href='login.php'>Log in</a></li>
            <li class='right'><a href='register.php'>Sign up</a></li>";
        }
        if(isset($_SESSION['username'])){
            echo "<li style='float: right;'><a href='profile.php'>My profile</a></li>
            <li class='right'><a href='db/Login_Register/logout_process.php'>Log out</a></li>";
        }
        
        ?>
    </ul>