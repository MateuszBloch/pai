<?php 
include('header.php');
include('footer.php');
?>

<!DOCTYPE html>
<html lang="en">
  <body>
    <h1>Tabela reaktywna VUE</h1>
    <div id="app">

      <b-container><!-- Kontener Bootstrap-->
        <b-form-group horizontal label="Filtrowanie tabeli" class="mb-0">
          <b-input-group>
            <b-form-input v-model="filter" placeholder="Czego szukasz?" />
          </b-input-group>
        </b-form-group>    

         <template>
             <b-table striped hover
                      :items="items"
                      :fields="fields"
                      :filter="filter"
                      @row-clicked="rowClickHandler"
                    >
             </b-table>
             <div>
                  <b-button v-b-modal.modal-1>Dodaj</b-button>
                  <!-- MODAL DODAWANIA -->
                  <b-modal id="modal-1" title="Dodaj obiekt do bazy">
                  <p class="my-4">
                    <div>
                      <b-form @submit="onSubmit">
                          <!-- IS ACTIVE -->
                          <b-form-group
                            id="input-group-1"
                            label="isActive:"
                            label-for="input-1"
                          >
                            <b-form-input
                              id="input-1"
                              v-model="form.isActive"
                              type="number"
                            ></b-form-input>
                          </b-form-group>

                          <!-- AGE -->
                          <b-form-group
                            id="input-group-2"
                            label="Age:"
                            label-for="input-2"
                          >
                            <b-form-input
                              id="input-2"
                              v-model="form.age"
                              type="number"
                            ></b-form-input>
                          </b-form-group>

                          <!-- FIRST NAME -->
                          <b-form-group
                            id="input-group-3"
                            label="First name:"
                            label-for="input-3"
                          >
                            <b-form-input
                              id="input-3"
                              v-model="form.first_name"
                              type="text"
                            ></b-form-input>
                          </b-form-group>

                          <!-- LAST NAME -->
                          <b-form-group
                            id="input-group-4"
                            label="Last name:"
                            label-for="input-4"
                          >
                            <b-form-input
                              id="input-4"
                              v-model="form.last_name"
                              type="text"
                            ></b-form-input>
                          </b-form-group>
                          <b-button type="submit" variant="primary">Submit</b-button>
                      </b-form>            
                    </div>
                  </p>
                  </b-modal>
              </div>
          </template>

        </b-container>
    </div>
     
    <script>        
      window.app = new Vue({
        el: "#app",
        data: {
          url: {
            select: 'http://localhost/Mateusz/json_select.php',
            insert: 'http://localhost/Mateusz/json_insert.php',
          },

          form: {
            isActive: 0,
            age: 0,
            first_name: '',
            last_name: ''
          },
          filter: '',
          items: [ //tę tablicę trzeba wczytać z JSONa na serwerze zazwyczaj, my tu wpiszemy na sztywno:
            { isActive: true, age: 40, first_name: 'nuirjnug', last_name: 'Macdonald' },
            { isActive: false, age: 2, first_name: 'Larsen', last_name: 'Shaw' },
            { isActive: false, age: 89, first_name: 'Geneva', last_name: 'Wilson' },
            { isActive: true, age: 38, first_name: 'Jami', last_name: 'Carney' },
          ],
          fields:
            [
              {                
                  key: "id",
                  sortable: true,
                  label: "ID"
                },
             {
                key: "isActive", //kolumna z JSON
                sortable: false, //czy włączyć sortowanie dla tej kolumny
                label: "Aktywny" //Nagłówek tabeli
            },
            {
                key: "age",
                sortable: true,
                label: "Wiek"
            },
            {
                key: "first_name",
                sortable: true,
                label: "Imię"
            },
                           {
                key: "last_name",
                sortable: true,
                label: "Nazwisko"
            }
            ]
        },
         
         methods:
           {  

                loadDatabase: function() {
                  axios
                    .get(this.url.select)
                    .then( response => this.items = response.data);
                },
                created: function() {
                  axios
                    .get(this.url.insert + '?isActive=' + this.form.isActive + '&age=' + this.form.age + '&first_name=' + this.form.first_name + '&last_name=' + this.form.last_name)
                    .then()
                },
                rowClickHandler: function(record, index) {
                  alert(JSON.stringify(record.id))
                },
                onSubmit: function(event) {
                  event.preventDefault()
                  this.created()
                  this.loadDatabase()
                },
         }
      });
</script>
  </body>
</html>
