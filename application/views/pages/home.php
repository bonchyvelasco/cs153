<h1><?php
    if ($title == "Home") {
        echo "Welcome";
    } else {
        echo $title;
    }
?></h1>

<?php if(isset($errors)) { ?>
    <div class = "ui red inverted segment" style = "margin-top:20px">
        <div class = "ui right floated white icon close button">
            <i class = "close link icon"></i>
        </div>
        <div class = "ui header">
            There were errors in your form submission
        </div>
        <div class = "content">
            <?php echo $errors; ?>
        </div>
    </div>
<?php } ?>

<?php if(isset($success)) { ?>
    <div class = "ui green inverted segment" style = "margin-top:20px">
        <div class = "ui right floated white icon close button">
            <i class = "close link icon"></i>
        </div>
        <div class = "ui header">
            Success
        </div>
        <div class = "content">
            <?php echo $success; ?>
        </div>
    </div>
<?php } ?>

<div class = "ui horizontal basic segments" style = "box-shadow:none; border:none;">
    <div class = "ui basic segment" style = "box-shadow:none; border:none; margin-right: 20px;">
        <h2 class="ui header">Log-In</h2>
         <form class="ui form" style = "margin-bottom:10px;" action="Controller/authenticate" method="post">
            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
            <div class="required field">
                <label>Username</label>
                <input type="text" name="username" autofocus placeholder="Username">
            </div>

            <div class="required field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <input class = "ui submit button" type = "submit" value = "Log In">
        </form>
    </div>

    <div class="ui vertical divider">
        OR
    </div>

    <div class = "ui basic segment" style = "box-shadow:none; border:none; margin-left: 20px;">
        <h2 class="ui header">Register</h2>

        <div class="ui form" style = "margin-bottom:10px;">
            <div class="required field">
                <label>Username</label>
                <input type="text" autofocus placeholder="Username">
            </div>

            <div class="required field">
                <label>Name</label>
                <input type="text" placeholder="Name">
            </div>

            <div class="required field">
                <label>Address</label>
                <input type="text" placeholder="Password">
            </div>
            
            <div class="required field">
                <label>Birthday</label>
                <input type="date" placeholder="yyyy-mm-dd">
            </div>

            <div class="required field">
                <label>Password</label>
                <input type="password" placeholder="Password">
            </div>
            
            <div class="required field">
                <label>Confirm Password</label>
                <input type="password" placeholder="Password">
            </div>

            <button class = "ui submit button">Register</button>
        </div>
    </div>
</div>