<template>
    <div>
        <div class="section">

            <div class="columns is-centered">
                <div class="column is-6">
                    <form @submit.prevent="saveChanges">

                        <div class="box">
                            <div class="img-avatar-container">
                                <img src="/img/avatar/avatar.png">
                            </div>
    
                            <b-field label="Lastname" label-position="on-border">
                                <b-input readonly v-model="user.lname"></b-input>
                            </b-field>
                            <b-field label="Firstname" label-position="on-border">
                                <b-input readonly v-model="user.fname"></b-input>
                            </b-field>
                            <b-field label="Middlename" label-position="on-border">
                                <b-input readonly v-model="user.mname"></b-input>
                            </b-field>
                            <b-field label="Sex" label-position="on-border">
                                <b-input readonly v-model="user.sex"></b-input>
                            </b-field>
                            <b-field label="Contact No." label-position="on-border">
                                <b-input readonly v-model="user.contact_no"></b-input>
                            </b-field>
    
                            <div class="buttons">
                                <button class="button is-info" label="Save Changes" icon-left="lock"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div><!--section div-->

    </div><!--root-->
</template>

<script>
const d = new Date();

export default {

    data(){
        return{
           
            user: {},
            

            fields: {},
            errors: {},

            btnClass: {
                'is-success': true,
                'button': true,
                'is-loading':false,
            },

            provinces: [],
            cities: [],
            barangays: [],



        }
    },

    methods: {
        
        getUser(){
            axios.get('/get-user').then(res=>{
                this.user = res.data;
            });
        },

        submit: function(){
            let ndate = new Date(this.fields.appointment_date);
            this.fields.appoint_date = ndate.getFullYear() + '-' + (ndate.getMonth() + 1) + '-' + ndate.getDate();

            if(this.global_id > 0){
                //update

                axios.put('/my-appointment/' + this.global_id, this.fields).then(res => {
                    if(res.data.status === 'updated'){
                        this.$buefy.toast.open({
                            message: 'Appointment saved.!',
                            type: 'is-success'
                        });

                        this.fields = {};
                        this.errors = {};
                        this.dentist_fullname = '';
                        this.modalBookNow = false;
                        this.global_id = 0;
                        this.loadAsyncData();
                    }
                    this.btnClass['is-loading'] = false;

                }).catch(err=>{
                    this.btnClass['is-loading'] = false;
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors;
                    }
                });
            }else{
                //INSERT HERE
                this.btnClass['is-loading'] = true;
                axios.post('/my-appointment', this.fields).then(res => {
                    if(res.data.status === 'saved'){
                        this.$buefy.toast.open({
                            message: 'Appointment saved.!',
                            type: 'is-success'
                        });

                        this.fields = {};
                        this.errors = {};
                        this.global_id = 0;
                        this.dentist_fullname = '';
                        this.modalBookNow = false;

                        this.loadAsyncData();
                    }
                    this.btnClass['is-loading'] = false;
                }).catch(err=>{
                    this.btnClass['is-loading'] = false;
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors;

                        if(this.errors.schedule){
                            this.$buefy.toast.open({
                                message: this.errors.schedule[0],
                                type: 'is-danger'
                            });
                        }
                    }
                });
            }
        },



       

    },

    mounted() {
        this.getUser();
    }

}
</script>

<style scoped>
    .approve{
        font-weight: bold;
        color: green;
        font-size: .8em;
    }
    .cancel{
        font-weight: bold;
        color: red;
        font-size: .8em;
    }
    .pending{
        font-weight: bold;
        color: rgb(15, 66, 193);
        font-size: .8em;
    }

    .img-avatar-container{
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .img-avatar-container img{
        height: 200px;
        margin: auto;
    }


    .modal .animation-content .modal-card {
        /* overflow: visible !important; */
    }

    .modal-card-body {
        /* overflow: visible !important; */
    }
</style>
