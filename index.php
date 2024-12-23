<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WeatherApk </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Weather App for many of Moroccans Cities by amm44ne</h1>
    <form method="POST">
        <label for="city"> Choose a city </label>
        <select name="city" id="city">
            <option value="Marrakesh" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Marrakesh') echo 'selected'; ?>>Casablanca</option>
            <option value="Rabat" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Rabat') echo 'selected'; ?>>Rabat</option>
            <option value="Nador" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Nador') echo 'selected'; ?>>Marrakesh</option>
            <option value="Oujda" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Oujda') echo 'selected'; ?>>Oujda</option>
            <option value="Fes" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Fes') echo 'selected'; ?>>Tangier</option>
            <option value="Sale" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Sale') echo 'selected'; ?>>Sale</option>
            <option value="Asilah" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Asilah') echo 'selected'; ?>>Khouribga</option>
            <option value="Meknes" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Meknes') echo 'selected'; ?>>Agadir</option>
            <option value="Essaouira" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Essaouira') echo 'selected'; ?>>Larache</option>
            <option value="Ifrane" <?php if(isset($_POST['city']) && isset($_POST['city']) == 'Ifrane') echo 'selected'; ?>>Tetouan</option>


        </select>
        <button type="submit" name="getWeather"> temperature </button>
    </form>

    <div id="result">
        <?php
        if (isset($_POST['getWeather'])) {
            $city = $_POST['city'];
            $apiKey = 'YOUR_API_KEY';
            $url = "https://api.openweathermap.org/data/2.5/weather?q=$city,MA&appid=$apiKey&units=metric";

            $request = curl_init();
            curl_setopt($request, CURLOPT_URL, $url);
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($request);
            curl_close($request);

            if ($response) {
                $data = json_decode($response, false);

                if (isset($data->main->temp)) {
                    $temp = $data->main->temp;
                    $description = $data->weather[0]->description;
                    $feels_like = $data->main->feels_like;

                    echo "<p>The temperature in $city is {$temp}°C with {$description} and feels like {$feels_like}°C.</p>";
                    If ($temp > 20) {
                        echo "<div class='sun-icon'>☀️</div>";
                    } else {
                    echo "<div class='sun-icon'>☁️</div>";
                    }
                }
                else { 
                    echo "There is something wrong while getting the data";
                }
            }
            else{
                    echo "There is something wrong with the API";
            }
         }
        ?>
    </div>

</body>




</html>