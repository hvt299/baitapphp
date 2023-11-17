<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<script>
    $(document).ready(function() {
        $("#sm").click(function(event) {
            $.get(
                "check.php", {
                    user: $("#us").val(),
                    pass: $("#pw").val()
                },
                function(data) {
                    $('#nt').css("display", "block");
                    $("#nt").slideDown("slow");
                    $("#nt").html(data);
                }
            );
        });
    });
</script>
<style>
    body {
        margin: 80px 200px;
        font: normal 14pt Arial;
        color: navy;
    }

    input {
        border: solid 1px silver;
        padding: 3px;
        font: normal 14pt Arial;
        color: blue;
        padding: 3px 5px;
    }

    fieldset {
        border: solid 2px green;
        border-radius: 8px;
        width: 335px;
        background-color: #DAFEF3;
    }

    div {
        width: 335px;
        border: solid 1px silver;
        padding: 10px 15px;
        font: normal 14pt Arial;
        color: green;
        background-color: yellow;
        box-shadow: 2px 2px black;
    }

    legend {
        color: red;
    }

    input[type=button] {
        float: right;
        padding: 5px 10px
    }
</style>
<body>
    <fieldset>
        <img src="images/logo-vku.png" alt="">
        <hr>
        <legend><b>LOGIN</b></legend>
        <table>
            <tr>
                <td style="width: 30%">Username</td>
                <td style="width: 70%">
                    <input type="text" id="us" onFocus="empty();">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" id="pw">
                </td>
            </tr>
            <tr>
                <td colspan = 2></td><br>
                <td>
                    <input type="button" value="Submit" id="sm">
                </td>
            </tr>
        </table>
    </fieldset>
    <br>
    <div id="nt" style="display: none;">Notice:</div>
</body>
</html>