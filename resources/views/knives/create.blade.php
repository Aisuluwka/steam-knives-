<!DOCTYPE html>
<html>
<head>
    <title>Добавить нож</title>
</head>
<body>
    <h1>Добавить нож</h1>
    <form method="POST" action="/knives" enctype="multipart/form-data">
        @csrf
        <label>Название:</label>
        <input type="text" name="name" required><br>

        <label>Описание:</label>
        <textarea name="description" required></textarea><br>

        <label>Цена:</label>
        <input type="number" name="price" step="0.01" required><br>

        <label>Изображение:</label>
        <input type="file" name="image"><br><br>

        <button type="submit">Сохранить</button>
    </form>
</body>
</html>

