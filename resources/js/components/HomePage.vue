<template>
    <div>
        <section class="hero is-fullheight">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                <b-navbar>
                    <template #brand>
                        DENTAL CARE
                    </template>

                    <template #start>
                        <b-navbar-item href="/">
                            Home
                        </b-navbar-item>
                     
                    </template>

                    <template #end>
                        <b-navbar-item tag="div">
                            <div class="buttons" v-if="!currentLogin">
                                <a class="button is-primary" href="/sign-up">
                                    <strong>Sign up</strong>
                                </a>
                                <a class="button is-light" @click="isModalActive = true">
                                    Log in
                                </a>
                            </div>
                            <div class="buttons" v-else>

                                <a v-if="user.role === 'USER'" class="button is-link" href="/dashboard-user">
                                    DASHBOARD
                                </a>
                                <a v-if="user.role === 'OFFICE'" class="button is-link" href="/dashboard-office">
                                    DASHBOARD
                                </a>
                            </div>
                        </b-navbar-item>
                    </template>
                </b-navbar>
            </div>

            <!-- Hero content: will be in the middle -->
            <div class="hero-body">
                <div class="container has-text-centered">
                    <p class="title animate__animated animate__backInLeft">
                        GOV. ALFONSO D. TAN COLLEGE
                    </p>
                    <p class="subtitle animate__animated animate__backInRight ">
                        SCHOOL PASS
                    </p>
                </div>
            </div>

            <!-- Hero footer: will stick at the bottom -->
            <div class="hero-foot">
<!--                <nav class="tabs is-boxed is-fullwidth">
                    <div class="container">
                        <ul>
                            <li class="is-active"><a>Overview</a></li>
                            <li><a>Modifiers</a></li>
                            <li><a>Grid</a></li>
                            <li><a>Elements</a></li>
                            <li><a>Components</a></li>
                            <li><a>Layout</a></li>
                        </ul>
                    </div>
                </nav>-->
            </div>
        </section>

        

        <section class="section">
            <div class="mission-section">
                <div class="mission-wrapper">
                    <div class="mission-title">
                        <h2>
                            <span>&#8220;</span>
                            MISSION
                            <span>&#8220;</span>
                        </h2>
                    </div>
                    <div>
                        <p style="text-align: justify;">
                            To provide opportunities for continuing education for faculty and staff,
                            providing upgraded facilities for quality and research-based instruction to students towards community engagement and linkages to industry.
                        </p>
                    </div>
                </div>

                <div class="mission-img">
                    <img src="/img/gadtc.png" />
                </div>
            </div> <!-- mission section -->
        </section>

        <section class="section">
            <div class="vision-section">
                <div class="vision-img">
                    <img src="/img/facilities.jpg">
                </div>
                <div class="vision-wrapper">
                    <div class="vision-title">
                        <h2>
                            <span>&#8220;</span>
                            VISION
                            <span>&#8220;</span>
                        </h2>
                    </div>
                    <div>
                        <p>
                            To provide opportunities for continuing education for faculty and staff,
                            providing upgraded facilities for quality and research-based instruction to students towards community engagement and linkages to industry.
                        </p>
                    </div>
                </div>
            </div>
        </section>




        <section>
            <div class="footer" style="margin-top: 30px; background-color: #5a9669; color:white;">
                <div class = "columns">
                    <div class="column">
                        <div class="footertwo-logo-wrapper">
                            <img class="footer-logo" src="/img/gadtclogo.png">
                        </div>
                    </div>

                    <div class = "column">
                        <div class="p-5">
                            <div class="footer-component-title">
                               Quick Links
                            </div>
                            <div>
                              Home
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="p-5">
                            <div class="footer-component-title">
                                 Address
                            </div>
                             <div>
                                Juan Luna St.
                                Maloro, Tangub City
                                Misamis Occidental
                                Philippines
                            </div>
                        </div>
                    </div>
                     <div class="column">
                        <div class="p-5">
                            <div class="footer-component-title">
                            </div>
                             <div>
                                <img style="height: 100px;" class="footer-logo" src="/img/footerlogo1.png">
                            </div>
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
