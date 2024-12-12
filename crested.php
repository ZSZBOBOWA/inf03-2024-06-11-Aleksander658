<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <nav>
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </nav>
    <aside>
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
                $polaczenie = mysqli_connect('localhost','root','','hodowla');
                $zapytanie = "SELECT `rasa` FROM `rasy` WHERE 1;";
                $wynik = mysqli_query($polaczenie, $zapytanie);

                while ($wiersz = mysqli_fetch_assoc($wynik)) {
                    echo "<li>" . $wiersz['rasa'] . "</li>";
                }
            ?>
        </ol>
    </aside>
    <main>
        <img src="crested.jpg" alt="świnka morska rasy crested">
        <?php
            $polaczenie2 = mysqli_connect('localhost','root','','hodowla');
            $zapytanie2 = "SELECT DISTINCT swinki.data_ur, swinki.miot, rasy.rasa FROM `swinki` JOIN rasy ON rasy_id = rasy.id WHERE rasy.id = 7;";
            $wynik2 = mysqli_query($polaczenie2, $zapytanie2);
            
            while ($wiersz2 = mysqli_fetch_assoc($wynik2)) {
                echo "<h2>Rasa: " . $wiersz2['rasa'] . "</h2><br><p>Data urodzenia: " . $wiersz2['data_ur'] . "<p><br><p>Oznaczenie miotu: " . $wiersz2['miot'] . "</p>";
            }
        ?>
        <div class="linia"></div>
        
        <?php
            $polaczenie3 = mysqli_connect('localhost','root','','hodowla');
            $zapytanie3 = "SELECT `imie`, `cena`, `opis` FROM `swinki` WHERE rasy_id = 7;";
            $wynik3 = mysqli_query($polaczenie2, $zapytanie3);
            
            while ($wiersz3 = mysqli_fetch_assoc($wynik3)) {
                echo "<h3>" . $wiersz3['imie'] . " - " . $wiersz3['cena'] . "zł</h3><p>" . $wiersz3['opis'] . "</p>";
            }
            
            mysqli_close($polaczenie3);
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: 01234567890</p>
    </footer>
</body>
</html>