<?php
    require "../config/dbConfig.php";
    session_start();

    if (! isset($_SESSION['user_id'])) {
    die("Please login first");
    } 

    $stmt  = $pdo->query("SELECT * FROM books");
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Book List</h2>

<?php foreach ($books as $book): ?>
    <p>
        <?php echo $book['title'] ?> -
        <?php echo $book['is_available'] ? "Available" : "Unavailable" ?>

        <?php if ($book['is_available']): ?>
            <form method="post" action="../api/add_book.php">
                <input type="hidden" name="book_id" value="<?php echo $book['id'] ?>">
                <button>Add</button>
            </form>
        <?php endif; ?>
    </p>
<?php endforeach; ?>
