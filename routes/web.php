<?php

use Illuminate\Http\Request;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/send', function() {
    broadcast(new \App\Events\SendMessage);
    return 'Ok';
});
*/

Route::get('/messages', function() {
    return view('message');
});

Route::post('/messages', function(Request $request) {
    $dados = $request->all();
    $message = $dados;
    try {
        \App\Message::create($dados);
        broadcast(new \App\Events\SendMessage($message));
        session()->flash('success','Mensagem enviada com sucesso!');
        return view('message');
        
    }catch(\Exception $e) {
        session()->flash('error',$e->getMessage());
        return view('message');
    }

})->name('messages');

