<?php

namespace App\Enums;

enum EformSendType: string
{
    case Tabungan = 'tabungan';
    case Deposito = 'deposito';
    case Kredit = 'kredit';
}
