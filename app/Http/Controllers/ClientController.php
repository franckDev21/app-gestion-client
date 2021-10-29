<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = \App\Models\Client::status();
        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'unique:clients|max:255|required|min:2',
            'email'     => 'unique:clients|max:255|required|email',
            'photo'     => 'sometimes|mimes:jpeg,jpg,png|max:5000',
            'tel'       => 'sometimes|numeric',
            'adresse'   => 'required|max:255|min:3'
        ]);

        $client = Client::create($data);
        $this->storeImage($request,$client);

        return redirect('/client')->with('success','Client créé avec succès ! ');
    }


    private function storeImage(Request $request, Client $user){
        // cache the file
        $file = $request->file('photo');

        if($file){
            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'photo'.time().'.'.$file->getClientOriginalExtension();

            $user->update([
                'photo'=>$filename,
            ]);


            // save to storage/app/photos as the new $filename
            $file->storeAs('public/avatars', $filename);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
