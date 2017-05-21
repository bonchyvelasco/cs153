<h1><?php
    if ($title == "Home") {
        echo "Welcome";
    } else {
        echo $title;
    }

    $luser = array(
        "birthday" => '1998-09-14',
        "username" => "bonchykels",
        "name" => "Bonchy",
        "address" => "MNL"
    );

    $users = array(
        array(
            "birthday" => '1998-09-14',
            "username" => "jenny",
            "name" => "JENIFEERR",
            "address" => "MNL"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person2",
            "address" => "MNL"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC"
        ),
    );
?></h1>

<div id = "header" class = "ui basic segment" style = "margin-top: 20px">
    <h1 class="ui header">
        <i class="user icon"></i>
        <div class = "content">
            <?php echo $luser['name']; ?>
            <a id = "edit" style = "cursor:pointer"><sup><i class="edit icon"></i></sup></a>
            <div class="sub header">@<?php echo $luser['username']; ?></div>
        </div>
    </h1>
    <p><?php echo $luser['address']; ?></p>
    <p><?php echo $luser['birthday']; ?></p>
</div>

<div id = "form" class = "ui basic segment" style = "margin-top: 20px">
    <div class="ui form">
        <div class="ui transparent input">
            <h1 class = "ui header">
                <i class="user icon"></i>
                <div class = "content">
                    <input id = "name" type="text" placeholder="Name" value = "<?php echo $luser['name']; ?>">
                    <div class="sub header">@<?php echo $luser['username']; ?></div>
                </div>
            </h1>
        </div>
        <br>
        <div class="ui input" style = "margin: 5px 0 2.5px 0;">
            <input type="text" placeholder="Name" value = "<?php echo $luser['address']; ?>">
        </div>
        <br>
        <div class="ui input" style = "margin: 2.5px 0 5px 0;">
            <input type="date" placeholder="Name" value = "<?php echo $luser['birthday']; ?>">
        </div>
        <br>
        <div class = "ui submit button">Submit</div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#form").hide();
        $("#edit").click(function(){
            $("#header").hide();
            $("#form").show();
            $("#name").focus();
        });
        $(".item").hover(function(){
            $(this).css('background', '#f7f7f7');
        }, function() {
            $(this).css('background', 'none');
        });
    });
</script>

<div class="ui horizontal divider">
    Online Users
</div>

<div class="ui relaxed list" style="-webkit-column-count: 3; -moz-column-count: 3; column-count: 3;">
    <?php foreach($users as $user) {?>
        <div class="item" style = "cursor:pointer; padding: 5px;">
            <i class="user large icon"></i>
            <div class="content">
                <div class = "sub header"><?php echo $user['name']; ?></div>
                <span style = "color:grey">@<?php echo $user['username']; ?></span>
            </div>
        </div>
    <?php } ?>
</div>

<div class="ui horizontal divider">
    Birthdays
</div>

<div class="ui middle aligned relaxed list">
    <?php foreach($users as $user) {?>
        <div class="item" style = "cursor:pointer; padding:10px">
            <div class="left floated content">
                <i class="user large icon"></i>
                <?php echo $user['name']; ?> <span style = "color:grey">@<?php echo $user['username']; ?></span>
            </div>
            <div class="right floated content">
                <?php echo $user['birthday']; ?>
            </div>
        </div>
    <?php } ?>
</div>