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
        "address" => "MNL",
        "is_admin" => true,
        "is_online" => true
    );

    $users = array(
        array(
            "birthday" => '1998-09-14',
            "username" => "jenny",
            "name" => "JENIFEERR",
            "address" => "MNL",
            "is_admin" => false,
            "is_online" => true
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person2",
            "address" => "MNL",
            "is_admin" => false,
            "is_online" => false
        ),
        array(
            "birthday" => '1998-09-14',
            "username" => "bonchykels",
            "name" => "Person3",
            "address" => "QC",
            "is_admin" => true,
            "is_online" => true
        )
    );
?></h1>

<div class = "ui basic segment" style = "margin-top: 20px">
    <div class = "reg">
        <h1 class="ui header">
            <i class="user icon"></i>
            <div class = "content">
                <?php echo $luser['name']; ?>
                <sup><i class="blue edit link icon"></i></sup>
                <div class="sub header">@<?php echo $luser['username']; ?></div>
            </div>
        </h1>
        <p><?php echo $luser['address']; ?></p>
        <p><?php echo $luser['birthday']; ?></p>
    </div>
    
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
        <div class="ui small input" style = "margin: 5px 0 2.5px 0;">
            <input type="text" placeholder="Name" value = "<?php echo $luser['address']; ?>">
        </div>
        <br>
        <div class="ui small input" style = "margin: 2.5px 0 5px 0;">
            <input type="date" placeholder="Name" value = "<?php echo $luser['birthday']; ?>">
        </div>
        <br>
        <div class = "ui primary submit labeled icon button">
            <i class = "save icon"></i>
            Save
        </div>
        <div class = "ui red labeled icon cancel button">
            <i class = "remove icon"></i>
            Cancel
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $(".form").hide();
        $(".edit").click(function(){
            $(this).closest(".list").children().find(".frm").hide();
            $(this).closest(".list").children().find(".reg").show();
            $(this).closest(".basic, .item").find(".form, .frm").show();
            $(this).closest(".basic, .item").find(".form").find("input:first").focus();
            $(this).closest(".basic, .item").find(".reg").hide();
        });
        $(".cancel").click(function() {
            $(this).closest(".basic, .item").find(".form, .frm").hide();
            $(this).closest(".basic, .item").find(".reg").show();
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

<div class="ui relaxed list">
    <?php foreach($users as $user) {
        if ($user['is_online'] == true) {?>
            <div class="item" style = "cursor:pointer; padding: 5px;">
                <i class="user large icon"></i>
                <div class="content">
                    <div class = "sub header"><?php echo $user['name']; ?></div>
                    @<?php echo $user['username']; ?>
                </div>
            </div>
    <?php 
        }
    } ?>
</div>

<div class="ui horizontal divider">
    Birthdays
</div>

<div class="ui middle aligned relaxed list">
    <?php foreach($users as $user) {?>
        <div class="item" style = "cursor:pointer; padding:10px">
            <div class = "reg">
                <div class="left floated content">
                    <i class="user large icon"></i>
                    <?php echo $user['name']; ?> <span style = "color:grey">@<?php echo $user['username']; ?></span>
                    <tab>
                    <?php if($luser['is_admin']) {
                        echo $user['address'];
                    } ?>
                </div>
                <div class="right floated content">
                    <?php echo $user['birthday']; ?>
                    <?php if($luser['is_admin']) { ?>
                        <i class="blue edit link icon"></i>
                    <?php } ?>
                </div>
            </div>
            <?php if($luser['is_admin']) { ?>
            <div class = "frm">
                <div class = "left floated content">
                    <div class="ui form">
                        @<?php echo $user['username'];?>
                        <div class="ui input" style = "margin-right:-5px;margin-left:5px;">
                            <input type="text" placeholder="Name" value = "<?php echo $user['name']; ?>">
                        </div>
                        <div class="ui input" style = "padding: 15px;">
                            <input type="text" placeholder="Address" value = "<?php echo $user['address']; ?>">
                        </div>
                        <div class="ui small input" style = "margin: 2.5px 0 5px 0;">
                            <input type="date" placeholder="yyyy-mm-dd" value = "<?php echo $user['birthday']; ?>">
                        </div>
                        <div class = "ui primary submit labeled icon button">
                            <i class = "save icon"></i>
                            Save
                        </div>
                        <div class = "ui red labeled icon cancel button">
                            <i class = "remove icon"></i>
                            Cancel
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>