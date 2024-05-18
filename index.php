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

<h1>Гороскоп на сегодня</h1>

<form method="post">
    <label for="birthday">Введите дату рождения (ДД.ММ.ГГГГ):</label>
    <input type="text" name="birthday" id="birthday" required>
    <button type="submit">Получить гороскоп</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $birthday = $_POST['birthday'];

    // Проверяем формат даты
    if (!preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $birthday)) {
        echo "<p>Неправильный формат даты. Введите дату в формате ДД.ММ.ГГГГ.</p>";
        exit;
    }

    // Разделяем дату на день, месяц, год
    list($day, $month, $year) = explode('.', $birthday);

    // Определяем знак зодиака
    $zodiacSign = getZodiacSign($month, $day);

    // Выводим гороскоп
    echo "<p>Ваш знак зодиака: $zodiacSign</p>";
    echo "<p>Гороскоп на сегодня:</p>";
    echo "<p>" . getHoroscope($zodiacSign) . "</p>";
}

// Функция определения знака зодиака
function getZodiacSign($month, $day) {
    if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        return 'Овен';
    } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        return 'Телец';
    } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
        return 'Близнецы';
    } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
        return 'Рак';
    } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        return 'Лев';
    } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        return 'Дева';
    } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
        return 'Весы';
    } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
        return 'Скорпион';
    } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
        return 'Стрелец';
    } elseif (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
        return 'Козерог';
    } elseif (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
        return 'Водолей';
    } else {
        return 'Рыбы';
    }
}

// Функция получения гороскопа для знака зодиака
function getHoroscope($zodiacSign) {
    // Массив с гороскопами на несколько дней вперед для каждого знака зодиака
    $horoscopes = [
        'Овен' => [
            'Сегодня' => 'Вас ожидает удачный день для новых начинаний.',
            'Завтра' => 'Будьте осторожны с финансами.',
            // ...
        ],
        'Телец' => [
            'Сегодня' => 'Отличный день для общения.',
            'Завтра' => 'Возможны неожиданные встречи.',
            // ...
        ],
        // ...
    ];

    // Получаем гороскоп для текущего дня
    return $horoscopes[$zodiacSign]['Сегодня'];
}
?>
</body>
</html>