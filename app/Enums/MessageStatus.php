<?php

namespace App\Enums;

enum MessageStatus: string
{
    case Sudah = 'Sudah direspon';
    case Belum = 'Belum direspon';
}
