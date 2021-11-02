<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
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
        // $clients = \App\Models\Client::status();
        $clients = \App\Models\Client::with('company')->orderByDesc('id')->paginate(6);
        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $companies = Company::where('status',1)->get();
        return view('clients.create',compact('companies'));
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
            'company_id'     => 'required|integer',
            'status' => 'required|boolean',
            'tel'       => 'sometimes|numeric',
            'poste'   => 'required|max:255|min:3'
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
        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $companies = Company::where('status',1)->get();
        return view('clients.edit',compact('client','companies'));
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
        $form_data = $request->except(['_method','_token']);
        $rules  = [];

        if($form_data['name'] === $client->name){
            $rules['name'] = 'max:255|required|min:2';
        }else{
            $rules['name'] = 'unique:clients|max:255|required|min:2';
        }

        if($form_data['email'] === $client->email){
            $rules['email'] = 'max:255|required|email';
        }else{
            $rules['email'] = 'unique:clients|max:255|required|email';
        }

        $rules = array_merge($rules,[
            'photo'     => 'sometimes|mimes:jpeg,jpg,png|max:5000',
            'company_id'=> 'required|integer',
            'status'    => 'required|boolean',
            'tel'       => 'sometimes|numeric',
            'poste'     => 'required|max:255|min:3'
        ]);

        $data = $request->validate($rules);

        $client->update($data);

        $this->storeImage($request,$client);
        
        return back()->with('success','Client modifié avec succès ! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if($client->status == 1){
            $client->update([
                'status' => 0
            ]);
        }else{
            $client->update([
                'status' => 1
            ]);
        }
        
        return json_encode(['data'=>'success']);
    }
}
