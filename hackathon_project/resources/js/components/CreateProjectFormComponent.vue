<template>
    <v-form ref="form" v-model="valid" lazy-validation @submit.prevent="validate" method="POST" action="/projects">

        <input type="hidden" name="_token" v-bind:value="csrf">

        <v-container class="mt-10">
            <v-row>

            <v-col
                cols="12"
                md="12"
            >
                <v-alert
                    v-if="status == 'error'"
                    shaped
                    prominent
                    type="error"
                    dismissible
                    color="error"
                    border="left"
                    elevation="2"
                    colored-border
                    >
                    {{message}}
                </v-alert>

                <v-alert
                    v-else-if="status == 'success'"
                    shaped
                    prominent
                    dismissible
                    color="success"
                    border="left"
                    elevation="2"
                    colored-border
                    >
                    {{message}}
                </v-alert>
            </v-col>

            <v-col
                cols="12"
                md="6"
            >
                <v-text-field
                    name="title"
                    v-model="title"
                    :rules="titleRules"
                    :counter="25"
                    label="Nombre del proyecto"
                    solo
                    hint="Nombre del proyecto"
                    required
                ></v-text-field>
            </v-col>

            <v-col
                cols="12"
                md="6"
                v-if="!hidden"
            >
                <v-text-field
                    name="name"
                    v-model="name"
                    :rules="nameRules"
                    :counter="50"
                    label="Tu nombre"
                    solo
                    hint="Tu nombre"
                    required
                ></v-text-field>
            </v-col>

            <v-col
                cols="12"
                md="6"
                v-if="!hidden"
            >
                <v-text-field
                    name="email"
                    v-model="email"
                    :rules="emailRules"
                    label="Correo electr??nico (Se usara para iniciar sesi??n)"
                    solo
                    hint="Correo electr??nico (Se usara para iniciar sesi??n)"
                    required
                ></v-text-field>
            </v-col>

            <v-col
                cols="12"
                md="6"
            >
                <v-text-field
                    name="total_team"
                    v-model="total_team"
                    label="N??mero m??ximo de integrantes para el equipo"
                    :rules="totalTeamRules"
                    type="number"
                    single-line
                    solo
                    hint="N??mero m??ximo de integrantes para el equipo"
                    required
                ></v-text-field>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >
                <v-select
                name="category"
                v-model="category"
                :rules="categoryRules"
                :items="JSON.parse(categories)"
                item-text="name"
                item-value="id"
                label="Categor??as"
                multiple
                solo
                ></v-select>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >
                <v-textarea
                    name="short_description"
                    v-model="short_description"
                    :rules="shortDescriptionRules"
                    :counter="80"
                    label="Descripci??n corta (Se mostrara en la tarjeta de inicio)"
                    required
                    solo
                    hint="Descripci??n corta (Se mostrara en la tarjeta de inicio)"
                ></v-textarea>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >
                <v-textarea
                    name="description"
                    v-model="description"
                    :rules="descriptionRules"
                    :counter="1200"
                    label="Descripci??n del proyecto"
                    solo
                    hint="Descripci??n del proyecto"
                    required
                ></v-textarea>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >
                <v-textarea
                    name="motivation"
                    v-model="motivation"
                    :rules="motivationRules"
                    :counter="1200"
                    label="Proposito del proyecto. ??Para que f??n realizas el proyecto?"
                    solo
                    hint="Proposito del proyecto. ??Para que f??n realizas el proyecto?"
                    required
                ></v-textarea>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >
                <v-textarea
                    name="requirements"
                    v-model="requirements"
                    :rules="requirementsRules"
                    :counter="1200"
                    label="Requisitos del proyecto. ??Qu?? conocimientos necesitan los futuros integrantes?"
                    solo
                    hint="Requisitos del proyecto. ??Qu?? conocimientos necesitan los futuros integrantes?"
                    required
                ></v-textarea>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >

            <center v-if="is_loading == 1">
                <v-progress-circular
                indeterminate
                color="amber"
                ></v-progress-circular>
            </center>

            <v-btn
                color="rgb(94, 155, 160)"
                class="mr-4 white--text"
                style="width: 100%"
                type="submit"
                >
                Crear proyecto
                </v-btn>
            </v-col>
            </v-row>
        </v-container>
    </v-form>
  </template>

<script>
    export default {
        props: ['message', 'status', 'auth', 'categories', 'loading'],

        data: () => ({
            valid: true,
            title: '',
            name: '',
            email: '',
            total_team: '',
            short_description: '',
            description: '',
            motivation: '',
            requirements: '',
            category: '',
            hidden: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            is_loading: 0,

            titleRules: [
            v => !!v || 'Nombre del proyecto es obligatorio',
            v => v.length <= 25 || 'Nombre del proyecto debe tener m??ximo 25 caracteres',
            ],
            nameRules: [
            v => !!v || 'Tu nombre es obligatorio',
            v => v.length <= 50 || 'Tu nombre debe tener m??ximo 50 caracteres',
            ],
            totalTeamRules: [
            v => !!v || 'N??mero de integrantes es obligatorio',
            v => parseInt(v) < 26 || 'M??ximo 25 desarrolladores en el equipo',
            ],
            emailRules: [
            v => !!v || 'Correo electr??nico es obligatorio',
            v => /.+@.+/.test(v) || 'Correo electr??nico debe de ser v??lido',
            ],
            shortDescriptionRules: [
            v => !!v || 'Descripci??n corta es obligatorio',
            v => v.length <= 80 || 'Descripci??n corta debe tener m??ximo 80 caracteres',
            ],
            descriptionRules: [
            v => !!v || 'Descripci??n del proyecto es obligatorio',
            v => v.length <= 1200 || 'Descripci??n del proyecto debe tener m??ximo 1200 caracteres',
            ],
            motivationRules: [
            v => !!v || 'Proposito del proyecto es obligatorio',
            v => v.length <= 1200 || 'Proposito del proyecto debe tener m??ximo 1200 caracteres',
            ],
            requirementsRules: [
            v => !!v || 'Requisitos del proyecto es obligatorio',
            v => v.length <= 1200 || 'Requisitos del proyecto debe tener m??ximo 1200 caracteres',
            ],
            categoryRules: [
            v => !!v || 'Categor??a es obligatorio'
            ],
        }),

        created() {

            if(this.loading){
                this.is_loading = this.loading;
            }

            if(this.auth){
                this.hidden = true;
            }else{
                this.hidden = false;
            }
        },

        methods: {
            validate () {
                let is_valid = this.$refs.form.validate();

                if(is_valid) {
                    this.is_loading = 1;
                    this.$refs.form.$el.submit()
                }
            },
    }
    }
  </script>
