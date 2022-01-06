<template>
    <app-layout title="Rutas">
        <template #header>
            <div class="flex justify-between items-center">                
            <h2 class="py-2 font-semibold text-xl text-gray-800 leading-tight">
               Rutas 
            </h2>
            <div>
            <Link class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" :href="route('cars.create')">Ingresar mi carro</Link>
            <Link class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="route('rides.create')" v-if="cars.length !== 0">Formar Ruta</Link>
            </div>
            </div>
        </template>

        <div class="py-12" v-if="rides.length !== 0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Listado de Rutas a tu nombre</h3>
                            <p class="text-sm text-gray-600">Estos son todas las rutas que estan a tu nombre</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md md:p-4">
                            <table class="w-full">
                                <tr>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Numero de ruta
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Colegio
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Sector
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Jornada
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Ver 
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Editar
                                    </td>                                                                
                                </tr>                               
                                <tr v-for="ride in rides">
                                    <td class="border p-4 py-2">
                                        {{ ride.number }}
                                    </td>
                                    <td class="border p-4 py-2">
                                        {{ ride.school.name }}
                                    </td>
                                    <td class="border p-4 py-2">
                                        {{ ride.sector }}
                                    </td>                                    
                                    <td class="border p-4 py-2" v-if="ride.session == 'morning'">
                                        Mañana
                                    </td>
                                    <td class="border p-4 py-2" v-if="ride.session == 'afternoon'">
                                        Tarde 
                                    </td>
                                    <td class="border p-4 py-2" v-if="ride.session == 'all_day'">
                                        Unica                                        
                                    </td>                                    
                                    <td class="border p-4 py-2 bg-blue-500 text-white">
                                        <Link :href="route('rides.show', ride.id)">
                                            Ver
                                        </Link>
                                    </td>
                                    <td class="border p-4 py-2 bg-green-500 text-white">
                                        <Link :href="route('rides.edit', ride.id)">
                                            Editar 
                                        </Link>
                                    </td>                                                                
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12" v-else-if="rides.length === 0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Listado de Rutas a tu nombre</h3>
                            <p class="text-sm text-gray-600">Estos son todas las rutas que estan a tu nombre</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <h1 class="ml-2 text-xl md:text-2xl">No tienes rutas en la base de datos</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="py-12" v-if="cars.length !== 0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Listado de Carros a tu nombre</h3>
                            <p class="text-sm text-gray-600">Estos son todos los carros que estan a tu nombre</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md md:p-4">
                            <table class="w-full">
                                <tr>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Marca
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Modelo
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Año
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Empresa
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Ver
                                    </td>
                                    <td class="border border-slate-400 p-4 py-2 bg-slate-200 text-slate-700">
                                        Editar
                                    </td>                                                                
                                </tr>
                                <tr v-for="car in cars">
                                    <td class="border p-4 py-2">
                                        {{ car.brand }}
                                    </td>
                                    <td class="border p-4 py-2">
                                        {{ car.mob }}
                                    </td>
                                    <td class="border p-4 py-2">
                                        {{ car.year }}
                                    </td>
                                    <td class="border p-4 py-2">
                                        {{ car.company }}
                                    </td>
                                    <td class="border p-4 py-2 bg-blue-500 text-white">
                                        <Link class="" :href="route('cars.show', car.id)">
                                            Ver
                                        </Link>
                                    </td>
                                    <td class="border p-4 py-2 bg-green-500 text-white">
                                        <Link :href="route('cars.edit', car.id)">
                                            Editar 
                                        </Link>
                                    </td>                                                                
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12" v-if="cars.length === 0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Listado de Carros a tu nombre</h3>
                            <p class="text-sm text-gray-600">Estos son todos los carros que estan a tu nombre</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <h1 class="ml-2 text-xl md:text-2xl">No tienes carros en la base de datos</h1>
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
            Link
        },
        props: {
            rides: Array,
            cars: Array
        },
    })
</script>
