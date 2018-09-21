<?php

use Illuminate\Support\Facades\Input;
use App\User;

Route::get('/', function (){
    return view('welcome');
});

Route::any('/search', function(){
    $q = Input::get ('q');
    if($q != ''){
        $user = User::where('book_id', 'LIKE', '%'. $q .'%') 
                        ->orWhere('book_title', 'LIKE', '%'. $q .'%')
                        ->orWhere('book_isbn', 'LIKE', '%'. $q .'%')
                        ->get();
        if(count($user) > 0)
            return view ('welcome')->withDetails ($user)->withQuery ($q);
    }
    return view ('welcome')->withMessage ("Oops!, record not found. Please try again");
});
