<template>
    <app-layout title="Estudiantes">
        <template #header>
            <h2 class="py-2 font-semibold text-xl text-gray-800 leading-tight">
                Estudiantes 
            </h2>
        </template>

        <div class="pt-12 md:py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1 mb-3">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Editar Información del Estudiante</h3>
                            <p class="text-sm text-gray-600">Se puede editar la información del estudiante</p>
                            <div class="mt-3">
                                <Link class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="route('students.index')">Volver</Link>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                              <div class="md:w-1/4 md:h-1/4 w-2/3 mx-auto max-h-64">
                                <img class="rounded-lg shadow-lg antialiased mx-auto img-desbord" v-if="urlImage" :src="urlImage">
                              </div>
                              <div class="btn-file flex">
                                <label for="imageStudent" class="mx-auto place-content-center cursor-pointer mt-4 bg-lime-500 hover:bg-lime-700 text-white font-bold py-2 px-4 rounded">Subir Imagen</label>
                              <input class="hidden" type="file" id="imageStudent" accept=".jpg, .png" name="image" @change="onFileChange" @input="form.image = $event.target.files[0]">
                              </div>
                               <label class="block font-medium text-sm text-gray-700 my-2">
                                   Nombres
                               </label> 
                               <input type="text" class="form-input w-full rounded-md shadow-sm" v-model="form.names">
                                <label class="block font-medium text-sm text-gray-700 my-2">
                                   Apellidos
                               </label> 
                               <input type="text" class="form-input w-full rounded-md shadow-sm" v-model="form.surnames">
                                <label for=typeOfDocument class="block font-medium text-sm text-gray-700 my-2">
                                   Tipo de documento
                               </label> 
                               <select name="typeOfDocument" id="typeOfDocument" class="form-input w-full rounded-md shadow-sm" v-model="form.type_id">
                                   <option value="TI" selected>Tarjeta de Identidad</option>
                                   <option value="CC" disabled>Cédula de Ciudadanía</option>
                                   <option value="CE" disabled>Cédula de Extranjería</option>
                               </select>
                                <label class="block font-medium text-sm text-gray-700 my-2">Numero de documento</label> 
                               <input type="number" class="form-input w-full rounded-md shadow-sm" v-model="form.dni">
                                <label for="gender" class="block font-medium text-sm text-gray-700 my-2">
                                   Genero
                               </label> 
                               <select name="gender" id="gender" class="form-input w-full rounded-md shadow-sm" v-model="form.gender">
                                   <option value="male" selected>Masculino</option>
                                   <option value="female">Femenino</option>
                               </select>
                                <label class="block font-medium text-sm text-gray-700 my-2">Fecha de Nacimiento</label> 
                               <input type="date" class="form-input w-full rounded-md shadow-sm" v-model="form.birth_date">    
                                <label class="block font-medium text-sm text-gray-700 my-2">Dirección de Residencia</label> 
                               <input type="text" class="form-input w-full rounded-md shadow-sm" v-model="form.address">  
                                <label for="schoolChoise" class="block font-medium text-sm text-gray-700 my-2">Colegio</label> 
                               <select name="schoolChoise" id="schoolChoise" class="form-input w-full rounded-md shadow-sm" v-model="form.school">
                                   <option v-for="school in schools" :value="school.id">{{ school.name }}</option>
                               </select>
                                <label class="block font-medium text-sm text-gray-700 my-2">Curso</label> 
                               <input type="text" class="form-input w-full rounded-md shadow-sm" v-model="form.course">       
                                <label for="grade" class="block font-medium text-sm text-gray-700 my-2">Grado</label> 
                                <select class="form-input w-full rounded-md shadow-sm" v-model="form.grade">
                                   <option v-for="grade in gradesNames" :value="grade">{{ grade }}</option>
                               </select>
                               <label for="session" class="block font-medium text-sm text-gray-700 my-2">Jornada</label> 
                                <select name="session" id="session" class="form-input w-full rounded-md shadow-sm" v-model="form.session">
                                   <option value="morning" selected>Mañana</option>
                                   <option value="afternoon">Tarde</option>
                                   <option value="all_day">Única</option>
                               </select>  
                                <div class="btn-file flex justify-between">
                                    <button class="place-content-center cursor-pointer mt-4 bg-yellow-300 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded">Editar</button>
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
            student: Object,
            schools: Array,
        },
        data() {
            return {
                form: {
                    names: this.student.names,
                    surnames: this.student.surnames,
                    type_id: this.student.type_id,
                    dni: this.student.dni,
                    gender: this.student.gender,
                    birth_date: this.student.birth_date,
                    address: this.student.address,
                    school: this.student.school.id,
                    course: this.student.course,
                    grade: this.student.grade,
                    session: this.student.session,
                    image: this.student.image 
                },
                urlImage: '../../storage/' + this.student.image,
                gradesNames: ['Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Séptimo', 'Octavo', 'Noveno', 'Décimo', 'Once'],
            }
        },
        methods: {
            onFileChange(e) {
                const file = e.target.files[0];
                this.urlImage = URL.createObjectURL(file);
            },
            submit(){
                this.$inertia.post(this.route('students.update', this.student.id),
                {
                    _method: 'put',
                    names: this.form.names,
                    surnames: this.form.surnames,
                    type_id: this.form.type_id,
                    dni: this.form.dni,
                    gender: this.form.gender,
                    birth_date: this.form.birth_date,
                    address: this.form.address,
                    school: this.form.school,
                    course: this.form.course,
                    grade: this.form.grade,
                    session: this.form.session,
                    image: this.form.image 
                });
            },
            destroy() {
                if (confirm('Desea eliminar a este estudiante?')) {
                    this.$inertia.delete(this.route('students.destroy', this.student.id))
                }
            }
        }
    })
</script>
<!--                                <input list="schoolChoises" id="schoolChoise" type="text" class="form-input w-full rounded-md shadow-sm" v-model="form.school"> 
                               <datalist id="schoolChoises">
                                <option v-for="school in schools" :value="school.name"></option>
                               </datalist> -->