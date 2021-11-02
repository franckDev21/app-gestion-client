<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
          {{ __('Gestion des Entreprises') }}
          <a href="{{ route('company.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Ajouter une entreprise</a>
      </h2>
  </x-slot>

  <!-- end component -->
  <div id="modal-delete" class="transition-opacity ease-out flex z-50 pointer-events-none opacity-0 items-center justify-center fixed left-0 bottom-0 w-full h-full bg-opacity-50 bg-gray-800">
    <div class="bg-white rounded-lg w-1/2">
      <div class="flex flex-col items-start p-4">
        <div class="flex items-center w-full mb-2">
          <div class="title text-gray-900 font-medium text-lg">Confirmer</div>
          <svg id="modal-close-croix" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
          </svg>
        </div>
        <hr>
        <div class="message">Voulez vous vraiment supprimer ce client ?</div>
        <hr>
        <div class="ml-auto">
          <button id="send-delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Supprimer
          </button>
          <button id="modal-close-btn" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Annuler
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal component -->
  
  <div class="mt-6">
    <div class="max-w-7xl mx-auto flex items-center justify-center ">
      <input class="mt-1 rounded-md block w-3/5 border-none bg-white h-11 focus:ring-0" type="text" placeholder="Rechercher ..." />
      <i class="fas text-xl fa-search text-gray-400 ml-2 "></i>
    </div>
  </div>

  <div class="py-6">
    @if (session()->has('success'))
      <div class="flex items-center justify-between max-w-7xl mx-auto mb-2 sm:px-6 lg:px-8 p-3 text-white rounded-md bg-green-500">{{ session()->get('success') }}</div>
    @endif
    <!-- Client Table -->
    <div class="max-w-7xl mx-auto mb-2 sm:px-6 lg:px-8 p-3">
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full" id="tab">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Company</th>
                <th class="px-4 py-3">Clients</th>
                <th class="px-4 py-3">Informations</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach ($company as $companies)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                      <div>
                        <p class="font-semibold">{{ $companies->name }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">{{$companies->poste}}</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 inline-flex flex-col text-sm">
                    <span>{{ $companies->clients->count() }} Client{{ $companies->clients->count() > 1 ? 's':'' }}</span>
                  </td>
                  <td class="px-4 py-3  text-sm">
                    <span>{{ $companies->email }}</span> <br>
                    <span class=" text-gray-500 italic ">{{ $companies->created_at->format('d/M/Y') }}</span>
                  </td>
                  <td class="px-4 py-3 text-xs">
                    @if ($companies->status === 1)
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"> Actif </span>
                    @else
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-green-100"> Inactif </span>
                    @endif
                  </td>
                  <td class="px-4 flex py-3 items-center text-sm">
                    <a href="{{ route('company.show',$companies->id) }}" title="Voir le companies" class=" mr-2 p-1 sm:p-2  flex-none inline-block bg-gray-100 hover:bg-gray-600 rounded-md text-indigo-500 hover:text-white "><i class="fas fa-eye text-current  "></i></a>
                    <a href="{{ route('company.edit',$companies->id) }}" title="Editer le companies" class="mr-2 p-1 sm:p-2  flex-none inline-block bg-gray-100 hover:bg-gray-600 rounded-md  text-green-500 hover:text-white"><i class="fas fa-edit text-current"></i></a>
                    <form action="#" class="inline">
                      <input class="switch__input hidden" type="checkbox" name="" id="{{$companies->id}}">
                      @if ($companies->status == 1)
                        <span class="switch__content rounded-full   items-center cursor-pointer w-12 bg-green-400 relative inline-block h-6">
                          <label class="switch__label" for="{{$companies->id}}">
                            <span data-id="{{$companies->id}}" class="delete switch__btn rounded-full border w-6 h-6  bg-white shadow absolute right-0 top-0 bottom-0">
                          </label>
                          </span>
                        </span>
                      @else
                        <span class="switch__content rounded-full   items-center cursor-pointer w-12 bg-red-400 relative inline-block h-6">
                          <label class="switch__label" for="{{$companies->id}}">
                            <span data-id="{{$companies->id}}" class="activate switch__btn rounded-full border w-6 h-6  bg-white shadow absolute left-0 top-0 bottom-0">
                          </label>
                          </span>
                        </span>
                      @endif
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- ./Client Table -->
  </div>
      
  @if ($company->count())
    <div class=" p-1 my-4 bg-white rounded-lg mx-auto shadow-md w-8/12 sm:w-5/12">
      {{ $company->links() }}
    </div>
  @endif
</x-app-layout>