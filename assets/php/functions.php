<?php

function user(){
    return isset($_SESSION['user']);
}

user();
session_start();
?>