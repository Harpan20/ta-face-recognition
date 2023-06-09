<?php

namespace App\Enums;

enum LastEducation: string
{
    case TS = 'Tidak/Belum Sekolah';
    case SD = 'SD/Sederajat';
    case SMP = 'SMP/Sederajat';
    case SMA = 'SMA/Sederajat';
    case D1 = 'Diploma I/II';
    case D3 = 'Akademi/Diploma III/Sarjana Muda';
    case S1 = 'Diploma IV/Strata I';
    case S2 = 'Strata II';
    case S3 = 'Strata III';
}
