<style>
    .title_section {
    font-size: 30px;
    font-weight: 600;
    color: rgb(94, 155, 160);
    }
</style>

<template>
    <v-form ref="form" v-model="valid" lazy-validation @submit.prevent="validate" method="POST" action="/api/join">

        <input type="hidden" name="_token" v-bind:value="csrf">
        <input type="hidden" name="project_id" v-bind:value="projectId">

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
                md="12"
                v-if="!hidden"
            >
                <h3 class="title_section">Datos personales</h3>
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
                md="12"
            >
                <h3 class="title_section">??Cu??ntale al jefe de proyecto!</h3>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >
                <v-textarea
                    name="why"
                    v-model="why"
                    :rules="whyRules"
                    :counter="500"
                    label="??Por qu?? quieres unirte al proyecto?"
                    required
                    solo
                    hint="??Por qu?? quieres unirte al proyecto?"
                ></v-textarea>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >
                <v-textarea
                    name="share"
                    v-model="share"
                    :rules="shareRules"
                    :counter="500"
                    label="??Qu?? aportar??s al proyecto? (??Con solo aportar ganas de trabajar es suficiente!)"
                    solo
                    hint="??Qu?? aportar??s al proyecto? (??Con solo aportar ganas de trabajar es suficiente!)"
                    required
                ></v-textarea>
            </v-col>

            <v-col
                cols="12"
                md="12"
            >
                <v-textarea
                    name="experience"
                    v-model="experience"
                    :rules="experienceRules"
                    :counter="500"
                    label="??Tienes experiencia con las tecnolog??as que se solicitan, o similares? ??Cu??ntanos!"
                    solo
                    hint="??Tienes experiencia con las tecnolog??as que se solicitan, o similares? ??Cu??ntanos!"
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
                @click="validate"
                >
                SOLICITAR UNIRME
                </v-btn>
            </v-col>
            </v-row>
        </v-container>

        <v-dialog
        transition="dialog-top-transition"
        max-width="600"
        v-model="dialog"
        persistent
        >
            <template v-slot:default="dialog">
            <v-card>
                <v-toolbar
                color="rgb(94, 155, 160)"
                dark
                >??Antes de inscribirte!</v-toolbar>
                <v-card-text>
                <div class="text-h7 pa-9" v-if="!hidden"><strong>Se te crear?? una cuenta con el correo electr??nico dado.</strong> Recibir??s un correo con los datos de acceso para poder iniciar sesi??n. <br><br> <strong>Si aceptas unirte</strong>, se le enviar?? un correo al administrador del proyecto para validar tu incorporaci??n. ??l se pondr?? en contacto contigo.</div>
                <div class="text-h7 pa-9" v-if="hidden"><strong>Si aceptas unirte</strong>, se le enviar?? un correo al administrador del proyecto para validar tu incorporaci??n. ??l se pondr?? en contacto contigo.</div>
                </v-card-text>
                <v-card-actions class="justify-end">

                <v-progress-circular
                v-if="is_loading == 1"
                indeterminate
                color="amber"
                ></v-progress-circular>

                <v-btn
                    text
                    color="rgb(94, 155, 160)"
                    @click="join"
                >Unirme</v-btn>
                <v-btn
                    text
                    color="red"
                    @click="dialog.value = false"
                >Cancelar</v-btn>
                </v-card-actions>
            </v-card>
            </template>
      </v-dialog>
    </v-form>
  </template>

<script>
    export default {
        props: ['message', 'status', 'auth', 'projectId', 'loading'],

        data: () => ({
            valid: true,
            name: '',
            email: '',
            why: '',
            share: '',
            experience: '',
            hidden: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            dialog: false,
            is_loading: 0,

            nameRules: [
            v => !!v || 'Tu nombre es obligatorio',
            v => v.length <= 50 || 'Tu nombre debe tener m??ximo 50 caracteres',
            ],
            whyRules: [
            v => !!v || '??Por qu?? quieres unirte? es obligatorio',
            v => v.length <= 500 || '??Por qu?? quieres unirte? debe tener m??ximo 500 caracteres',
            ],
            emailRules: [
            v => !!v || 'Correo electr??nico es obligatorio',
            v => /.+@.+/.test(v) || 'Correo electr??nico debe de ser v??lido',
            ],
            shareRules: [
            v => !!v || '??Qu?? aportar??s al proyecto? es obligatorio',
            v => v.length <= 500 || '??Qu?? aportar??s al proyecto? debe tener m??ximo 500 caracteres',
            ],
            experienceRules: [
            v => !!v || '??Tienes experiencia con las tecnolog??as que se solicitan, o similares? es obligatorio',
            v => v.length <= 500 || '??Tienes experiencia con las tecnolog??as que se solicitan, o similares? debe tener m??ximo 500 caracteres',
            ]
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
                    this.dialog = true;
                }
            },

            join(){
                this.is_loading = 1;
                this.$refs.form.$el.submit()
            }
    }
    }
  </script>
