<h1><?php
    if ($title == "Home") {
        echo "Welcome";
    } else {
        echo $title;
    }
?></h1>

<div class = "ui" style = "margin-top: 20px; max-width:400px;">
    <h2 class="ui header">Log-In</h2>

    <div class="ui form" style = "margin-bottom:10px;">
        <div class="required field">
            <label>Username</label>
            <input type="text" autofocus placeholder="Username">
        </div>

        <div class="required field">
            <label>Password</label>
            <input type="password" placeholder="Password">
        </div>

        <div class = "ui submit button">Submit</div>
    </div>
</div>