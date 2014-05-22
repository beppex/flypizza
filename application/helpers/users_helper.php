<?php


function can_access($user)
{
    return $user->username == 'admin';
}


?>