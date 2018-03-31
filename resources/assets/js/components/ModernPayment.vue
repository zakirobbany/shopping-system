<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Penjualan Baru</div>
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
              <form action="" class="form-horizontal" style="margin-top: 20px; margin-left: -200px;">

                <div class="form-group">
                  <label for="customer" class="control-label col-sm-3">Pembeli</label>
                  <div class="col-sm-5">
                    <select id="customer" name="customer" class="form-control">
                      <option value="">Pilih Pembeli</option>
                      <option v-for="customer in customers" v-bind:value="customer.id">
                        {{ customer.name }}
                      </option>
                    </select>
                  </div>
                </div>

              </form>

              <div class="panel panel-default">
                <div class="panel-heading">
                  Barang Yang Dibeli
                  <button class="btn btn-default pull-right" v-on:click="addRow" style="margin-top: -6px; "><i class="fa fa-plus-circle"></i> Tambah Baris</button>
                </div>
                <div class="panel-body" style="background-color: transparent;">
                  <div class="row">
                    <div class="col-xs-3">Barang</div>
                    <div class="col-xs-2">Harga Barang</div>
                    <div class="col-xs-1">Jumlah</div>
                    <div class="col-xs-2">Potongan</div>
                    <div class="col-xs-3">Jumlah Harga</div>
                    <div class="col-xs-1"></div>
                  </div>
                </div>

                <div v-for="(row, index) in rows" style="padding-left: 10px; padding-bottom: 15px; padding-right: 10px">
                  <div class="row">
                    <div class="col-xs-3">
                      <select class="form-control" v-model="row.product" name="row.product" v-on:change="setSellPrice(index)">
                        <option value=""></option>
                        <option v-for="product in products" v-bind:value="product">
                          {{ product.name }}
                        </option>
                      </select>
                    </div>

                    <div class="col-xs-2">
                      <input class="form-control" type="number" v-bind:value="row.product.sell_price"
                             name="row.sell_price" readonly/>
                    </div>

                    <div class="col-xs-1">
                      <input class="form-control" type="number" v-model="row.quantity" name="row.quantity"
                             v-on:change="getTotalPrice" />
                    </div>

                    <div class="col-xs-2">
                      <input class="form-control" type="number" v-model="row.discount" name="row.discount"
                             v-on:change="getDiscount" />
                    </div>

                    <div class="col-xs-3">
                      <input class="form-control" type="number" v-bind:value="row.total_price" value="row.total_price"
                             name="row.total_price" readonly/>
                    </div>

                    <div class="col-xs-1">
                      <a v-on:click="removeElement(index);" class="btn btn-danger btn-block">
                        <i class="fa fa-trash"></i>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data: function () {
      return {
        customers: [],
        rows: [],
        products: [],
      }
    },

    mounted: function () {
      this.getCustomers(); this.getProducts();
    },

    methods: {
      getCustomers: function () {
        axios.get('/api/customers')
          .then(response => {
            let customers = response.data.data
            this.customers = customers
          })
      },

      addRow: function () {
        var elem = document.createElement('tr');
        this.rows.push({
          product: "",
          sell_price: "",
          quantity: "",
          discount: "",
          total_price: ""
        });
      },

      removeElement: function (index) {
        this.rows.splice(index, 1);
      },

      getProducts: function () {
        axios.get('/api/products')
          .then(response => {
            let products = response.data.data
            this.products = products
          })
      },

      setSellPrice: function (index) {
        if (this.rows.key(index)[product] !== null) {
          this.rows.findIndex(index).sell_price = this.rows.findIndex(index).product.sell_price;
        }
      },

      getTotalPrice: function () {
        if (this.row.quantity !== null) {
          this.total_price = this.sell_price * this.quantity;
        }
      },

      getDiscount: function () {
        if (this.discount !== null) {
          this.totalPrice = this.sell_price * this.quantity - this.discount;
        }
      }
    }
  }
</script>
