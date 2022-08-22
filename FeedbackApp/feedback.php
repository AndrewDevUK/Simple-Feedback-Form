<?php include "header.php"; ?>

<h2>Feedback</h2>

<?php 
    $sql = 'SELECT * FROM feedback';
    $result = mysqli_query($conn, $sql);
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php if(empty($feedback)): ?>
    <p>There is no feedback yet!</p>
<?php endif; ?>

<?php foreach($feedback as $item): ?>
    <div class="card">
        <div class="card_body">
            <?php echo $item['body']; ?>
            <div class="txt_sec">
                By <?php echo $item['name']; ?> on <?php echo $item['date']; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php include "footer.php"; ?>