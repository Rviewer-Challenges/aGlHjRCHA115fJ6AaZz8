<style>
    .container_categories {
        margin-top: 30px;
        margin-bottom: 50px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .custom_card_categories {
        background-color: #FFFFFF;
        border: 1px solid #ECF3FB;
        border-radius: 10px;
        box-sizing: border-box;
        cursor: pointer;
        padding: 1rem;
        margin-right: 20px;
    }

    .text_card_category {
        font-size: 16px;
        font-weight: 800;
    }
</style>

<template>
        <div class="container_categories">
            <div class="custom_card_categories" v-for="(category, index) in categories" :key="index">
                <span class="text_card_category">{{category}}</span>
            </div>
        </div>
</template>

<script>
    export default {
        data (){
            return {
                categories: ['Categoria 1', 'Categoria 2', 'Categoria 3', 'Categoria 4', 'Categoria 5', 'Categoria 6']
            }
        }
    }
</script>
