<?php include "header.php"; ?>

<?php
    $name = $email = $body = '';
    $nameErr = $emailErr = $bodyErr = '';

    //Form submit
    if(isset($_POST['submit'])) {
        //Validate name
        if(empty($_POST['name'])) {
            $nameErr = 'Name is required';
        } else {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

         //Validate email
         if(empty($_POST['email'])) {
            $emailErr = 'Email is required';
        } else {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }

         //Validate body
         if(empty($_POST['body'])) {
            $bodyErr = 'Feedback is required';
        } else {
            $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if(empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
            // Add to database.
            $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";

            if(mysqli_query($conn, $sql)) {
                // Success
                header('Location: feedback.php');
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }
?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form_area">
            <div class="sec_name">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                <?php echo $nameErr; ?>
            </div>
            <div class="sec_email">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                <?php echo $emailErr; ?>
            </div>
            <div class="sec_feedback">
                <label for="body" class="form-label">Feedback</label>
                <textarea class="form-control" id="email" name="body" placeholder="Enter your feedback"></textarea>
                <?php echo $bodyErr; ?>
            </div>
            <div class="sec_button">
                <input type="submit" name="submit" value="Send" class="sub_btn">
            </div>
        </div>
    </form>

<?php include "footer.php"; ?>

