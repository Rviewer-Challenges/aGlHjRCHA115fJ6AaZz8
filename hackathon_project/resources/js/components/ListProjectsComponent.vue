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
                        Descripcion del proyecto
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
                            Unirse al proyecto
                        </v-btn>
                    </v-card-actions>
                </v-card>
        </div>

        <div class="custom_container_btn">
            <v-btn
            class="ma-2"
            color="success"
            >
                Ver todos los proyectos
            </v-btn>
        </div>

    </div>

  </template>

<script>
    export default {
        data (){
            return {
                projects: ['Proyecto 1', 'Proyecto 2', 'Proyecto 3', 'Proyecto 4', 'Proyecto 5', 'Proyecto 6']
            }
        }
    }
</script>
