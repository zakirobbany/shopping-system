<template>

</template>

<script>
    export default {
        data : function () {
            return {
                product : [],
                selectedProduct : '',
                quantity : '',
                discount : '',
                totalPayment : '',
            }
        },

        mounted : function () {
            this.getProducts()
        },

        props : {
            'initialProduct' : {
                'default' : null
            }
        }
    }

</script>