<template>
    
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
            <th class="text-uppercase">ID</th>
          <th class="text-uppercase">Titulo</th>
          <th class="text-center text-uppercase">Autor</th>
          <th class="text-center text-uppercase">Edicion</th>
          <th class="text-center text-uppercase">Datos de Publicacion</th>
          <th class="text-center text-uppercase">Tipo de Contenido</th>

          <th class="text-center text-uppercase">Restricciones</th>

          <th class="text-center text-uppercase">Materia</th>

          <th class="text-center text-uppercase">proveedor</th>
          <th class="text-center text-uppercase">Opciones</th>
        </tr>
      </thead>
      <tbody>
       
        <tr v-for="item in books" :key="item.id">
            <td class="text-center">
            {{ item.id }}
          </td>
          <td class="text-center">
            {{ item.author }}
          </td>
          <td class="text-center">
            {{ item.title }}
          </td>
          <td class="text-center">
            {{ item.edition }}
          </td>
          <td class="text-center">
            {{ item.publication_data }}
          </td>

          <td class="text-center">
            {{ item.content_type }}
          </td>
          <td class="text-center">
            {{ item.restriction }}
          </td>
          <td class="text-center">
            {{ item.matter }}
          </td>

          <td class="text-  ">
            {{ item.provider }}
          </td>

          <td class="text-center">
            <router-link
                   
            :to="`/editbook/${item.id}`"
                    >editar
                  </router-link>

                  <v-btn v-on:click="deleteItem(item.id)" color="primary"> Borrar  </v-btn>

          </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
    import axios from "axios";

export default {
  data() {
    return {
      books: [],
    }
  },
  created() {
     
    this.getIndex()
  },
  methods: {
    getIndex() {
     axios
        .get('api/books', [], {
          headers: {
            Authorization: 'Bearer ' + document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          },
        })
        .then(response => {
           
            this.books = response.data;
           
         
          
        })
    },
    deleteItem(id) {
      axios
        .post("../api/books/destroy/"+ id)
        .then((res) => {
         
            alert(res.data.message);
        
        })
        .catch((error) => {
          // error.response.status Check status code
        })
        .finally(() => {
         this.getIndex();
        });
    },
  },
}
</script>
