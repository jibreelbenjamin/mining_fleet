@php
    $title = "Menambahkan konsumsi BBM";
    $id_data = 'id_fuel_log';
    $echo = "konsumsi BBM";
    $page = 'fuel-log';
@endphp
<x-app :page='$page' :title='$title'>
<div class="max-w-[85rem] xl:grid xl:grid-cols-2 xl:gap-x-8 px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="max-w-xl mx-auto">
    <div class="text-center">
      <h1 class="text-xl font-bold text-gray-800 dark:text-neutral-200 sm:text-2xl">
        {{ $title }}
      </h1>
      <p class="mt-1 text-gray-600 dark:text-neutral-300">
        Menambahkan {{ $echo }} baru kedalam pesanan
      </p>
    </div>

    <div class="mt-9">
      <!-- Form -->
      <form method="post" action="{{ route('dashboard.'.$page.'.create.action', $data->id_booking) }}">
        @csrf
        <div class="grid gap-4 lg:gap-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
              <div>
                  <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Bensin (liter)</label>
                  <input type="number" id="liter" name="liter" value="{{ old('liter') }}" autocomplete="off" placeholder="20" class="py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
              </div>

              <div>
                  <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Harga / liter</label>
                  <div class="relative">
                      <input type="number" id="cpliter" name="harga_per_liter" value="{{ old('harga_per_liter') }}" autocomplete="off" placeholder="100000 ..." class="py-2.5 sm:py-3 px-4 ps-10 pe-16 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:z-10 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" >
                      <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
                        <span class="text-gray-500 dark:text-neutral-400">Rp</span>
                      </div>
                      <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                        <span class="text-gray-500 dark:text-neutral-400">IDR</span>
                      </div>
                  </div>
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
              <div>
                  <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Total biaya</label>
                  <div class="relative">
                      <input type="number" id="total" name="total" value="{{ old('total') }}" autocomplete="off" placeholder="Autototal ..." class="py-2.5 sm:py-3 px-4 ps-10 pe-16 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:z-10 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" >
                      <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
                        <span class="text-gray-500 dark:text-neutral-400">Rp</span>
                      </div>
                      <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                        <span class="text-gray-500 dark:text-neutral-400">IDR</span>
                      </div>
                  </div>
              </div>

              <div>
                  <label class="block mb-2 text-sm text-gray-800 dark:text-neutral-200 font-medium">Waktu pengisian</label>
                  <input type="datetime-local" name="tanggal" value="{{ now()->format('Y-m-d\TH:i') }}" autocomplete="off" placeholder="Pilih tanggal ..." class="datetime py-2.5 sm:py-3 px-4 block w-full bg-white dark:bg-neutral-800 border-gray-200 dark:border-neutral-700 rounded-lg sm:text-sm text-gray-800 dark:text-neutral-200 placeholder:text-gray-500 dark:placeholder:text-neutral-400 focus:border-blue-700 dark:focus:border-blue-600 focus:ring-blue-700 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none">
              </div>
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
  <div class="mt-8 xl:mt-0">
    <h1 class="mb-3 text-lg font-semibold text-gray-800 dark:text-neutral-200 sm:text-xl">
      Konsumsi BBM saat ini
    </h1>
    @php
        $total = 0;
    @endphp
    @forelse ($data->fuelLogs as $item)
    @php
        $total =+ $item->total
    @endphp
    <div class="p-4 relative flex flex-col mb-3 bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
      <div>
        <div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-gray-800 dark:text-neutral-200">
                <div class="flex flex-col">
                    <p class="text-xs font-medium">Biaya</p>
                    <p class="text-sm">
                        Konsumsi {{ rtrim(rtrim(number_format($item->liter, 2, '.', ''), '0'), '.') }} Liter, Rp {{ number_format($item->harga_per_liter) }} / Liter
                    </p>
                </div>
                <div class="flex flex-col text-left sm:text-right">
                    <p class="text-xs font-medium">Total</p>
                    <p class="text-sm">
                        Rp {{ number_format($item->total) }}
                    </p>
                </div>
            </div>
        </div>

        <div>
          <div class="mt-2 flex items-start gap-x-2 text-gray-500 dark:text-neutral-400">
              <p class="text-xs">
                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y H:i') }}
              </p>
          </div>
        </div>

        <div>
            <div class="flex lg:flex-col justify-end items-center gap-2 pt-3 lg:pt-0">
                <div class="lg:order-2 lg:ms-auto">
                    <button data-id="{{ $item->id_fuel_log }}" data-idb="{{ $item->booking_id }}" type="button" class="btn-hapus py-2 px-3 text-xs inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-700 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-red-600 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-delete-alert" data-hs-overlay="#hs-delete-alert">
                      Hapus
                    </button>
                </div>
            </div>
        </div>
      </div>
    </div>
    @empty
    <div class="p-4 relative flex flex-col bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
      <div class="text-center py-20 px-4 sm:px-6 lg:px-8">
        <svg class="block size-20 font-bold text-blue-600 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hard-drive-icon lucide-hard-drive"><path d="M10 16h.01"/><path d="M2.212 11.577a2 2 0 0 0-.212.896V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5.527a2 2 0 0 0-.212-.896L18.55 5.11A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/><path d="M21.946 12.013H2.054"/><path d="M6 16h.01"/></svg>
        <p class="mt-3 text-gray-600">Daftar {{ $echo }} kosong</p>
      </div>
    </div>
    @endforelse
    <div class="py-3 flex items-center font-bold text-sm text-gray-800 before:flex-1 before:border-t before:border-gray-200 before:me-6 dark:text-white dark:before:border-neutral-600">Rp {{ number_format($total) }}</div>
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

  document.addEventListener('DOMContentLoaded', function () {
      const liter = document.getElementById('liter');
      const cpliter = document.getElementById('cpliter');
      const total = document.getElementById('total');

      let delay;

      function hitungTotal() {
          clearTimeout(delay);

          delay = setTimeout(() => {
              const l = parseFloat(liter.value) || 0;
              const cp = parseFloat(cpliter.value) || 0;

              total.value = l * cp;
          }, 500);
      }

      liter.addEventListener('input', hitungTotal);
      cpliter.addEventListener('input', hitungTotal);
  });

  document.addEventListener('DOMContentLoaded', function () {
        let urlDelete = "{{ route('dashboard.'.$page.'.delete', [':id_booking',':id']) }}";
        const btnTrig = document.querySelectorAll('.btn-hapus');
        const form = document.getElementById('delete-form');
        const text = document.getElementById('delete-text');

        btnTrig.forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const idb = this.dataset.idb;

                form.action = urlDelete.replace(/(:id_booking|%3Aid_booking)/g, idb).replace(/(:id|%3Aid)/g, id)
                text.innerHTML = `Hapus {{ $echo }} ini? Data yang dihapus tidak dapat dikembalikan.`;
            });
        });
    });
</script>

<!-- Confirm Delete Modal -->
<div id="hs-delete-alert" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-delete-alert-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
    <div class="relative w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto overflow-hidden dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-delete-alert">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 overflow-y-auto">
        <div class="flex gap-x-4 md:gap-x-7">
          <!-- Icon -->
          <span class="shrink-0 inline-flex justify-center items-center size-11 sm:w-15.5 sm:h-15.5 rounded-full border-4 border-red-50 bg-red-100 text-red-500">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
          </span>
          <!-- End Icon -->

          <div class="grow">
            <h3 id="hs-delete-alert-label" class="mb-2 text-xl font-bold text-gray-800">
              Konfirmasi Aksi
            </h3>
            <p id="delete-text" class="text-gray-500">
              Text
            </p>
          </div>
        </div>
      </div>

      <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t border-gray-200">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50" data-hs-overlay="#hs-delete-alert">
          Kembali
        </button>
        <form id="delete-form" action="" method="post">
          @csrf
          @method('DELETE')
        <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
          Hapus {{ $echo }}
        </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Confirm Delete Modal -->