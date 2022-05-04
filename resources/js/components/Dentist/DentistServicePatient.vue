<template>
    <div>
        <div class="section">
            
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="box">
                        <div>
                            PATIENT: {{ admit.patient_lname }}, {{admit.patient_fname}} {{ admit.patient_mname }}
                        </div>
                        <div>
                            ADDRESS: {{ admit.barangay }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns is-centered" v-for="(item, index) in admitServices" :key="index">
                <div class="column is-6">
                    <div class="box">
                        <div>
                            <div class="service-title">
                                <div class="is-flex">
                                    <div>Admitted on: {{ item.created_at }}</div>
                                    <div class="ml-auto">
                                        <b-button type="is-danger" @click="removeService(item.admit_service_id)" class="is-small is-rounded is-outlined">X</b-button>
                                    </div>
                                </div>
                                

                                <div>Service: {{ item.service }} - &#x20B1; {{ item.price }}</div>
                                
                            </div>

                            <hr>

                            <div>INVENTORY</div>
                            <div class="service-body">

                                <ul>
                                    <!-- <li class="service-row" v-for="(item, index) in appointmentServices" :key="index">
                                        {{ item.service }} - {{ item.price }}
                                        <span><b-button type="is-info" tag="a" :href="`services-log-inv?serviceid=${ item.service_id }&appid=${propAppId}&appserviceid=${item.appointment_service_id}`" class="is-small is-outlined is-rounded">Inv</b-button></span>
                                        <span><b-button type="is-danger" class="is-small is-outlined is-rounded" @click="deleteService(item)">x</b-button></span>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="service-footer">
                                <div class="buttons">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="buttons is-right">
                        <b-button type="is-primary" @click="openModal">NEW SERVICE</b-button>
                    </div>
                </div>
            </div>

        </div> <!--section -->


        <!--modal create-->
        <b-modal v-model="isModalCreate" has-modal-card
                 trap-focus
                 :width="640"
                 aria-role="dialog"
                 aria-label="Modal"
                 aria-modal
                type = "is-link">

            <form @submit.prevent="submit">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Add Services</p>
                        <button
                            type="button"
                            class="delete"
                            @click="isModalCreate = false"/>
                    </header>

                    <section class="modal-card-body">
                        <div class="">

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Service"
                                        :type="this.errors.service ? 'is-danger':''"
                                        :message="this.errors.service ? this.errors.service[0] : ''">
                                        <b-select v-model="fields.service" placeholder="Service">
                                            <option v-for="(item, index) in services" :key="index" :value="item.service_id">{{ item.service }}</option>
                                        </b-select>
                                    </b-field>
                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Close"
                            @click="isModalCreate=false"/>
                        <button
                            :class="btnClass"
                            label="Save"
                            type="is-success">SAVE</button>
                    </footer>
                </div>
            </form><!--close form-->
        </b-modal>
        <!--close modal-->


        
    </div>
</template>

<script>
export default {
    props: {
        propData:{
            type: String,
            default: ''
        },

        propToothId:{
            type: [String, Number],
            default: 0
        },

        propAdmitId:{
            type: [String, Number],
            default: 0
        },
       
    },
    data(){
        return{
            
            fields: {},
            errors: {},

            btnClass: {
                'is-success' : true,
                'button': true,
                
            },
            isModalCreate: false,

            admit: {},
            admitServices: [],
            services: {},

        }
    },

    methods: {

        getAdmit(){
            axios.get('/dentist/get-admit/' + this.propAdmitId).then(res=>{
                this.admit = res.data;
                console.log(this.admit);
            });
        },

        getAdmitServices(){
            //param is admit_id and tooth_id
             axios.get('/dentist/get-admit-services/' + this.propAdmitId + '/' + this.propToothId).then(res=>{
                this.admitServices = res.data;
                console.log(this.admitServices);
            });
        },

        getAllServices(){
            axios.get('/get-all-services').then(res=>{
                this.services = res.data;
                console.log(this.services)
            });
        },

        openModal(){
            this.isModalCreate = true;
        },
    
        submit: function(){
            this.fields.admit_id = this.propAdmitId;
            this.fields.tooth_id = this.propToothId;

            axios.post('/dentist/admit-services', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    this.$buefy.dialog.alert({
                        title: 'SAVED!',
                        message: 'Successfully saved!',
                        type: 'is-success',
                        onConfirm: ()=> {
                          
                            this.isModalCreate = false;
                            this.getAdmitServices();
                        }
                    });
                }
            }).catch(err=>{
                if(err.response.status === 422){
                    this.errors = err.response.data.errors;
                }
            })
        },

        removeService: function(nId){
            axios.delete('/dentist/admit-services/' + nId).then(res=>{
                if(res.data.status === 'deleted'){
                    this.$buefy.dialog.alert({
                        title: 'DELETED!',
                        message: 'Successfully deleted!',
                        type: 'is-success',
                        onConfirm: ()=> {
                            this.getAdmitServices();
                        }
                    });
                }
            })
        }
        


    },

    mounted(){
        this.getAdmit();
        this.getAdmitServices();
        this.getAllServices();
    }
}
</script>

<style scoped>

.service-body{
    margin: 15px;
}

.service-footer{

}


</style>