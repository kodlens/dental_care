<template>
    <div>
        <div class="mynav">
            <div class="mynav-brand">ADMINISTRATOR</div>
            <div class="burger-button">
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
            open: true,
            overlay: false,
            fullheight: true,
            fullwidth: false,
            right: true,
            expandOnHover: true,
            reduce: true,
            mobile: "reduce",
        }
    },
    methods: {
        logout(){
            axios.post('/logout').then(()=>{
                window.location = '/';
            })
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
