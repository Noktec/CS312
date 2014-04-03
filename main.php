<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['email']))
{
    echo 'Bonjour ' . $_SESSION['email'];
}