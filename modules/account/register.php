<?php
//Create Account no avatar client
function createAccountNoAvatarDataClient($conn, $data)
{
    $sm = $conn->prepare("INSERT INTO account(fullname, email, password, login_type, gender, date_of_birth, phone, level, created, status, branch_id) VALUES(:fullname, :email, :password, :login_type, :gender,:date_of_birth, :phone, :level, :created, :status, 1)");
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $sm->bindParam(":login_type", $data["login_type"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->bindParam(":level", $data["level"], PDO::PARAM_INT);
    $sm->bindParam(":created", $data["created"], PDO::PARAM_STR);
    $sm->bindParam(":status", $data["status"], PDO::PARAM_INT);
    $sm->execute();
    $_SESSION['loginclient']['id'] = $conn->lastInsertId();
}

//Create Account avatar client
function createAccountAvatarDataClient($conn, $data)
{
    $sm = $conn->prepare("INSERT INTO account(fullname, email, password, login_type, gender, date_of_birth, phone, level, avatar, created, status, branch_id) VALUES(:fullname, :email, :password, :login_type, :gender,:date_of_birth, :phone, :level, :avatar, :created, :status, 1)");
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $sm->bindParam(":login_type", $data["login_type"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->bindParam(":level", $data["level"], PDO::PARAM_INT);
    $sm->bindParam(":avatar", $data["avatar"], PDO::PARAM_STR);
    $sm->bindParam(":created", $data["created"], PDO::PARAM_STR);
    $sm->bindParam(":status", $data["status"], PDO::PARAM_INT);
    $sm->execute();
    $_SESSION['loginclient']['id'] = $conn->lastInsertId();
}

//Check Account exist 
function checkAccountExist($conn, $data) {
    $sm_check = $conn->prepare("SELECT * FROM account WHERE email = :email");
    $sm_check->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm_check->execute();
    $count = $sm_check->rowCount();
    if ($count != 0) return true;
    return false;
}


if (empty($_SESSION['loginclient']['id'])) {
    if (isset($_POST['create'])) {
        $data = array();
        $errors = array();
        $data['email'] = $_POST['email'];
        $checkemail = checkAccountExist($conn, $data);
        if($checkemail) {
            $errors[] = "<li>Email already exists</li>";
        }

        if (empty($_POST['fullname'])) {
            $errors[] = "<li>Please enter full name</li>";
        }

        if (empty($_POST['email'])) {
            $errors[] = "<li>Please enter email</li>";
        }

        if (empty($_POST['phone'])) {
            $errors[] = "<li>Please enter phone</li>";
        }

        if (empty($_POST['password'])) {
            $errors[] = "<li>Please enter password</li>";
        }

        if (empty($_POST['retypepassword'])) {
            $errors[] = "<li>Please enter retype password</li>";
        }

        if (empty($_POST['date_of_birth'])) {
            $errors[] = "<li>Please enter date of birth</li>";
        }

        if (!empty($_POST['password']) && !empty($_POST['retypepassword'])) {
            if ($_POST['password'] != $_POST['retypepassword']) {
                $errors[] = "<li>The password is not the same</li>";
            }
        }

        if (empty($errors)) {

            $data['fullname'] = $_POST['fullname'];
            $data['password'] = md5($_POST['password']);
            $data['gender'] = $_POST['gender'];
            $data['date_of_birth'] = $_POST['date_of_birth'];
            $data['phone'] = $_POST['phone'];
            // default
            $data['created'] = time();
            $data['level'] = 3;
            $data['login_type'] = 'email';
            $data['status'] = 1;
            // if there is no avatar
            if (empty($_FILES['avatar']['name'])) {
                createAccountNoAvatarDataClient($conn, $data);
                header("location:index.php");
                exit();
            } else {
                // if there's an avatar
                $data['avatar']= time() . "-" . $_FILES['avatar']["name"];
                $data["avatar_tmp"] = $_FILES["avatar"]["tmp_name"];
                $strposAvatar = mb_strrpos($data['avatar'], ".");
                $substrAvatar = mb_substr($data['avatar'], $strposAvatar + 1);
                if (($substrAvatar != 'jpg') && ($substrAvatar != 'jpeg') && ($substrAvatar != 'png') && ($substrAvatar != 'gif')) {
                    $errors[] = "<li>Please enter the correct image file format (jpg, jpeg, png, gif).</li>";
                }

                if(empty($errors)) {
                    createAccountAvatarDataClient($conn, $data);
                    move_uploaded_file($data["avatar_tmp"], "public/image/account/".$data["avatar"]);
                    header("location:index.php");
                    exit();
                } else {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }
            }
        } else {
            foreach ($errors as $error) {
                echo $error;
            }
        }
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="aa-myaccount-register">
                                    <h4>Đăng kí tài khoản</h4>
                                    <form action="" class="aa-login-form" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input required type="text" name="fullname" class="form-control" placeholder="Nhập họ và tên">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input required type="email" name="email" class="form-control" placeholder="Nhập email">
                                        </div>

                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input required type="text" name="phone" pattern="0[0-9]{9}" title="Vui lòng nhập đúng số điện thoại" class="form-control" placeholder="Nhập phone">
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input required type="password" name="password" class="form-control" placeholder="Nhập password">
                                        </div>

                                        <div class="form-group">
                                            <label>Retype password</label>
                                            <input required type="password" name="retypepassword" class="form-control" placeholder="Nhập lại password">
                                        </div>

                                        <div class="radio">
                                            <label style="transform: translateX(-20px);">Gender</label>
                                            <br>
                                            <label class="radio-inline" style="margin: 10px;"><input type="radio" name="gender" value="1" checked>Male</label>
                                            <label class="radio-inline"><input type="radio" name="gender" value="0">Female</label>
                                        </div>

                                        <div class="form-group">
                                            <label>Date of birth</label>
                                            <input required type="date" name="date_of_birth" class="form-control" placeholder="Nhập ngày tháng năm sinh">
                                        </div>

                                        <div class="form-group">
                                            <label>Avatar</label>
                                            <input type="file" name="avatar" class="form-control" placeholder="Nhập avatar">
                                        </div>

                                        <button type="submit" name="create" class="aa-browse-btn">Đăng kí</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>