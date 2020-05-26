<template>
    <div class="container">
        <b-button v-on:click="fetchItems">
            Обновить
        </b-button>
        <b-spinner class="update-button__spinner" label="Spinning" v-if="isSpinnerShown"></b-spinner>
        <b-alert variant="success" :show="isErrorShown">Успешно произошла ошибка обновления списка сделок</b-alert>
        <b-table striped hover :items="items" :fields="fields"></b-table>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchItems();
        },
        data() {
            return {
                fields: [
                    {
                        key: 'time',
                        label: 'Время'
                    },
                    {
                        key: 'type',
                        label: 'Тип сделки'
                    },
                    {
                        key: 'price',
                        label: 'Цена'
                    },
                    {
                        key: 'qty',
                        label: 'К-во монет'
                    },
                ],
                items: [],
                isSpinnerShown: false,
                isErrorShown: false,
            }
        },
        methods: {
            async fetchItems() {
                this.isSpinnerShown = true;
                try {
                    const result = (await this.$http.get(`${this.$apiServerUrl}/deals`)).data;

                    if (!result.success) {
                        this.isErrorShown = true;
                        this.isSpinnerShown = false;
                        return;
                    }

                    this.items = result.data;
                    this.isErrorShown = false;
                } catch (error) {
                    this.isErrorShown = true;
                }
                this.isSpinnerShown = false;
            }
        }
    }
</script>

<style>

</style>
