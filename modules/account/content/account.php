<?php 

// check email
function countAccountExistEmail($conn,$data) {
    $sm_check = $conn->prepare("SELECT * FROM account WHERE email = :email and id != :id");
    $sm_check->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $sm_check->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm_check->execute();
    $count = $sm_check->rowCount();
    if($count != 0) {
        return true;
    }
    return false;
}

//Edit Account No Avatar No Password
function editAccountNoAvatarNoPassword($conn, $data) {
    $sm = $conn->prepare("UPDATE account SET fullname = :fullname, email = :email, gender = :gender, date_of_birth = :date_of_birth, phone = :phone, level = 3, status = 1 WHERE id = :id");
    $sm->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->execute();
}

//Edit Account No Password
function editAccountNoPassword($conn, $data) {
    $sm = $conn->prepare("UPDATE account SET fullname = :fullname, email = :email, avatar = :avatar, gender = :gender, date_of_birth = :date_of_birth, phone = :phone, level = 3, status = 1 WHERE id = :id");
    $sm->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":avatar", $data["avatar"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->execute();
}

//Edit Account No Avatar 
function editAccountNoAvatarY($conn, $data) {
    $sm = $conn->prepare("UPDATE account SET fullname = :fullname, email = :email, password = :password, gender = :gender, date_of_birth = :date_of_birth, phone = :phone, level = 3, status = 1 WHERE id = :id");
    $sm->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->execute();
}

//Edit Account
function editAccount($conn, $data) {
    $sm = $conn->prepare("UPDATE account SET fullname = :fullname, email = :email, password = :password, avatar = :avatar, gender = :gender, date_of_birth = :date_of_birth, phone = :phone, level = 3, status = 1 WHERE id = :id");
    $sm->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $sm->bindParam(":avatar", $data["avatar"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->execute();
}

//Create Account no password no avatar 
function createAccountNoPasswordNoAvatar($conn, $data) {
    $sm = $conn->prepare("INSERT INTO account(fullname, email, login_type, gender, date_of_birth, phone, level, created,branch_id, status) VALUES(:fullname, :email, :login_type, :gender,:date_of_birth, :phone, :level, :created, 1, 1)");
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":login_type", $data["login_type"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->bindParam(":level", $data["level"], PDO::PARAM_INT);
    $sm->bindParam(":created", $data["created"], PDO::PARAM_INT);
    $sm->execute();
    $_SESSION['loginclient']['id'] = $conn->lastInsertId();
    unset($_SESSION['loginclient']['email']);
    unset($_SESSION['loginclient']['fullname']);
}

//Create Account no password
function createAccountNoPasswordClient($conn, $data) {
    $sm = $conn->prepare("INSERT INTO account(fullname, email, avatar, login_type, gender, date_of_birth, phone, level, created,branch_id, status) VALUES(:fullname, :email, :avatar, :login_type, :gender,:date_of_birth, :phone, :level, :created, 1, 1)");
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":avatar", $data["avatar"], PDO::PARAM_STR);
    $sm->bindParam(":login_type", $data["login_type"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->bindParam(":level", $data["level"], PDO::PARAM_INT);
    $sm->bindParam(":created", $data["created"], PDO::PARAM_INT);
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    $sm->execute();
    $_SESSION['loginclient']['id'] = $conn->lastInsertId();
    unset($_SESSION['loginclient']['email']);
    unset($_SESSION['loginclient']['fullname']);
}

//Create Account no avatar 
function createAccountNoAvatarClient($conn, $data) {
    $sm = $conn->prepare("INSERT INTO account(fullname, email, password, login_type, gender, date_of_birth, phone, level, created,branch_id, status) VALUES(:fullname, :email, :password, :login_type, :gender,:date_of_birth, :phone, :level, :created, 1, 1)");
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $sm->bindParam(":login_type", $data["login_type"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->bindParam(":level", $data["level"], PDO::PARAM_INT);
    $sm->bindParam(":created", $data["created"], PDO::PARAM_INT);
    $sm->execute();
    $_SESSION['loginclient']['id'] = $conn->lastInsertId();
    unset($_SESSION['loginclient']['email']);
    unset($_SESSION['loginclient']['fullname']);
}

//Create Account
function createAccountClient($conn, $data) {
    $sm = $conn->prepare("INSERT INTO account(fullname, email, password, avatar, login_type, gender, date_of_birth, phone, level, created,branch_id, status) VALUES(:fullname, :email, :password, :avatar, :login_type, :gender,:date_of_birth, :phone, :level, :created, 1, 1)");
    $sm->bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
    $sm->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $sm->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $sm->bindParam(":avatar", $data["avatar"], PDO::PARAM_STR);
    $sm->bindParam(":login_type", $data["login_type"], PDO::PARAM_STR);
    $sm->bindParam(":gender", $data["gender"], PDO::PARAM_INT);
    $sm->bindParam(":date_of_birth", $data["date_of_birth"], PDO::PARAM_STR);
    $sm->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
    $sm->bindParam(":level", $data["level"], PDO::PARAM_INT);
    $sm->bindParam(":created", $data["created"], PDO::PARAM_INT);
    $sm->execute();
    $_SESSION['loginclient']['id'] = $conn->lastInsertId();
    unset($_SESSION['loginclient']['email']);
    unset($_SESSION['loginclient']['fullname']);
}


if(!empty($_SESSION['loginclient']['id'])) {
    $idaccount = $_SESSION['loginclient']['id'];
    $smaccount = $conn->prepare("SELECT * FROM account WHERE id = :id");
    $smaccount->bindParam(":id", $idaccount, PDO::PARAM_INT);
    $smaccount->execute();
    $dataacount = $smaccount->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['update'])) {
        $data = array();
        $errors = array();
        $data['id'] =  $_SESSION['loginclient']['id'];
        $data['fullname'] = $_POST['fullname'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['gender'] = $_POST['gender'];
        $data['date_of_birth'] = $_POST['date_of_birth'];
        $checkEmail = countAccountExistEmail($conn,$data);
        if($checkEmail) {
            $errors[] = "<li>Email already exists</li>";
        }
        if(!empty($_POST['password'])) {
            // co pass moi
            $data['password'] = md5($_POST['password']);
            //check pass nhap lai
            if(empty($_POST['password_confirm'])) {
                $errors[] = "<li>Please enter password confirm</li>";  
            } else {
                if($_POST['password'] != $_POST['password_confirm']) {
                    $errors[] = "<li>The password is not the same</li>";  
                }
            }
            if(!empty($_FILES['avatar']['name'])) {
                // nieu co hinh anh
                $data['avatar']= time() . "-" . $_FILES['avatar']["name"];
                $data["avatar_tmp"] = $_FILES["avatar"]["tmp_name"];
                $strposAvatar = mb_strrpos($data['avatar'], ".");
                $substrAvatar = mb_substr($data['avatar'], $strposAvatar + 1);
                if (($substrAvatar != 'jpg') && ($substrAvatar != 'jpeg') && ($substrAvatar != 'png') && ($substrAvatar != 'gif')) {
                    $errors[] = "<li>Please enter the correct image file format (jpg, jpeg, png, gif).</li>";
                }
                if(empty($errors)) {
                    editAccountNoPassword($conn, $data);
                    move_uploaded_file($data["avatar_tmp"], "public/image/account/".$data["avatar"]);
                    if (isset($dataacount["avatar"])) {
                        unlink("public/image/account/".$dataacount["avatar"]);
                    }
                    header("location:index.php?p=myaccount");
                    exit();
                } else {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }
            } else {
                // khong co hinh anh
                if(empty($errors)) {
                   editAccountNoAvatarY($conn, $data);
                   header("location:index.php?p=myaccount");
                   exit();
                } else {
                    foreach($errors as $error) {
                        echo $error;
                    }
                }
            }
        } else {
            // k co pass moi
            if(!empty($_FILES['avatar']['name'])) {
                // nieu co hinh anh
                $data['avatar']= time() . "-" . $_FILES['avatar']["name"];
                $data["avatar_tmp"] = $_FILES["avatar"]["tmp_name"];
                $strposAvatar = mb_strrpos($data['avatar'], ".");
                $substrAvatar = mb_substr($data['avatar'], $strposAvatar + 1);
                if (($substrAvatar != 'jpg') && ($substrAvatar != 'jpeg') && ($substrAvatar != 'png') && ($substrAvatar != 'gif')) {
                    $errors[] = "<li>Please enter the correct image file format (jpg, jpeg, png, gif).</li>";
                }
                if(empty($errors)) {
                    editAccountNoPassword($conn, $data);
                    move_uploaded_file($data["avatar_tmp"], "public/image/account/".$data["avatar"]);
                    if (isset($dataacount["avatar"])) {
                        unlink("public/image/account/".$dataacount["avatar"]);
                    }
                    header("location:index.php?p=myaccount");
                    exit();
                } else {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }
            } else {
                // khong co hinh anh
                if(empty($errors)) {
                   editAccountNoAvatarNoPassword($conn, $data);
                   header("location:index.php?p=myaccount");
                   exit();
                } else {
                    foreach($errors as $error) {
                        echo $error;
                    }
                }
            }
        }
    }

}



if (!empty($_SESSION['loginclient']['email'])) {
    if(isset($_POST['update'])) {
        $data = array();
        $errors = array();
        $data['fullname'] = $_POST['fullname'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['gender'] = $_POST['gender'];
        $data['login_type'] = 'facebook';
        $data['level'] = 3;
        $data['date_of_birth'] = $_POST['date_of_birth'];
        $data['created'] = time();
        if(empty($_POST['password'])) {
            // nieu khong co password
            if(empty($_FILES['avatar']['name'])) {
                // neu khong co pass va khong co hinh anh
                createAccountNoPasswordNoAvatar($conn, $data);
                header('location:index.php?p=myaccount');
                exit();
            } else {
                // neu khong co pass va co hinh anh
                $data['avatar']= time() . "-" . $_FILES['avatar']["name"];
                $data["avatar_tmp"] = $_FILES["avatar"]["tmp_name"];
                $strposAvatar = mb_strrpos($data['avatar'], ".");
                $substrAvatar = mb_substr($data['avatar'], $strposAvatar + 1);
                if (($substrAvatar != 'jpg') && ($substrAvatar != 'jpeg') && ($substrAvatar != 'png') && ($substrAvatar != 'gif')) {
                    $errors[] = "<li>Please enter the correct image file format (jpg, jpeg, png, gif).</li>";
                } 
                if(empty($errors)) {
                    createAccountNoPasswordClient($conn, $data);
                    move_uploaded_file($data["avatar_tmp"], "public/image/account/".$data["avatar"]);
                    header('location:index.php?p=myaccount');
                    exit();
                } else {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }
            }
        } else {
            // nieu co password
            $data['password'] = md5($_POST['password']);
            if(empty($_POST['password_confirm'])) {
                $errors[] = "<li>Please enter again password confirm</li>";
            }
            if(!empty($_POST['password_confirm'])) {
                if($_POST['password_confirm'] != $_POST['password']) {
                    $errors[] = "<li>The password is not the same</li>";  
                }
            }
            if(empty($errors)) {
                if(empty($_FILES['avatar']['name'])) {
                    // nieu khong co hinh anh 
                    createAccountNoAvatarClient($conn, $data);
                    header('location:index.php?p=myaccount');
                    exit();
                } else {
                    // nieu co hinh anh
                    $data['avatar']= time() . "-" . $_FILES['avatar']["name"];
                    $data["avatar_tmp"] = $_FILES["avatar"]["tmp_name"];
                    $strposAvatar = mb_strrpos($data['avatar'], ".");
                    $substrAvatar = mb_substr($data['avatar'], $strposAvatar + 1);
                    if (($substrAvatar != 'jpg') && ($substrAvatar != 'jpeg') && ($substrAvatar != 'png') && ($substrAvatar != 'gif')) {
                        $errors[] = "<li>Please enter the correct image file format (jpg, jpeg, png, gif).</li>";
                    } 
                    if(empty($errors)) {
                        createAccountClient($conn, $data);
                        move_uploaded_file($data["avatar_tmp"], "public/image/account/".$data["avatar"]);
                        header('location:index.php?p=myaccount');
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
}




?>

<form action="" class="aa-login-form" method="POST" enctype="multipart/form-data">
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                            <h4 style="text-align: center" class="text-primary">Thông tin tài khoản</h4>
                            <div class="aa-myaccount-register">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img style="border-radius: 50%;" src="public/image/account/<?php
                                            if(!empty($_SESSION['loginclient']['id'])) {
                                                if(!empty($dataacount['avatar'])) {
                                                    echo $dataacount['avatar'];
                                                } else {
                                                    echo "user.png";
                                                }
                                            } else {
                                                echo "user.png";
                                            }
                                        ?>" width="200px" height="200px">
                                        <input type="file" name="avatar"  class="form-control">                   
                                    </div>
                                </div>
                                <div class="col-md-8">    
                                    <div class="form-group">
                                        <label>Fullname</label>
                                        <input required type="text" name="fullname"   class="form-control" placeholder="Fullname"
                                            value=<?php 
                                                if(!empty($_SESSION['loginclient']['id'])) { 
                                                    echo $dataacount['fullname']; 
                                                } else {
                                                    echo $_SESSION['loginclient']['fullname'];
                                                }
                                            ?>
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input <?php if(!empty($_SESSION['loginclient']['fullname'])) { echo 'readonly'; } ?> type="email" name="email"  class="form-control" placeholder="Email"
                                            value=<?php 
                                                if(!empty($_SESSION['loginclient']['id'])) {
                                                    echo $dataacount['email'];
                                                }  else {
                                                    echo $_SESSION['loginclient']['email'];
                                                }
                                            ?>
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input required type="text" name="phone" pattern="0[0-9]{9}" class="form-control" placeholder="Phone number"
                                            value=<?php if(!empty($_SESSION['loginclient']['id'])) {echo $dataacount['phone'];} ?>
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password"  class="form-control" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <label>Password Confirm</label>
                                        <input type="password" name="password_confirm"  class="form-control" placeholder="Password confirm">
                                    </div>

                                    <div class="radio">
                                        <label  style="transform: translateX(-20px);">Gender</label>
                                        <br>
                                        <?php
                                        if(!empty($_SESSION['loginclient']['id'])) {
                                            if($dataacount['gender'] == 1) {
                                        ?>
                                        <label class="radio-inline" style="margin: 10px;"><input type="radio" name="gender" value="1" checked>Male</label>
                                        <label class="radio-inline"><input type="radio" name="gender" value="0" >Female</label>
                                        <?php
                                            } else {
                                        ?>
                                        <label class="radio-inline" style="margin: 10px;"><input type="radio" name="gender" value="1">Male</label>
                                        <label class="radio-inline"><input type="radio" name="gender" value="0" checked>Female</label>
                                        <?php
                                            }
                                        } else {
                                        ?>
                                        <label class="radio-inline" style="margin: 10px;"><input type="radio" name="gender" value="1" checked>Male</label>
                                        <label class="radio-inline"><input type="radio" name="gender" value="0" >Female</label>
                                        <?php 
                                        }
                                        ?>
                                    </div>                                    

                                    <div class="form-group">
                                        <label>Date of birth</label>
                                        <input required type="date" name="date_of_birth"  class="form-control"
                                            value=<?php if(!empty($_SESSION['loginclient']['id'])){ echo $dataacount['date_of_birth']; } ?>
                                        >
                                    </div>    
                                    <button type="submit" name="update" class="aa-browse-btn">Cập nhật</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>