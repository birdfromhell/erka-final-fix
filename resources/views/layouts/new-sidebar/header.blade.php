<section class="layout-header card rounded-0">
    <div class="d-flex align-items-center">
        @include('layouts.new-sidebar.mobile-sidebar')
        <button class="toggle-button d-none d-lg-block btn btn-light p-2">
            @include('components.icons.toggle2', ['class'=>'width_20'])
        </button>

        <div class="dropdown layouts_add_new">
            <button
                class="btn btn-light d-none d-lg-flex align-items-center px-3 py-2 fw-semibold" 
                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
            >
                @include('components.icons.plus', ['class'=>'me-2 width_14'])
                <span>Tambahkan</span>
            </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @can('user_add')
                        <li><a class="dropdown-item" href="/user-management/users"> <i class="i-Administrator text-20 me-2 "></i>Tambah Pengguna</a></li>
                    @endcan
                    @can('client_add')
                        <li><a class="dropdown-item" href="/people/clients"> <i class="i-Business-Mens text-20 me-2 "></i>Tambah Pelanggan</a></li>
                    @endcan
                    @can('suppliers_add')
                        <li><a class="dropdown-item" href="/people/suppliers"> <i class="i-Business-Mens text-20 me-2 "></i>Tambah Supplier</a></li>
                    @endcan
                    @can('products_add')
                        <li><a class="dropdown-item" href="/products/products/create"> <i class="i-Library-2 text-20 me-2 "></i>Tambah Produk</a></li>
                    @endcan
                    @can('sales_add')
                        <li><a class="dropdown-item" href="/sale/sales/create"> <i class="i-Full-Cart text-20 me-2 "></i>Tambah Penjualan</a></li>
                    @endcan
                    @can('purchases_add')
                        <li><a class="dropdown-item" href="/purchase/purchases/create"> <i class="i-Receipt text-20 me-2 "></i>Tambah Pembelian</a></li>
                    @endcan
                    @can('adjustment_add')
                        <li><a class="dropdown-item" href="/adjustment/adjustments/create"> <i class="i-Edit-Map text-20 me-2 "></i>Tambah Penyesuaian Stok</a></li>
                    @endcan
                    @can('transfer_add')
                        <li><a class="dropdown-item" href="/transfer/transfers/create"> <i class="i-Back text-20 me-2 "></i> {{ __('translate.CreateTransfer') }}</a></li>
                    @endcan
                    @can('quotations_add')
                        <li><a class="dropdown-item" href="/quotation/quotations/create"> <i class="i-Checkout-Basket text-20 me-2 "></i> {{ __('translate.Add_Quotation') }}</a></li>
                    @endcan
                  
                </ul>
        </div>
    </div>

    <div class="d-flex align-items-center button_pos">
        <button class="btn p-2 ms-4" data-fullscreen>
            @include('components.icons.expand', ['class'=>'width_20'])
        </button>
        
        <div class="dropdown button_settings">
            <img 
                alt="" 
                width="42" 
                height="42" 
                type="button"
                data-bs-toggle="dropdown" aria-expanded="false"
                class="rounded-circle dropdown-toggle"
                src="{{asset('images/avatar/'.Auth::user()->avatar)}}"
            >
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                @can('settings')
                    <li><a class="dropdown-item" href="/settings/system_settings">Setting</a></li>
                @endcan
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    Log Out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</section>