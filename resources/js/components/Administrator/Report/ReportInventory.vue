<template>
    <div>
        <div class="printarea">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Item Type</th>
                    <th>Quantity</th>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in data" :key="index">
                        <td>{{ item.item_id }}</td>
                        <td>{{ item.item_name }}</td>
                        <td>{{ item.item_type }}</td>
                        <td>{{ item.qty }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            data: [],
        }
    },
    methods: {
        getInventory(){
            axios.get('/report/get-inventory').then(res=>{
                this.data = res.data;
            });
        }
    },
    mounted() {
        this.getInventory();
    }
}
</script>
<style scoped>

    .printarea{
        width: 816px;
        margin: 30px auto 0;
    }

    .mynav{
        border: 5px solid blue;
    }

    .mynav-brand{
        color: red;
    }


    @media print and (max-width: 600px) {

        header, footer, aside, nav, form, iframe, .menu, .hero, .adslot {
            display: none;
        }

    }
</style>
