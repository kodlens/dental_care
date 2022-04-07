<template>
    <div>

        <section class="hero is-danger is-fullheight">
            <div class="hero-body">
                <div class="">
                    <p class="title">
                        DENTAL CLINIC
                    </p>
                    <div class="subtitle">
                     
                        <div>
                            Fullheight subtitle
                        </div>

                    </div>

                    <div>
                        <div class="buttons">
                            <b-button label="REQUEST APPOINTMENT" type="is-primary" tag="a" href="/request-appointment"></b-button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
    </div> <!--root div-->
</template>

<script>
export default {
    props: ['propUser'],
    data(){
        return{
            locale: undefined,
     
            isModalActive: false,
            fields: {},
            errors: {},

            user: null,

           

        }

    },

    methods: {
        

        initData: function(){
            if(this.propUser){
                this.user = JSON.parse(this.propUser);
            }
        }
    },

    mounted() {
        this.initData();
     
    },

    computed: {
        showName(){
            if(this.user){
                return this.user.fname.toUpperCase();
            }
            return '';
        },
        currentLogin(){
            if(this.user){
                return true;
            }
            return false;
        }
    }
}
</script>

<style scoped>
    

    @media only screen and (max-width: 1024px) {
        .vision-section{
            flex-direction: column;
            align-items: center;
        }

        .mission-section{
            flex-direction: column;
            align-items: center;
        }

    }



    

</style>
