<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Feedback</title>
</head>
<body>
    <div class="jumbotron">
        <h1 class="display-3">Feedback</h1>
    </div>
    <form class="container">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-8 col-form-label">Rate your journey interms of safety.</label>
            <div class="col-sm-4">
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" style="width: 20%;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5" selected>5</option>
                  </select>
            </div>
        </div>
        
        <button type="button" class="text-center btn btn-success" onclick="backToMain()">Submit</button>
    </form>
    <script src="./index.js"></script>
</body>
</html>