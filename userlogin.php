<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="./js_NAK/jquery-3.6.4.min.js"></script>
        <link rel="stylesheet" href="./stylecss_NAK/mycss.css">
        <title>Login Website</title>
    </head>
    <body>
        <div id="loginBody">
            <h4 align="center">Đăng nhập hệ thống</h4>
            <form name="frmLogin" method="post" action="elements_NAK/mUser/userAct.php?reqact=checklogin">
                <table>
                    <tr><td>Tên toài khoản:</td>
                        <td><input type="text" name="username" id="username"></td></tr>
                    <tr><td>Mật khẩu:</td>
                        <td><input type="password" name="password" id="password"></td></tr>
                    <tr>
                        <td><input type="submit" value="Đăng nhập"></td></tr>
                </table>
            </form>
        </div>
    </body>
</html>