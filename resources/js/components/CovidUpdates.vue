 <template>
    <div>
        <section>
            <div style="background-color: #1d6530; padding: 30px; margin: 20px 0 20px 0; text-align: center;">
                <div class="title" style="color: white;">
                    COVID-19 SAFETY TIPS
                </div>
                <div class="subtitle" style="color: white;">
                    Help prevent the prevent the spread of respiratory disease like COVID-19.
                </div>
            </div>          
            <div class="columns">
                <div class="column is-10 is-offset-1">       
                    <div class="columns">

                        <div class="column">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="title" style="padding:1em; text-align: center;font-size:1.50em;" >WEAR FACEMASK</h3>
                                    <p style ="padding:2em; text-align: center;"><b> Everyone must wear mask.</b> </p>
                                    <img src="/img/mask.png" />
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="title" style="padding:1em; text-align: center;font-size:1.50em;" >WASH YOUR HANDS</h3>
                                    <p style ="padding:2em; text-align: center;"> <b>Wash your hands frequently with soap and water. </b></p>
                                    <img src="/img/hands.png" />
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="title" style="padding:1em; text-align: center;font-size:1.50em;"> DON'T TOUCH </h3>
                                    <p style ="padding:2em; text-align: center;"><b> Do not touch your eyes with dirty hands. </b></p>
                                    <img src="/img/touch.png">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-4">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="title" style="padding:1em; text-align: center;font-size:1.50em; ">COVER A COUGH OR SNEEZE</h3>
                                    <p style ="padding:2em; text-align: center;"> <b>Use tissue when cough/ sneeze.</b></p>
                                    <img src="/img/tissue.png">
                                </div>
                            </div>
                        </div>

                        <div class="column is-4">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="title" style="padding:1em; text-align: center;font-size:1.50em;" >KEEP YOUR DISTANCE</h3>
                                    <p style ="padding:2em; text-align: center;"><b>Avoid close contact with people who are sick.</b></p>
                                    <img src="/img/dist.png" >
                                </div>

                            </div>
                        </div>
                         
                          <div class="column is-4">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="title" style="padding:1em; text-align: center;font-size:1.50em;" >GET A COVID-19 VACCINE</h3>
                                    <p style ="padding:2em; text-align: center;"><b>Getting vaccinated can help protect you and others from covid-19.</b></p>
                                    <img src="/img/vaccine.png" >
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr>
        <div class="section">
            <h1 class="title is-4 has-text-centered">ORDINANCES</h1>
            <div class="columns mt-5 is-centered" v-for="(item, index) in data" :key="index">
                <div class="column is-6">
                    <img :src="`/storage/ordinances/${item.ordinance_img_path}`" />
                </div>
            </div>
        </div>
     </div>
 </template>

 <script>
export default {
    data(){
        return {
            data: [],

        }
    },
    methods: {
        loadData(){
            axios.get('/get-open-ordinances').then(res=>{
                this.data = res.data
            })
        }
    },
    mounted() {
        this.loadData();
    }
}
 </script

 <style scoped>
       .mask{
        border-radius: 50%;
         width:200px;
         
    }

    .hand{
        border-radius: 50%;
        width:200px;

    }

    .touch{
        border-radius: 50%;
        width:200px;
    }
    .tissue{
        border-radius: 50%;
        width:200px;
    }
     .dist{
        border-radius: 50%;
        width:200px;
    }
    
  .flex-container {
  display: flex;
  

}
.flex-container > div {

  margin: 5px;
  padding: 2em;
  font-size: 20px;
}

 </style>
