@php
    $title = $mode == 'update' ? "Update kendaraan" : "Menambahkan kendaraan";
    $id_data = 'id_vehicle';
    $echo = "kendaraan";
    $page = 'vehicle';
@endphp
<x-app :page='$page' :title='$title'>
<!-- Hire Us -->
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
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Nama kendaraan</label>
                <input type="text" name="nama_kendaraan" value="{{ $mode == 'update' ? $data->nama_kendaraan : old('nama_kendaraan') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->nama_kendaraan : 'ABCD1234-XX ...' }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Jenis kendaraan</label>
                <input type="text" name="jenis_kendaraan" value="{{ $mode == 'update' ? $data->jenis_kendaraan : old('jenis_kendaraan') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->jenis_kendaraan : 'DUMP TRUCK ...' }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Plat Nomor</label>
                <input type="text" name="plat_nomor" value="{{ $mode == 'update' ? $data->plat_nomor : old('plat_nomor') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->plat_nomor : 'X 1234 56 N ...' }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Status</label>
                <select id="hs-custom-template-with-icons" data-hs-select='{
                  "placeholder": "Select assignee",
                  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",
                  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex items-center text-nowrap w-full cursor-pointer bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 text-gray-800 dark:text-white rounded-lg text-start text-sm hover:bg-gray-50 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-50 dark:focus:bg-neutral-700",
                  "dropdownClasses": "mt-2 max-h-72 p-1 space-y-1 z-20 w-full bg-white dark:bg-neutral-900 border border-transparent rounded-lg shadow-xl overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                  "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-3 w-full text-sm text-gray-800 dark:text-neutral-200 cursor-pointer hover:bg-gray-100 dark:hover:bg-neutral-800 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-800",
                  "optionTemplate": "<div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 dark:text-neutral-200\" data-title></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600 dark:text-blue-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                  "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }' name="status" class="hidden">
                  <option value="">Choose</option>
                  <option value="1" {{ $mode == 'update' ? ($data->status == 1 ? 'selected' : '') : (old('status') == 1 ? 'selected' : 'selected') }} data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-circle-check-icon lucide-circle-check\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"m9 12 2 2 4-4\"/></svg>"
                  }'>Available</option>
                <option value="2" {{ $mode == 'update' ? ($data->status == 2 ? 'selected' : '') : (old('status') == 2 ? 'selected' : '') }} data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-clock8-icon lucide-clock-8\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"M12 6v6l-4 2\"/></svg>"
                  }'>Booked</option>
                <option value="3" {{ $mode == 'update' ? ($data->status == 3 ? 'selected' : '') : (old('status') == 3 ? 'selected' : '') }} data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-hammer-icon lucide-hammer\"><path d=\"m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9\"/><path d=\"m18 15 4-4\"/><path d=\"m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5\"/></svg>"
                  }'>Maintanance</option>
                <option value="4" {{ $mode == 'update' ? ($data->status == 4 ? 'selected' : '') : (old('status') == 4 ? 'selected' : '') }} data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-circle-x-icon lucide-circle-x\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"m15 9-6 6\"/><path d=\"m9 9 6 6\"/></svg>"
                  }'>Unavailable</option>
                </select>
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
<!-- End Hire Us -->
</x-app>

