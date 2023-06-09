<?php

namespace App\Enums;

enum EformStatus: string
{
    case Menunggu = 'Menunggu';
    case Ditolak = 'Ditolak';
    case Disetujui = 'Disetujui';
}
