<!DOCTYPE html>
<html>
<head>
    <title>Ứng dụng PHP trên Apache</title>
</head>
<body>
    <form method="post">
        Nhập một số nguyên dương: <input type="text" name="number">
        <input type="submit" value="Submit">
    </form>
    <?php
    function getMessage($number) {
        $remainder = $number % 5;
        
        switch ($remainder) {
            case 0:
                echo "Hello";
                break;
            case 1:
                echo "How are you?";
                break;
            case 2:
                echo "I’m doing well, thank you";
                break;
            case 3:
                echo "See you later";
                break;
            case 4:
                echo "Good-bye";
                break;
            default:
                echo "Invalid input!";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];

        if (!is_numeric($number) || $number <= 0 || floor($number) != $number) {
            echo "<p>Vui lòng nhập một số nguyên dương.</p>";
        } else {
            getMessage($number);
        }
    }
    ?>
</body>
</html>
