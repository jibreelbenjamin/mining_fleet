@php
    $title = $mode == 'update' ? "Update pengguna" : "Menambahkan pengguna";
    $id_data = 'id_user';
    $echo = "pengguna";
    $page = 'user';
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
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Nama pengguna</label>
                <input type="text" name="nama" value="{{ $mode == 'update' ? $data->nama : old('nama') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->nama : 'Pak Budi ...' }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Alamat email</label>
                <input type="text" name="email" value="{{ $mode == 'update' ? $data->email : old('email') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->email : 'budi@example.com ...' }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>

            @if ($mode != 'update')    
            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Password</label>
                <div class="relative">
                  <input id="hs-toggle-password" name="password" type="password" placeholder="Masukan password min.8" class="py-2.5 sm:py-3 ps-4 pe-10 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
                  <button type="button" data-hs-toggle-password='{
                      "target": "#hs-toggle-password"
                    }' class="absolute inset-y-0 end-0 flex items-center z-20 px-5 cursor-pointer text-gray-400 dark:text-neutral-500 rounded-e-md focus:outline-hidden focus:text-blue-700 dark:focus:text-blue-600">
                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                      <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                      <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                      <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"/>
                      <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                      <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"/>
                    </svg>
                  </button>
                </div>
            </div>
            @endif

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Role</label>
                <select id="hs-custom-template-with-icons" data-hs-select='{
                  "placeholder": "Select assignee",
                  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",
                  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex items-center text-nowrap w-full cursor-pointer bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 text-gray-800 dark:text-white rounded-lg text-start text-sm hover:bg-gray-50 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-50 dark:focus:bg-neutral-700",
                  "dropdownClasses": "mt-2 max-h-72 p-1 space-y-1 z-20 w-full bg-white dark:bg-neutral-900 border border-transparent rounded-lg shadow-xl overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                  "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-3 w-full text-sm text-gray-800 dark:text-neutral-200 cursor-pointer hover:bg-gray-100 dark:hover:bg-neutral-800 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-800",
                  "optionTemplate": "<div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 dark:text-neutral-200\" data-title></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600 dark:text-blue-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                  "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                }' name="role" class="hidden">
                  <option value="">Choose</option>
                  <option value="admin" {{ $mode == 'update' ? ($data->role == "admin" ? 'selected' : '') : (old('role') == "admin" ? 'selected' : 'selected') }} data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-user-icon lucide-user\"><path d=\"M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2\"/><circle cx=\"12\" cy=\"7\" r=\"4\"/></svg>"
                  }'>Admin</option>
                  <option value="employee" {{ $mode == 'update' ? ($data->role == "employee" ? 'selected' : '') : (old('role') == "employee" ? 'selected' : '') }} data-hs-select-option='{
                      "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-user-icon lucide-user\"><path d=\"M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2\"/><circle cx=\"12\" cy=\"7\" r=\"4\"/></svg>"
                    }'>Pegawai</option>
                  <option value="supervisor" {{ $mode == 'update' ? ($data->role == "supervisor" ? 'selected' : '') : (old('role') == "supervisor" ? 'selected' : '') }} data-hs-select-option='{
                      "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-user-icon lucide-user\"><path d=\"M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2\"/><circle cx=\"12\" cy=\"7\" r=\"4\"/></svg>"
                    }'>Supervisor</option>
                  <option value="manager" {{ $mode == 'update' ? ($data->role == "manager" ? 'selected' : '') : (old('role') == "manager" ? 'selected' : '') }} data-hs-select-option='{
                      "icon": "<svg class=\"shrink-0 size-4 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-user-icon lucide-user\"><path d=\"M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2\"/><circle cx=\"12\" cy=\"7\" r=\"4\"/></svg>"
                    }'>Manager</option>
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

