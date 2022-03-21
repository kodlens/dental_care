<template>
    <div>
        <div class="mynav">
            <div class="mynav-brand">ADMINISTRATOR</div>
            <div class="burger-button" @click="open = true">
                <div class="burger-div"></div>
                <div class="burger-div"></div>
                <div class="burger-div"></div>
            </div>
        </div>
         
            <b-sidebar
                type="is-light"
                :fullheight="fullheight"
                :fullwidth="fullwidth"
                :overlay="overlay"
                :right="right"
                v-model="open">
                <div class="p-4">
                    <h3 class="title is-4">ADMINISTRATOR</h3>
                    <b-menu>

                        <b-menu-list label="Menu">

                            <b-menu-item icon="information-outline" label="Dashboard" tag="a" href="/dashboard-admin"></b-menu-item>
<!--                            <b-menu-item icon="settings">-->
<!--                                <template #label="props">-->
<!--                                    Administrator-->
<!--                                    <b-icon class="is-pulled-right" :icon="props.expanded ? 'menu-down' : 'menu-up'"></b-icon>-->
<!--                                </template>-->
<!--                                <b-menu-item icon="account" tag="a" href="/users" label="Users"></b-menu-item>-->
<!--                                <b-menu-item icon="cellphone-link">-->
<!--                                    <template #label>-->
<!--                                        Devices-->
<!--                                        <b-dropdown aria-role="list" class="is-pulled-right" position="is-bottom-left">-->
<!--                                            <template #trigger>-->
<!--                                                <b-icon icon="dots-vertical"></b-icon>-->
<!--                                            </template>-->
<!--                                            <b-dropdown-item aria-role="listitem">Action</b-dropdown-item>-->
<!--                                            <b-dropdown-item aria-role="listitem">Another action</b-dropdown-item>-->
<!--                                            <b-dropdown-item aria-role="listitem">Something else</b-dropdown-item>-->
<!--                                        </b-dropdown>-->
<!--                                    </template>-->
<!--                                </b-menu-item>-->
<!--                                <b-menu-item icon="cash-multiple" label="Payments" disabled></b-menu-item>-->
<!--                            </b-menu-item>-->
<!--                            <b-menu-item icon="account" label="User Account">-->
<!--                                <b-menu-item label="Users Account" tag="a" href="/users"></b-menu-item>-->
<!--                                <b-menu-item label="My Account"></b-menu-item>-->
<!--                            </b-menu-item>-->
                        </b-menu-list>
                        <b-menu-list>
                            <b-menu-item label="Offices" icon="microsoft-office" tag="a" href="/offices"></b-menu-item>
                        </b-menu-list>
                        <b-menu-list>
                            <b-menu-item label="User" icon="account" tag="a" href="/users"></b-menu-item>
                        </b-menu-list>
                        <b-menu-list>
                            <b-menu-item label="Appointment Type" icon="calendar-blank" tag="a" href="/appointment-type"></b-menu-item>
                        </b-menu-list>

                        <b-menu-list>
                            <b-menu-item label="Ordinance" icon="clipboard-list" tag="a" href="/ordinance"></b-menu-item>
                        </b-menu-list>

                        <b-menu-list>
                            <b-menu-item label="Report Track" icon="chart-timeline" tag="a" href="/report-track"></b-menu-item>
                        </b-menu-list>


<!--                        <b-menu-list>-->
<!--                            <b-menu-item label="Expo" icon="link" target="_blank" to="/expo"></b-menu-item>-->
<!--                        </b-menu-list>-->

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
            overlay: true,
            fullheight: true,
            fullwidth: false,
            right: true
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
        border-bottom: 2px solid rgba(22, 69, 28, 0.53);
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
