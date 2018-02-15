<div class="btn-group pull-right">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" style="margin-right: 14px; margin-top: 3px;">

        <i class="fa fa-cog"></i> Tool <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        @if(Route::getCurrentRoute()->uri == 'core/employee')
            <li>
                <a href="{{ route('employee.create') }}">
                    <span class="fa fa-plus" ></span>&nbsp;Tambah Karyawan
                </a>
            </li>
        @endif
        @if(Route::getCurrentRoute()->uri == 'core/courier')
            <li>
                <a href="{{ route('courier.create') }}">
                    <span class="fa fa-plus" ></span>&nbsp;Tambah Kurir
                </a>
            </li>
        @endif
        @if(Route::getCurrentRoute()->uri == 'core/supplier')
            <li>
                <a href="{{ route('supplier.create') }}">
                    <span class="fa fa-plus" ></span>&nbsp;Tambah Kurir
                </a>
            </li>
        @endif
        <li>
            {{--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalFilter">
                Filter
            </button>--}}
            <a role="button" data-toggle="modal" data-target="#modalFilter">
                <span class="fa fa-search"> Filter</span>
            </a>
        </li>
    </ul>
</div>
