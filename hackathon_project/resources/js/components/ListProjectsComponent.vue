<style>
    .container_list_projects {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .custom_card {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .custom_container_btn {
        margin-top: 30px;
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
    }

</style>

<template>
    <div>
        <div class="container_list_projects">
            <v-card class="mx-auto custom_card" max-width="300" v-for="(project, index) in projects" :key="index">
                    <v-img
                    class="white--text align-end"
                    height="150px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                    >
                        <v-card-title>{{project}}</v-card-title>
                    </v-img>

                    <v-card-subtitle class="pb-0">
                        Descripcion del projecto
                    </v-card-subtitle>

                    <v-card-text class="text--primary">
                        <div>.......</div>

                        <div>........</div>
                    </v-card-text>

                    <v-card-actions>
                        <v-btn
                            color="orange"
                            text
                        >
                            Unirse al projecto
                        </v-btn>
                    </v-card-actions>
                </v-card>
        </div>

        <div class="custom_container_btn">
            <v-btn
            class="ma-2"
            color="success"
            >
                Ver todos los projectos
            </v-btn>
        </div>

    </div>

  </template>

<script>
    export default {
        data (){
            return {
                projects: ['Projecto 1', 'Projecto 2', 'Projecto 3', 'Projecto 4', 'Projecto 5', 'Projecto 6']
            }
        }
    }
</script>
