<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>World of Weather</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .body {
            background: url('images/weather_img_bg.jpeg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
        <h1>What is the weather</h1>
        <p>Enter place name</p>

        <form>
            <div class="mb-3">
                <input type="text" class="form-control" id="place" name="place">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="output">

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>