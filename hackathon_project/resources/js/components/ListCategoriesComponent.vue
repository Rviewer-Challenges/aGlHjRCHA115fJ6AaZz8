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
        margin-bottom: 10px;
    }

    .custom_card_categories:after{
        border: 0 solid #E2E8F0;
        box-sizing: border-box;
        overflow-wrap: break-word;
    }

    .custom_card_categories:before{
        border: 0 solid #E2E8F0;
        box-sizing: border-box;
        overflow-wrap: break-word;
    }

    .custom_card_categories:hover{
        box-shadow: #7E8897 0 2px 10px;
    }

    .text_card_category {
        font-size: 16px;
        font-weight: 800;
    }

    /* Mobile */
@media only screen and (max-width: 1400px){
    .container_categories {
        margin-top: 30px;
        margin-bottom: 50px;
        display: flex;
        flex-direction: column;
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
        margin-bottom: 10px;
    }
}
</style>

<template>
        <div class="container_categories">
            <div class="custom_card_categories" v-for="(category, index) in categories" :key="index" @click="redirect(category.slug)">
                <span class="text_card_category">{{category.name}}</span>
            </div>
        </div>
</template>

<script>
    export default {
        props: ['baseUrl'],

        data (){
            return {
                categories: [],
            }
        },

        created() {
            this.getCategories();
        },

        methods: {
            async getCategories() {
                await axios.get(this.baseUrl + '/categories')
                .then(response => this.categories = response.data)
                .catch(function (error) {
                    console.log(error.toJSON());
                });
            },

            redirect(slug){
                window.location='search/' + slug;
            }
        }
    }
</script>
