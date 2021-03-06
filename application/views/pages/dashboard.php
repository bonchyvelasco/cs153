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

<div class = "ui basic segment" style = "margin-top: 20px">
    <?php if($luser['is_admin']) { ?>
        <div class = "ui right floated blue labeled icon add button">
            <i class = "add icon"></i>
            Add User
        </div>
    <?php } ?>

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
    
    <form class="ui form" action = "Controller/update" method = "POST">
        <div class="ui transparent input">
            <h1 class = "ui header">
                <i class="user icon"></i>
                <div class = "content">
                    <input name = "name" type="text" placeholder="Name" value = "<?php echo $luser['name']; ?>">
                    <div class="sub header">@<?php echo $luser['username']; ?></div>
                </div>
            </h1>
        </div>
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
        <br>
        <div class="ui small input" style = "margin: 5px 0 2.5px 0;">
            <input type="text" name = "address" placeholder="Address" value = "<?php echo $luser['address']; ?>">
        </div>
        <br>
        <div class="ui small input" style = "margin: 2.5px 0 5px 0;">
            <input type="date" name = "birthday" placeholder="yyyy-mm-dd" value = "<?php echo $luser['birthday']; ?>">
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
    </form>

</div>


<div class="ui horizontal divider">
    Online Users
</div>

<div class="ui relaxed list">
    <?php
    $ctr = 0;

    foreach($users as $user) {
        if ($user['is_online'] == true  && $luser['id'] != $user['id']) {?>
            <div class="item" style = "cursor:pointer; padding: 5px;">
                <i class="user large icon"></i>
                <div class="content">
                    <div class = "sub header"><?php echo $user['name']; ?></div>
                    @<?php echo $user['username']; ?>
                </div>
            </div>
    <?php 
            $ctr++;
        }
    }
    
    if ($ctr == 0) { ?>
            <div class="item" style = "cursor:pointer; padding: 5px;">
                <div class="content">
                    No other users are online.
                </div>
            </div>
    <?php
    }
    ?>
</div>

<div class="ui horizontal divider">
    Birthdays
</div>

<div class="ui middle aligned relaxed list">
    <?php
    
    if (count($users) == 1) { ?>
        <div class="item" style = "cursor:pointer; padding: 5px;">
            <div class="content">
                No other users exist.
            </div>
        </div>
    <?php }

    foreach($users as $user) {
        if ($luser['id'] == $user['id'])
            continue;
    ?>    
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
                    <form class="ui form" method = "POST" action = "Controller/update/<?php echo $user['id'] ?>">
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        @<?php echo $user['username'];?>
                        <div class="ui input" style = "margin-right:-5px;margin-left:5px;">
                            <input type="text" name = "name" placeholder="Name" value = "<?php echo $user['name']; ?>">
                        </div>
                        <div class="ui input" style = "padding: 15px;">
                            <input type="text" name = "address" placeholder="Address" value = "<?php echo $user['address']; ?>">
                        </div>
                        <div class="ui small input" style = "margin: 2.5px 0 2.5px 0;">
                            <input type="date" name = "birthday" placeholder="yyyy-mm-dd" value = "<?php echo $user['birthday']; ?>">
                        </div>
                        <div class="ui checkbox" style = "margin-right:5px;margin-left:5px;">
                            <input name="admin" type="checkbox" value = "admin"
                            <?php
                                if ($user['is_admin']) {
                                    echo "checked";
                                }
                            ?>
                            >
                            <label>Superuser</label>
                        </div>
                        <div class = "ui primary submit labeled icon button" style = "margin-left: 5px" >
                            <i class = "save icon"></i>
                            Save
                        </div>
                        <div class = "ui red labeled icon cancel button">
                            <i class = "remove icon"></i>
                            Cancel
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<?php if ($luser['is_admin']) {?>
<div class="ui modal">
     <div class = "header">
        <i class = "close closer link icon"></i>
        Add User
    </div>
    <div class = "content">
        <form action = "Controller/add_user" method = "POST">
            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
            <div class="ui labeled input" style = "margin-bottom:5px">
                <div class = "ui label">
                    Name
                </div>
                <input type="text" placeholder="Name" name = "name">
            </div>
            <br>
            <div class="ui labeled input" style = "margin-bottom:5px">
                <div class = "ui label">
                    Username
                </div>
                <input type="text" placeholder="Username" name = "username">
            </div>
            <br>
            <div class="ui labeled input" style = "margin-bottom:5px">
                <div class = "ui label">
                    Address
                </div>
                <input type="text" placeholder="Address" name = "address">
            </div>
            <br>
            <div class="ui labeled input" style = "margin-bottom:5px">
                <div class = "ui label">
                    Birthday
                </div>
                <input type="date" placeholder="yyyy-mm-dd" name = "birthday">
            </div>
            <br>
            <div class="ui labeled input" style = "margin-bottom:5px">
                <div class = "ui label">
                    Password
                </div>
                <input type="password" placeholder="Password" name = "password">
            </div>
            <br>
            <div class="ui labeled input" style = "margin-bottom:10px">
                <div class = "ui label">
                    Confirm
                </div>
                <input type="password" placeholder="Confirm Password" name = "confirm_password">
            </div>
            <br>
            <div class="ui checkbox" style = "margin-bottom:20px">
                <input name="admin" type="checkbox" value = "admin">
                <label>Make this user a superuser</label>
            </div>
            <br>
            <input type = "submit" class = "ui primary submit button" value = "Add">
            <div class = "ui red closer button">
                Cancel
            </div>
        </form>
    </div>
</div>
<?php } ?>

<script>
    <?php if ($luser['is_admin']) { ?>
    $('.ui.modal').modal({
        inverted: true
    }).modal('attach events', '.button.add', 'show').modal('attach events', '.closer', 'hide');
    <?php } ?>
    $(document).ready(function(){
        $(".form").hide();
        $(".edit").click(function(){
            $(":root").find(".basic:first").find(".reg:first").show();
            $(":root").find(".basic:first").find(".form:first").hide(); 
            $(":root").find(".list").children().find(".reg").show();
            $(":root").find(".list").children().find(".frm").hide();
            $(this).closest(".basic, .item").find(".reg").fadeOut(200);
            $(this).closest(".basic, .item").find("form, .frm").delay(200).fadeIn(200);
            $(this).closest(".basic, .item").find("form, .frm").find(".input:first").find(".content").focus();
        });
        $(".cancel").click(function() {
            $(this).closest(".basic, .item").find(".form, .frm").fadeOut(200);
            $(this).closest(".basic, .item").find(".reg").delay(200).fadeIn(400);
        });
        $(".item").hover(function(){
            $(this).css('background', '#f7f7f7');
        }, function() {
            $(this).css('background', 'none');
        });
        $(".close.button").click(function() {
            $(this).closest(".inverted").slideUp();
        });
        $(".submit.button").click(function() {
            $(this).closest(".form").trigger("submit");
        });
    });
</script>