<html>
<head>
    <title>L's Files  <?php echo $md_path_all; ?></title>
    <link rel="shortcut icon" href="resources/themes/bootstrap/img/folder.png" /> <!-- 网站LOGO -->
    <link rel="stylesheet" href="resources/themes/bootstrap/css/bootstrap.min.css" /> <!-- CSS基本库 -->
    <link rel="stylesheet" href="resources/themes/bootstrap/css/font-awesome.min.css" /> <!-- 网站图标CSS式样 -->
    <link rel="stylesheet" href="resources/themes/bootstrap/css/style.css" /> <!-- 网站主要式样 -->
    <link rel="stylesheet" href="resources/themes/bootstrap/css/prism.css" /> <!-- 代码高亮式样 -->
    <script src="resources/themes/bootstrap/js/jquery.min.js"></script> <!-- JS基本库 -->
    <script src="resources/themes/bootstrap/js/bootstrap.min.js"></script> <!-- JS基本库 -->
    <script src="resources/themes/bootstrap/js/prism.js"></script> <!-- 代码高亮JS依赖 -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php file_exists('analytics.inc') ? include('analytics.inc') : false; ?>
</head>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="jumbotron">
                <h1>
                    临时文件上传!
                </h1>
                <p>
                    路径在 tmp_file
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="index.php"> 返回 </a>
                </p>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Rename</label><input type="text" class="form-control" id="rename" name="rename"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label><input type="password" class="form-control" id="password" name="password"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label><input type="file" id="File" name="file"/>

                </div>

                <button type="submit" class="btn btn-default" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: lanvnal
 * Date: 2018/12/17
 * Time: 6:15 PM
 */
$file_path = 'Tmp_Files/'.date("Y-m-d").'/';
#print $file_path;
if(!file_exists($file_path)){
    mkdir($file_path);
}


if(isset($_POST['submit'])){
    $file_rename = $_POST['rename'];
    if($_POST['password'] == 'yourpassword'){
        $file = $_FILES['file'];
        $filenames = $file['name'];
        $filetypes = $file['type'];
        $filesizes = $file['size'];
        $filetmps = $file['tmp_name'];
        $type = substr(strrchr($filenames, '.'), 1);
        $filenames = $file_rename.'.'.$type;

        $success = null;

        if(move_uploaded_file($filetmps, $file_path.$filenames)) {
            $success = true;
        } else {
            $success = false;
        }
        if($success){
            echo '<div class="alert alert-success">Upload Success!</div>';
        }
        else{
            echo '<div class="alert alert-success">Upload Fails!</div>';
        }
    }
    else{
        echo '<div class="alert alert-success">password error!</div>';
    }
}
