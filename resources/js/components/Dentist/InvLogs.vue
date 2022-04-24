<template>
    <div>
        <div class="section">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="box">
                        <div>
                            PATIENT: {{ user.lname }}, {{user.fname}} {{ user.mname }}
                        </div>
                        <div>
                            ADDRESS: {{ user.barangay }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="box">
                        <div>
                            SERVICE(S): {{ user.lname }}, {{user.fname}} {{ user.mname }}
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
        
    </div>
</template>

<script>
export default {
    props: {
        propPatientId:{
            type: Number,
            default: 0
        },
        propAppId:{
            type: Number,
            default: 0
        },
        propServiceId:{
            type: Number,
            default: 0
        },

    },
    data(){
        return{
            
            user: {},


        }
    },

    methods: {
        getUser(){
            axios.get('/get-user/' + this.propPatientId).then(res=>{
                this.user = res.data;
            });
        }
    },

    mounted(){
        this.getUser();
    }
}
</script>

<style>

</style>