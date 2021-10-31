<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
          <span><span class="text-indigo-600 font-semibold">Client</span> | {{ $client->name }}</span>
          <a href="{{ route('client.edit',$client->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Editer le client {{ $client->name }}</a>
      </h2>
  </x-slot>
  

  <div class="py-6">
    @if (session()->has('success'))
      <div class="flex items-center justify-between max-w-7xl mx-auto mb-2 sm:px-6 lg:px-8 p-3 text-white rounded-md bg-green-500">{{ session()->get('success') }}</div>
    @endif
    <div class="max-w-7xl mx-auto mb-2 sm:px-6 rounded-md lg:px-8 bg-white p-3">
      <div class=" block sm:flex w-full">
        <div class="relative text-center my-4 overflow-hidden mx-auto h-36   items-center justify-center w-36  rounded-full sm:w-1/5 sm:h-52 sm:mr-3 sm:rounded-md flex">
          @if ($client->photo !== 'user_default.png')
            <img class="rounded-md object-cover w-full h-auto " src="{{ Storage::url('avatars/'.$client->photo) }}" alt="">
          @else
            <i class="fas fa-user text-5xl  text-gray-500"></i>
          @endif
          <div class="absolute inset-0 rounded-md shadow-inner" aria-hidden="true"></div>
        </div>
        <div class="p-4 w-full sm:w-4/5">
          <ul>
            <li class="text-lg p-2 bg-gray-50 rounded-md mb-2"><span class="font-bold text-gray-700">NOM :</span> {{$client->name}}</li>
            <li class="text-lg p-2 bg-gray-50 rounded-md mb-2"><span class="font-bold text-gray-700"> EMAIL :</span> {{$client->email}}</li>
            <li class="text-lg p-2 bg-gray-50 rounded-md mb-2"><span class="font-bold text-gray-700"> TELEPHONE :</span> {{$client->tel}}</li>
            <li class="text-lg p-2 bg-gray-50 rounded-md mb-2"><span class="font-bold text-gray-700"> POSTE :</span> {{$client->poste}}</li>
            <li class="text-lg p-2 bg-gray-50 rounded-md mb-2"><span class="font-bold text-gray-700"> STATUS :</span> {{$client->status === 1 ? 'Actif':'Inactif'}}</li>
            <li class="text-lg p-2 bg-gray-50 rounded-md mb-2"><span class="font-bold text-gray-700"> DATE CREATION :</span> {{$client->created_at->format('d / M / Y')}}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>