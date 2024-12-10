<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagihanPendaftaranController extends Controller
{
    protected $guarded = ['id'];
    protected $table = 'tagihan_pendaftarans';
}
