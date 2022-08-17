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
                                <b-input readonly v-model="fields.lname"></b-input>
                            </b-field>
                            <b-field label="Firstname" label-position="on-border">
                                <b-input readonly v-model="fields.fname"></b-input>
                            </b-field>
                            <b-field label="Middlename" label-position="on-border">
                                <b-input readonly v-model="fields.mname"></b-input>
                                
                            </b-field>
                            <b-field label="Suffix" label-position="on-border">
                                <b-input readonly v-model="fields.suffix"></b-input>
                            </b-field>
                            <b-field label="Sex" label-position="on-border">
                                <b-input readonly v-model="fields.sex"></b-input>
                            </b-field>
                            <b-field label="Contact No." label-position="on-border">
                                <b-input readonly v-model="fields.contact_no"></b-input>
                            </b-field>

                             <b-field label="Emai" label-position="on-border">
                                <b-input readonly v-model="fields.email"></b-input>
                            </b-field>

                            <b-field label="Province" label-position="on-border" expanded
                                        :type="this.errors.province ? 'is-danger':''"
                                        :message="this.errors.province ? this.errors.province[0] : ''">
                                <b-select v-model="fields.province" @input="loadCity" expanded>
                                    <option v-for="(item, index) in provinces" :key="index" :value="item.provCode">{{ item.provDesc }}</option>
                                </b-select>
                            </b-field>

                            <b-field label="City" label-position="on-border" expanded
                                    :type="this.errors.city ? 'is-danger':''"
                                    :message="this.errors.city ? this.errors.city[0] : ''">
                                <b-select v-model="fields.city" @input="loadBarangay" expanded>
                                    <option v-for="(item, index) in cities" :key="index" :value="item.citymunCode">{{ item.citymunDesc }}</option>
                                </b-select>
                            </b-field>

                            <b-field label="Barangay" label-position="on-border" expanded
                                    :type="this.errors.barangay ? 'is-danger':''"
                                    :message="this.errors.barangay ? this.errors.barangay[0] : ''">
                                <b-select v-model="fields.barangay" expanded>
                                    <option v-for="(item, index) in barangays" :key="index" :value="item.brgyCode">{{ item.brgyDesc }}</option>
                                </b-select>
                            </b-field>

                            <b-field label="Street" label-position="on-border">
                                <b-input v-model="fields.street"
                                            placeholder="Street">
                                </b-input>
                            </b-field>


                            <div class="columns">
                                <div class="column">
                                    
                                </div>

                                <div class="column">
                                    
                                </div>
                            </div>


    
                            <div class="buttons">
                                <button class="button is-info" icon-left="lock">Save Changes</button>
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

            global_id: 0,

        }
    },

    methods: {
        
        getUser(){

            axios.get('/get-user').then(res=>{
                this.fields = res.data;
                this.global_id = res.data.user_id;
                console.log(this.global_id);

                let tempData = res.data;
                //load city first
                axios.get('/load-cities?prov=' + this.fields.province).then(res=>{
                    //load barangay
                    this.cities = res.data;
                    axios.get('/load-barangays?prov=' + this.fields.province + '&city_code='+this.fields.city).then(res=>{
                        this.barangays = res.data;
                        this.fields = tempData;
                    });
                });

            });
        },

        saveChanges: function(){
            let ndate = new Date(this.fields.appointment_date);
            this.fields.appoint_date = ndate.getFullYear() + '-' + (ndate.getMonth() + 1) + '-' + ndate.getDate();

            if(this.global_id > 0){
                //update

                axios.put('/my-profile/' + this.global_id, this.fields).then(res => {
                    if(res.data.status === 'updated'){
                        this.$buefy.toast.open({
                            message: 'User account updated.',
                            type: 'is-success'
                        });

                        //this.fields = {};
                        this.errors = {};
                        this.global_id = 0;
                        this.getUser();
                    }
                    this.btnClass['is-loading'] = false;

                }).catch(err=>{
                    this.btnClass['is-loading'] = false;
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors;
                    }
                });
            
            }
        },


        loadProvince: function(){
            axios.get('/load-provinces').then(res=>{
                this.provinces = res.data;
            })
        },

        loadCity: function(){
            axios.get('/load-cities?prov=' + this.fields.province).then(res=>{
                this.cities = res.data;
            })
        },

        loadBarangay: function(){
            axios.get('/load-barangays?prov=' + this.fields.province + '&city_code='+this.fields.city).then(res=>{
                this.barangays = res.data;
            })
        },

        clearFields(){
            this.fields = {
                username: '',
                lname: '', fname: '', mname: '',
                password: '', password_confirmation : '',
                sex : '', role: '',  email : '', contact_no : '',
                province: '', city: '', barangay: '', street: ''
            };
        },


        


    },

    mounted() {
        this.loadProvince();
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
