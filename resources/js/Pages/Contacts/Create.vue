<template>

    <Head title="Contacts Create" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Contact
            </h2>
        </template>

        <div class="py-12">


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <BreezeValidationErrors class="mb-4" />

                <Panel header="Add New Contact">
                    <form @submit.prevent="submit">

                        <div>
                            <BreezeLabel for="name" value="Name" />
                            <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"  autofocus autocomplete="name" />
                        </div>
                        <div>
                            <BreezeLabel for="lastname" value="Lastname" />
                            <BreezeInput id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" autofocus autocomplete="lastname" />
                        </div>
                        <div>
                            <BreezeLabel for="phone" value="Phone" />
                            <BreezeInput id="phone" type="tel" class="mt-1 block w-full" v-model="form.phone"  autofocus autocomplete="phone" />

                            <!-- <input type="tel" v-mask="'##/##/####'" /> -->

                            <!-- <input id="phone" type="tel" v-mask="'(###)###-####'" class="mt-1 block w-full" v-model="form.phone"  autofocus autocomplete="phone" /> -->
                        </div>
                        <BreezeButton class="ml-4 float-right" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                             </svg> Save
                        </BreezeButton>
                    </form>
                </Panel>
            </div>


        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeButton from '@/Components/Button.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
    import Panel from '@/Components/Panel.vue'
    import {
        Head
    } from '@inertiajs/inertia-vue3';


    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeButton,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
            Head,
            Panel,
        },
        // props: ['contacts'],
        data(){
            return {
                form: this.$inertia.form({
                    name: '',
                    lastname:'',
                    phone:''
                })
            }
        },
        methods: {
            submit(){
                // this.form.post(this.route('contacts.store'),{
                //     onFinish: () => this.form.reset('name', 'lastname', 'phone'),
                // })

                this.$inertia.post(this.route('contacts.store'), this.form);

            }
        }
    }

</script>
