<template>
    <div>
        <div class="section debug">
            <div class="columns">
                <div class="column">
                    <p class="title is-5 has-text-centered">
                        SERVICES HERE
                    </p>
                </div>
            </div>

        </div>

        <div class="section">
            <div class="services">
                <div class="card" v-for="(item, index) in services" :key="index">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{ item.service }}
                        </p>
                        <button class="card-header-icon" aria-label="more options">
                          <span class="icon">
                            <i class="fas fa-angle-down" aria-hidden="true"></i>
                          </span>
                        </button>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {{ item.description }}
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="#" class="card-footer-item">Save</a>
                        <a href="#" class="card-footer-item">Edit</a>
                        <a href="#" class="card-footer-item">Delete</a>
                    </footer>
                </div>
            </div>
        </div>


    </div><!--root div-->
</template>

<script>
export default {
    data(){
        return{
            services: [],
        }
    },
    methods: {
        getServices: function(){
            axios.get('/get-dental-services').then(res=>{
                this.services = res.data;

                console.log(this.services)
            });
        }
    },

    mounted() {
        this.getServices();
    }
}
</script>

<style scoped>
    .services{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
    }

    .card{
        width: 320px;
        margin: 15px;
    }

</style>
