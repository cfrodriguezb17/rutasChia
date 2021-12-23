<template>
    <app-layout title="Estudiantes">
        <template #header>
            <div class="flex justify-between items-center">                
            <h2 class="py-2 font-semibold text-xl text-gray-800 leading-tight">
               Rutas 
            </h2>
            <Link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="route('rides.create')">Formar Ruta</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Listado de Estudiantes</h3>
                            <p class="text-sm text-gray-600">Estos son todos los estudiantes del que eres acudiente</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md md:p-4">
<!--                             <table class="w-full">
                                <tr v-for="student in students">
                                    <td class="border p-4 py-2">
                                        {{ student.names }}
                                    </td>
                                    <td class="border p-4 py-2">
                                        {{ student.surnames }}
                                    </td>
                                    <td class="border p-4 py-2 bg-sky-500 text-white">
                                        <Link :href="route('students.show', student.id)">
                                            Ver
                                        </Link>
                                    </td>
                                    <td class="border p-4 py-2 bg-green-500 text-white">
                                        <Link :href="route('students.edit', student.id)">
                                            Editar 
                                        </Link>
                                    </td>                                                                
                                </tr>
                            </table> -->
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
        }
    })
</script>
