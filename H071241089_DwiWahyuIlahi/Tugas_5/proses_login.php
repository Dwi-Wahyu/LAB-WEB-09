<?php
session_start();

$users = [
    [
        'email' => 'admin@gmail.com',
        'username' => 'adminxxx',
        'name' => 'Admin',
        'password' => password_hash('admin123', PASSWORD_DEFAULT)
    ],
    [
        'email' => 'naldi@gmail.com',
        'username' => 'naldi_aja',
        'name' => 'Muh. Rinaldi Ruslan',
        'password' => password_hash('naldi123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'MIPA',
        'batch' => '2023'
    ],
    [
        'email' => 'ervin@gmail.com',
        'username' => 'ervin',
        'name' => 'Muhammad Ervin',
        'password' => password_hash('ervin123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Hukum',
        'batch' => '2023'
    ],
    [
        'email' => 'yusta@gmail.com',
        'username' => 'yusra59',
        'name' => 'Yusra Airlangga',
        'password' => password_hash('yusra123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'Keperawatan',
        'batch' => '2021'
    ],
    [
        'email' => 'muslih@gmail.com',
        'username' => 'muslih23',
        'name' => 'Muslih',
        'password' => password_hash('muslih123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Teknik',
        'batch' => '2020'
    ]
];

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION['login_error'] = "Akses tidak valid.";
    header("Location: login.php");
    exit;
}

$input_username = trim($_POST['username']);
$input_password = $_POST['password'];
$user_found = null;

foreach ($users as $user) {
    if ($user['username'] === $input_username) {
        $user_found = $user;
        break;
    }
}

if ($user_found) {
    if (password_verify($input_password, $user_found['password'])) {
        
        unset($user_found['password']);
        
        $_SESSION['user'] = $user_found; 
        
        header("Location: dashboard.php"); 
        exit;
    } else {
        $_SESSION['login_error'] = "Username atau password salah!";  
        header("Location: login.php");
        exit;
    }
} else {
    $_SESSION['login_error'] = "Username atau password salah!"; 
    header("Location: login.php");
    exit;
}