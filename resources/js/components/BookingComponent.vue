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

                    <div class="panel is-primary">
                        <div class="panel-heading">
                            DENTIST SCHEDULE
                        </div>
                        <form @submit.prevent="submit">
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
                                    <b-select v-model="fields.service_id" expanded>
                                        <option v-for="(item, index) in services" :key="index" 
                                            :value="item.service_id">
                                            {{ item.service }} - Price: {{ item.price }}
                                        </option>
                                    </b-select>
                                </b-field>

                                <b-field label="Select Date">
                                    <b-datepicker
                                        :min-date="minDate"
                                        v-model="fields.raw_date"></b-datepicker>
                                </b-field>
                                <b-field label="Dentist Available Schedule">
                                    <b-select v-model="fields.dentist_schedule_id">
                                        <option class="schedule-list" v-for="(item, index) in schedules" :key="index" :value="item.dentist_schedule_id">
                                            {{ new Date("2022-01-01 " + item.from).toLocaleTimeString() }} - {{ new Date("2022-01-01 " + item.to).toLocaleTimeString() }}
                                        </option>
                                    </b-select>
                                </b-field>



                                <div class="buttons">
                                    <button class="button is-success">BOOK NOW</button>
                                </div>
                            </div>
                        </form>

                        
                    </div>
                    
                </div>

                
            </div>


        </div><!--section-->


        <div class="line"></div>

    </div><!--root div-->
</template>

<script>

const d = new Date();

export default {

    data(){
        return{
            minDate: new Date(d.setDate(d.getDate() - 1)),
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

        clearFields(){
            this.fields ={
                dentist_id: 0,
            };
        },
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
        },

        submit(){
            let ndate = new Date(this.fields.raw_date);
            this.fields.booking_date = ndate.getFullYear() + '-' + (ndate.getMonth() + 1) + '-' + ndate.getDate();
            axios.post('/book-now', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    //if save
                    this.$buefy.dialog.alert({
                        title: 'SAVED!',
                        type: 'is-success',
                        message: 'Schedule successfully saved.',
                        confirmText: 'OK'
                    });

                    this.clearFields();
                }
            }).catch(err=>{
                if(err.response.status === 422){
                    if(err.response.data.status === 'exist'){
                        //if already scheduled
                        this.$buefy.dialog.alert({
                            title: 'EXISTED!',
                            type: 'is-warning',
                            message: 'Schedule already taken.',
                            confirmText: 'OK'
                        });
                    }
                }
                
            })
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


</style>
