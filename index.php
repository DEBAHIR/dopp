<!DOCTYPE html>
<html>
<head>
    <title>Количество слов и символов</title>
</head>
<body>
    <textarea id="text" rows="4" cols="50"></textarea><br>
    <button onclick="countWord()">Count</button><br>
    <div id="result"></div>

    <script>
        function countWord() {
            var text = document.getElementById("text").value;
            var words = text.match(/\S+/g).length;
            var characters = text.length;

            document.getElementById("result").innerHTML = "Number of words: " + words + "<br>Number of characters: " + characters;
        }
    </script>

<form method="post">
        <label for="day">День:</label>
        <select name="day" id="day">
            <?php
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <label for="month">Месяц:</label>
        <select name="month" id="month">
            <?php
            $months = [
                'января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'
            ];
            foreach ($months as $key => $month) {
                echo "<option value='" . ($key + 1) . "'>$month</option>";
            }
            ?>
        </select>

        <label for="year">Год:</label>
        <select name="year" id="year">
            <?php
            for ($i = 1990; $i <= 2025; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <button type="submit">Показать день недели</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];

        $date = "$year-$month-$day";

        $dayOfWeek = date('l', strtotime($date));

        echo "<p>День недели: $dayOfWeek</p>";
    }
    ?>
</body>
</html>
