<template>
    <div>
        <div class="section">
            <div class="columns">
                <div class="column">
                    <p class="title has-text-centered">
                        APPOINTMENT INFORMATION
                    </p>
                </div>
            </div>

            <div class="columns is-centered">
                <div class="column is-6">

                    <div class="panel">
                        <div class="panel-heading">
                            DENTIST SCHEDULE
                        </div>
                        <div class="panel-body">
                            <b-field label="Select Dentist" expanded>
                                <b-select expanded v-model="fields.dentist_id" @input="showSchedule">
                                    <option v-for="(item, index) in dentists" :key="index" 
                                        :value="item.user_id">
                                        {{ item.lname }}, {{ item.fname }} {{ item.mname }}
                                    </option>
                                </b-select>
                            </b-field>

                             <b-field label="Select Services" expanded>
                                <b-select v-model="fields.service" expanded>
                                    <option v-for="(item, index) in services" :key="index" 
                                        :value="item.service_id">
                                        {{ item.service }} - Price: {{ item.price }}
                                    </option>
                                </b-select>
                            </b-field>


                            <div class="schedules">
                                <p class="subtitle">Schedules</p>
                                <div class="schedule-list" v-for="(item, index) in schedules" :key="index">
                                    {{ item.from}} - {{ item.to }}  
                                    <b-button label="Book" class="is-small" type="is-success"></b-button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

                
            </div>


        </div><!--section-->


        <div class="line"></div>

    </div><!--root div-->
</template>

<script>
export default {
    data(){
        return{
            dentists: [],
            schedules: [],
            
            fields: {
                dentist_id: 0,
            },
            errors: {},

            services: [],


        }
    },

    methods: {
        initData(){
            axios.get('/get-open-dentists').then(res=>{
                this.dentists = res.data;
            });
        },

        showSchedule(){
            axios.get('/get-dentist-schedules/' + this.fields.dentist_id).then(res=>{
                this.schedules = res.data;
            });
        },

        getServices(){
            axios.get('/get-dental-services').then(res=>{
                this.services = res.data;
            });
        }
    },

    mounted() {
        this.initData();
        this.getServices();
    },

}
</script>

<style scoped>

    .panel-body{
        padding: 25px;
    }

    .schedules{
        padding: 25px;
    }

    .schedule-list{
        margin: 0 0 10px 10px;
    }
</style>
