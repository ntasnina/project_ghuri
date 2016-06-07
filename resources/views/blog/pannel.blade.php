<?php
$posts = array(
    array( 
        'title' => 'Hello',
        'post' => 'This is the post',
        'comments' => array( 
            array(
                'date_posted' => '28/07/2009',
                 'text' => 'this is the first comment'
            ),
            array(
                'date_posted' => '28/07/2009',
                'text' => 'this is the second comment'
            )
        )
    ),
    array(
        'title' => 'Another post',
        'post' => 'Hello',
        'comments' => array()
    )
);
?>
<?php foreach ($posts as $post): ?>
    <!-- begin status post -->
    <h1><?php echo $post['title']; ?></h1>
    <p><?php echo $post['post']; ?></p>
    <?php if ($post['comments']): ?>
        <h2>Comments:</h2>
        <ul>
        <?php foreach ($post['comments'] as $comment): ?>
            <!-- begin comment -->
            <li>
                <?php echo $comment['text']; ?>
                etc.
            </li>
         <!-- end comment -->
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<!-- end status post -->
<?php endforeach; ?>