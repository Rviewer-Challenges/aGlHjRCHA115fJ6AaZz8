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
        elevate-on-scroll
      >
        <a :href="'/'" style="text-decoration:none; color:black;">
            <v-toolbar-title>UNION TASK</v-toolbar-title>
        </a>

        <v-spacer></v-spacer>

        <a :href="'/projects/create'">
            <button class="btn-custom">
                Crear proyecto
            </button>
        </a>

        <a href="/" v-if="auth">
            <button class="btn-login">
                Mi cuenta
            </button>
        </a>

        <a href="/login" v-else>
            <button class="btn-login">
                Iniciar sesión
            </button>
        </a>

      </v-app-bar>

    </div>
  </template>

<script>
    export default {
        props: ['auth']
    }
</script>
