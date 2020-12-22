<?php 
if (isset($_POST["create"])){
    $emailClient = $_POST["email"];
    $contentClient = $_POST["content"];
    
    mail("From: mailprojectaptech@gmail.com", "Hi!", $contentClient, $emailClient);

    //header('location: index.php');
}


?>


<div class="container-fluid">
    <div class="row" >
        <div class="col-md-6">
        <iframe style="padding: 30px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9551308455157!2d106.67572621411615!3d10.737941662840711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad182844dd%3A0xe3099eb4c87f5610!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1595327255344!5m2!1svi!2s" 
            width="100%" height="490" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-md-6" style="padding: 30px;">
            <p>
                <span class="fa fa-home">
                180 Cao Lỗ, Phường 4, Quận 8, TP. Hồ Chí Minh
                </span>
            </p>
            <p>
                <span class="fa fa-envelope">
                mailprojectaptech@gmail.com
                </span>
            </p>
            <p>
                <span class="fa fa-phone">
                    0835606139
                </span>
            </p>
            <form action="" method="POST">
                <h4>Contact to our email</h4>
                <div class="form-group">
                    <label>Email</label>
                    <input required type="email" name="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea required class="form-control" name="content" rows="6" placeholder="Content"></textarea>
                </div>
                <button type="submit" name="create" class="aa-browse-btn">Send email</button>
            </form>
        </div>
    </div>
</div>
