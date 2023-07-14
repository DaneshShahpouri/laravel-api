<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();

        Validator::make($formData, [
            'username' => 'required|max:100|min:3',
            'content' => 'required|max:300|min:5',
            'email' => 'required|max:100|min:5',

        ], [
            'username.required' => 'Please enter a name',
            'username.max' => 'Username must be shorter than :max characters',
            'username.min' => 'Username must be longer than :min characters',
            'content.required' => 'Please write a message',
            'content.max' => 'Content must be shorter than :max characters',
            'content.min' => 'Content must be longer than :min characters',
            'email.required' => 'Please enter a email',
            'email.max' => 'Email must be shorter than :max characters',
            'email.min' => 'Email must be longer than :min characters',

        ])->validate();


        $message = new Message();

        $message->user_id = 1;
        $message->username = $request->input('username');
        $message->content = $request->input('content');
        $message->email = $request->input('email');

        $message->save();

        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
