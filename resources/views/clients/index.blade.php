<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
          {{ __('Gestion des clients') }}
          <a href="{{ route('client.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Ajouter un nouveau client</a>
      </h2>
  </x-slot>
  
  <div class="mt-6">
    <div class="max-w-7xl mx-auto flex items-center justify-center ">
      <input class="mt-1 rounded-md block w-3/5 border-none bg-white h-11 focus:ring-0" type="text" placeholder="Rechercher un nouveau client ..." />
      <i class="fas text-xl fa-search text-gray-400 ml-2 "></i>
    </div>
  </div>

  <div class="py-6">
    @if (session()->has('success'))
      <div class="flex items-center justify-between max-w-7xl mx-auto mb-2 sm:px-6 lg:px-8 p-3 text-white rounded-md bg-green-500">{{ session()->get('success') }}</div>
    @endif
    
    </div>
      @foreach ($clients as $client)
        <div class="flex items-center shadow-xl justify-between max-w-7xl mx-auto mb-2 sm:px-6 lg:px-8 p-3 rounded-md bg-white">
          <div class="flex">
            <div class="mr-2 w-12 h-12 rounded-md relative overflow-hidden flex items-center justify-center bg-gray-200">
              @if ($client->photo !== 'user_default.png')
                <img class="rounded-md object-cover w-full h-auto " src="{{ Storage::url('avatars/'.$client->photo) }}" alt="">
              @else
                <i class="fas fa-user text-xl text-gray-500"></i>
              @endif
            </div>
            <div>
              <h3 class="text-xl font-semibold ">{{ $client->name }}</h3>
              <span class="text-gray-400 text-sm">{{ $client->email }}</span>
            </div>
          </div>
          <div>
            <a href="#" class="p-2 bg-gray-100 rounded-md  "><i class="fas fa-eye text-indigo-500 "></i></a>
            <a href="#" class="p-2 bg-gray-100 rounded-md  "><i class="fas fa-edit text-green-500"></i></a>
            <form action="#" class="inline">
              <button type="submit"  class="p-2 bg-gray-100 rounded-md  "><i class="fas fa-trash-alt text-red-500"></i></button>
            </form>
          </div>
        </div>
      @endforeach
      @if ($clients->count())
        <div class=" p-4 my-4 bg-white rounded-lg mx-auto shadow-md w-5/12">
            {{ $clients->links() }}
        </div>
    @endif
  </div>
</x-app-layout>