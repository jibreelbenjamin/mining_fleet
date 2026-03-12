@php
    $title = "Daftar pesanan";
    $id_data = 'id_booking';
    $echo = "pesanan";
    $page = 'approval';
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
                    <span class="text-sm text-gray-600">#{{ $item->booking->id_booking }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->booking->vehicle->nama_kendaraan }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->booking->driver->nama_driver }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    <span class="text-sm text-gray-600">{{ $item->booking->tujuan }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-2">
                    @if ($item->booking->status == 1)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">
                        Pending
                      </span>
                    @elseif ($item->booking->status == 2)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                        Approved
                      </span>
                    @elseif ($item->booking->status == 3)
                      <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        Rejected
                      </span>
                    @elseif ($item->booking->status == 4)
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
                  <div class="px-6 py-1.5 flex justify-end">
                    <div class="group inline-flex items-center divide-x divide-gray-300 border border-gray-300 bg-white shadow-2xs rounded-lg transition-all">
                      <div class="relative inline-flex">
                        <button type="button" class="btn-detail py-1.5 px-2 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-detail" data-hs-overlay="#hs-detail" 
                              data-id="{{ $item->id_approval }}" data-req="{{ $item->booking->user->nama }}" data-role="{{ ucfirst($item->booking->user->role) }}"
                              data-kendaraan="{{ $item->booking->vehicle->nama_kendaraan }}" data-jenis="{{ $item->booking->vehicle->jenis_kendaraan }}" data-plat="{{ $item->booking->vehicle->plat_nomor }}"
                              data-sopir="{{ $item->booking->driver->nama_driver }}" data-telp="{{ $item->booking->driver->telepon }}"
                              data-tujuan="{{ $item->booking->tujuan }}" data-tmulai="{{ $item->booking->tanggal_mulai }}" data-tselesai="{{ $item->booking->tanggal_selesai }}"
                              data-status="{{ $item->booking->status }}" 
                              data-ssupervisor="{{ optional($item->booking->approvals->where('level', 1)->first())->status }}" data-supervisor="{{ $item->booking->approvals->where('level', 1)->first()->approverUser->nama }}" 
                              data-smanager="{{ optional($item->booking->approvals->where('level', 2)->first())->status }}" data-manager="{{ $item->booking->approvals->where('level', 2)->first()->approverUser->nama }}">
                          <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-icon lucide-file"><path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/></svg>
                        </button>
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
                let uApprove = "{{ route('dashboard.approval.approve.action', ':id') }}"
                document.getElementById('approve-form').action = uApprove.replace(':id', this.dataset.id).replace('%3Aid', this.dataset.id)
                let uReject = "{{ route('dashboard.approval.reject.action', ':id') }}"
                document.getElementById('reject-form').action = uReject.replace(':id', this.dataset.id).replace('%3Aid', this.dataset.id)
                
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
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        let urlDelete = "";
        const btnTrig = document.querySelectorAll('.btn-hapus');
        const form = document.getElementById('delete-form');
        const text = document.getElementById('delete-text');

        btnTrig.forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;

                form.action = urlDelete.replace(':id', id).replace('%3Aid', id)
                text.innerHTML = `Hapus {{ $echo }} <strong>#${nama}</strong>? Data yang dihapus tidak dapat dikembalikan.`;
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
            <h3 class="mt-5 text-xs text-gray400">
              *Anda menyetujui/menolak {{ $echo }} ini sebagai <strong>{{ ucfirst(Auth::user()->role) }}</strong>. 
            </h3>
          </div>
        </div>
      </div>

      <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t border-gray-200">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50" data-hs-overlay="#hs-detail">
          Kembali
        </button>
        <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-reject-alert" data-hs-overlay="#hs-reject-alert">
          Tolak
        </button>
        <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-approve-alert" data-hs-overlay="#hs-approve-alert">
          Setujui
        </button>
      </div>
    </div>
  </div>
</div>
<!-- End Detail Modal -->

<!-- Confirm Reject Modal -->
<div id="hs-reject-alert" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-reject-alert-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
    <div class="relative w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto overflow-hidden dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-reject-alert">
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
            <h3 id="hs-reject-alert-label" class="mb-2 text-xl font-bold text-gray-800">
              Konfirmasi Aksi
            </h3>
            <p id="delete-text" class="text-gray-500">
              Yakin ingin <strong>menolak pesanan ini?</strong>
            </p>
          </div>
        </div>
      </div>

      <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t border-gray-200">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50" data-hs-overlay="#hs-detail">
          Kembali
        </button>
        <form id="reject-form" action="" method="post">
          @csrf
          @method('PUT')
        <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
          Tolak {{ $echo }}
        </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Confirm Reject Modal -->

<!-- Confirm Approve Modal -->
<div id="hs-approve-alert" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-approve-alert-label">
  <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
    <div class="relative w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto overflow-hidden dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-approve-alert">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 overflow-y-auto">
        <div class="flex gap-x-4 md:gap-x-7">
          <!-- Icon -->
          <span class="shrink-0 inline-flex justify-center items-center size-11 sm:w-15.5 sm:h-15.5 rounded-full border-4 border-teal-50 bg-teal-100 text-teal-500">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
          </span>
          <!-- End Icon -->

          <div class="grow">
            <h3 id="hs-approve-alert-label" class="mb-2 text-xl font-bold text-gray-800">
              Konfirmasi Aksi
            </h3>
            <p id="delete-text" class="text-gray-500">
              Yakin ingin <strong>menyetujui pesanan ini?</strong>
            </p>
          </div>
        </div>
      </div>

      <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t border-gray-200">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50" data-hs-overlay="#hs-detail">
          Kembali
        </button>
        <form id="approve-form" action="" method="post">
          @csrf
          @method('PUT')
        <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none">
          Setujui {{ $echo }}
        </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Confirm Approve Modal -->