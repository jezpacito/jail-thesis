<template>
    <div class="container">
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Jail Guard Logs</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <tr>
                                            <th>Jail Guard</th>
                                            <th>Date Scan</th>
                                        </tr>   
                                    </thead>
                                    
                                      <tbody>
                                            <tr v-for="jail_data in jail_datas" :key="jail_data.id">
                                            <th scope="row">{{ jail_data.jail_guard.firstname }} {{ jail_data.jail_guard.lastname }} </th>  
                                            <td> {{ jail_data.date_scan }}</td> 
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            jail_datas:[],
             interval: null
           
          }
         },
      
        mounted() {
            // console.log('Component mounted.')
            setInterval(()=>{
                axios.get('api/fingerprint/list')
                .then(response =>{
                       console.log(response.data)
                    this.jail_datas = response.data
                 
                });
            },1000)
           
        },

    }
</script>
