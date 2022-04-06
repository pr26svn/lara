<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">User List</div>

          <div class="card-body">
            <table>
              <tr>
                <th width="50%">Name</th>
                <th width="50%">Email</th>
              </tr>
              <tr v-for="user in users" :key="user.id">
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
              </tr>
            </table>
            <span v-on:click="greet">Поприветствовать</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      users: {},
    }
  },
  methods: {
    getUser(){
      axios.get('/shop/public/users')
          .then((response)=>{
            console.log(response);
            this.users = response.data.users
          })
    },
    greet: function (event) {
      // `this` внутри методов указывает на экземпляр Vue
      let mail=document.getElementById('email');
      console.log(mail.value);
      axios.get('/shop/public/user/'+mail.value)
          .then((response)=>{
            console.log(response);
            this.users = response.data.user
          })

    }
  },
  created() {
    this.getUser()
  }
}
</script>
