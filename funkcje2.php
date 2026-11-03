
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadania PHP</title>
</head>
<body>

<h2>1. SUMA</h2>
<form method="post">
    <input type="number" name="a" placeholder="Pierwsza liczba" required>
    <input type="number" name="b" placeholder="Druga liczba" required>
    <button name="suma">Oblicz sumę</button>
</form>

<?php
if (isset($_POST['suma'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];

    echo "Suma wynosi: " . ($a + $b);
}
?>

<hr>

<h2>2. PODSTAWY</h2>
<form method="post">
    <input type="number" name="a" placeholder="Pierwsza liczba" required>
    <input type="number" name="b" placeholder="Druga liczba" required>
    <button name="podstawy">Oblicz</button>
</form>

<?php
if (isset($_POST['podstawy'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];

    echo "Różnica: " . ($a - $b) . "<br>";
    echo "Iloczyn: " . ($a * $b) . "<br>";

    if ($b != 0) {
        echo "Iloraz: " . ($a / $b);
    } else {
        echo "Nie można dzielić przez zero";
    }
}
?>

<hr>

<h2>3. KALKULATOR</h2>
<form method="post">
    <input type="number" step="any" name="a" placeholder="Pierwsza liczba" required>
    <input type="number" step="any" name="b" placeholder="Druga liczba" required>

    <select name="dzialanie">
        <option value="+">Suma</option>
        <option value="-">Różnica</option>
        <option value="*">Iloczyn</option>
        <option value="/">Iloraz</option>
    </select>

    <button name="kalkulator">Oblicz</button>
</form>

<?php
if (isset($_POST['kalkulator'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $dzialanie = $_POST['dzialanie'];

    if ($dzialanie == "+") {
        $wynik = $a + $b;
    }
    elseif ($dzialanie == "-") {
        $wynik = $a - $b;
    }
    elseif ($dzialanie == "*") {
        $wynik = $a * $b;
    }
    elseif ($dzialanie == "/") {
        if ($b != 0) {
            $wynik = $a / $b;
        } else {
            $wynik = "Nie można dzielić przez zero";
        }
    }

    echo "<div id='wynik'>Wynik: $wynik</div>";
}
?>

<hr>

<h2>4. MAKS</h2>
<form method="post">
    <input type="number" name="a" placeholder="Pierwsza liczba" required>
    <input type="number" name="b" placeholder="Druga liczba" required>
    <input type="number" name="c" placeholder="Trzecia liczba" required>
    <button name="maks">Sprawdź</button>
</form>

<?php
if (isset($_POST['maks'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    $max = $a;

    if ($b > $max) {
        $max = $b;
    }

    if ($c > $max) {
        $max = $c;
    }

    echo "Największa liczba to: " . $max;
}
?>

<hr>

<h2>5. WZROST</h2>
<form method="post">
    <input type="number" name="wzrost" placeholder="Podaj wzrost w cm" required>
    <button name="wzrost_btn">Sprawdź</button>
</form>

<?php
if (isset($_POST['wzrost_btn'])) {
    $wzrost = $_POST['wzrost'];

    if ($wzrost < 150) {
        echo "Niski";
    }
    elseif ($wzrost > 180) {
        echo "Wysoki";
    }
    else {
        echo "Średni";
    }
}
?>

<hr>

<h2>6. BMI</h2>
<form method="post">
    <input type="number" name="wzrost" placeholder="Wzrost w cm" required>
    <input type="number" step="any" name="waga" placeholder="Waga w kg" required>
    <button name="bmi">Oblicz BMI</button>
</form>

<?php
if (isset($_POST['bmi'])) {
    $wzrost = $_POST['wzrost'];
    $waga = $_POST['waga'];

    if ($wzrost > 0) {
        $wzrost = $wzrost / 100;
        $bmi = $waga / ($wzrost * $wzrost);

        if ($bmi < 18.5) {
            $komentarz = "za mało!";
        }
        elseif ($bmi > 25) {
            $komentarz = "za dużo!";
        }
        else {
            $komentarz = "OK!";
        }

        echo "BMI: " . round($bmi, 2) . "<br>";
        echo $komentarz;
    }
    else {
        echo "Podaj poprawny wzrost";
    }
}
?>

<hr>

<h2>7. STARSZY</h2>
<form method="post">
    Osoba 1:
    <input type="date" name="data1" required>
    <br><br>

    Osoba 2:
    <input type="date" name="data2" required>
    <br><br>

    <button name="starszy">Sprawdź</button>
</form>

<?php
if (isset($_POST['starszy'])) {
    $data1 = $_POST['data1'];
    $data2 = $_POST['data2'];

    if ($data1 < $data2) {
        echo "Pierwsza osoba jest starsza";
    }
    elseif ($data2 < $data1) {
        echo "Druga osoba jest starsza";
    }
    else {
        echo "Osoby są w tym samym wieku";
    }
}
?>

<hr>

<h2>8. PRZESTĘPNY</h2>
<form method="post">
    <input type="number" name="rok" placeholder="Podaj rok" required>
    <button name="przestepny">Sprawdź</button>
</form>

<?php
if (isset($_POST['przestepny'])) {
    $rok = $_POST['rok'];

    if ($rok % 400 == 0 || ($rok % 4 == 0 && $rok % 100 != 0)) {
        echo "Rok jest przestępny";
    }
    else {
        echo "Rok nie jest przestępny";
    }
}
?>

<hr>

<h2>9. SIŁA HASŁA</h2>
<form method="post">
    <input type="text" name="haslo" placeholder="Podaj hasło" required>
    <button name="sila">Sprawdź hasło</button>
</form>

<?php
if (isset($_POST['sila'])) {
    $haslo = $_POST['haslo'];

    if (strlen($haslo) <= 4) {
        echo "Hasło słabe<br>";
    }
    elseif (strlen($haslo) <= 8) {
        echo "Hasło średnie<br>";
    }
    else {
        echo "Hasło mocne<br>";
    }

    if (!preg_match('/[0-9]/', $haslo)) {
        echo "Brak cyfry - hasło słabe<br>";
    }

    if (!preg_match('/[A-Z]/', $haslo)) {
        echo "Brak dużej litery - hasło słabe<br>";
    }

    if (!preg_match('/[a-z]/', $haslo)) {
        echo "Brak małej litery - hasło słabe<br>";
    }

    if (!preg_match('/[^a-zA-Z0-9]/', $haslo)) {
        echo "Brak znaku specjalnego - hasło słabe<br>";
    }
}
?>

<hr>

<h2>10. TRÓJKĄT</h2>
<form method="post">
    <input type="number" name="a" placeholder="Pierwszy bok" required>
    <input type="number" name="b" placeholder="Drugi bok" required>
    <input type="number" name="c" placeholder="Trzeci bok" required>
    <button name="trojkat">Sprawdź</button>
</form>

<?php
if (isset($_POST['trojkat'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    if ($a > 0 && $b > 0 && $c > 0 &&
        $a + $b > $c &&
        $a + $c > $b &&
        $b + $c > $a) {

        echo "Można utworzyć trójkąt";
    }
    else {
        echo "Nie można utworzyć trójkąta";
    }
}
?>

<hr>

<h2>11. SZYFR</h2>

<textarea id="tekst" oninput="SZYFR()" placeholder="Wpisz tekst"></textarea>

<p>Zaszyfrowany tekst:</p>
<div id="szyfr"></div>

<script>
function SZYFR() {
    let tekst = document.getElementById("tekst").value;
    let wynik = "";

    for (let i = 0; i < tekst.length; i++) {
        let znak = tekst[i];

        if (znak >= "a" && znak <= "z") {
            let kod = znak.charCodeAt(0) + 2;

            if (kod > 122) {
                kod = kod - 26;
            }

            wynik += String.fromCharCode(kod);
        }
        else if (znak >= "A" && znak <= "Z") {
            let kod = znak.charCodeAt(0) + 2;

            if (kod > 90) {
                kod = kod - 26;
            }

            wynik += String.fromCharCode(kod);
        }
        else {
            wynik += znak;
        }
    }

    document.getElementById("szyfr").innerText = wynik;
}
</script>

</body>
</html>
