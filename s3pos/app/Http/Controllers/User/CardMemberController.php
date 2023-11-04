<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardMemberController extends Controller
{
    public function index()
    {
        return view('user.card_member.index');
    }

    public function table()
    {
        return view('user.card_member.table');
    }

    public function detail()
    {
        return view('user.card_member.detail');
    }
}
