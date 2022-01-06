<template>
    <app-layout title="Rutas">
        <template #header>
            <h2 class="py-2 font-semibold text-xl text-gray-800 leading-tight">
                Rutas
            </h2>
        </template>

        <div class="pt-12 md:py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1 mb-3">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Editar ruta</h3>
                            <p class="text-sm text-gray-600">Ingresa la información de la ruta que quieres editar</p>
                            <div class="mt-3">
                                <Link class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="route('rides.index')">Volver</Link>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                                <div class="md:w-1/4 md:h-1/4 w-2/3 mx-auto max-h-64 flex justify-center items-center">
                                <p class="absolute text-7xl numero-ruta">{{ form.number }}</p>
                                <img class="rounded-lg antialiased mx-auto img-desbord" v-if="urlImage" :src="urlImage">
                              </div>
                              <div class="md:w-1/4 md:h-1/4 w-2/3 mx-auto max-h-64">
                                <p>{{ form.year }}</p>
                              </div>
                               <label class="block font-medium text-sm text-gray-700 my-2">
                                   Numero de ruta
                               </label> 
                               <input type="number" class="form-input w-full rounded-md shadow-sm" min="01" max="999" v-model="form.number" placeholder="Escriba el numero de ruta">
                                <label for="schoolChoise" class="block font-medium text-sm text-gray-700 my-2">Colegio</label> 
                               <select name="schoolChoise" id="schoolChoise" class="form-input w-full rounded-md shadow-sm" v-model="form.school">
                                    <option value="" disabled selected>-- Por favor selecciona un colegio --</option>
                                   <option v-for="school in schools" :value="school.id">{{ school.name }}</option>
                               </select>
                                <label class="block font-medium text-sm text-gray-700 my-2">
                                   Jornada 
                               </label> 
                                <select name="session" id="session" class="form-input w-full rounded-md shadow-sm" v-model="form.session">
                                <option value="" disabled selected>-- Por favor selecciona una jornada --</option>
                                   <option value="morning" selected>Mañana</option>
                                   <option value="afternoon">Tarde</option>
                                   <option value="all_day">Única</option>
                               </select>
                               <label class="block font-medium text-sm text-gray-700 my-2">
                                   Sector
                               </label> 
                                <select name="session" id="session" class="form-input w-full rounded-md shadow-sm" v-model="form.sector">
                                    <option value="" disabled selected>-- Por favor selecciona un sector --</option>
                                   <option v-for="sector in sectors" :value="sector">{{ sector }}</option>
                               </select>
                               <label class="block font-medium text-sm text-gray-700 my-2">
                                    Carro
                               </label> 
                                <select name="car" id="car" class="form-input w-full rounded-md shadow-sm" v-model="form.car">
                                   <option v-for="(car, index) in cars" :value="car.id" :selected="cars[0].id">{{ car.brand + ', ' + car.mob + ', ' + car.year + ', ' + car.company }}</option>
                               </select>
                                <div class="btn-file flex justify-between">
                                    <button class="place-content-center cursor-pointer mt-4 bg-yellow-300 hover:bg-yellow-600 text-black hover:text-white font-bold py-2 px-4 rounded">Guardar</button>
                                    <a href="#" @click.prevent="destroy" class="place-content-center cursor-pointer mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Borrar</a>
                              </div>                                                                                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { Link } from '@inertiajs/inertia-vue3'

    export default defineComponent({
        components: {
            AppLayout,
            Link,
        },
        props: {
            ride: Object,
            schools: Array,
            cars: Array,
        },
        data() {
            return {
                form: {
                    number: this.ride.number,
                    session: this.ride.session,
                    sector: this.ride.sector,
                    school: this.ride.school,
                    car: this.ride.car,
                },
                sectors: [
                      'Bojacá',
                      'Centro',
                      'Cerca de Piedra',
                      'Fagua',
                      'Fonquetá',
                      'Fusca',
                      'La Balsa',
                      'Samaria',
                      'Tíquiza',
                      'Yerbabuena'
                ],
                urlImage: '../../storage/images/paleta.png',
                amount: 999,
            }
        },
        methods: {
            submit(){
                this.$inertia.put(this.route('rides.update', this.ride.id), this.form)
            },
            destroy(){
                if (confirm('Desea borrar esta ruta de la base de datos?')) {
                    this.$inertia.delete(this.route('rides.destroy', this.ride.id))
                }
            }
        },
    })
</script>