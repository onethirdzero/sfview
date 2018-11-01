<!doctype html>
<html class="no-js" lang="en" style="width: 100%; height: 100%;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SFView</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="manifest" href="/site.webmanifest">
    <link rel="apple-touch-icon" href="/icon.png">
    <link rel="icon" href="/favicon.ico">
    <link rel="shortcut icon" href="/favicon.ico">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/vendor/bootstrap.css">

    <style>
        .formDiv {
            padding: 20px;
            margin: 50px;
            background-color: lightskyblue;
            max-width: 750px;
        }
    </style>
</head>

<body style="background-color: antiquewhite">
<h1> This page as a placeholder. I will be replacing it with a modal. (pop-up)</h1>

<div class="formDiv">
    <form action="/php/usersInfo/Login.php">
        <fieldset>
            <legend>Log In Credentials</legend>
            <div class="form-group row">
                <label class="col-lg-3" for="email">Email</label>
                <input class="col-lg-9" type="text" class="form-control" id="email">
            </div>
            <div class="form-group row">
                <label class="col-lg-3" for="password">Password</label>
                <input class="col-lg-9" type="password" class="form-control" id="password">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Log In</button>
    </form>
</div>

<div class="formDiv">
    <form action="/php/usersInfo/SignUp.php">
        <fieldset>
            <legend>Log In Credentials</legend>
            <div class="form-group row">
                <label class="col-lg-3" for="exampleInputPassword1">Email</label>
                <input class="col-lg-9" type="text" class="form-control" id="email">
            </div>
            <div class="form-group row">
                <label class="col-lg-3" for="password">Password</label>
                <input class="col-lg-9" type="password" class="form-control" id="password">
            </div>
            <div class="form-group row">
                <label class="col-lg-3" for="password_confirm">Confirm Password</label>
                <input class="col-lg-9" type="password" class="form-control" id="password_confirm">
            </div>
            <fieldset class="form-group">
                <legend>User Type</legend>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="userType" id="user" value="option1" checked>
                        I'm just an ordinary user
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="userType" id="admin" value="option2">
                        Consider me for admin privileges. I want to review submitted photospheres and edit markers.
                    </label>
                </div>
            </fieldset>
            <fieldset class="form-group">
                <legend>Email Notifications</legend>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        I want to receive emails about developments on this site
                    </label>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Register</button>
        </fieldset>
    </form>
</div>
</body>
</html>
