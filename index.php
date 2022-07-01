<?php

    $weather = "";
    $error = "";

    if ($_GET['city']) {

        $city = str_replace(' ', '', $_GET['city']);

        $file_headers = @get_headers("http://www.weather-forecast.com/locations/" . $city . "/forecasts/latest");

        if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $error = "That city could not be found";
        } 
        else {
            
        $forecastPage = file_get_contents('http://www.weather-forecast.com/locations/' . $city . '/forecasts/latest');

        $pageArray = explode('Today</h2> (1&ndash;3 days):</div><p class="location-summary__text"><span class="phrase">', $forecastPage);

        if (sizeof($pageArray) > 1) {

            $secondPageArray = explode('</span></p></div>',$pageArray[1]);
            if (sizeof($secondPageArray) > 1) {
                $weather = $secondPageArray[0];
            }
            else {
                $error = "That city could not be found";
            }

        } else {
            $error = "That city could not be found";
        }
        }
        
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>World of Weather</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        html {
            background: url(weather_img_bg.jpeg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {
            background: none;
        }

        .container{
            text-align: center;
            margin-top: 200px;
            color: #F5F0BB;
            width: 450px;
        }

        input {
            margin: 20px 0;
        }

        #weather {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>What is the weather?</h1>
        <p>Enter place name</p>

        <form>
            <div class="mb-3">
                <input type="text" class="form-control" id="city" name="city" placeholder="Eg. London, Tokyo, Paris, Peckham..." value="<?php echo $_GET['city']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div id="weather">
            <?php
                if ($weather) {
                    echo '<div class="alert alert-success" role="alert">' . $weather . '</div>';
                }
                else if ($error) {
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                } else {
                    echo '<div class="alert alert-info" role="alert">Enter a city to get a forecast</div>';
                }
            ?>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>