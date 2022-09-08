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

        <div class="container_list_projects">
            <template v-if="pagination == 0">
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

                    <v-card-text class="text--primary" v-if="project.current_team == project.total_team">
                        <strong>Equipo completo</strong>
                    </v-card-text>

                    <v-card-text class="text--primary" v-else="project.current_team == project.total_team">
                        <strong>Sitios disponibles: {{project.current_team}}/{{project.total_team}}</strong>
                    </v-card-text>

                    <v-card-actions>
                        <v-btn
                                color="#5e9ba0"
                                text
                                :href="'/projects/' + project.id"
                            >
                                Unirse al proyecto
                            </v-btn>
                    </v-card-actions>
                </v-card>
            </template>

            <template v-else-if="pagination == 1">
                <v-card class="mx-auto custom_card" max-width="300" v-for="(project, index) in projects_visible" :key="index">
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

                    <v-card-text class="text--primary" v-if="project.current_team == project.total_team">
                        <strong>Equipo completo</strong>
                    </v-card-text>

                    <v-card-text class="text--primary" v-else="project.current_team == project.total_team">
                        <strong>Sitios disponibles: {{project.current_team}}/{{project.total_team}}</strong>
                    </v-card-text>

                    <v-card-actions>
                        <v-btn
                                color="#5e9ba0"
                                text
                                :href="'/projects/' + project.id"
                            >
                                Unirse al proyecto
                            </v-btn>
                    </v-card-actions>
                </v-card>
            </template>
        </div>

        <v-pagination
                v-if="pagination == 1"
                v-model="page"
                :length="Math.ceil(projects.length/perPage)"
                color="rgb(94, 155, 160)"
        ></v-pagination>

        <div class="custom_container_btn" v-if="pagination == 0">
            <v-btn
                class="ma-2 black--text"
                color="#F9BE01"
                :href="'/all/projects'"
                >
                    Ver todos los proyectos
            </v-btn>
        </div>

    </div>

  </template>

<script>
    export default {
        props: ['api', 'pagination'],

        data (){
            return {
                projects: [],
                page: 1,
                perPage: 12,
            }
        },

        created() {
            this.getProjects();
        },

        methods: {

            async getProjects(pagination) {
                await axios.get(this.api)
                .then(response => {
                    this.projects = response.data;
                })
                .catch(function (error) {
                    console.log(error.toJSON());
                });
            },
        },

        computed: {
            projects_visible () {
                return this.projects.slice((this.page - 1)* this.perPage, this.page* this.perPage)
            }
  }
    }
</script>
