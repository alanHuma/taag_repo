<template>
  <v-form>
    <v-row>
      <v-col
        cols="12"
        md="3"
      >
        <label for="firstname">Autor</label>
      </v-col>

      <v-col
        cols="12"
        md="9"
      >
        <v-text-field
          id="author"
          v-model="formData.author"
          outlined
          dense
          placeholder="EL PRINCIPITO"
          hide-details
        ></v-text-field>
      </v-col>

      <v-col
        cols="12"
        md="3"
      >
        <label for="firstname">Titulo</label>
      </v-col>

      <v-col
        cols="12"
        md="9"
      >
        <v-text-field
          id="title"
          v-model="formData.title"
          outlined
          dense
          placeholder="EL PRINCIPITO"
          hide-details
        ></v-text-field>
      </v-col>

      <v-col
        cols="12"
        md="3"
      >
        <label for="firstname">Edicion</label>
      </v-col>

      <v-col
        cols="12"
        md="9"
      >
        <v-text-field
          id="edition"
          v-model="formData.edition"
          outlined
          dense
          placeholder="EL PRINCIPITO"
          hide-details
        ></v-text-field>
      </v-col>


      <v-col
        cols="12"
        md="3"
      >
        <label for="firstname">Datos de Publicacion</label>
      </v-col>

      <v-col
        cols="12"
        md="9"
      >
        <v-text-field
          id="publication_data"
          v-model="formData.publication_data"
          outlined
          dense
          placeholder="EL PRINCIPITO"
          hide-details
        ></v-text-field>
      </v-col>

      <v-col
        cols="12"
        md="3"
      >
        <label for="firstname">Tipo de Contenido</label>
      </v-col>

      <v-col
        cols="12"
        md="9"
      >
        <v-text-field
          id="content_type"
          v-model="formData.content_type"
          outlined
          dense
          placeholder="EL PRINCIPITO"
          hide-details
        ></v-text-field>
      </v-col>


      <v-col
        cols="12"
        md="3"
      >
        <label for="firstname">Restricciones</label>
      </v-col>

      <v-col
        cols="12"
        md="9"
      >
        <v-text-field
          id="restriction"
          v-model="formData.restriction"
          outlined
          dense
          placeholder="EL PRINCIPITO"
          hide-details
        ></v-text-field>
      </v-col>

      <v-col
        cols="12"
        md="3"
      >
        <label for="firstname">Materia</label>
      </v-col>

      <v-col
        cols="12"
        md="9"
      >
        <v-text-field
          id="matter"
          v-model="formData.matter"
          outlined
          dense
          placeholder="EL PRINCIPITO"
          hide-details
        ></v-text-field>
      </v-col>

      <v-col
        cols="12"
        md="3"
      >
        <label for="firstname">Proveedor</label>
      </v-col>

      <v-col
        cols="12"
        md="9"
      >
        <v-text-field
          id="provider"
          v-model="formData.provider"
          outlined
          dense
          placeholder="EL PRINCIPITO"
          hide-details
        ></v-text-field>
      </v-col>

      <v-col
        offset-md="3"
        cols="12"
      >
        <v-btn v-on:click="submitForm" color="primary">
          Guardar
        </v-btn>
        <v-btn
          type="reset"
          class="mx-2"
          outlined
        >
          Cancelar
        </v-btn>
      </v-col>

    </v-row>
  </v-form>
</template>

<script>
import { ref } from '@vue/composition-api'
import axios from "axios";

export default {
  setup() {
  
    return {
      formData:{
        author:"",
        title:"",
        edition:"",
        publication_data:"",
        content_type:"",
        restriction:"",
        matter:"",
        provider:"",
      }
      
    }
  },
  methods: {
    submitForm() {
      axios
        .post("api/books", this.formData)
        .then((res) => {
         
            alert(res.data.message);
        
        })
        .catch((error) => {
          // error.response.status Check status code
        })
        .finally(() => {
         
        });
    },
  },
}
</script>
