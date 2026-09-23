<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountUpdateRequest;

class AccountController extends Controller
{
    public function edit()
    {
         $user = auth()->user();

        return view('account.edit', compact('user'));
    }

     public function update(AccountUpdateRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'name_kanji' => $request->name_kanji,
            'name_kana' => $request->name_kana,
            'email' => $request->email,
        ]);

        return redirect()->route('mypage');
    }
}