<?php
session_start();

// إنشاء المصفوفة الديناميكية في السيشن لو مش موجودة
if (!isset($_SESSION['dynamic_array'])) {
    $_SESSION['dynamic_array'] = [];
}

// إضافة عنصر
if (isset($_POST['add'])) {
    $value = $_POST['value'];
    if ($value !== '') {
        $_SESSION['dynamic_array'][] = $value;
    }
}

// حذف عنصر
if (isset($_POST['remove'])) {
    $index = $_POST['index'];
    if (is_numeric($index) && isset($_SESSION['dynamic_array'][$index])) {
        array_splice($_SESSION['dynamic_array'], $index, 1);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Array</title>
         <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f5f5f5;
            }

            h2 {
                color: #2c3e50;
                text-align: center;
                margin-bottom: 30px;
            }

            h3 {
                color: #34495e;
                margin-top: 30px;
            }

            form {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                margin-bottom: 20px;
            }

            input[type="text"],
            input[type="number"] {
                width: 70%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                margin-right: 10px;
                font-size: 16px;
            }

            button {
                background-color: #3498db;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s;
            }

            button:hover {
                background-color: #2980b9;
            }

            ul {
                list-style: none;
                padding: 0;
            }

            li {
                background-color: white;
                padding: 15px;
                margin-bottom: 10px;
                border-radius: 4px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            }

            .container {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
        </style>
</head>
<body>
    <div class="container">
        <h2>Dynamic Array باستخدام PHP</h2>

        <form method="POST">
            <input type="text" name="value" placeholder="أدخل قيمة جديدة">
            <button type="submit" name="add">إضافة</button>
        </form>

        <form method="POST">
            <input type="number" name="index" placeholder="أدخل Index للحذف">
            <button type="submit" name="remove">حذف</button>
        </form>

        <h3>العناصر الحالية:</h3>
        <ul>
            <?php foreach ($_SESSION['dynamic_array'] as $key => $val): ?>
                <li>[<?= $key ?>] => <?= htmlspecialchars($val) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>