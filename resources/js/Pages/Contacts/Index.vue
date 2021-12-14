<template>

    <Head title="Contacts" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contacts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Alert -->
                <div v-if="$page.props.flash.message">
                        <FlashMsg class="mb-10">
                            {{ $page.props.flash.message }}
                        </FlashMsg>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <!-- Seach box  -->

                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                </svg>
                            </span>

                            <input type="text"
                                   class="w-full py-3 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                   placeholder="Search" v-model="search" @change="searchContact" >
                        </div>

                        <div class="flex my-12 float-right" >
                            <a href="/contacts/create" class="btn btn-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                Add contact
                            </a>

                            <a href="/contacts" class="btn btn-secondary"  >
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                               Clear
                            </a>

                        </div>

                    </div>
                </div>

                <div v-for="contact in contacts.data" :key="contact.id">
                    <!-- Contact Card -->
                    <div class="card lg:card-side bordered bg-white mt-5 ">
                        <figure>
                            <img src="https://picsum.photos/id/1005/400/250">
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title" v-if="contact.lastname"> {{ contact.name }} {{ contact.lastname }}
                            </h2>
                            <h2 class="card-title" v-else> {{ contact.name }} </h2>
                            <p>
                                {{ contact.phone }}
                            </p>
                            <div class="card-actions">
                                <a class="btn btn-primary" :href="'tel:' + contact.phone">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    Call
                                </a>
                                <button class="btn btn-outilne btn-error"
                                        @click="deleteContact(contact.id, contact.name)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <Paging :links="contacts" class="mt-5" />


            </div>




        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import {
        Head
    } from '@inertiajs/inertia-vue3';

    import Paging from '@/Components/Paging.vue'
    import FlashMsg from '@/Components/FlashMsg.vue'

    export default {
        components: {
            BreezeAuthenticatedLayout,
            Head,
            Paging,
            FlashMsg,
        },
        props: ['contacts', 'search'],
        data() {
            return {
                search:'',
                contacts: this.contacts,
            }
        },
        methods: {

            searchContact(){
                // alert("Hey im searching..." + this.search );
                this.$inertia.get('/contacts?search=' + this.search )
                    .then((result) => {

                        console.log(result);

                    }).catch((err) => {
                        console.log(err);
                    });
            },

            deleteContact(id, name) {

                var del = confirm("Are you sure you want to delete " + name + " from your contacts? ");
                // alert(del);

                if (del) {
                    // console.log("a borrar");
                    this.$inertia.delete(`/contacts/${id}`);
                }

            }
        }
    }

</script>
