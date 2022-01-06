<template>
    <app-layout title="Ruta">
        <template #header>
            <h2 class="py-2 font-semibold text-xl text-gray-800 leading-tight">
                Ruta 
            </h2>
        </template>

        <div class="pt-12 md:py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1 mb-3">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Detalle de la ruta</h3>
                            <p class="text-sm text-gray-600">Se muestra toda la información de la ruta</p>
                            <div class="mt-3">
                                <Link class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="route('rides.index')">Volver</Link>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <!-- Profile Card --> 
                        <div class="md:rounded-lg shadow-lg bg-gray-600 w-full flex flex-row flex-wrap p-3 antialiased" style="
                          background-image: url('../../storage/images/chia-back.jpg');
                          background-repeat: no-repat;
                          background-size: cover;
                          background-blend-mode: multiply;
                        ">
                          <div class="md:w-1/4 w-2/3 mx-auto max-h-64 flex justify-center items-center">
                            <p class="absolute text-7xl numero-ruta">{{ ride.number }}</p>
                            <img class="rounded-lg shadow-lg antialiased mx-auto img-desbord" v-if="urlPaleta" :src="urlPaleta">  
                          </div>
                          <div class="md:w-3/4 w-full px-3 flex flex-row flex-wrap">
                            <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
                              <div class="text-normal text-gray-300"><span class="pb-1">Colegio</span></div>
                              <div class="text-2xl text-white leading-tight">{{ ride.school.name }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Jornada</span></div>
                            <div class="text-2xl text-white leading-tight" v-if="ride.session === 'morning'">Mañana</div>
                              <div class="text-2xl text-white leading-tight" v-else-if="ride.session === 'afternoon'">Tarde</div>
                              <div class="text-2xl text-white leading-tight" v-else-if="ride.session === 'all_day'">Unica</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Sector</span></div>
                              <div class="text-2xl text-white leading-tight">{{ ride.sector }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Numero de la ruta</span></div>
                              <div class="text-2xl text-white leading-tight">{{ ride.number }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Representante de la ruta</span></div>
                              <div class="text-2xl text-white leading-tight">{{ ride.user.names + ' ' + ride.user.surnames }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Numero celular de la ruta</span></div>
                              <div class="text-2xl text-white leading-tight">{{ ride.user.phone }}</div>
                            </div>
                          </div>

                            <div class="md:w-1/4 w-2/3 mx-auto max-h-64 mt-4">
                            <img class="rounded-lg shadow-lg antialiased mx-auto img-desbord" v-if="urlImage" :src="urlImage">  

                          </div>
                          <div class="md:w-3/4 w-full px-3 flex flex-row flex-wrap mt-4">
                            <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
<div class="text-2xl text-white leading-tight">Carro</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Marca</span></div>
                              <div class="text-2xl text-white leading-tight">{{ ride.car.brand }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Modelo de la Marca</span></div>
                              <div class="text-2xl text-white leading-tight">{{ ride.car.mob }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Año de fabricación</span></div>
                              <div class="text-2xl text-white leading-tight">{{ ride.car.year }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Empresa en la que esta afiliado el carro</span></div>
                              <div class="text-2xl text-white leading-tight">{{ ride.car.company }}</div>
                            </div>
                          </div>
                        </div> 
                        <!-- End Profile Card -->

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
            Link
        },
        props: {
            ride: Object,
        },
        data (){
            return {
                urlImage: '../../storage/' + this.ride.car.image,
                urlPaleta: '../../storage/images/paleta.png', 
            }
        }
    })
</script>
