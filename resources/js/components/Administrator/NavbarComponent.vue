<template>
    <div>
        <div class="mynav">
            <div class="mynav-brand">{{userRole}}</div>
            <div class="burger-button" @click="open = true">
                <div class="burger-div"></div>
                <div class="burger-div"></div>
                <div class="burger-div"></div>
            </div>
        </div>

            <b-sidebar
                :mobile="mobile"
                type="is-light"
                :fullheight="fullheight"
                :fullwidth="fullwidth"
                :overlay="overlay"
                :expand-on-hover="expandOnHover"
                :reduce="reduce"
                :right="right"
                v-model="open">
                <div class="p-4">
                    <h3 class="title is-4"></h3>

                    <b-menu class="is-custom-mobile">

                        <b-menu-list label="Menu">

                            <b-menu-item icon="home" label="Home" tag="a" href="/admin-home"></b-menu-item>

                            <b-menu-item label="User" icon="account" tag="a" href="/users"></b-menu-item>

                            <b-menu-item label="Services" icon="calendar-blank" tag="a" href="/services"></b-menu-item>

                            <b-menu-item label="Items" icon="sitemap" tag="a" href="/items"></b-menu-item>

                            <b-menu-item label="Appointment" icon="calendar-blank" tag="a" href="/appointments"></b-menu-item>


                            <b-menu-item icon="poll">
                                <template #label="props">
                                    Report
                                    <b-icon class="is-pulled-right" :icon="props.expanded ? 'menu-down' : 'menu-up'"></b-icon>
                                </template>
                                <b-menu-item icon="text-box-outline" label="Inventory" tag="a" href="/report/inventory"></b-menu-item>
                                <b-menu-item icon="text-box-outline" label="Appointment" tag="a" href="/report/appointment"></b-menu-item>

<!--                                <b-menu-item icon="cash-multiple" label="Payments" disabled></b-menu-item>-->
                            </b-menu-item>

                        </b-menu-list>


                        <b-menu-list label="Actions">
                            <b-menu-item @click="logout" label="Logout"></b-menu-item>
                        </b-menu-list>
                    </b-menu>
                </div>
            </b-sidebar>

    </div>


</template>

<script>
export default {
    data(){
        return{
            open: false,
            overlay: false,
            fullheight: true,
            fullwidth: false,
            right: true,
            expandOnHover: true,
            reduce: false,
            mobile: "reduce",

            user: {
                role: '',
                lname: '',
                fname: '',
                mname: '',
            },
        }
    },
    methods: {
        logout(){
            axios.post('/logout').then(()=>{
                window.location = '/';
            })
        },

        loadUser(){
            axios.get('/load-user').then(res=>{
                this.user = res.data;
            })
        }
    },

    mounted(){
        this.loadUser();
    },

    computed: {
        userRole(){
            return this.user.role.toUpperCase();
        }
    }
}
</script>

<style scoped>


    .logo{
        padding: 0 30px 0 30px;
        height: 90px;
    }

    .burger-div{
        width: 20px;
        height: 3px;
        background-color: #696969;
        margin: 0 0 3px 0;
        margin-left: auto;
        border-radius: 10px;
    }

    .burger-button{
        display: flex;
        flex-direction: column;
        margin-left: auto;
    }

    .mynav{
        padding: 25px;
        border-bottom: 2px solid rgba(196, 196, 196, 0.53);
        display: flex;
    }

    .mynav-brand{
        font-weight: bold;
        font-size: 1.2em;
    }

  /* .hero{
        background-image: url("/img/bg-hero.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    } */


</style>
