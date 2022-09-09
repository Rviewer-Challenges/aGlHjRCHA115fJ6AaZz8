<style>
    .btn-custom {
        background-color: #F9BE01;
        border: 1px solid #F9BE01;
        border-radius: 8px;
        box-sizing: border-box;
        color: #191C1E;
        cursor: pointer;
        display: inline-block;
        font-family: Rubik, Verdana, Arial, sans-serif;
        font-size: 16px;
        font-weight: 400;
        height: 40px;
        line-height: normal;
        margin: 0 0 0 8px;
        min-width: 40px;
        outline: 0;
        overflow: visible;
        padding: 0 16px;
        position: relative;
        text-align: center;
        text-decoration: none;
        text-transform: none;
        user-select: none;
        white-space: nowrap;
    }

    .btn-login {
        background-color: #F4F5F6;
        border: 1px solid #F4F5F6;
        border-radius: 8px;
        box-sizing: border-box;
        color: #191C1E;
        cursor: pointer;
        display: inline-block;
        font-family: Rubik, Verdana, Arial, sans-serif;
        font-size: 16px;
        font-weight: 400;
        height: 40px;
        line-height: normal;
        margin: 0 0 0 8px;
        min-width: 40px;
        outline: 0;
        overflow: visible;
        padding: 0 16px;
        position: relative;
        text-align: center;
        text-decoration: none;
        text-transform: none;
        user-select: none;
        white-space: nowrap;
    }
</style>

<template>
    <div>
      <v-app-bar
        color="white"
        elevation="0"
      >
        <a :href="'/'" style="text-decoration:none; color:black;">
            <v-toolbar-title>
                <v-img
                max-height="120"
                max-width="110"
                :src="'/images/logo_uniontask.png'"
                ></v-img>
            </v-toolbar-title>
        </a>

        <v-spacer></v-spacer>

        <a :href="'/projects/create'" v-if="!is_mobile">
            <button class="btn-custom">
                Crear proyecto
            </button>
        </a>

        <a :href="'/account/'+userId" v-if="auth && !is_mobile">
            <button class="btn-login">
                Mi cuenta
            </button>
        </a>

        <a href="/login" v-if="!auth && !is_mobile">
            <button class="btn-login">
                Iniciar sesión
            </button>
        </a>

        <v-menu
        v-if="is_mobile"
        left
        bottom
        >
            <template v-slot:activator="{ on, attrs }">
            <v-btn
                icon
                v-bind="attrs"
                v-on="on"
            >
                <v-icon>mdi-menu</v-icon>
            </v-btn>
            </template>

            <v-list>
            <v-list-item
            >
                <v-list-item-title>
                    <a href="/login">
                        <button class="btn-login">
                            Iniciar sesión
                        </button>
                    </a>

                    <br><br>

                    <a :href="'/account/'+userId" v-if="auth">
                        <button class="btn-login">
                            Mi cuenta
                        </button>

                        <br><br>
                    </a>

                    <a :href="'/projects/create'">
                        <button class="btn-custom">
                            Crear proyecto
                        </button>
                    </a>
                </v-list-item-title>
            </v-list-item>
            </v-list>
      </v-menu>

      </v-app-bar>

    </div>
  </template>

<script>
    export default {
        props: ['auth', 'userId'],

        data: () => ({
            is_mobile: false,
        }),

        created(){
            this.is_mobile = this.isMobile();
        },

        methods: {
            isMobile: function (){
                return (
                    (navigator.userAgent.match(/Android/i)) ||
                    (navigator.userAgent.match(/webOS/i)) ||
                    (navigator.userAgent.match(/iPhone/i)) ||
                    (navigator.userAgent.match(/iPod/i)) ||
                    (navigator.userAgent.match(/iPad/i)) ||
                    (navigator.userAgent.match(/BlackBerry/i))
                )
            }
        }
    }
</script>
