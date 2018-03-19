<template>
    <div :class="['form-group']">
        <label for="product" class="control-label col-sm-2">barang</label>
        <div class="col-sm-4">
            <select v-model="product.name" id="product" class="form-control">

            </select>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                products: [],
                selectedProduct: '',
            }
        },

        mounted: function () {
            this.getProducts()
        },

        methods: {
            getProduct: function () {
                axios.get('/api/products')
                    .then(response => {
                        let products = response.data.data
                        this.products = products
                    })
            },
        }
    }
</script>

<style scoped>

</style>