<template>
    <div class="container">
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Prisoner Logs</h6>
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#exampleModal">
                                    Monthly Log
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- another modal -->
                                 <button type="button" class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#exampleModal1">
                                    Yearly Logs
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           s1
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
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
           
        },

    }
</script>
