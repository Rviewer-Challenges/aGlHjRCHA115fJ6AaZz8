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
        item-value="symbol"
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
        <template v-slot:selection="{ attr, on, item, selected }">
            <v-chip
            v-bind="attr"
            :input-value="selected"
            color="blue-grey"
            class="white--text"
            v-on="on"
            >
            <v-icon left>
                mdi-bitcoin
            </v-icon>
            <span v-text="item.name"></span>
            </v-chip>
        </template>
        <template v-slot:item="{ item }">
            <v-list-item-avatar
            color="indigo"
            class="text-h5 font-weight-light white--text"
            >
            {{ item.name.charAt(0) }}
            </v-list-item-avatar>
            <v-list-item-content>
            <v-list-item-title v-text="item.name"></v-list-item-title>
            <v-list-item-subtitle v-text="item.symbol"></v-list-item-subtitle>
            </v-list-item-content>
            <v-list-item-action>
            <v-icon>mdi-bitcoin</v-icon>
            </v-list-item-action>
        </template>
        </v-autocomplete>
    </v-toolbar>
</template>

<script>
    export default {
    }
</script>
