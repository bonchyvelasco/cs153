<h1><?php
    if ($title == "Home") {
        echo "Welcome";
    } else {
        echo $title;
    }
?></h1>

<div class = "ui" style = "margin-top: 20px; max-width:400px;">
    <h2 class="ui header">Log-In</h2>

    <form class="ui form" style = "margin-bottom:10px;" action="Controller/authenticate" method="post">
        <div class="required field">
            <label>Username</label>
            <input type="text" name="username" autofocus placeholder="Username">
        </div>

        <div class="required field">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
		<input class = "ui submit button" type = "submit"></input>
    </form>
</div>