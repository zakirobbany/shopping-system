<div class="btn-group pull-right">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" style="margin-right: 14px; margin-top: 3px;">

        <i class="fa fa-cog"></i> Tool <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li>
            <a href="{{ route('product.create') }}">
                <span class="fa fa-plus" ></span>&nbsp;Tambah Produk
            </a>
        </li>
        <li>
            <a href="{{ route('product-brand.create') }}">
                <span class="fa fa-plus" ></span>&nbsp;Tambah Merk Produk
            </a>
        </li>
        <li>
            <a href="{{ route('product.add-stock') }}">
                <span class="fa fa-plus" ></span>&nbsp;Tambah Stok Produk
            </a>
        </li>
    </ul>
</div>
