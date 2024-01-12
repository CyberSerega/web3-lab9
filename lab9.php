<!DOCTYPE html>
<html lang="ru">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab9</title>
</head>

<body>
  <!-- Задание 1 -->
  <p>Задание №1</p>
  <?php
  $today = date_create();
  $nextYear = date_format($today, "Y") + 1;
  $endDate = date_create("$nextYear-01-01");
  $dateDiff = date_diff($today, $endDate);
  echo "Сколько дней до Нового года: $dateDiff->days";
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 2 -->
  <p>Задание №2</p>
  <form action="" method="POST">
    <label>Введите год:</label>
    <input type="text" name="task2">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task2"])) {
    $year = $_POST["task2"];
    echo "$year - ", date("L", strtotime("$year-01-01")) ? "Високосный" : "Невисокосный";
  }
  ?>
  <!--------------->
  <br><br>

  <!-- Задание 3 -->
  <p>Задание №3</p>
  <form action="" method="post">
    <label>Дата: (дд.мм.гггг)</label>
    <input type="date" name="task3">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task3"])) {
    $days = ["понедельник", "вторник", "среда", "четверг", "пятница", "суббота", "воскресенье"];
    $date = strtotime($_POST["task3"]);
    $day = date("N", $date);
    echo $days[$day - 1];
  }
  ?>
  <!--------------->
  <br><br>

  <!-- Задание 4 -->
  <p>Задание №4</p>
  <?php
  echo date("jS \of F Y\, l");
  ?>
  <!--------------->
  <br><br>

  <!-- Задание 5 -->
  <p>Задание №5</p>
  <form action="" method="post">
    <label>День рождения: (дд.мм.гггг)</label>
    <input type="date" name="task5">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task5"])) {
    $date = strtotime($_POST["task5"]);
    $day = date("d", $date);
    $month = date("m", $date);
    $year = date("Y") + 1;
    echo "Дней до дня рождения: " . date_diff(date_create(), date_create("$day-$month-$year"))->days;
  }
  ?>
  <!--------------->
  <br><br>

  <!-- Задание 6 -->
  <p>Задание №6</p>
  <?php
  $today = date_create();
  $date = date_create("last Sunday of February");
  if ($today > $date) $date = date_create("last Sunday of February next year");
  echo "Дней до Масленицы: " . date_diff($today, $date)->days;
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 7 -->
  <p>Задание №7</p>
  <form action="" method="post">
    <label>Дата рождения(ДД.ММ):</label>
    <input type="text" name="task7">
    <input type="submit" value="submit">
  </form>
  <?php
    function getZodiac($month, $day){
      $zodiacName = array(
          "Козерог", "Водолей", "Рыбы", 
          "Овен", "Телец", "Близнецы", 
          "Рак", "Лев", "Девы", 
          "Весы", "Скорпион", "Стрелец"
      );

      $zodiacDate = array(
          21, 20, 20, 20, 20, 20, 
          21, 22, 23, 23, 23, 23
      );

      if ($day < $zodiacDate[$month - 1]){
          $result = $zodiacName[$month - 1];
      }else{
          if($month == 12) $month = 0; 
          $result = $zodiacName[$month];
      }
      return $result;
    }

  if (isset($_POST["task7"])) {
    $str = $_POST["task7"];
    $date = explode(".", $str);
    if(count($date) > 1) {
      $zodiacSign = getZodiac($date[1], $date[0]);
      echo "Знак зодиака: " . $zodiacSign;
    }
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 8 -->
  <p>Задание №8</p>
  <?php
  // Заполняем массив.
  $newYear = date("31-12");
  $christmas = date("07-01");
  $cement = date("08-01");
  $holidays = [
    $newYear => "Новый год",
    $christmas => "Рождество Христово",
	$cement => "День цемента"
  ];
  // Вывод.
  $today = date("d-m");
  foreach ($holidays as $key => $value) {
    if ($today == $key) {
      $output = "Поздравляем с праздником: $value!";
      break;
    }
    $output = "Сегодня нет никакого праздника";
  }
  echo $output;
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 9 -->
  <p>Задание №9</p>
  <?php
  function GetHoroscopeFor($zodiacSign)
  {
    switch($zodiacSign){
        case 'Овен':
          return 'Сегодня вам стоит избегать суеты в собственных действиях, а также, если возможно, общения с суетливыми людьми. Ничего, кроме головной боли это не принесет. Нынче вам показаны спокойствие и рассудительность.'; 
          break;
        case 'Телец':
          return 'Если вы желаете что-нибудь сделать так, как считаете нужным, а не так, как вам объяснили, придется немного попритворяться. Не возражайте - это бесполезно. Просто не слушайте.'; 
          break;
        case 'Близнецы':
          return 'Сегодня вас будет тянуть к азартным играм. В принципе это желание можно удовлетворить, ибо проигрывать ли вы будете, или выигрывать, вы будете точно знать, когда надо остановиться.'; 
          break;
        case 'Рак':
          return 'Сегодня ваша наблюдательность превзойдет все мыслимые и немыслимые ожидания. Возможно, результатами ваших сегодняшних наблюдений заинтересуются впоследствии. Постарайтесь ничего не забыть.'; 
          break;
        case 'Лев':
          return 'Вдохновение - серьезная сила, но перебор в этом аспекте приведет к пробуксовке. Погодите воплощать в жизнь все идеи сразу, сколь бы хороши они ни были, и передохните немного.'; 
          break;
        case 'Девы':
          return 'События имеют неприятное свойство происходить с той скоростью, с которой хотят, совершенно не сообразовываясь с вашими планами и желаниями. Сегодня все будет меняться слишком быстро, чтобы вы успели хотя бы понять, что происходит.'; 
          break;
        case 'Весы':
          return 'Сегодняшний день небесполезно было бы посвятить домашним хлопотам. Дела наверняка найдутся. Не стоит проявлять инициативу - подобные поползновения нынче будут пресечены жесточайшим образом.'; 
          break;
        case 'Скорпион':
         return 'Сегодня вам придется решать некую проблему, которую вы уже давно считали забытой, а потому несуществующей. Возможно, вас ждет не слишком приятная работа, однако сделать ее придется, и лучше будет ее не откладывать.'; 
          break;
        case 'Стрелец':
          return 'Сегодня, пытаясь разобраться в мыслях, вы рискуете заняться самокопанием. Это иногда полезно, но сейчас для подобного упражнения особых причин нет, а времени и душевных сил, на это дело потраченных, будет жаль.'; 
          break;
        case 'Козерог':
          return 'Сегодня вам, возможно, придется быть весьма внимательным к оттенкам интонаций как голосов окружающих, так и своего собственного. Они будут значить слишком многое, чтобы их игнорировать.'; 
          break;
        case 'Водолей':
          return 'Сегодня хорошие идеи будут посещать не только вашу гениальную голову. Среди тех, которые иногда озвучивают окружающие, тоже иногда попадаются неплохие экземпляры. Учитывайте это.'; 
          break;
        case 'Рыбы':
          return 'Вы приближаетесь к крайнему сроку, однако, пока можете позволить себе не спешить. Но на часы все-таки поглядывайте. Опаздывать не в ваших интересах.'; 
          break;
    }
  }

  if (isset($_POST["task7"])) {
    $str = $_POST["task7"];
    $date = explode(".", $str);
    if(count($date) > 1) {
      $zodiacSign = getZodiac($date[1], $date[0]);
      echo "Знак зодиака: $zodiacSign.<br> Ваш гороскоп на сегодня:<br>" . GetHoroscopeFor($zodiacSign);
    }
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 10 -->
  <p>Задание №10</p>
  <form action="" method="post">
    <textarea name="task10"></textarea>
    <input type="submit" value="sumbit">
  </form>
  <?php
  if (isset($_POST["task10"])) {
    $text = $_POST["task10"];
    $alphabet = "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя";
    echo "Количество слов: " . str_word_count($text, 0, $alphabet) . "<br>";
    echo "Количество символов: " . iconv_strlen($text) . "<br>";
    echo "Количество символов за вычетом пробелов: " . (iconv_strlen($text) - substr_count($text, " ")) . "<br>";
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 11 -->
  <p>11. Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку нужно посчитать процентное содержание каждого символа в тексте.</p>
  <form action="" method="post">
    <label>Введи текст</label>
    <textarea name="task11"></textarea>
    <input type="submit" value="sumbit">
  </form>
  <?php
  if (isset($_POST["task11"])) {
    $text = $_POST["task11"];
    $len = strlen($text);
    $chars_count = array_count_values(str_split($text));
    foreach ($chars_count as $char => $count) {
      echo "$char - " . floor($count / $len * 100) . "%<br>";
    }
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 12 -->
  <p>Задание №12</p>
  <form action="" method="post">
    <label>Набор букв:</label>
    <input type="text" name="task12">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task12"])) {
    $letters = explode(" ", $_POST["task12"]);
    $words = [ "да", "нет", "один", "два", "три", "арбуз", "дыня", "знак", "тарзанка", "вода"];
    $result = [];
    foreach ($words as $word) {
      $inString = true;
      foreach ($letters as $letter) {
        if (stripos($word, $letter) === false) {
          $inString = false;
          break;
        }
      }
      if ($inString) array_push($result, $word);
    }

    echo "Слова, которые содержат все введенные буквы:<br>";
    for ($i = count($result) - 1; $i >= 0; $i--) {
      echo $result[$i];
      if ($i > 0) echo ", ";
    }
  }
  ?>
<!--------------->
<br><br>
  
<!-- Задание 13 -->
  <p>Задание 13</p>
  <form action="" method="post">
   <label>Слова:</label>
    <textarea name="task13"></textarea>
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task13"])) {
    $words = explode(" ", $_POST["task13"]);
    sort($words);
    $prev = "";
    foreach ($words as $word) {
      $char = str_split($word)[0];
      if ($prev !== $char)
        echo "<br>Слова на букву " . $char . ": ";
      else
        echo ", ";
      echo $word;
      $prev = $char;
    }
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 14 -->
  <p>Задание №14</p>
  <form action="" method="post">
    <label>Строка на русском:</label>
    <input type="text" name="task14">
    <input type="submit" value="submit">
  </form>
  <?php
  function RusToLat($source = false)
  {
      if ($source) {
          $rus = [
              "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ы", "Ь", "Э", "Ю", "Я",
              "а", "б", "в", "г", "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я"
          ];
          $lat = [
              "A", "B", "V", "G", "D", "E", "Yo", "Zh", "Z", "I", "J", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "H", "C", "Ch", "Sh", "Shh", "\`\`", "Y`", "`", "E`", "Yu", "Ya", "a", "b", "v", "g", "d", "e", "yo", "zh", "z", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "h", "c", "ch", "sh", "shh", "``", "y`", "`", "e`", "yu", "ya"
          ];
          return str_replace($rus, $lat, $source);
      }
  }

  if (isset($_POST["task14"])) {
    echo "Транслит: " . RusToLat($_POST["task14"]);
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 15 -->
  <p>Задание №15</p>
  <form action="" method="post">
    <input type="text" name="task15"><br>
    <input type="radio" name="radio15" value="To" checked><label>В транслит</label>
    <input type="radio" name="radio15" value="From"><label>Из транслита</label><br>
    <input type="submit" value="submit"><br>
  </form>
  <?php
  function LatToRus($source = false)
  {
      if ($source) {
          $rus = [
              "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ы", "Ь", "Э", "Ю", "Я",
              "а", "б", "в", "г", "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я"
          ];
          $lat = [
              "A", "B", "V", "G", "D", "E", "Yo", "Zh", "Z", "I", "J", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "H", "C", "Ch", "Sh", "Shh", "\`\`", "Y`", "`", "E`", "Yu", "Ya", "a", "b", "v", "g", "d", "e", "yo", "zh", "z", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "h", "c", "ch", "sh", "shh", "``", "y`", "`", "e`", "yu", "ya"
          ];
          return str_replace($lat, $rus, $source);
      }
  }

  if (isset($_POST["task15"])) {
    if ($_POST["radio15"] === "To")
      echo "Транслит: " . RusToLat($_POST["task15"]);
    else
      echo "Перевод: " . LatToRus($_POST["task15"]);
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 16 -->
  <p>Задание №16</p>

  <style>
    .correct {
      background-color: limegreen;
    }

    .wrong {
      background-color: red;
    }
  </style>
  <p><b>Тест</b></p>
  <form action="" method="post">
    <?php
    $quests = [
      "2 + 2 = ?" => "4",
      "Столица РФ" => "Москва",
      "Это вопрос?" => "Да"
    ];

    $i = 0;
    foreach ($quests as $quest => $answer) {
      echo $quest . "<br>";
      if (isset($_POST["q$i"])) {
        echo "<p>Ваш ответ: " . $_POST["q$i"] . " - ";
        if ($_POST["q$i"] === $answer)
          echo '<span class = "correct">верно!';
        else
		{
			echo '<span class = "wrong">неверно!';
			echo '  Правильный ответ: ' . $answer; 
		}          
        echo "</span></p>";
      } else
        echo '<input type="text" name="q' . $i . '"><br>';

      $i++;
    }
    ?>
    <input type="submit" value="submit">
  </form>
  <!--------------->
  <br><br>
  
  <!-- Задание 17 -->
  <p>Задание 17</p>
  <form action="" method="post">
    <?php
    $quests = [
      "Этот сайт написан на PHP?" => "да",
      "Это лабораторная №3?" => "нет",
      "Пельмени - самая лучшая еда?" => "да",
    ];

    $i = 0;
    foreach ($quests as $quest => $answer) {
      echo $quest . "<br>";
      if (isset($_POST["radio17$i"])) {
        echo "<p>Ваш ответ: " . $_POST["radio17$i"] . " - ";
        if ($_POST["radio17$i"] === $answer)
          echo '<span class = "correct">верно!';
        else
		{
			echo '<span class = "wrong">неверно!';
			echo '  Правильный ответ: ' . $answer; 
		}
        echo "</span></p>";
      } else
        echo '
        <input type="radio" name="radio17' . $i . '" value="да">
        <label>да</label>
        <input type="radio" name="radio17' . $i . '" value="нет">
        <label>нет</label>
        <br>
        ';

      $i++;
    }
    ?>
    <input type="submit" value="submit">
  </form>
  <!--------------->
  <br><br>
  
  <!-- Задание 18 -->
  <p>Задание 18</p>
  <form action="" method="post">
    <?php
    $quests = [
      "2 + 2 * 2 = ?" => ["6"],
      "Правители Российской империи в 19 века" => ["Александр I", "Николай I"],
      "Гуманитарные дисциплины это:" => ["Литература", "История"],
    ];

    $variants = [
      ["6", "8"],
      ["Петр I", "Александр I", "Николай I"],
      ["Математика", "История", "Литература", "Информатика"],
    ];

    $i = 0;
    foreach ($quests as $quest => $answer) {
      // Вопрос №
      echo $quest . "<br>";
      // Ваш ответ: 
      if (isset($_POST["submit"])) {
        echo "Ваш ответ: [";
        $userAnswer = [];
        for ($j = 0; $j < count($variants[$i]); $j++) {
          if (isset($_POST["radio18$i$j"])) {
            array_push($userAnswer, $_POST["radio18$i$j"]);
          }
        }
       
        // Ответ
        echo implode(", ", $userAnswer) . "] - ";
        // Верно/Неверно
        if (!array_diff($userAnswer, $answer) && !array_diff($answer, $userAnswer))
          echo '<span class = "correct">верно!';
        else
		{
			echo '<span class = "wrong">неверно!';
			echo '  Правильный ответ: ' . implode(", ", $answer);
		}          
        echo "</span></p>";
      } else {
        // Чекбоксы  
        for ($j = 0; $j < count($variants[$i]); $j++)
          echo '
            <input type="checkbox" name="radio18' . $i . $j . '" value="' . $variants[$i][$j] . '">
            <label>' . $variants[$i][$j] . '</label>
          ';
        echo "<br><br>";
      }
      $i++;
    }

    if (isset($_POST["reset"])) $_POST["submit"] = "";
    ?>
    <input type="submit" name="submit" value="submit">
    <input type="submit" name="reset" value="reset">
  </form>
  <!--------------->
  <br><br>
  
  <!-- Задание 19 -->
  <p>Задание №19</p>
  <form action="" method="post">
    <input type="text" name="task19">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task19"])) {
    $num = $_POST["task19"];
    $res = 1;
    for ($i = 1; $i <= $num; $i++) {
      $res *= $i;
    }
    echo "Ответ: " . $res;
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 20 -->
  <p>Задание 20. Квадратное уравнение</p>
  <form action="" method="post">
    <label>a = </label>
    <input type="text" name="task20a">
    <label>b = </label>
    <input type="text" name="task20b">
    <label>c = </label>
    <input type="text" name="task20c">
    <br>
    <input type="submit" name="task20sbm" value="submit">
  </form>
  <?php
  if (isset($_POST["task20sbm"])) {
    $a = $_POST["task20a"];
    $b = $_POST["task20b"];
    $c = $_POST["task20c"];
    $D = $b * $b - 4 * $a * $c;
    $d = sqrt(abs($D));

    echo "Ответ: ";
    if ($D == 0) {
      echo "x = " . (-$b + $d) / 2 / $a;
    } else if ($D > 0) {
      echo "x1 = " . (-$b + $d) / 2 / $a . ", ";
      echo "x2 = " . (-$b - $d) / 2 / $a;
    } else {
      echo "x1/2 = (" . -$b . htmlspecialchars_decode("&plusmn", ENT_QUOTES) . $d . "i) / " . 2 * $a;
    }
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 21 -->
  <p>Задание 21. Тройка Пифагора</p>
  <form action="" method="post">
    <label>a = </label>
    <input type="text" name="task21a">
    <label>b = </label>
    <input type="text" name="task21b">
    <label>c = </label>
    <input type="text" name="task21c">
    <br>
    <input type="submit" name="task21sbm" value="submit">
  </form>
  <?php
  if (isset($_POST["task21sbm"])) {
    $a = $_POST["task21a"];
    $b = $_POST["task21b"];
    $c = $_POST["task21c"];
    $sum = 0;
    $max;
    if ($a > $b) {
      $sum += $b * $b;
      $max = $a;
    } else {
      $sum += $a * $a;
      $max = $b;
    }
    if ($max > $c) {
      $sum += $c * $c;
      $max *= $max;
    } else {
      $sum += $max * $max;
      $max = $c * $c;
    }

    if ($max == $sum) echo "Тройка Пифагора";
    else echo "Не тройка Пифагора";
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 22 -->
  <p>Задание №22</p>
  <form action="" method="post">
    <input type="text" name="task22">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task22"])) {
    $num = $_POST["task22"];
    $results = [];
    for ($i = 1; $i <= intdiv($num, 2); $i++) {
      if ($num % $i == 0)
        array_push($results, $i);
    }

    echo "Делители: " . implode(", ", $results);
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 23 -->
  <p>Задание №23</p>
  <form action="" method="post">
    <input type="text" name="task23">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task23"])) {
    $num = $_POST["task23"];
    $results = [];
    $i = 1;
    while ($num != 1) {
      $i++;
      if ($num % $i == 0) {
        $num /= $i;
        array_push($results, $i);
        $i = 1;
      }
    }

    echo "Простые множители: " . implode(", ", $results);
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 24 -->
  <p>Задание №24. Два числа</p>
  <form action="" method="post">
    <input type="text" name="task24a">
    <input type="text" name="task24b">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task24a"]) && isset($_POST["task24b"])) {
    $a = $_POST["task24a"];
    $b = $_POST["task24b"];
    $results = [];
    for ($i = 1; $i <= intdiv(max($a, $b), 2); $i++) {
      if ($a % $i == 0 && $b % $i == 0)
        array_push($results, $i);
    }

    echo "Общие делители: " . implode(", ", $results);
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 25 -->
  <p>Задание №25. Два числа</p>
  <form action="" method="post">
    <input type="text" name="task25a">
    <input type="text" name="task25b">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task25a"]) && isset($_POST["task25b"])) {
    $a = $_POST["task25a"];
    $b = $_POST["task25b"];
    echo "НОД = " . gcd($a, $b);
  }

  function gcd($a, $b)
  {
    $a = abs($a);
    $b = abs($b);
    while ($b) {
      $temp = $b;
      $b = $a % $b;
      $a = $temp;
    }
    return $a;
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 26 -->
  <p>Задание 26</p>
  <form action="" method="post">
    <input type="text" name="task26a">
    <input type="text" name="task26b">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task26a"]) && isset($_POST["task26b"])) {
    $a = $_POST["task26a"];
    $b = $_POST["task26b"];
    echo "НОК = " . lcm($a, $b);
  }

  function lcm($a, $b)
  {
    return abs($a * $b / gcd($a, $b));
  }
  ?>
  <!--------------->
  <br><br>
  
  <!-- Задание 27 -->
  <p>Задание №27. Дата</p>
  <form action="" method="post">
    <label>День</label>
    <input type="number" name="task27a">
    <br>
    <label>Месяц</label>
	<select size="3"  name="task27b">
		<option disabled>Месяц</option>
		<option selected value="1">Январь</option>
		<option  value="2">Февраль</option>
		<option value="3">Март</option>
		<option value="4">Апрель</option>
		<option value="5">Май</option>
    </select></p>
    <br>
    <label>Год</label>
    <input type="text" name="task27c">
    <input type="submit" value="submit">
  </form>
  <?php
  if (isset($_POST["task27a"]) && isset($_POST["task27b"]) && isset($_POST["task27c"])) {
    $d = $_POST["task27a"];
    $m = $_POST["task27b"];
    $y = $_POST["task27c"];
    $days = ["понедельник", "вторник", "среда", "четверг", "пятница", "суббота", "воскресенье"];

    echo "$d-$m-$y - " . $days[date("N", strtotime("$d.$m.$y"))-1];
  }
  ?>
  <!--------------->
</body>

</html>