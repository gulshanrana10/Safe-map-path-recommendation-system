<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
    <div class="jumbotron">
        <h1 class="display-1 text-center">Cautious</h1>
    </div>
    <div class="login-form">
        <form id="signup-form">
            <h2 class="text-center">Signup</h2>       
            <div class="form-group">
                <input type="email" id="signup-email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="string" id="signup-number" class="form-control" placeholder="Emergency Contact" required>
            </div>
            <div class="form-group">
                <input type="password" id="signup-password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Signup">
            </div>        
        </form>
        <p class="text-center"><a href="index.php">Already have an account?</a></p>
    </div>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-auth.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-analytics.js"></script>
    
    <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-firestore.js"></script>

    <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyD9lJGvpzFYY3ctmcRGdLdJaAhNdAyhS5M",
        authDomain: "cautious-8b6e4.firebaseapp.com",
        databaseURL: "https://cautious-8b6e4.firebaseio.com",
        projectId: "cautious-8b6e4",
        storageBucket: "cautious-8b6e4.appspot.com",
        messagingSenderId: "190211129776",
        appId: "1:190211129776:web:243827c2f4a21f6a17d675",
        measurementId: "G-33CJ4B6B1X"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    const auth = firebase.auth();
    const db = firebase.firestore();

    </script>

    <script src="./auth.js"></script>
    <script src="./index.js"></script>
</body>
</html>                                		                            