<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
          {{ __('Editer ') }}
      </h2>
  </x-slot>
  
  <div class="py-6">

    @if (session()->has('success'))
      <div class="flex items-center justify-between max-w-7xl mx-auto mb-2 sm:px-6 lg:px-8 p-3 text-white rounded-md bg-green-500">{{ session()->get('success') }}</div>
    @endif

    <form action="{{ route('client.update',$client->id) }}" class="max-w-7xl mx-auto" method="POST" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <div class="flex flex-col md:flex-row mt-4 items-start justify-between">
        <div class="sm:pl-0 pl-3 flex flex-col items-center w-52">
          <div class="relative overflow-hidden w-52 h-52 flex items-center shadow-xl rounded-md justify-center">
            <input type="file" accept="image/*" hidden name="photo" id="inputFile">
            <img id="img" class=" w-full h-full bg-white  object-cover " src="{{ Storage::url('avatars/'.$client->photo) }}" alt="my image" srcset="">
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
                <input type="text" value="{{ old('name',$client->name) }}" name="name" placeholder="Nom" class=" w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg   ">
                @error('name')
                  <span class="text-red-400 text-sm">{{ $errors->first('name') }}</span>
                @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
              <div class="flex flex-col items-start justify-start sm:w-3/6 sm:ml-2">
                <label for="email" class="pb-1 text-lg text-gray-500">Email de l'utilisateur <span class="text-red-200">*</span> </label>
                <input type="text" value="{{ old('email',$client->email) }}" name="email" placeholder="Email" class="w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg   ">
                @error('email')
                  <span class="text-red-400 text-sm">{{ $errors->first('email') }}</span>
                  @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
            </div>
            <div class="py-2 sm:flex items-center justify-between">
              <div class="flex flex-col mb-2 sm:mb-0 items-start justify-start sm:w-3/6 sm:mr-2">
                <label for="company_id" class="pb-1 text-lg text-gray-500">Entreprise du client <span class="text-red-200">*</span> </label>
                <select name="company_id"  class=" w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg" id="company">
                  @foreach ($companies as $company)
                    <option @if($company->id == old('company_id',$client->company_id)) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>
                  @endforeach
                </select>
                @error('company_id')
                  <span class="text-red-400 text-sm">{{ $errors->first('company_id') }}</span>
                @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
              <div class="flex flex-col items-start justify-start sm:w-3/6 sm:ml-2">
                <label for="status" class="pb-1 text-lg text-gray-500">Status du client<span class="text-red-200">*</span> </label>
                <select name="status" placeholder="status" class="w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg">
                  <option @if( '1' == old('status',$client->status)) selected @endif value="1">Actif</option>
                  <option @if( '0' == old('status',$client->status)) selected @endif value="0">Inactif</option>
                </select>
                @error('status')
                  <span class="text-red-400 text-sm">{{ $errors->first('status') }}</span>
                  @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
            </div>
            <div class="py-2 sm:flex items-center justify-between">
              <div class="flex flex-col mb-2 sm:mb-0 items-start justify-start sm:w-3/6 sm:mr-2">
                <label for="poste" class="pb-1 text-lg text-gray-500">Poste du client <span class="text-red-200">*</span> </label>
                <input type="text" value="{{old('poste',$client->poste)}}" name="poste" placeholder="poste" class=" w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg">
                @error('poste')
                  <span class="text-red-400 text-sm">{{ $errors->first('poste') }}</span>
                @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
              <div class="flex flex-col items-start justify-start sm:w-3/6 sm:ml-2">
                <label for="tel" class="pb-1 text-lg text-gray-500">Téléphone  <span class="text-red-200">*</span> </label>
                <input type="text" name="tel" value="{{old('tel',$client->tel)}}" placeholder="Téléphone" class="w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg">
                @error('tel')
                  <span class="text-red-400 text-sm">{{ $errors->first('tel') }}</span>
                  @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
            </div>
            <div class="text-right">
              <input class="px-4 py-2 mt-2 transition-all cursor-pointer  text-white rounded-md bg-indigo-500 hover:bg-indigo-700" type="submit" value="Modifié les informations du client">
            </div>
          </div>
          
        </div>
      </div>
    </form>
  </div>
</x-app-layout>