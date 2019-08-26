<template>
    <div class="container">
      <button @click="newModal" class="btn btn-info pull-left" data-toggle="modal" data-target="#exampleModal">Add New</button>

      <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Burger Item Name</th>
              <th scope="col">Status</th>
               <th scope="col">Price</th>
              <th scope="col">Actions</th>
          </tr>
      </thead>
      <tbody>
      </tr>
      <tr v-for="burger in burgers.data" :key="burger.id">
          <td>{{burger.burger_name}}</td>
          <td>{{burger.status}}</td>
           <td>{{burger.price}}</td>
          <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" @click="editModal(burger)">Edit</button>
              <button class="btn btn-danger" @click="deleteBurger(burger.id)">Delete</button>
          </td>
      </tr>
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

         <h4 v-show="!editmode" class="modal-title" id="exampleModalLabel">Add</h4>
         <h4 v-show="editmode" class="modal-title" id="addNewLabel">Update</h4>


         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form @submit.prevent="editmode ? updateBurger() : addBurger()">
      <div class="modal-body">
        <div class="form-group">
          <label>Burger Name</label>
          <input v-model="form.burger_name" type="text" name="burger_name"
          class="form-control" :class="{ 'is-invalid': form.errors.has('burger_name') }">
          <has-error :form="form" field="burger_name"></has-error>
      </div>

      <div class="form-group">
          <label>Status</label>
          <input v-model="form.status" type="text" name="status"
          class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
          <has-error :form="form" field="status"></has-error>
      </div>


      <div class="form-group">
          <label>Price</label>
          <input v-model="form.price" type="text" name="price"
          class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
          <has-error :form="form" field="price"></has-error>
      </div>

      <div class="form-group">
        <label>Image</label>
        <input type="file" name="file" >
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>






</template>

<script>
    export default {
        data (){
            return {
                editmode: false,
                burgers: {},
                form: new Form({
                    id: '',
                    burger_name: '',
                    status: '',
                    image: '',
                    price: '',

                })
            }
        },
        methods: {
            getBurgers(){
             axios.get("api/burger").then(({ data }) => (this.burgers = data));

         },

         addBurger(){
            this.form.post("api/burger")
                .then(()=>{
                  $("#exampleModal").modal("hide")
                  $(".modal-backdrop").remove()

           })
                alert ('success')   
                 this.getBurgers()
        },
        // for Image
        // selectImage(e){
        //      this.form.file = file
        // },

        updateBurger(){
            this.editmode = true
            this.form.put('api/burger/' + this.form.id)
                .then(()=>{
                    $("#exampleModal").modal("hide")
                    $(".modal-backdrop").remove()
                })
                alert('success')
            this.getBurgers()
        },

        deleteBurger(id){

              this.form.delete('api/burger/' + id)
                 .then(()=>{
                  alert('Deleted!')
             })
                 this.getBurgers()

        },

        newModal(){
            this.editmode = false
            this.form.reset()
            $("#exampleModal").modal('show')

        },
        editModal(burger){
            this.editmode = true   
            this.form.reset()
            $("#exampleModal").modal('show')
            this.form.fill(burger)
        },

    },
    created() {
        this.getBurgers()
            // console.log(this.burgers)
        }
    }
</script>
