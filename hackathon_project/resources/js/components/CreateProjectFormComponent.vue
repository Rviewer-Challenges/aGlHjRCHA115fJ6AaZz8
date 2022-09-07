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
            >
                <v-text-field
                    name="email"
                    v-model="email"
                    :rules="emailRules"
                    label="Correo electrónico (Se usara para iniciar sesión)"
                    solo
                    hint="Correo electrónico (Se usara para iniciar sesión)"
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
                    label="Número máximo de integrantes para el equipo"
                    :rules="totalTeamRules"
                    type="number"
                    single-line
                    solo
                    hint="Número máximo de integrantes para el equipo"
                    required
                ></v-text-field>
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
                    label="Descripción corta (Se mostrara en la tarjeta de inicio)"
                    required
                    solo
                    hint="Descripción corta (Se mostrara en la tarjeta de inicio)"
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
                    label="Descripción del proyecto"
                    solo
                    hint="Descripción del proyecto"
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
                    label="Proposito del proyecto. ¿Para que fín realizas el proyecto?"
                    solo
                    hint="Proposito del proyecto. ¿Para que fín realizas el proyecto?"
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
                    label="Requisitos del proyecto. ¿Qué conocimientos necesitan los futuros integrantes?"
                    solo
                    hint="Requisitos del proyecto. ¿Qué conocimientos necesitan los futuros integrantes?"
                    required
                ></v-textarea>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >
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
        props: ['message', 'status'],

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
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

            titleRules: [
            v => !!v || 'Nombre del proyecto es obligatorio',
            v => v.length <= 25 || 'Nombre del proyecto debe tener máximo 25 caracteres',
            ],
            nameRules: [
            v => !!v || 'Tu nombre es obligatorio',
            v => v.length <= 50 || 'Tu nombre debe tener máximo 50 caracteres',
            ],
            totalTeamRules: [
            v => !!v || 'Número de integrantes es obligatorio',
            v => parseInt(v) < 26 || 'Máximo 25 desarrolladores en el equipo',
            ],
            emailRules: [
            v => !!v || 'Correo electrónico es obligatorio',
            v => /.+@.+/.test(v) || 'Correo electrónico debe de ser válido',
            ],
            shortDescriptionRules: [
            v => !!v || 'Descripción corta es obligatorio',
            v => v.length <= 80 || 'Descripción corta debe tener máximo 80 caracteres',
            ],
            descriptionRules: [
            v => !!v || 'Descripción del proyecto es obligatorio',
            v => v.length <= 1200 || 'Descripción del proyecto debe tener máximo 1200 caracteres',
            ],
            motivationRules: [
            v => !!v || 'Proposito del proyecto es obligatorio',
            v => v.length <= 1200 || 'Proposito del proyecto debe tener máximo 1200 caracteres',
            ],
            requirementsRules: [
            v => !!v || 'Requisitos del proyecto es obligatorio',
            v => v.length <= 1200 || 'Requisitos del proyecto debe tener máximo 1200 caracteres',
            ],
        }),

        methods: {
            validate () {
                let is_valid = this.$refs.form.validate();

                if(is_valid) {
                    this.$refs.form.$el.submit()
                }
            },
    }
    }
  </script>
