<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Ckeditor 4</title>
    <link type="text/css" rel="stylesheet" href="../ckeditor5-build-classic/sample/css/sample.css" />
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
    <form action="../ckeditor5-build-classic/ckeditor.php" method="post">
        <textarea name="tomtat" cols="" rows="" ></textarea>
        <textarea name="tomtat1" cols="" rows="" ></textarea>
        <?php
            // Include the CKEditor class.
            include_once "../ckeditor_4.23.0-lts_standard/ckeditor/ckeditor_php4.php";
            // Create a class instance.
            $CKEditor = new CKEditor();
            // Path to the CKEditor directory.
            $CKEditor->basePath = '../ckeditor_4.23.0-lts_standard/ckeditor/';
            // Replace a textarea element with an id (or name) of "textarea_id".
            $CKEditor->replace("tomtat");
            $CKEditor->replaceall();
        ?>
        <input name="ok" type="submit" value="Ok" />
    </form>
    <?php
        if(isset($_POST["tomtat"]))
        echo stripslashes($_POST["tomtat"]);
        if(isset($_POST["tomtat1"]))
        echo $_POST["tomtat1"];
    ?>
</body>
</html>