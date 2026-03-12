@php
    $title = "Konsumsi BBM";
    $id_data = 'id_booking';
    $echo = "pesanan";
    $page = 'fuel-log';
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
                      ID Pesanan
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
                      Sopir
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                      Tujuan
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

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-gray-800">
                      BBM
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
                    <span class="text-sm text-gray-600">#{{ $item->id_booking }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->vehicle->nama_kendaraan }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->driver->nama_driver }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->tujuan }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    @if ($item->status == 1)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">
                        Pending
                      </span>
                    @elseif ($item->status == 2)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                        Approved
                      </span>
                    @elseif ($item->status == 3)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        Rejected
                      </span>
                    @elseif ($item->status == 4)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        Complete
                      </span>
                    @else
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        Unknown
                      </span>
                    @endif
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->fuelLogs->count() }}x Konsumsi</span>
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
                            <button class="btn-detail flex items-center w-full gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-detail" data-hs-overlay="#hs-detail" 
                              data-req="{{ $item->user->nama }}" data-role="{{ ucfirst($item->user->role) }}"
                              data-kendaraan="{{ $item->vehicle->nama_kendaraan }}" data-jenis="{{ $item->vehicle->jenis_kendaraan }}" data-plat="{{ $item->vehicle->plat_nomor }}"
                              data-sopir="{{ $item->driver->nama_driver }}" data-telp="{{ $item->driver->telepon }}"
                              data-tujuan="{{ $item->tujuan }}" data-tmulai="{{ $item->tanggal_mulai }}" data-tselesai="{{ $item->tanggal_selesai }}"
                              data-status="{{ $item->status }}" 
                              data-ssupervisor="{{ optional($item->approvals->where('level', 1)->first())->status }}" data-supervisor="{{ $item->approvals->where('level', 1)->first()->approverUser->nama }}" 
                              data-smanager="{{ optional($item->approvals->where('level', 2)->first())->status }}" data-manager="{{ $item->approvals->where('level', 2)->first()->approverUser->nama }}"
                              data-bbm="{{ $item->fuelLogs }}">
                              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-icon lucide-file"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/></svg>
                              Detail
                            </button>
                            <a href="{{ route('dashboard.'.$page.'.create', $item->$id_data) }}" class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100">
                              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-input-icon lucide-file-input"><path d="M4 11V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.706.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-1"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/><path d="M2 15h10"/><path d="m9 18 3-3-3-3"/></svg>
                              Input BBM
                            </a>
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
                const req = this.dataset.req;
                const role = this.dataset.role;

                const kendaraan = this.dataset.kendaraan;
                const jenis = this.dataset.jenis;
                const plat = this.dataset.plat;

                const sopir = this.dataset.sopir;
                const telp = this.dataset.telp;

                const tujuan = this.dataset.tujuan;
                const tmulai = this.dataset.tmulai;
                const tselesai = this.dataset.tselesai;

                const ssupervisor = this.dataset.ssupervisor;
                const supervisor = this.dataset.supervisor;
                const smanager = this.dataset.smanager;
                const manager = this.dataset.manager;

                const status = this.dataset.status;

                function badgeStatus(key){
                    switch (key) {
                            case "1":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-orange-100 text-orange-800 rounded-full"> Pending </span>`;
                                break;
                            case "2":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-teal-100 text-teal-800 rounded-full"> Approved </span>`;
                                break;
                            case "3":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-red-100 text-red-800 rounded-full"> Rejected </span>`;
                                break;
                            case "4":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-blue-100 text-blue-800 rounded-full"> Complete </span>`;
                                break;
                            default:
                                return '<span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-gray-100 text-gray-800"> Unknown </span>';
                        }
                }
                function badgeApproval(key){
                    switch (key) {
                            case "1":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-orange-100 text-orange-800 rounded-full"> Pending </span>`;
                                break;
                            case "2":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-teal-100 text-teal-800 rounded-full"> Approved </span>`;
                                break;
                            case "3":
                                return `<span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-red-100 text-red-800 rounded-full"> Rejected </span>`;
                                break;
                            default:
                                return '<span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-gray-100 text-gray-800"> Unknown </span>';
                        }
                }

                document.getElementById('req_d').innerHTML = `
                  <p>${req}</p>
                  <p class="text-xs">${role}</p>
                `
                document.getElementById('kendaraan_d').innerHTML = `
                  <p>${kendaraan}</p>
                  <p class="text-xs font-mono">${plat}</p>
                  <p class="text-xs mt-0.5">${jenis}</p>
                `
                document.getElementById('sopir_d').innerHTML = `
                  <p>${sopir}</p>
                  <p class="text-xs">${telp}</p>
                `
                document.getElementById('tujuan_d').innerText = tujuan
                document.getElementById('tmulai_d').innerText = tmulai
                document.getElementById('tselesai_d').innerText = tselesai
                document.getElementById('supervisor_d').innerHTML = `
                  <p>${badgeApproval(ssupervisor)}</p>
                  <p class="text-xs mt-0.5">${supervisor}</p>
                `
                document.getElementById('manager_d').innerHTML = `
                  <p>${badgeApproval(smanager)}</p>
                  <p class="text-xs mt-0.5">${manager}</p>
                `
                document.getElementById('status_d').innerHTML = badgeStatus(status)

                // BBM
                const fuelLogsRaw = this.dataset.bbm
                const fuelLogs = JSON.parse(fuelLogsRaw);
                const container = document.getElementById('fuel_content');
                container.innerHTML = '';

                const formatRupiah = (num) => {
                    return new Intl.NumberFormat('id-ID', { 
                        style: 'currency', 
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(num);
                }

                grandTotal = 0
                fuelLogs.forEach(fuel => {
                    const tanggal = new Date(fuel.tanggal);
                    const tanggalFormatted = tanggal.toLocaleString('id-ID', {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    const liter = parseFloat(fuel.liter);
                    const hargaPerLiter = parseFloat(fuel.harga_per_liter);
                    const total = parseFloat(fuel.total);
                    grandTotal =+ fuel.total

                    const dt = document.createElement('dt');
                    dt.className = 'sm:py-1 text-sm text-gray-500 dark:text-neutral-500';
                    dt.textContent = `Konsumsi ${liter} Liter`;

                    const dd = document.createElement('dd');
                    dd.className = 'pb-3 sm:py-1 min-h-8 text-sm font-semibold text-gray-800 dark:text-neutral-200';
                    dd.innerHTML = `
                        <p>${formatRupiah(total)}</p>
                        <p class="text-xs font-normal">${formatRupiah(hargaPerLiter)} / Liter</p>
                        <p class="text-xs font-normal text-gray-400 mt-0.5">${tanggalFormatted}</p>
                    `;

                    container.appendChild(dt);
                    container.appendChild(dd);
                });
                document.getElementById('total').innerText = formatRupiah(grandTotal)
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
                    Requested by
                    </dt>
                    <dd id="req_d" class="pb-3 sm:py-1 min-h-8 text-sm font-semibold text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Kendaraan
                    </dt>
                    <dd id="kendaraan_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Sopir
                    </dt>
                    <dd id="sopir_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Tujuan
                    </dt>
                    <dd id="tujuan_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Tanggal mulai
                    </dt>
                    <dd id="tmulai_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Tanggal selesai
                    </dt>
                    <dd id="tselesai_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Approval supervisor
                    </dt>
                    <dd id="supervisor_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                    ...
                    </dd>

                    <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                    Approval manager
                    </dt>
                    <dd id="manager_d" class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
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

        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50" data-hs-overlay="#hs-detail-konsumsi">
          Lihat konsumsi BBM
        </button>
      </div>
    </div>
  </div>
</div>
<!-- End Detail Modal -->

<!-- Detail Konsumsi Modal -->
<div id="hs-detail-konsumsi" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-detail-konsumsi-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
    <div class="relative w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto overflow-hidden dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-detail-konsumsi">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 overflow-y-auto">
        <div class="flex gap-x-4 md:gap-x-7">
          <!-- Icon -->
          <span class="shrink-0 inline-flex justify-center items-center size-11 sm:w-15.5 sm:h-15.5 rounded-full border-4 border-blue-50 bg-blue-100 text-blue-500">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-box-icon lucide-file-box"><path d="M14.5 22H18a2 2 0 0 0 2-2V8a2.4 2.4 0 0 0-.706-1.706l-3.588-3.588A2.4 2.4 0 0 0 14 2H6a2 2 0 0 0-2 2v3.8"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/><path d="M11.7 14.2 7 17l-4.7-2.8"/><path d="M3 13.1a2 2 0 0 0-.999 1.76v3.24a2 2 0 0 0 .969 1.78L6 21.7a2 2 0 0 0 2.03.01L11 19.9a2 2 0 0 0 1-1.76V14.9a2 2 0 0 0-.97-1.78L8 11.3a2 2 0 0 0-2.03-.01z"/><path d="M7 17v5"/></svg>
          </span>
          <!-- End Icon -->

          <div class="grow">
            <h3 id="hs-detail-konsumsi-label" class="mb-2 text-xl font-bold text-gray-800">
              Detail konsumsi BBM
            </h3>
            <p id="modal-text" class="text-gray-500">
              <dl id="fuel_content" class="grid grid-cols-1 sm:grid-cols-2 sm:gap-y-2 gap-x-4">

              </dl>
              <div id="total" class="py-3 flex items-center font-bold text-sm text-gray-800 before:flex-1 before:border-t before:border-gray-200 before:me-6 dark:text-white dark:before:border-neutral-600">Rp 0</div>
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
<!-- End Detail Konsumsi Modal -->