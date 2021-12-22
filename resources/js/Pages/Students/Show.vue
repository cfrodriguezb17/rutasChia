<template>
    <app-layout title="Estudiantes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Estudiantes 
            </h2>
        </template>

        <div class="pt-12 md:py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1 mb-3">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Detalle del Estudiante</h3>
                            <p class="text-sm text-gray-600">Se muestra toda la información del estudiante</p>
                            <div class="mt-3">
                                <Link class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="route('students.index')">Volver</Link>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <!-- Profile Card -->
                        <div class="md:rounded-lg shadow-lg bg-gray-600 w-full flex flex-row flex-wrap p-3 antialiased" style="
                          background-image: url('https://images.unsplash.com/photo-1578836537282-3171d77f8632?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80');
                          background-repeat: no-repat;
                          background-size: cover;
                          background-blend-mode: multiply;
                        ">
                          <div class="md:w-1/4 w-2/3 mx-auto max-h-64">
                            <img class="rounded-lg shadow-lg antialiased mx-auto img-desbord" v-if="urlImage" :src="urlImage">  
                          </div>
                          <div class="md:w-3/4 w-full px-3 flex flex-row flex-wrap">
                            <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
                              <div class="text-normal text-gray-300"><span class="pb-1">Acudiente</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.user.names + ' ' + student.user.surnames }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Numero de Celular del Acudiente</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.user.phone }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Dirección</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.address }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Numero de Ruta</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.ride.number }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Colegio</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.school.name }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Nombres del Estudiante</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.names }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Apellidos del Estudiante</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.surnames }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Tipo de documento</span></div>
                              <div class="text-2xl text-white leading-tight" v-if="student.type_id === 'TI'">Tarjeta de Identidad</div>
                              <div class="text-2xl text-white leading-tight" v-else-if="student.type_id === 'CE'">Cedula de Extranjeria</div>
                              <div class="text-2xl text-white leading-tight" v-else-if="student.type_id === 'CC'">Cedula de Extranjeria</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Numero de documento</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.dni }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Fecha de Nacimiento</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.birth_date }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Sexo</span></div>
                              <div class="text-2xl text-white leading-tight" v-if="student.gender === 'male'">Masculino</div>
                              <div class="text-2xl text-white leading-tight" v-else-if="student.gender === 'female'">Femenino</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Grado</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.grade }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Curso</span></div>
                              <div class="text-2xl text-white leading-tight">{{ student.course }}</div>
                              <div class="text-normal text-gray-300"><span class="pb-1">Jornada</span></div>
                              <div class="text-2xl text-white leading-tight" v-if="student.session === 'morning'">Mañana</div>
                              <div class="text-2xl text-white leading-tight" v-else-if="student.session === 'afternoon'">Tarde</div>
                              <div class="text-2xl text-white leading-tight" v-else-if="student.session === 'all_day'">Unica</div>
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
            student: Object,
        },
        data (){
            return {
                urlImage: '../../storage/' + this.student.image,
            }
        }
    })
</script>
