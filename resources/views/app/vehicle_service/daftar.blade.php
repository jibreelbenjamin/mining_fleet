@php
    $title = "Daftar jadwal servis";
    $id_data = 'id_vehicle_service';
    $echo = "jadwal servis";
    $page = 'vehicle_service';
@endphp
<x-app :page='$page' :title='$title'>
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <!-- Input -->
            <div class="sm:col-span-1">
              <label class="sr-only">Search</label>
              <div class="relative">
                <input id="search" type="text" value="{{ request()->get('search') }}" autocomplete="off" class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                  <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                </div>
              </div>
            </div>
            <a href="{{ route('dashboard.'.$page.'.create') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
              <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
              Tambah {{ $echo }}
            </a>

            <!-- End Input -->

          </div>
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                      No.
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                      Kendaraan
                    </span>
                  </div>
                </th>
                
                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                      Tanggal servis
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                      Keterangan
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                      Total biaya
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                      Status
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end"></th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">       
              @forelse ($data as $item)
              <tr>
                <td class="size-px whitespace-nowrap">
                  <div class="ps-6 py-2">
                    <span class="text-sm text-gray-600">{{ $loop->iteration }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->vehicle->nama_kendaraan }} ({{ $item->vehicle->jenis_kendaraan }})</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->service_date }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->keterangan }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">Rp {{ number_format($item->cost) }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    @if ($item->status === 1)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-fading-icon lucide-clock-fading"><path d="M12 2a10 10 0 0 1 7.38 16.75"/><path d="M12 6v6l4 2"/><path d="M2.5 8.875a10 10 0 0 0-.5 3"/><path d="M2.83 16a10 10 0 0 0 2.43 3.4"/><path d="M4.636 5.235a10 10 0 0 1 .891-.857"/><path d="M8.644 21.42a10 10 0 0 0 7.631-.38"/></svg>
                        Persiapan
                      </span>
                    @elseif ($item->status === 2)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-arrow-up-icon lucide-clock-arrow-up"><path d="M12 6v6l1.56.78"/><path d="M13.227 21.925a10 10 0 1 1 8.767-9.588"/><path d="m14 18 4-4 4 4"/><path d="M18 22v-8"/></svg>
                        Sedang diservis
                      </span>
                    @elseif ($item->status === 3)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-check-icon lucide-clock-check"><path d="M12 6v6l4 2"/><path d="M22 12a10 10 0 1 0-11 9.95"/><path d="m22 16-5.5 5.5L14 19"/></svg>
                        Selesai
                      </span>
                    @else
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        Unknown
                      </span>
                    @endif
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5 flex justify-end">
                    <div class="group inline-flex items-center divide-x divide-gray-300 border border-gray-300 bg-white shadow-2xs rounded-lg transition-all">

                      <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                        <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                          <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                          </svg>
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2" role="menu" aria-orientation="vertical" aria-labelledby="hs-table-dropdown-1">
                          <div class="py-2 first:pt-0 last:pb-0">
                            <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400">
                              Actions
                            </span>
                            <button class="btn-detail flex items-center w-full gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-detail" data-hs-overlay="#hs-detail" data-kendaraan="{{ $item->vehicle->nama_kendaraan }} ({{ $item->vehicle->jenis_kendaraan }})" data-tanggal="{{ $item->service_date }}" data-keterangan="{{ $item->keterangan }}" data-biaya="Rp {{ number_format($item->cost) }}" data-status="{{ $item->status }}">
                              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-icon lucide-file"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/></svg>
                              Detail
                            </button>
                            <a href="{{ route('dashboard.'.$page.'.update', $item->$id_data) }}" class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100">
                              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                              Edit
                            </a>
                            <button class="btn-hapus flex items-center w-full gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-delete-alert" data-hs-overlay="#hs-delete-alert" data-id="{{ $item->$id_data }}" data-nama="{{ $item->vehicle->nama_kendaraan }}">
                              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                              Hapus
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="9">
                  <div class="text-center py-20 px-4 sm:px-6 lg:px-8">
                    <svg class="block size-20 font-bold text-blue-600 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hard-drive-icon lucide-hard-drive"><path d="M10 16h.01"/><path d="M2.212 11.577a2 2 0 0 0-.212.896V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5.527a2 2 0 0 0-.212-.896L18.55 5.11A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/><path d="M21.946 12.013H2.054"/><path d="M6 16h.01"/></svg>
                    <p class="mt-3 text-gray-600">{{ request()->get('search') ? 'Data tidak ditemukan' : 'Daftar '.$echo.' kosong' }}</p>
                    <p class="text-gray-600">{{ request()->get('search') ? 'Periksa kembali kata kunci pencarian.' : 'Tamnbahkan daftar baru untuk mulai mengelola.' }}</p>
                  </div>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
          <!-- End Table -->

          <!-- Footer -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
            <div class="max-w-sm space-y-3">
              <span class="text-sm text-gray-500">
                Total <span class="font-semibold">{{ $data->total() }}</span> results
              </span>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                @if (!$data->onFirstPage())
                <a href="{{ $data->previousPageUrl() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                  Prev
                </a>
                @else
                <button disabled class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                  Prev
                </button>
                @endif

                @if ($data->hasMorePages())                    
                <a href="{{ $data->nextPageUrl() }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                  Next
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </a>
                @else
                <button disabled class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                  Next
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
                @endif
              </div>
            </div>
          </div>
          <!-- End Footer -->
        </div>
      </div>
    </div>
</x-app>
<script>
    debounceTimer = null
    document.getElementById('search').addEventListener('input', (e) => {
        const value = e.target.value.trim();

        clearTimeout(debounceTimer);

        if (value.length >= 1 || value.length === 0) {
            debounceTimer = setTimeout(() => {
                window.location.href = "{{ route('dashboard.'.$page) }}" + "?search=" + value
            }, 1000);
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const btnTrig = document.querySelectorAll('.btn-detail');

        btnTrig.forEach(btn => {
            btn.addEventListener('click', function () {
                const kendaraan = this.dataset.kendaraan;
                const tanggal = this.dataset.tanggal;
                const keterangan = this.dataset.keterangan;
                const biaya = this.dataset.biaya;
                const status = this.dataset.status;

                function badge(key){
                    switch (key) {
                            case "1":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-blue-100 text-blue-800 rounded-full"> <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-fading-icon lucide-clock-fading"><path d="M12 2a10 10 0 0 1 7.38 16.75"/><path d="M12 6v6l4 2"/><path d="M2.5 8.875a10 10 0 0 0-.5 3"/><path d="M2.83 16a10 10 0 0 0 2.43 3.4"/><path d="M4.636 5.235a10 10 0 0 1 .891-.857"/><path d="M8.644 21.42a10 10 0 0 0 7.631-.38"/></svg> Persiapan </span>`;
                                break;
                            case "2":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-orange-100 text-orange-800"> <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-arrow-up-icon lucide-clock-arrow-up"><path d="M12 6v6l1.56.78"/><path d="M13.227 21.925a10 10 0 1 1 8.767-9.588"/><path d="m14 18 4-4 4 4"/><path d="M18 22v-8"/></svg> Sedang diservis </span>`;
                                break;
                            case "3":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-teal-100 text-teal-800"> <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-check-icon lucide-clock-check"><path d="M12 6v6l4 2"/><path d="M22 12a10 10 0 1 0-11 9.95"/><path d="m22 16-5.5 5.5L14 19"/></svg> Selesai </span>`;
                                break;
                            default:
                                return '<span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-gray-100 text-gray-800"> Unknown </span>';
                        }
                }

                document.getElementById('kendaraan_d').innerText = kendaraan
                document.getElementById('tanggal_d').innerText = tanggal
                document.getElementById('keterangan_d').innerText = keterangan
                document.getElementById('biaya_d').innerText = biaya
                document.getElementById('status_d').innerHTML = badge(status)
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        let urlDelete = "{{ route('dashboard.'.$page.'.delete', ':id') }}";
        const btnTrig = document.querySelectorAll('.btn-hapus');
        const form = document.getElementById('delete-form');
        const text = document.getElementById('delete-text');

        btnTrig.forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;

                form.action = urlDelete.replace(':id', id).replace('%3Aid', id)
                text.innerHTML = `Hapus {{ $echo }} <strong>"${nama}"</strong>? Data yang dihapus tidak dapat dikembalikan, Mungkin akan berpengaruh pada data lainnya.`;
            });
        });
    });
</script>

<!-- Detail Modal -->
<div id="hs-detail" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-detail-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
    <div class="relative w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto overflow-hidden dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-detail">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 overflow-y-auto">
        <div class="flex gap-x-4 md:gap-x-7">
          <!-- Icon -->
          <span class="shrink-0 inline-flex justify-center items-center size-11 sm:w-15.5 sm:h-15.5 rounded-full border-4 border-blue-50 bg-blue-100 text-blue-500">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-icon lucide-file"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/></svg>
          </span>
          <!-- End Icon -->

          <div class="grow">
            <h3 id="hs-detail-label" class="mb-2 text-xl font-bold text-gray-800">
              Detail {{ $echo }}
            </h3>
            <p id="modal-text" class="text-gray-500">
              <dl class="grid grid-cols-1 sm:grid-cols-2 sm:gap-y-2 gap-x-4">
                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Kendaraan
                    </dt>
                    <dd id="kendaraan_d" class="pb-3 sm:py-1 min-h-8 text-sm font-semibold text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Tanggal servis
                    </dt>
                    <dd id="tanggal_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Keterangan
                    </dt>
                    <dd id="keterangan_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Total biaya
                    </dt>
                    <dd id="biaya_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Status
                    </dt>
                    <dd id="status_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>
                </dl>
            </p>
          </div>
        </div>
      </div>

      <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t border-gray-200">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50" data-hs-overlay="#hs-detail">
          Kembali
        </button>
      </div>
    </div>
  </div>
</div>
<!-- End Detail Modal -->

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