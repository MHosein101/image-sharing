<?php

function get_logout($dbc)
{
    session_clear();

    redirect('login');
}