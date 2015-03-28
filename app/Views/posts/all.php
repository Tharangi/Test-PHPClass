<html>
<head>
    <title><?=$title?></title>
</head>
<body>

<h1><font color="#006400">All posts</font></h1>


<?php
    foreach($posts as $post) {


        ?>
        <h1><?= $post['title'] ?></h1>
        <p><?= $post['body'] ?></p>

    <?php
    }
?>

</body>
</html>