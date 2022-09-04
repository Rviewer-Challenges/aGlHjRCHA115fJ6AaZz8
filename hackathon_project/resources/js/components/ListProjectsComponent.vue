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

    .message_not_projects {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        color: #F9BE01;
    }

</style>

<template>
    <div>
        <div class="message_not_projects" v-if="projects.length <= 0">
            <strong>Actualmente no hay proyectos que podamos mostrarte. ¡Animate y se el primero!</strong>
        </div>

        <div v-else class="container_list_projects">
            <v-card class="mx-auto custom_card" max-width="300" v-for="(project, index) in projects" :key="index">
                    <v-img
                    class="white--text align-end"
                    height="150px"
                    :src="'/images/project_card_img.jpg'"
                    >

                    <v-card-title>{{project.title}}</v-card-title>

                    </v-img>

                    <v-card-subtitle class="pb-0" style="height: 82px;">
                        {{project.short_description}}
                    </v-card-subtitle>

                    <v-divider style="margin-top: 15px;"></v-divider>

                    <v-card-text class="text--primary">
                        <strong>Sitios disponibles: {{project.current_team}}/{{project.total_team}}</strong>
                        <br>
                        <strong>Finaliza el: {{project.expiration_date}}</strong>
                    </v-card-text>

                    <v-card-actions>
                        <v-btn
                            color="#5e9ba0"
                            text
                        >
                            Unirse al proyecto
                        </v-btn>
                    </v-card-actions>
                </v-card>
        </div>

        <div class="custom_container_btn">
            <v-btn
            class="ma-2 black--text"
            color="#F9BE01"
            >
                Ver todos los proyectos
            </v-btn>
        </div>

    </div>

  </template>

<script>
    export default {
        props: ['baseUrl'],

        data (){
            return {
                projects: [],
            }
        },

        created() {
            this.getProjects();
        },

        methods: {
            async getProjects() {
                await axios.get(this.baseUrl)
                .then(response => this.projects = response.data)
                .catch(function (error) {
                    console.log(error.toJSON());
                });
            },
        }
    }
</script>
