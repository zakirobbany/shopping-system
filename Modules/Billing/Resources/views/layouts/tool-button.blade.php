<div class="btn-group pull-right">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" style="margin-right: 14px; margin-top: 3px;">

        <i class="fa fa-cog"></i> Tool <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li>
            <a href="{{ route('payment.create') }}">
                <span class="fa fa-plus-circle"></span>&nbsp; Penjualan Baru
            </a>
        </li>
        @if(Route::getCurrentRoute()->uri != 'billing')
            <li>
                <a role="button" data-toggle="modal" data-target="#modalFilter">
                    <span class="fa fa-search">&nbsp; Filter</span>
                </a>
            </li>
        @endif
    </ul>
</div>
