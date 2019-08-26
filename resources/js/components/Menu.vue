<template>
    <div class="container">
        <h4 style="text-align: center;"><strong>foodpandog</strong></h4>
      <table>
        <thead>
            <tr>
                <th>
                    Burgers
                </th>
                <th>
                    Beverages
                </th>
              
                <th>
                    Combo Meals
                </th>
            </tr>
        </thead>
          <tbody>
              <tr>
               
                   <td>
                        <ul v-if="burger.status ==='available'" class="list-group" v-for="burger in burgers.data" :key="burger.id">
                          <li class="list-group-item">{{burger.burger_name}}-{{burger.price}} php  <button class="btn btn-sm  btn-info">Add to Cart</button></li>
                        </ul>
                  </td>
                     <td>
                        <ul v-if="beverage.status ==='available'" class="list-group" v-for="beverage in beverages.data" :key="beverage.id">
                          <li id="beverage" class="list-group-item">{{beverage.beverage_name}}-{{beverage.price}} php  <button @click="addToOrder()" class="btn btn-sm  btn-info">Add to Cart</button></li>
                        </ul>
                  </td>
                   <td>
                        <ul v-if="combo.status ==='available'" class="list-group"  v-for="combo in combos.data" :key="combo.id">
                          <li class="list-group-item">{{combo.combo_meal_name}}-{{combo.price}} php  <button class="btn btn-sm  btn-info">Add to Cart</button></li>
                        </ul>
                  </td>
              </tr>
          </tbody>
      </table>

      <br><br>
      <div class="card" style="width: 55rem;">
          <div class="card-header">
            Your Orders
        </div>
        <ul class="list-group list-group-flush" id="orders">
        </ul>
    </div>

    </div>
</template>

<script>
    export default {
        data(){
            return{
                burgers: {},
                combos: {},
                beverages: {},
            }
        },

        methods: {
            getBurgers(){
                axios.get("api/burger")
                .then(({data}) =>(this.burgers = data))
            },
            getComboMeals(){
                   axios.get("api/combo")
                   .then(({data}) =>(this.combos = data))
           },
           getBeverage(){
                axios.get("api/beverage")
                .then(({data}) =>(this.beverages = data))
        },
        addToOrder() {
          var x = document.createElement("LI");
          var y = document.createTextNode(document.createElement('beverage'));
          x.appendChild(y);
          document.getElementById("orders").appendChild(x);
        }
    },
    created() {
        this.getBurgers()
        this.getComboMeals()
        this.getBeverage()
        console.log('Component mounted.')
    }
}
</script>
