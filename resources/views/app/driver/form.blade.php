@php
    $title = $mode == 'update' ? "Update sopir" : "Menambahkan sopir";
    $id_data = 'id_driver';
    $echo = "sopir";
    $page = 'driver';
@endphp
<x-app :page='$page' :title='$title'>
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="max-w-xl mx-auto">
    <div class="text-center">
      <h1 class="text-xl font-bold text-gray-800 dark:text-neutral-200 sm:text-2xl">
        {{ $title }}
      </h1>
      <p class="mt-1 text-gray-600 dark:text-neutral-300">
        {{ $mode == 'update' ? "Memperbarui data $echo pada sistem" : "Menambahkan $echo baru kedalam daftar" }}
      </p>
    </div>

    <div class="mt-9">
      <!-- Form -->
      <form method="post" action="{{ route('dashboard.'.$page.'.'.$mode.'.action', $data->$id_data ?? '') }}">
        @csrf
        @if ($mode == 'update') @method('PUT') @endif
        <div class="grid gap-4 lg:gap-6">
            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Nama sopir</label>
                <input type="text" name="nama_driver" value="{{ $mode == 'update' ? $data->nama_driver : old('nama_driver') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->nama_driver : 'Pak Budi ...' }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Jenis kelamin</label>
                <select id="hs-custom-template-with-icons" data-hs-select='{
                  "placeholder": "Select assignee",
                  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",
                  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex items-center text-nowrap w-full cursor-pointer bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 text-gray-800 dark:text-white rounded-lg text-start text-sm hover:bg-gray-50 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-50 dark:focus:bg-neutral-700",
                  "dropdownClasses": "mt-2 max-h-72 p-1 space-y-1 z-20 w-full bg-white dark:bg-neutral-900 border border-transparent rounded-lg shadow-xl overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                  "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-3 w-full text-sm text-gray-800 dark:text-neutral-200 cursor-pointer hover:bg-gray-100 dark:hover:bg-neutral-800 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-800",
                  "optionTemplate": "<div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 dark:text-neutral-200\" data-title></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600 dark:text-blue-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                  "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }' name="jenis_kelamin" class="hidden">
                  <option value="">Choose</option>
                  <option value="L" {{ $mode == 'update' ? ($data->jenis_kelamin == "L" ? 'selected' : '') : (old('jenis_kelamin') == "L" ? 'selected' : 'selected') }} data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-mars-icon lucide-mars\"><path d=\"M16 3h5v5\"/><path d=\"m21 3-6.75 6.75\"/><circle cx=\"10\" cy=\"14\" r=\"6\"/></svg>"
                  }'>Laki-laki</option>
                <option value="P" {{ $mode == 'update' ? ($data->jenis_kelamin == "P" ? 'selected' : '') : (old('jenis_kelamin') == "P" ? 'selected' : '') }} data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-venus-icon lucide-venus\"><path d=\"M12 15v7\"/><path d=\"M9 19h6\"/><circle cx=\"12\" cy=\"9\" r=\"6\"/></svg>"
                  }'>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Alamat (opsional)</label>
                <input type="text" name="alamat" value="{{ $mode == 'update' ? $data->alamat : old('alamat') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->alamat ?? '-' : 'Jl. Jalan aja ...' }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">No. Telepon</label>
                <input type="text" name="telepon" value="{{ $mode == 'update' ? $data->telepon : old('telepon') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->telepon : '081 234 56 ...' }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>
        </div>
        <!-- End Grid -->

        <div class="mt-6 grid">
          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 dark:bg-blue-500 border border-transparent text-white hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-hidden focus:bg-blue-700 dark:focus:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            {{ $mode == 'update' ? "Update $echo" : "Tambah $echo" }}</button>
        </div>

        <div class="flex justify-center w-full mt-3 text-center">
          <a class="flex gap-x-1 items-center justify-center text-sm text-gray-500 dark:text-neutral-400" href="{{ route('dashboard.'.$page) }}">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
            Kembali
          </a>
        </div>
      </form>
      <!-- End Form -->
    </div>
  </div>
</div>
</x-app>

