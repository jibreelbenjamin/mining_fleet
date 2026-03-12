@php
    $title = $mode == 'update' ? "Update sopir" : "Membuat pesanan";
    $id_data = 'id_booking';
    $echo = "pesanan";
    $page = 'booking';
@endphp
<x-app :page='$page' :title='$title'>
<div class="max-w-[85rem] px-4 py-5 sm:px-6 lg:px-8 lg:py-7 mx-auto">
  <div class="max-w-xl mx-auto">
    <div class="text-center">
      <h1 class="text-xl font-bold text-gray-800 dark:text-neutral-200 sm:text-2xl">
        {{ $title }}
      </h1>
      <p class="mt-1 text-gray-600 dark:text-neutral-300">
        {{ $mode == 'update' ? "Memperbarui data $echo pada sistem" : "Formulir permintaan menggunakan kendaraan" }}
      </p>
    </div>

    <div class="mt-9">
      <!-- Form -->
      <form method="post" action="{{ route('dashboard.'.$page.'.'.$mode.'.action', $data->$id_data ?? '') }}">
        @csrf
        @if ($mode == 'update') @method('PUT') @endif
        <div class="grid gap-4 lg:gap-6">
            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Kendaraan</label>
                <select id="hs-scroll-to-selected" data-hs-select='{
                    "hasSearch": true,
                    "searchPlaceholder": "Search...",
                    "searchClasses": "block w-full sm:text-sm bg-transparent border-gray-200 dark:border-neutral-700 rounded-lg text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
                    "searchWrapperClasses": "bg-white dark:bg-neutral-900 p-2 -mx-1 sticky top-0",
                    "placeholder": "Pilih kendaraan...",
                    "scrollToSelected": true,
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 text-gray-800 dark:text-white rounded-lg text-start text-sm hover:bg-gray-50 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-50 dark:focus:bg-neutral-700",
                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white dark:bg-neutral-900 border border-transparent rounded-lg shadow-xl overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                    "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-4 w-full text-sm text-gray-800 dark:text-neutral-200 cursor-pointer hover:bg-gray-100 dark:hover:bg-neutral-800 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-800",
                    "optionTemplate": "<div class=\"flex items-center\"><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 dark:text-neutral-200\" data-title></div><div class=\"text-xs text-gray-500 dark:text-neutral-400\" data-description></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600 dark:text-blue-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                  }' name="vehicle_id" class="hidden">
                  <option value="">Pilih kendaraan</option>
                  @foreach ($vehicle as $item)                      
                  <option value="{{ $item->id_vehicle }}" {{ $mode == 'update' ? ($item->id_vehicle == $data->vehicle_id ? 'selected' : '') : ($item->id_vehicle == old('vehicle_id') ? 'selected' : '') }} data-hs-select-option='{
                      "description": "{{ $item->plat_nomor }}"
                    }'>
                    {{ $item->nama_kendaraan }} ({{ $item->jenis_kendaraan }})
                  </option>
                  @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Sopir</label>
                <select id="hs-scroll-to-selected" data-hs-select='{
                    "hasSearch": true,
                    "searchPlaceholder": "Search...",
                    "searchClasses": "block w-full sm:text-sm bg-transparent border-gray-200 dark:border-neutral-700 rounded-lg text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
                    "searchWrapperClasses": "bg-white dark:bg-neutral-900 p-2 -mx-1 sticky top-0",
                    "placeholder": "Pilih sopir...",
                    "scrollToSelected": true,
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 text-gray-800 dark:text-white rounded-lg text-start text-sm hover:bg-gray-50 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-50 dark:focus:bg-neutral-700",
                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white dark:bg-neutral-900 border border-transparent rounded-lg shadow-xl overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                    "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-4 w-full text-sm text-gray-800 dark:text-neutral-200 cursor-pointer hover:bg-gray-100 dark:hover:bg-neutral-800 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-800",
                    "optionTemplate": "<div class=\"flex items-center\"><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 dark:text-neutral-200\" data-title></div><div class=\"text-xs text-gray-500 dark:text-neutral-400\" data-description></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600 dark:text-blue-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                  }' name="driver_id" class="hidden">
                  <option value="">Pilih sopir</option>
                  @foreach ($driver as $item)                      
                  <option value="{{ $item->id_driver }}" {{ $mode == 'update' ? ($item->id_driver == $data->driver_id ? 'selected' : '') : ($item->id_driver == old('driver_id') ? 'selected' : '') }} data-hs-select-option='{
                      "description": "{{ $item->telepon }}"
                    }'>
                    {{ $item->nama_driver }} ({{ $item->jenis_kelamin }})
                  </option>
                  @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
              <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Tanggal mulai</label>
                <input type="datetime-local" name="tanggal_mulai" value="{{ $mode == 'update' ? $data->tanggal_mulai : old('tanggal_mulai') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->tanggal_mulai : 'Pilih tanggal ...' }}" class="datetime py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
              </div>
              <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Tanggal selesai</label>
                <input type="datetime-local" name="tanggal_selesai" value="{{ $mode == 'update' ? $data->tanggal_selesai : old('tanggal_selesai') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->tanggal_selesai : 'Pilih tanggal ...' }}" class="datetime py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
              </div>
            </div>

            <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Tujuan</label>
                <input type="text" name="tujuan" value="{{ $mode == 'update' ? $data->tujuan : old('tujuan') }}" autocomplete="off" placeholder="{{ $mode == 'update' ? $data->tujuan ?? '-' : 'Tambang Nikel A4 ...' }}" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            </div>

            <div class="py-3 flex items-center text-sm text-gray-800 before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:before:border-neutral-600 dark:after:border-neutral-600">Persetujuan atasan</div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
              <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Supervisor</label>
                <select id="hs-scroll-to-selected" data-hs-select='{
                    "hasSearch": true,
                    "searchPlaceholder": "Search...",
                    "searchClasses": "block w-full sm:text-sm bg-transparent border-gray-200 dark:border-neutral-700 rounded-lg text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
                    "searchWrapperClasses": "bg-white dark:bg-neutral-900 p-2 -mx-1 sticky top-0",
                    "placeholder": "Pilih supervisor...",
                    "scrollToSelected": true,
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 text-gray-800 dark:text-white rounded-lg text-start text-sm hover:bg-gray-50 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-50 dark:focus:bg-neutral-700",
                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white dark:bg-neutral-900 border border-transparent rounded-lg shadow-xl overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                    "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-4 w-full text-sm text-gray-800 dark:text-neutral-200 cursor-pointer hover:bg-gray-100 dark:hover:bg-neutral-800 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-800",
                    "optionTemplate": "<div class=\"flex items-center\"><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 dark:text-neutral-200\" data-title></div><div class=\"text-xs text-gray-500 dark:text-neutral-400\" data-description></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600 dark:text-blue-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                  }' name="lvl1" class="hidden">
                  <option value="">Pilih supervisor</option>
                  @foreach ($supervisor as $item)                      
                  <option value="{{ $item->id_user }}" {{ $mode == 'update' ? ($item->id_user == $data->driver_id ? 'selected' : '') : ($item->id_user == old('lvl2') ? 'selected' : '') }} data-hs-select-option='{
                      "description": "{{ $item->email }}"
                    }'>
                    {{ $item->nama }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div>
                <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Manager</label>
                <select id="hs-scroll-to-selected" data-hs-select='{
                    "hasSearch": true,
                    "searchPlaceholder": "Search...",
                    "searchClasses": "block w-full sm:text-sm bg-transparent border-gray-200 dark:border-neutral-700 rounded-lg text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3",
                    "searchWrapperClasses": "bg-white dark:bg-neutral-900 p-2 -mx-1 sticky top-0",
                    "placeholder": "Pilih manager...",
                    "scrollToSelected": true,
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 text-gray-800 dark:text-white rounded-lg text-start text-sm hover:bg-gray-50 dark:hover:bg-neutral-700 focus:outline-hidden focus:bg-gray-50 dark:focus:bg-neutral-700",
                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white dark:bg-neutral-900 border border-transparent rounded-lg shadow-xl overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500",
                    "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-4 w-full text-sm text-gray-800 dark:text-neutral-200 cursor-pointer hover:bg-gray-100 dark:hover:bg-neutral-800 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:focus:bg-neutral-800",
                    "optionTemplate": "<div class=\"flex items-center\"><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 dark:text-neutral-200\" data-title></div><div class=\"text-xs text-gray-500 dark:text-neutral-400\" data-description></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600 dark:text-blue-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                  }' name="lvl2" class="hidden">
                  <option value="">Pilih manager</option>
                  @foreach ($manager as $item)                      
                  <option value="{{ $item->id_user }}" {{ $mode == 'update' ? ($item->id_user == $data->driver_id ? 'selected' : '') : ($item->id_user == old('lvl1') ? 'selected' : '') }} data-hs-select-option='{
                      "description": "{{ $item->email }}"
                    }'>
                    {{ $item->nama }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
        </div>
        <!-- End Grid -->

        <div class="mt-6 grid">
          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 dark:bg-blue-500 border border-transparent text-white hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-hidden focus:bg-blue-700 dark:focus:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none">
            {{ $mode == 'update' ? "Update $echo" : "Buat $echo" }}</button>
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
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const btnTrig = document.querySelectorAll('.datetime');

      btnTrig.forEach(btn => {
          btn.addEventListener('click', function () {
              this.showPicker();
          });
      });
  });
</script>