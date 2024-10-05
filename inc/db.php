<?php
$conn = mysqli_connect('localhost', 'root', '', 'win');

if(!$conn){
echo 'ERORR: ' . mysqli_connect_erorr();
}
