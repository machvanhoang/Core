<?php

namespace App\Enums;

enum EmailType: int
{
    case CONTACT = 1;
    case ORDERS = 2;
    case NOFICATIONS = 3;
    case VERIFY_EMAIL = 4;
    case FORGOT_PASSWORD = 5;
}
