<?php 
    include './inc/db.php';
    include './inc/form.php';

    $sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> musaid  alqahtani</title>
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <meta property="og:image" content="images\tvtcc.png">

</head>
<body>

<div id="background"></div> 
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <img src="images/giphy.gif" alt="">
        <h1 class="display-4 fw-normal">اربح معنا</h1>
        <p class="lead fw-normal">الوقت المتبقي على فتح التسجيل</p>
        <h3 id="dad"></h3>
        <p class="lead fw-normal">    للسحب اتبع ما يلي:</p>
    </div>
    <h3>للمشاركة في السحب، يُرجى اتباع الخطوات التالية:</h3>
<ul class="list-group list-group-flush">
    <li class="list-group-item">تابع البث المباشر على منصة   <mark>X</mark>   في التاريخ المحدد</li>
    <li class="list-group-item">سأقوم ببث مباشر لمدة ساعة عبارة عن  أسئلة وأجوبة حرة للجميع</li>
    <li class="list-group-item">خلال فترة الساعتين، سيتم فتح صفحة التسجيل هنا، حيث يمكنك تسجيل اسمك وبريدك الإلكتروني</li>
    <li class="list-group-item">في نهاية البث، سيتم اختيار أحد الفائزين من قاعدة البيانات بشكل عشوائي</li>
    <li class="list-group-item">الرابح  سيحصل على  جائزة من البرنامج</li>
</ul>




    <div class="container">
        <div class="position-relative text-center">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <h3>الرجاء إدخال البيانات</h3>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">الاسم الأول</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $firstname ?>">
                        <div class="form-text error"><?php echo $errors['firstnameerror'] ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">الاسم الأخير</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $lastname ?>">
                        <div class="form-text error"><?php echo $errors['lastnameerror'] ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="text" name="email" class="form-control" id="email" value="<?php echo $email ?>">
                        <div class="form-text error"><?php echo $errors['emailerror'] ?></div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">ارسال البيانات</button>
</form>
</div>
</div>
</div>
<div class="loader-con">
    <div id="loader">
        <canvas id="circularLoader" width="200" height="200"></canvas>
    </div>
</div>

<!-- Button trigger modal -->
<div class="d-grid gap-2 col-7 mx-auto my-5">
    <button type="button" id="winner" class="btn btn-primary">
        اختيار الرابح
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">الرابح في المسابقة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach($users as $user):?>
                    <h1 class="display-6 text-center modal-title" id="modalLabel"> <?php echo htmlspecialchars($user['firstname']) .' '.htmlspecialchars($user['lastname'])?> </h1>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/script.js"></script>
