<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold sm:text-xl text-gray-800 leading-tight flex justify-between text-sm items-center">
          <span><span class="text-indigo-600 sm:tex-xl :text-sm font-semibold">Ajouter une Entreprise </span>  </span>
      </h2>
  </x-slot>

  <div class="py-6">
    @if (session()->has('success'))
      <div class="flex items-center justify-between max-w-7xl mx-auto mb-2 sm:px-6 lg:px-8 p-3 text-white rounded-md bg-green-500">{{ session()->get('success') }}</div>
    @endif
  </div>
  <div class="py-6">
    <h1 class="sm:text-3xl max-w-7xl mx-auto font-bold text-xl mb-4 text-gray-600">Formulaire d'ajout d'une entreprise</h1>
    <form action="{{ route('company.store') }}" class="max-w-7xl mx-auto" method="POST" enctype="multipart/form-data">
      @method('POST')
      @csrf
      <div class="flex flex-col md:flex-row mt-4 items-start justify-between">
        
        <div class=" w-full mt-3 md:mt-0">
          <div class="p-4 rounded-md bg-white " >
            <div class="py-2 sm:flex items-center justify-between">
              <div class="flex flex-col mb-2 sm:mb-0 items-start justify-start sm:w-3/6 sm:mr-2">
                <label for="name" class="pb-1 text-lg text-gray-500">Nom de l'entreprise <span class="text-red-200">*</span> </label>
                <input type="text" value="{{ old('name') }}" name="name" placeholder="Nom" class=" w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg   ">
                @error('name')
                  <span class="text-red-400 text-sm">{{ $errors->first('name') }}</span>
                @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
              <div class="flex flex-col items-start justify-start sm:w-3/6 sm:ml-2">
                <label for="email" class="pb-1 text-lg text-gray-500">Email de l'entreprise <span class="text-red-200">*</span> </label>
                <input type="text" value="{{ old('email') }}" name="email" placeholder="Email" class="w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg   ">
                @error('email')
                  <span class="text-red-400 text-sm">{{ $errors->first('email') }}</span>
                  @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
            </div>
            <div class="py-2 sm:flex items-center justify-between">
              <div class="flex flex-col mb-2 sm:mb-0 items-start justify-start w-full sm:mr-2">
                <label for="status" class="pb-1 text-lg text-gray-500">Status de l'entreprise <span class="text-red-200">*</span> </label>
                <select name="status"  class=" w-full bg-white border border-gray-400 h-11 rounded-md shadow-lg" id="company">
                  <option value="1" @if('1' == old('status')) selected @endif>Actif</option>
                  <option value="0" @if('0' == old('status')) selected @endif>Inactif</option>
                </select>
                @error('status')
                  <span class="text-red-400 text-sm">{{ $errors->first('status') }}</span>
                @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
            </div>  
            <div class="py-2 sm:flex items-center justify-between">
              <div class="flex flex-col mb-2 sm:mb-0 items-start justify-start w-full sm:mr-2">
                <label for="description" class="pb-1 text-lg text-gray-500">Description de l'entreprise </label>
                <textarea name="description" class="w-full bg-white border border-gray-400  rounded-md shadow-lg" id="company"" id="" cols="30" rows="10">{{old('description',$company->description)}}</textarea>
                @error('description')
                  <span class="text-red-400 text-sm">{{ $errors->first('description') }}</span>
                @else
                  <span class="text-red-400 opacity-0 text-sm">message fake</span>
                @enderror
              </div>
            </div>
            <div class="text-right">
              <input class="px-4 py-2 mt-2 transition-all cursor-pointer  text-white rounded-md bg-indigo-500 hover:bg-indigo-700" type="submit" value="Ajouter une entreprise">
            </div>
          </div>
          
        </div>
      </div>
    </form>
  </div>

</x-app-layout>