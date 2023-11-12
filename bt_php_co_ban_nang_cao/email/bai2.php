<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMO GỬI EMAIL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
    <div class="container">
        <form action="mail.php" enctype="multipart/form-data" method="post">
            <h1>Email tới bạn</h1>
            <label for="email">Email</label><br>
            <input type="text" class="form-control" name="email" placeholder="Email"><br>
            <label for="tieude">Subject</label><br>
            <input type="text" class="form-control" name="tieude" placeholder="Tiêu đề"><br>
            <label for="content">Nội dung</label><br>
            <textarea name="content" id="editor" class="form-control"></textarea><br>
            <script type="text/javascript">
                // For Ckeditor5:
                // ClassicEditor
                //     .create(document.querySelector('#editor'))
                //     .catch(error => {
                //         console.error(error)
                //     });

                // For Ckeitor4:
                CKEDITOR.replace('content');
            </script>
            <label for="file">File đính kèm</label><br>
            <input type="file" class="form-control" name="file"><br>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>
</body>
</html>