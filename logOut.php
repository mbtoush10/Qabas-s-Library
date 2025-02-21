<?php

session_start() ;
include("testServer.php");
session_unset();
session_destroy();
header("Location: mainPage.php");
//mail to()