<template>
    <div>
        <div class="section">

            <div class="columns">
                <div class="column">
                    <p class="title is-5 has-text-centered">
                        SERVICES HERE
                    </p>
                </div>
            </div>

        </div>

        <div class="section">
            <div class="">
                <div class="box" v-for="(item, index) in services" :key="index">
                    {{ item.service }}
                </div>
            </div>
        </div>
    </div><!--root div-->
</template>

<script>
export default {
    data(){
        return{
            services: [],
        }
    },
    methods: {
        getServices: function(){
            axios.get('/get-dental-services').then(res=>{
                this.services = res.data;

                console.log(this.services)
            });
        }
    },

    mounted() {
        this.getServices();
    }
}
</script>
