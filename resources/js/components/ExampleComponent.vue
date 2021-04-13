<template>
    <div class="container">
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <tr>
                                            <th>Prisoner</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                        </tr>   
                                    </thead>
                                    
                                      <tbody>
                                            <tr v-for="data in datas" :key="data.id">
                                            <th scope="row">{{ data.prisoner.firstname }} {{ data.prisoner.lastname }} </th>  
                                            <td> {{ data.time_in }}</td> 
                                            <td>{{ data.time_out }}</td>  
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Logs Component</div>

                    <div class="card-body">
                       <table class="table table-striped">
                           <thead>
                                <tr>
                                <th>Prisoner</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                </tr>
                            </thead>

                             <tbody>
                                <tr v-for="data in datas" :key="data.id">
                                <th scope="row">{{ data.user.name }} {{ data.user.last_name }} </th>  
                                <td> {{ data.time_in }}</td> 
                                <td>{{ data.time_out }}</td>  
                                </tr>
                            </tbody>
                        </table>
                    

                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
            datas:[],
             interval: null
           
          }
         },
      
        mounted() {
            // console.log('Component mounted.')
            setInterval(()=>{
                axios.get('api/logs')
                .then(response =>{
                       console.log(response.data)
                    this.datas = response.data
                 
                });
            },1000)
           
            // fetch('http://127.0.0.1:8081/api/logs')
            // .then((res)=>res.json())
            // .then(data => this.datas = data)
            // .catch(err => console.log(err.message))
            //  location.reload();

        },

    }
</script>
