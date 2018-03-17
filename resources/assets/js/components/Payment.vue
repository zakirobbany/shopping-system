<template>
    <!--<div class="form-group">
        <label for="product_name" class="control-label col-sm-2">Barang</label>
        <div class="col-sm-5">
            <select v-model="selectedProduct" id="product_name" class="form-control">
                <option value=""></option>
                <option v-for="product in products" v-bind:value="product">
                    {{ product.name }}
                </option>
            </select>
        </div>
    </div>-->

    <!--<p>{{ selectedProduct.sell_price }}</p>-->
    <!--<div class="form-group">
        <label class="control-label col-sm-2">Tipe Barang</label>
        <div class="col-sm-5">
            <input type="text" v-if="selectedProduct.product_type_id === 1" value="satuan"/>
            <input type="text" v-if="selectedProduct.product_type_id === 1" value="gram"/>
        </div>
    </div>

    <div class="form-group">
        <label for="product_price" class="control-label col-sm-2">Harga</label>
        <div class="col-sm-5">
            <input type="text" id="product_price" v-bind:value="selectedProduct.sell_price" readonly/>
        </div>
    </div>

    <input type="hidden" name="product_id[]" v-bind:value="selectedProduct.id" />

    <div class="form-group">
        <label for="quantity[]" class="control-label col-sm-2">Jumlah</label>
        <div class="col-sm-5">
            <input type="text" name="quantity[]" id="quantity[]" v-model="quantity" v-on:change="getTotalPrice"/>
        </div>
    </div>

    <div class="form-group">
        <label for="discount[]" class="control-label col-sm-2">Potongan</label>
        <div class="col-sm-5">
            <input type="text" name="discount[]" id="discount[]" v-model="discount" v-on:change="getDiscount" />
        </div>
    </div>

    <div class="form-group">
        <label for="total_price[]" class="control-label col-sm-2">Total Harga</label>
        <div class="col-sm-5">
            <input type="text" name="total_price[]" id="total_price[]" v-bind="totalPrice" readonly/>
        </div>
    </div>-->

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Satuan Barang</th>
            <th>Harga Barang</th>
            <th></th>
            <th>Jumlah</th>
            <th>Potongan Harga</th>
            <th>Jumlah Harga</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <select v-model="selectedProduct" class="select2">
                    <option value=""></option>
                    <option v-for="product in products"
                            v-bind:value="product">
                        {{ product.name }}
                    </option>
                </select>
            </td>
            <td>
                <input type="text" v-if="selectedProduct === ''" value="jenis"/>
                <input type="text"
                       v-if="selectedProduct.product_type_id & selectedProduct.product_type_id === 1"
                       value="satuan" readonly/>
                <input type="text"
                       v-if="selectedProduct.product_type_id & selectedProduct.product_type_id === 2"
                       value="gram" readonly/>
            </td>
            <td>
                <input type="text" v-bind:value="selectedProduct.sell_price" readonly/>
            </td>
            <td>
                <input type="hidden" name="product_id[]" v-bind:value="selectedProduct.id" readonly/>
            </td>
            <td style="width: 10px">
                <input type="text" name="quantity[]" v-model="quantity" v-on:change="getTotalPrice"/>
            </td>
            <td>
                <input type="text" name="discount[]" v-model="discount" v-on:change="getDiscount"/>
            </td>
            <td>
                <input type="text" name="total_price[]" v-bind:value="totalPrice" readonly/>
            </td>
        </tr>

        <tr>
            <td>
                <select v-model="selectedProduct2" id="product_name" class="select2">
                    <option value=""></option>
                    <option v-for="product in products"
                            v-bind:value="product">
                        {{ product.name }}
                    </option>
                </select>
            </td>
            <td>
                <input type="text" v-if="selectedProduct2 === ''" value="jenis"/>
                <input type="text"
                       v-if="selectedProduct2.product_type_id & selectedProduct2.product_type_id === 1"
                       value="satuan" readonly/>
                <input type="text"
                       v-if="selectedProduct2.product_type_id & selectedProduct2.product_type_id === 2"
                       value="gram" readonly/>
            </td>
            <td>
                <input type="text" v-bind:value="selectedProduct2.sell_price" readonly/>
            </td>
            <td>
                <input type="hidden" name="product_id[]" v-bind:value="selectedProduct2.id" readonly/>
            </td>
            <td style="width: 10px">
                <input type="text" name="quantity[]" v-model="quantity2" v-on:change="getTotalPrice2"/>
            </td>
            <td>
                <input type="text" name="discount[]" v-model="discount2" v-on:change="getDiscount2"/>
            </td>
            <td>
                <input type="text" name="total_price[]" v-bind:value="totalPrice2" readonly/>
            </td>
        </tr>

        <tr>
            <td>
                <select v-model="selectedProduct3" id="product_name" class="select2">
                    <option value=""></option>
                    <option v-for="product in products"
                            v-bind:value="product">
                        {{ product.name }}
                    </option>
                </select>
            </td>
            <td>
                <input type="text" v-if="selectedProduct3 === ''" value="jenis"/>
                <input type="text"
                       v-if="selectedProduct3.product_type_id & selectedProduct3.product_type_id === 1"
                       value="satuan" readonly/>
                <input type="text"
                       v-if="selectedProduct3.product_type_id & selectedProduct3.product_type_id === 2"
                       value="gram" readonly/>
            </td>
            <td>
                <input type="text" v-bind:value="selectedProduct3.sell_price" readonly/>
            </td>
            <td>
                <input type="hidden" name="product_id[]" v-bind:value="selectedProduct3.id" readonly/>
            </td>
            <td style="width: 10px">
                <input type="text" name="quantity[]" v-model="quantity3" v-on:change="getTotalPrice3"/>
            </td>
            <td>
                <input type="text" name="discount[]" v-model="discount3" v-on:change="getDiscount3"/>
            </td>
            <td>
                <input type="text" name="total_price[]" v-bind:value="totalPrice3" readonly/>
            </td>
        </tr>

        <tr>
            <td>
                <select v-model="selectedProduct4" id="product_name" class="select2">
                    <option value=""></option>
                    <option v-for="product in products"
                            v-bind:value="product">
                        {{ product.name }}
                    </option>
                </select>
            </td>
            <td>
                <input type="text" v-if="selectedProduct4 === ''" value="jenis"/>
                <input type="text"
                       v-if="selectedProduct4.product_type_id & selectedProduct4.product_type_id === 1"
                       value="satuan" readonly/>
                <input type="text"
                       v-if="selectedProduct4.product_type_id & selectedProduct4.product_type_id === 2"
                       value="gram" readonly/>
            </td>
            <td>
                <input type="text" v-bind:value="selectedProduct4.sell_price" readonly/>
            </td>
            <td>
                <input type="hidden" name="product_id[]" v-bind:value="selectedProduct4.id" readonly/>
            </td>
            <td style="width: 10px">
                <input type="text" name="quantity[]" v-model="quantity4" v-on:change="getTotalPrice4"/>
            </td>
            <td>
                <input type="text" name="discount[]" v-model="discount4" v-on:change="getDiscount4"/>
            </td>
            <td>
                <input type="text" name="total_price[]" v-bind:value="totalPrice4" readonly/>
            </td>
        </tr>

        <tr>
            <td>
                <select v-model="selectedProduct5" id="product_name" class="select2">
                    <option value=""></option>
                    <option v-for="product in products"
                            v-bind:value="product">
                        {{ product.name }}
                    </option>
                </select>
            </td>
            <td>
                <input type="text" v-if="selectedProduct5 === ''" value="jenis"/>
                <input type="text"
                       v-if="selectedProduct5.product_type_id & selectedProduct5.product_type_id === 1"
                       value="satuan" readonly/>
                <input type="text"
                       v-if="selectedProduct5.product_type_id & selectedProduct5.product_type_id === 2"
                       value="gram" readonly/>
            </td>
            <td>
                <input type="text" v-bind:value="selectedProduct5.sell_price" readonly/>
            </td>
            <td>
                <input type="hidden" name="product_id[]" v-bind:value="selectedProduct5.id" readonly/>
            </td>
            <td style="width: 10px">
                <input type="text" name="quantity[]" v-model="quantity5" v-on:change="getTotalPrice5"/>
            </td>
            <td>
                <input type="text" name="discount[]" v-model="discount5" v-on:change="getDiscount5"/>
            </td>
            <td>
                <input type="text" name="total_price[]" v-bind:value="totalPrice5" readonly/>
            </td>
        </tr>
        <tr>
            <td>
                Total Pembayaran
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <input type="text" name="total_payment" v-bind:value="totalPayment" readonly/>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data: function() {
            return {
                products: [],
                selectedProduct: '',
                selectedProduct2: '',
                selectedProduct3: '',
                selectedProduct4: '',
                selectedProduct5: '',
                quantity: '',
                quantity2: '',
                quantity3: '',
                quantity4: '',
                quantity5: '',
                discount: '',
                discount2: '',
                discount3: '',
                discount4: '',
                discount5: '',
                totalPrice: '',
                totalPrice2: '',
                totalPrice3: '',
                totalPrice4: '',
                totalPrice5: '',
                totalPayment: ''
            }
        },

        mounted: function() {
            this.getProducts()
        },

        /*props: {
            'initialProduct': {
                'default': null
            }
        },*/

        methods: {
            getProducts: function() {
                axios.get('/api/products')
                    .then(response => {
                    let products = response.data.data
                    this.products = products
            })
            },

            getTotalPrice: function () {
                if (this.quantity !== null) {
                    this.totalPrice = this.selectedProduct.sell_price * this.quantity;
                    this.getTotalPayment();
                }
            },

            getDiscount: function () {
                if (this.discount !== null) {
                    this.totalPrice = this.selectedProduct.sell_price * this.quantity - this.discount;
                    this.getTotalPayment();
                }
            },

            getTotalPrice2: function () {
                if (this.quantity2 !== null) {
                    this.totalPrice2 = this.selectedProduct2.sell_price * this.quantity2;
                    this.getTotalPayment();
                }
            },

            getDiscount2: function () {
                if (this.discount2 !== null) {
                    this.totalPrice2 = this.selectedProduct2.sell_price * this.quantity2 - this.discount2;
                    this.getTotalPayment();
                }
            },

            getTotalPrice3: function () {
                if (this.quantity3 !== null) {
                    this.totalPrice3 = this.selectedProduct3.sell_price * this.quantity3;
                    this.getTotalPayment();
                }
            },

            getDiscount3: function () {
                if (this.discount3 !== null) {
                    this.totalPrice3 = this.selectedProduct3.sell_price * this.quantity3 - this.discount3;
                    this.getTotalPayment();
                }
            },

            getTotalPrice4: function () {
                if (this.quantity4 !== null) {
                    this.totalPrice4 = this.selectedProduct4.sell_price * this.quantity4;
                    this.getTotalPayment();
                }
            },

            getDiscount4: function () {
                if (this.discount !== null) {
                    this.totalPrice4 = this.selectedProduct4.sell_price * this.quantity4 - this.discount4;
                    this.getTotalPayment();
                }
            },

            getTotalPrice5: function () {
                if (this.quantity5 !== null) {
                    this.totalPrice5 = this.selectedProduct5.sell_price * this.quantity5;
                    this.getTotalPayment();
                }
            },

            getDiscount5: function () {
                if (this.discount5 !== null) {
                    this.totalPrice5 = this.selectedProduct5.sell_price * this.quantity5 - this.discount5;
                    this.getTotalPayment();

                }
            },

            getTotalPayment: function () {
                this.totalPayment = this.totalPrice + this.totalPrice2 + this.totalPrice3 + this.totalPrice4 + this.totalPrice5;
            }
        }
    }
</script>