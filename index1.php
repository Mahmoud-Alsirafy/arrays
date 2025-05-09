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
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            width: 90%;
            max-width: 600px;
        }

        h2 {
            color: #4a5568;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: 600;
        }

        h3 {
            color: #4a5568;
            margin-top: 2rem;
            font-size: 1.5rem;
            font-weight: 500;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        input[type="text"],
        input[type="number"] {
            flex: 1;
            min-width: 200px;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }

        button {
            background: #667eea;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        button:hover {
            background: #5a67d8;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            background: #f8fafc;
            padding: 1rem;
            margin-bottom: 0.75rem;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        li:hover {
            transform: translateX(5px);
            border-color: #667eea;
        }

        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
            }

            form {
                flex-direction: column;
            }

            input[type="text"],
            input[type="number"],
            button {
                width: 100%;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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