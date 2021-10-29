<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
          {{ __('Ajouter un niuveau client') }}
      </h2>
  </x-slot>
  
  <div class="py-6">
    <form action="{{ route('client.store') }}" class="max-w-7xl mx-auto" method="POST" enctype="multipart/form-data">
      @method('POST')
      @csrf
      <div class="flex flex-col md:flex-row mt-4 items-start justify-between">
        <div class="sm:pl-0 pl-3 flex flex-col items-center w-52">
          <div class="relative overflow-hidden w-52 h-52 flex items-center shadow-xl rounded-md justify-center">
            <input type="file" accept="image/*" hidden name="photo" id="inputFile">
            <img id="img" class=" w-full h-full bg-white  object-cover " src="{{ Storage::url('avatars/user_default.png') }}" alt="my image" srcset="">
          </div>
          @error('photo')
            <span class="text-red-400 text-sm">{{ $errors->first('photo') }}</span>
          @enderror
          <button class="imageBtn py-2 w-full rounded-md mt-1  text-white bg-gray-500 hover:bg-gray-600">photo</button>
        </div>
        <div class="md:w-4/5 w-full mt-3 md:mt-0">
          <div class="p-4 rounded-md bg-white " >
            <div class="py-2 sm:flex items-center justify-between">
              <div class="flex flex-col mb-2 sm:mb-0 items-start justify-start sm:w-3/6 sm:mr-2">
                <label for="name" class="pb-1 text-lg text-gray-500">Nom de la l'utilisateur <span class="text-red-200">*</span> </label>
                <input type="text" value="{{ old('name') }}" name="name" placeholder="Nom" class=" w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg   ">
                @error('name')
                  <span class="text-red-400 text-sm">{{ $errors->first('name') }}</span>
                @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
              <div class="flex flex-col items-start justify-start sm:w-3/6 sm:ml-2">
                <label for="email" class="pb-1 text-lg text-gray-500">Email de l'utilisateur <span class="text-red-200">*</span> </label>
                <input type="text" value="{{ old('email') }}" name="email" placeholder="Email" class="w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg   ">
                @error('email')
                  <span class="text-red-400 text-sm">{{ $errors->first('email') }}</span>
                  @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
            </div>
            <div class="py-2 sm:flex items-center justify-between">
              <div class="flex flex-col mb-2 sm:mb-0 items-start justify-start sm:w-3/6 sm:mr-2">
                <label for="adresse" class="pb-1 text-lg text-gray-500">Adresse du client <span class="text-red-200">*</span> </label>
                <input type="text" value="{{old('adresse')}}" name="adresse" placeholder="Adresse" class=" w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg">
                @error('adresse')
                  <span class="text-red-400 text-sm">{{ $errors->first('adresse') }}</span>
                @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
              <div class="flex flex-col items-start justify-start sm:w-3/6 sm:ml-2">
                <label for="tel" class="pb-1 text-lg text-gray-500">Téléphone  <span class="text-red-200">*</span> </label>
                <input type="text" name="tel" value="{{old('tel')}}" placeholder="Téléphone" class="w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg">
                @error('tel')
                  <span class="text-red-400 text-sm">{{ $errors->first('tel') }}</span>
                  @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
            </div>
            <div class="text-right">
              <input class="px-4 py-2 mt-2 transition-all cursor-pointer  text-white rounded-md bg-indigo-500 hover:bg-indigo-700" type="submit" value="Ajouter le nouveau client">
            </div>
          </div>
          
        </div>
      </div>
    </form>
  </div>
</x-app-layout>