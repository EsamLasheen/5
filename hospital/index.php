<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Al Shifa Hospital</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo+Play:wght@200..1000&display=swap" rel="stylesheet">

</head>
<body>
    <div class="main">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
            <h2>مستشفى الشفاء</h2>
        </div>
        <div class="book">
            <p>اهلا بك في مستشفى الشفاء ,, للحجز املء الإستمارة أدناة</p>
            <form action="index.php" method="post">
                <input type="text" placeholder="أدخل الاسم" name="name" required/>
                <input type="email" placeholder="أدخل البريد الالكتروني" name="email" required/>
                <input type="date" name="date" required/>
                <input type="submit" value="احجز الان" name="send"/>
            </form>
            <?php
            // Database connection
            $host = "localhost";
            $user = "root";
            $pass = "esam19";
            $db = "hospital";

            $conn = mysqli_connect($host, $user, $pass, $db);

            if (!$conn) {
                die("<p>تعذر الاتصال بقاعدة البيانات: " . mysqli_connect_error() . "</p>");
            }

            // Check if the form has been submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
                $pName  = isset($_POST['name']) ? $_POST['name'] : '';
                $pEmail = isset($_POST['email']) ? $_POST['email'] : '';
                $pDate  = isset($_POST['date']) ? $_POST['date'] : '';

                // Prepare and execute the SQL query
                $query = "INSERT INTO patients (name, email, date) VALUES ('$pName', '$pEmail', '$pDate')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<p>تم الحجز بنجاح</p>";
                } else {
                    echo "<p>عفوا، حدث خطأ ما</p>";
                }
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>

