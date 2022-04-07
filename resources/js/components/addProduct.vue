<template>
        <input @click="toggleProduct()" type="submit" id="submit" value="AJOUTER AU PANIER">
</template>

<script>
export default {
      mounted() {
            console.log('Component mounted.')
        },
        name: 'add-product',
        
        methods: {
            toggleProduct(e){
                e.preventDefault();

                console.log("clicked");
            }
        }
}
</script>

<style>

</style>