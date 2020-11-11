<?php
    include("conf.php");

    $conect = mysqli_connect(SERVER, USER, PASS, BANCO)
    or die("Não é possível conectar ao banco de dados" . mysqli_connect_error());

