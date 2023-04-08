<?php
    if(isset($_REQUEST['req'])) {
        $request = $_REQUEST['req'];
        switch ($request) {
            case 'exjs01':
                require './pageJS/exjs01.php';
                break;

            case 'exjs02':
                require './pageJS/exjs02.php';
                break;

            case 'exjs03':
                require './pageJS/exjs03.php';
                break;
            
            case 'userview':
                require './elements_NAK/mUser/userView.php';
                break;
            case 'updateuser':
                require './elements_NAK/mUser/userUpdate.php';
                break;
            case 'loaihangView':
                require './elements_NAK/mLoaihang/loaihangView.php';
                break;
        }
    }
    else {
        require './elements_NAK/default.php';
    }
?>