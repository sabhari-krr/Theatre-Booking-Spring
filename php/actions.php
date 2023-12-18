<?php
include("config.php");
session_start();
// Action decider block 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login-trigger'])) {
    login($_POST['usermail'], $_POST['userpwd'], $db);
} elseif (isset($_POST['logout'])) {
    logout();
}
//Login action
function login($email, $pwd, $db)
{
    $email = mysqli_real_escape_string($db, $email);
    $pwd = mysqli_real_escape_string($db, $pwd);

    if ($email == NULL || $pwd == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    } else {
        $emquery = "SELECT email FROM master WHERE email='$email'";
        $check = mysqli_num_rows(mysqli_query($db, $emquery));
        if ($check == 0) {
            $res = [
                'status' => 404,
                'message' => 'User not found, Create an account!'
            ];
            echo json_encode($res);
            return;
        } else {
            $query = "SELECT * FROM master WHERE email = '$email' AND password = '$pwd'";
            $query_run = mysqli_query($db, $query);
            $count = mysqli_num_rows($query_run);
            if ($count == 1) {
                $_SESSION['loggedin'] = TRUE;
                $idfetchquery = "SELECT id FROM master WHERE email='$email';";
                $id = mysqli_query($db, $idfetchquery);
                $user = mysqli_fetch_assoc($id);
                $_SESSION['loggeduserid'] = $user['id'];
                $res = [
                    'status' => 200,
                    'message' => 'Login Successfully',
                    'id' => $_SESSION['loggeduserid'],
                ];
                echo json_encode($res);
                return;
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Username/Password wrong'
                ];
                echo json_encode($res);
                return;
            }
        }
    }
}
// Logout action
function logout()
{
    if (isset($_SESSION['loggedin'])) {
        session_destroy();
        $res = [
            'status' => 200,
            'message' => 'Logged out successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        die('Logout code not executed');
    }
}
