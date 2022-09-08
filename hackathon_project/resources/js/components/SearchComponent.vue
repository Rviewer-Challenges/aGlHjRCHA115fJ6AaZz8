<style>
    .custom_toolbar {
        margin-top: 25px;
    }
</style>

<template>
    <v-toolbar color="grey lighten-3" height="100" class="custom_toolbar">
        <v-autocomplete
        v-model="model"
        :items="items"
        :loading="isLoading"
        :search-input.sync="search"
        hide-details
        hide-selected
        item-text="name"
        item-value="slug"
        label="Busco un proyecto que trabaje con ..."
        solo
        >

        <template v-slot:no-data>
            <v-list-item>
            <v-list-item-title>
                ¡Busca por tu lenguaje, framework o tecnología favorita!
            </v-list-item-title>
            </v-list-item>
        </template>

        <template v-slot:item="{ item }">
            <v-list-item-content>
            <v-list-item-title v-text="item.name"></v-list-item-title>
            </v-list-item-content>
        </template>

        </v-autocomplete>
    </v-toolbar>
</template>

<script>
    export default {
      data: () => ({
        isLoading: false,
        items: [],
        model: null,
        search: null,
      }),

      watch: {
        model (val) {
            window.location.href = '/search/' + val;
        },
        search (val) {
          if (this.items.length > 0) return

          this.isLoading = true

          fetch('/categories')
            .then(res => res.clone().json())
            .then(res => {
              this.items = res
            })
            .catch(err => {
              console.log(err)
            })
            .finally(() => (this.isLoading = false))
        },
      },
    }
  </script>
