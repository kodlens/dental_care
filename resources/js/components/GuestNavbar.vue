<template>
    <b-navbar>
        <template #brand>
            <b-navbar-item>
                <h1 class="title is-4">DENTAL CARE</h1>
            </b-navbar-item>
        </template>

        <template #start>
           
            
        </template>

        <template #end>
             <b-navbar-item href="/">
                HOME
            </b-navbar-item>
            <b-navbar-item href="/about">
                ABOUT
            </b-navbar-item>
            <b-navbar-item tag="div">
                <div class="buttons">
                    <a class="button is-primary" href="/sign-up">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" href="/login">
                        Log in
                    </a>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar>
    
</template>

<script>
export default {

}
</script>

<style>
    .navbar-item{
        font-weight: bold;
    }
</style>