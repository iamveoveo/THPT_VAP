<?php include("template/header.php"); ?>
<?php include("template/header-menu.php"); ?>

<div class="back">
    <div class="container mess-container">
        <div class="row h-100">
            <div class="col-3 mess-list">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="">
                            <div class="mess-item">
                                <div class="mess-ava">
                                    <img src="images/ava.png" alt="">
                                </div>
                                <div class="mess-name">
                                    Nguyễn Văn A
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="">
                            <div class="mess-item">
                                <div class="mess-ava">
                                    <img src="images/ava.png" alt="">
                                </div>
                                <div class="mess-name">
                                    Nguyễn Văn A
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-9 mess">
                <div class="mess-content">
                    <div class="ur-mess">
                        <div class="mess-cell">
                            Hey, yo bro!!
                        </div>
                    </div>
                    <div class="my-mess">
                        <div class="mess-cell">
                            Yo wazzup bro.
                        </div>
                    </div>
                    <div class="my-mess">
                        <div class="mess-cell">
                            Yo wazzup bro.
                        </div>
                    </div>
                </div>
                <div class="mess-send">
                    <form action="" class="w-100">
                        <input type="text" name="message-content" id="message-input" placeholder="nhập tin nhắn">
                        <button type="submit" name="message-send" id="send"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>