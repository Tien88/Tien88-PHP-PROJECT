<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

if (isset($POST['post'])) {

    $id = create_unique_id();
    $property_name = $POST['property_name'];
    $property_name = filter_var($property_name, FILTER_SANITIZE_STRING);

    $price = $POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $deposited = $POST['deposited'];
    $deposited = filter_var($deposited, FILTER_SANITIZE_STRING);

    $type = $POST['type'];
    $type = filter_var($type, FILTER_SANITIZE_STRING);

    $address = $POST['address'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);

    $furnished = $POST['furnished'];
    $furnished = filter_var($furnished, FILTER_SANITIZE_STRING);

    $price = $POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $bhk = $POST['bhk'];
    $bhk = filter_var($bhk, FILTER_SANITIZE_STRING);

    $bathroom = $POST['bathroom'];
    $bathroom = filter_var($bathroom, FILTER_SANITIZE_STRING);

    $bedroom = $POST['bedroom'];
    $bedroom = filter_var($bedroom, FILTER_SANITIZE_STRING);

    $balcony = $POST['balcony'];
    $balcony = filter_var($balcony, FILTER_SANITIZE_STRING);

    $carpet = $POST['carpet'];
    $carpet = filter_var($carpet, FILTER_SANITIZE_STRING);

    $age = $POST['age'];
    $age = filter_var($age, FILTER_SANITIZE_STRING);

    $loan = $POST['loan'];
    $loan = filter_var($loan, FILTER_SANITIZE_STRING);

    $room_floor = $POST['room_floor'];
    $room_floor = filter_var($room_floor, FILTER_SANITIZE_STRING);

    $description = $POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);

    if (isset($POST['list'])) {
        $list = $_POST['list'];
        $list = filter_var($list, FILTER_SANITIZE_STRING);
    } else {
        $list = 'no';
    }
    if (isset($POST['security_guard'])) {
        $security_guard = $_POST['security_guard'];
        $security_guard = filter_var($security_guard, FILTER_SANITIZE_STRING);
    } else {
        $security_guard = 'no';
    }
    if (isset($POST['play_ground'])) {
        $play_ground = $_POST['play_ground'];
        $play_ground = filter_var($play_ground, FILTER_SANITIZE_STRING);
    } else {
        $play_ground = 'no';
    }
    if (isset($POST['garden'])) {
        $garden = $_POST['garden'];
        $garden = filter_var($garden, FILTER_SANITIZE_STRING);
    } else {
        $garden = 'no';
    }
    if (isset($POST['water_supply'])) {
        $water_supply = $_POST['water_supply'];
        $water_supply = filter_var($water_supply, FILTER_SANITIZE_STRING);
    } else {
        $water_supply = 'no';
    }
    if (isset($POST['power_backup'])) {
        $power_backup = $_POST['power_backup'];
        $power_backup = filter_var($power_backup, FILTER_SANITIZE_STRING);
    } else {
        $power_backup = 'no';
    }
    if (isset($POST['parking_area'])) {
        $parking_area = $_POST['parking_area'];
        $parking_area = filter_var($parking_area, FILTER_SANITIZE_STRING);
    } else {
        $parking_area = 'no';
    }
    if (isset($POST['gym'])) {
        $gym = $_POST['gym'];
        $gym = filter_var($gym, FILTER_SANITIZE_STRING);
    } else {
        $gym = 'no';
    }
    if (isset($POST['shopping_mall'])) {
        $shopping_mall = $_POST['shopping_mall'];
        $shopping_mall = filter_var($shopping_mall, FILTER_SANITIZE_STRING);
    } else {
        $shopping_mall = 'no';
    }
    if (isset($POST['hospital'])) {
        $hospital = $_POST['hospital'];
        $hospital = filter_var($hospital, FILTER_SANITIZE_STRING);
    } else {
        $hospital = 'no';
    }
    if (isset($POST['school'])) {
        $school = $_POST['school'];
        $school = filter_var($school, FILTER_SANITIZE_STRING);
    } else {
        $school = 'no';
    }
    if (isset($POST['market_area'])) {
        $market_area = $_POST['market_area'];
        $market_area = filter_var($market_area, FILTER_SANITIZE_STRING);
    } else {
        $market_area = 'no';
    }

    $image_01 = $FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_01_ext = pathinfo($image_01, PATHINFO_EXTENSION);
    $rename_image_01 = create_unique_id().'.'.$image_01_ext;
    $image_01_size = $FILES['image_01']['size'];
    $image_01_tmp_size = $FILES['image_01']['tmp_size'];
    $image_01_folder = 'uploaded_files/'.$rename_image_01;

    $image_02 = $FILES['image_02']['name'];
    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
    $image_02_ext = pathinfo($image_02, PATHINFO_EXTENSION);
    $rename_image_02 = create_unique_id().'.'.$image_02_ext;
    $image_02_size = $FILES['image_02']['size'];
    $image_02_tmp_size = $FILES['image_02']['tmp_size'];
    $image_02_folder = 'uploaded_files/'.$rename_image_02;

    if (!empty($image_02)) {
        if($image_02_size > 2000000) {
            $warning_msg[] = 'image 02 size is too large';
        }else {
            move_uploaded_file($image_02_tmp_name, $image_02_folder);
        }
    } else {
        $rename_image_02 = '';
    }

    $image_03 = $FILES['image_03']['name'];
    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
    $image_03_ext = pathinfo($image_03, PATHINFO_EXTENSION);
    $rename_image_03 = create_unique_id().'.'.$image_03_ext;
    $image_03_size = $FILES['image_03']['size'];
    $image_03_tmp_size = $FILES['image_03']['tmp_size'];
    $image_03_folder = 'uploaded_files/'.$rename_image_03;

    if (!empty($image_03)) {
        if($image_03_size > 2000000) {
            $warning_msg[] = 'image 03 size is too large';
        }else {
            move_uploaded_file($image_03_tmp_name, $image_03_folder);
        }
    } else {
        $rename_image_03 = '';
    }

    $image_04 = $FILES['image_04']['name'];
    $image_04 = filter_var($image_04, FILTER_SANITIZE_STRING);
    $image_04_ext = pathinfo($image_04, PATHINFO_EXTENSION);
    $rename_image_04 = create_unique_id().'.'.$image_04_ext;
    $image_04_size = $FILES['image_04']['size'];
    $image_04_tmp_size = $FILES['image_04']['tmp_size'];
    $image_04_folder = 'uploaded_files/'.$rename_image_04;

    if (!empty($image_04)) {
        if($image_04_size > 2000000) {
            $warning_msg[] = 'image 04 size is too large';
        }else {
            move_uploaded_file($image_04_tmp_name, $image_04_folder);
        }
    } else {
        $rename_image_04 = '';
    }

    $image_04 = $FILES['image_04']['name'];
    $image_04 = filter_var($image_04, FILTER_SANITIZE_STRING);
    $image_04_ext = pathinfo($image_04, PATHINFO_EXTENSION);
    $rename_image_04 = create_unique_id().'.'.$image_04_ext;
    $image_04_size = $FILES['image_04']['size'];
    $image_04_tmp_size = $FILES['image_04']['tmp_size'];
    $image_04_folder = 'uploaded_files/'.$rename_image_04;

    if (!empty($image_04)) {
        if($image_04_size > 2000000) {
            $warning_msg[] = 'image 04 size is too large';
        }else {
            move_uploaded_file($image_04_tmp_name, $image_04_folder);
        }
    } else {
        $rename_image_04 = '';
    }

    $image_05 = $FILES['image_05']['name'];
    $image_05 = filter_var($image_05, FILTER_SANITIZE_STRING);
    $image_05_ext = pathinfo($image_05, PATHINFO_EXTENSION);
    $rename_image_05 = create_unique_id().'.'.$image_05_ext;
    $image_05_size = $FILES['image_05']['size'];
    $image_05_tmp_size = $FILES['image_05']['tmp_size'];
    $image_05_folder = 'uploaded_files/'.$rename_image_05;

    if (!empty($image_05)) {
        if($image_05_size > 2000000) {
            $warning_msg[] = 'image 05 size is too large';
        }else {
            move_uploaded_file($image_05_tmp_name, $image_05_folder);
        }
    } else {
        $rename_image_05 = '';
    }

    if($image_01_size > 2000000) {
        $warning_msg[] = 'image 01 size is too large';
    }else {
        $post_property = $conn -> prepare("INSERT INTO `property`(id, user_id, property_name, address, price, type, offer, status, furnished, bhk, deposite, bedroom, bathroom, balcony, carpet, age, total_floors, room_floor, loan, lift, security_guard, play_ground, garden, water_supply, power_backup, parking_area, gym, shopping_mall, hospital, school, market_area, image_01, image_02, image_03, image_04, image_05, description) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $post_property -> execute([$id, $user_id, $property_name, $address, $price, $type, $offer, $status, $furnished, $bhk, $deposite, $bedroom, $bathroom, $balcony, $carpet, $age, $total_floors, $room_floor, $loan, $lift, $security_guard, $play_ground, $garden, $water_supply, $power_backup, $parking_area, $gym, $shopping_mall, $hospital, $school, $market_area, $rename_image_01, $rename_image_02, $rename_image_03, $rename_image_04, $rename_image_05, $description]);
        move_uploaded_file($image_01_tmp_name, $image_01_folder);
        $success_msg[] = 'property posted!';
    }
}

include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Property</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- css link  -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- header start -->
    <?php include 'components/user_header.php'; ?>
    <!-- header end -->

<!-- post property starts -->

<section class="property-form">

    <form action="" method="post" enctype="multipart/form-data">
        <h3>Property Details</h3>
        <div class="box">
            <p>Property Name <span>*</span></p>
            <input type="text" name="property_name" maxlength="50" required placeholder="Enter Property Name"class="input">
        </div>
        <div class="flex">
            <div class="box">
                <p>Property Price <span>*</span></p>
                <input type="number" name="price" maxlength="10" min="0" max="9999999999" required placeholder="Enter Property Price"class="input">
            </div>
            <div class="box">
                <p>Deposite Amount <span>*</span></p>
                <input type="number" name="deposite" maxlength="10" min="0" max="9999999999" required placeholder="Enter Property Price"class="input">
            </div>
            <div class="box">
                <p>Property Address <span>*</span></p>
                <input type="text" name="address" maxlength="100" required placeholder="Enter Property Address"class="input">
            </div>
            <div class="box">
                <p>Offer Type<span>*</span></p>
                <select name="offer" class="input" required>
                    <option value="sale">sale</option>
                    <option value="resale">resale</option>
                    <option value="rent">rent</option>
                </select>
            </div>
            <div class="box">
                <p>Property Type<span>*</span></p>
                <select name="type" class="input" required>
                    <option value="sale">sale</option>
                    <option value="house">house</option>
                    <option value="shop">shop</option>
                </select>
            </div>
            <div class="box">
                <p>Property Status<span>*</span></p>
                <select name="status" class="input" required>
                    <option value="ready to move">ready to move</option>
                    <option value="under construction">under construction</option>
                </select>
            </div>
            <div class="box">
                <p>Furnished Status<span>*</span></p>
                <select name="furnished" class="input" required>
                    <option value="unfurnished">unfurnished</option>
                    <option value="semi-furnished">semi-furnished</option>
                    <option value="furnished">furnished</option>
                </select>
            </div>
            <div class="box">
                <p>How many BHK<span>*</span></p>
                <select name="bhk" class="input" required>
                    <option value="1">1 BHK</option>
                    <option value="2">2 BHK</option>
                    <option value="3">3 BHK</option>
                    <option value="4">4 BHK</option>
                    <option value="5">5 BHK</option>
                    <option value="6">6 BHK</option>
                    <option value="7">7 BHK</option>
                    <option value="8">8 BHK</option>
                    <option value="9">9 BHK</option>
                </select>
            </div>
            <div class="box">
                <p>How many bedrooms<span>*</span></p>
                <select name="bedroom" class="input" required>
                    <option value="1">1 bedroom</option>
                    <option value="2">2 bedrooms</option>
                    <option value="3">3 bedrooms</option>
                    <option value="4">4 bedrooms</option>
                    <option value="5">5 bedrooms</option>
                    <option value="6">6 bedrooms</option>
                    <option value="7">7 bedrooms</option>
                    <option value="8">8 bedrooms</option>
                    <option value="9">9 bedrooms</option>
                </select>
            </div>
            <div class="box">
                <p>How many bathrooms<span>*</span></p>
                <select name="bathroom" class="input" required>
                    <option value="1">1 bathroom</option>
                    <option value="2">2 bathrooms</option>
                    <option value="3">3 bathrooms</option>
                    <option value="4">4 bathrooms</option>
                    <option value="5">5 bathrooms</option>
                    <option value="6">6 bathrooms</option>
                    <option value="7">7 bathrooms</option>
                    <option value="8">8 bathrooms</option>
                    <option value="9">9 bathrooms</option>
                </select>
            </div>
            <div class="box">
                <p>How many balconys<span>*</span></p>
                <select name="balcony" class="input" required>
                    <option value="0">0 balcony</option>
                    <option value="1">1 balcony</option>
                    <option value="2">2 balconys</option>
                    <option value="3">3 balconys</option>
                    <option value="4">4 balconys</option>
                    <option value="5">5 balconys</option>
                    <option value="6">6 balconys</option>
                    <option value="7">7 balconys</option>
                    <option value="8">8 balconys</option>
                    <option value="9">9 balconys</option>
                </select>
            </div>
            <div class="box">
                <p>Carpet Area (sqft)<span>*</span></p>
                <input type="number" name="carpet" maxlength="10" min="0" max="9999999999" required placeholder="How May Squarefits"class="input">
            </div>
            <div class="box">
                <p>Property Age<span>*</span></p>
                <input type="number" name="age" maxlength="2" min="0" max="99" required placeholder="How Old Is Property"class="input">
            </div>
            <div class="box">
                <p>Total Floors<span>*</span></p>
                <input type="number" name="total_floors" maxlength="2" min="0" max="99" required placeholder="How many floors"class="input">
            </div>
            <div class="box">
                <p>Room Floor<span>*</span></p>
                <input type="number" name="room_fllor" maxlength="2" min="0" max="99" required placeholder="Property floor number"class="input">
            </div>
            <div class="box">
                <p>loan<span>*</span></p>
                <select name="status" class="input" required>
                    <option value="available">available</option>
                    <option value="not available">not available</option>
                </select>
            </div>
        </div>
        <div class="box">
            <p>Property Description<span>*</span></p>
            <textarea name="description" id="" cols="30" rows="10" maxlength="1000" require placeholder="enter property description" class="input"></textarea>
        </div>
        <div class="checkbox">
            <div class="box">
                <p><input type="checkbox" name="lift" value="yes"/>Lifts</p>
                <p><input type="checkbox" name="security_guard" value="yes"/>Security Guard</p>
                <p><input type="checkbox" name="play_ground" value="yes"/>Play Ground</p>
                <p><input type="checkbox" name="Garden" value="yes"/>Garden</p>
                <p><input type="checkbox" name="water_supply" value="yes"/>Water Supply</p>
                <p><input type="checkbox" name="power_backup" value="yes"/>Power Backup</p>
            </div>
            <div class="box">
                <p><input type="checkbox" name="Parking_area" value="yes"/>Parking_area</p>
                <p><input type="checkbox" name="gym" value="yes"/>gym</p>
                <p><input type="checkbox" name="shopping_mall" value="yes"/>shopping_mall</p>
                <p><input type="checkbox" name="hospital" value="yes"/>hospital</p>
                <p><input type="checkbox" name="school" value="yes"/>school</p>
                <p><input type="checkbox" name="market_area" value="yes"/>market_area</p>
            </div>
        </div>
        <div class="box">
            <p>image 01 <span></span></p>
            <input type="file" name="image_01" class="input" accept="image/*" required>
        </div>
        <div class="flex">
            <div class="box">
                <p>image 02 <span></span></p>
                <input type="file" name="image_02" class="input" accept="image/*">
            </div>
            <div class="box">
                <p>image 03 <span></span></p>
                <input type="file" name="image_03" class="input" accept="image/*">
            </div>
            <div class="box">
                <p>image 04 <span></span></p>
                <input type="file" name="image_04" class="input" accept="image/*">
            </div>
            <div class="box">
                <p>image 05 <span></span></p>
                <input type="file" name="image_05" class="input" accept="image/*">
            </div>
        </div>
        <input type="submit" value="post property" name="post" class="btn">
    </form>

</section>

<!-- post property ends -->










    <!-- footer starts -->

    <?php include 'components/footer.php'; ?>

    <!-- footer ends -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <!-- custom js file link  -->
    <script src="js/script.js"></script>

    <?php include 'components/message.php'; ?>


</body>

</html>