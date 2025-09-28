<!DOCTYPE html>
<html>
<head>
    <title><?= isset($book) ? 'Edit Book' : 'Add Book' ?></title>
</head>
<body>
    <?php if (isset($validation)): ?>
    <ul style="color: red;">
        <?php foreach ($validation->getErrors() as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
    <h1><?= isset($book) ? 'Edit Book' : 'Add Book' ?></h1>
    <form method="post" action="<?= isset($book) ? '/books/update/' . $book['id'] : '/books/store' ?>">
        <label>Title:</label>
        <input type="text" name="title" value="<?= old('title', isset($book) ? esc($book['title']) : '') ?>" required><br>
        <label>Author:</label>
        <input type="text" name="author" value="<?= old('author', isset($book) ? esc($book['author']) : '') ?>" required><br>
        <button type="submit">Save</button>
    </form>
    <a href="/books">Back to List</a>
</body>
</html>