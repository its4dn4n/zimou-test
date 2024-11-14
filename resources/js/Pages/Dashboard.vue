<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";

// State variables
const showCreateForm = ref(false);
const newPackage = ref({
    name: "",
    client_first_name: "",
    client_last_name: "",
    client_phone: "",
});

// Method to toggle between form and welcome page
const openCreatePackageModal = () => {
    showCreateForm.value = true;
};

const closeCreatePackageModal = () => {
    showCreateForm.value = false;
};

// Method to handle package creation
const createPackage = async () => {
    try {
        await Inertia.post("/package", newPackage.value, {
            onSuccess: () => {
                showCreateForm.value = false;
                resetForm();
            },
        });
    } catch (error) {
        console.error("Error creating package:", error);
    }
};

// Method to reset the form fields
const resetForm = () => {
    newPackage.value = {
        name: "",
        client_first_name: "",
        client_last_name: "",
        client_phone: "",
    };
};

// Method for exporting packages to Excel
const exportPackages = async () => {
    try {
        const response = await axios.get("/packages/export", {
            responseType: "blob",
        });
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement("a");
        link.href = url;
        link.setAttribute("download", "packages.xlsx");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    } catch (error) {
        console.error("Error exporting packages:", error);
    }
};
</script>

<template>
    <AppLayout title="Dashboard">
        <!-- Header section -->
        <template #header>
            <div class="flex justify-between w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Packages
                </h2>
                <div class="flex gap-1">
                    <v-btn
                        density="compact"
                        @click="openCreatePackageModal"
                        color="primary"
                    >
                        + Create New Package
                    </v-btn>
                    <v-btn
                        color="success"
                        @click="exportPackages"
                        density="compact"
                    >
                        Export to Excel
                    </v-btn>
                </div>
            </div>
        </template>

        <!-- Main content section -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6"
                >
                    <!-- Conditional rendering for the form or welcome page -->
                    <template v-if="showCreateForm">
                        <h2 class="text-2xl font-bold mb-4">
                            Create New Package
                        </h2>
                        <form @submit.prevent="createPackage">
                            <div class="mb-4">
                                <label class="block text-gray-700"
                                    >Package Name</label
                                >
                                <input
                                    v-model="newPackage.name"
                                    type="text"
                                    class="border rounded w-full py-2 px-3"
                                    required
                                />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700"
                                    >Client Name</label
                                >
                                <input
                                    v-model="newPackage.client_first_name"
                                    type="text"
                                    class="border rounded w-full py-2 px-3"
                                    required
                                />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700"
                                    >Delivery Type</label
                                >

                                <input
                                    v-model="newPackage.client_last_name"
                                    type="text"
                                    class="border rounded w-full py-2 px-3"
                                    required
                                />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Phone</label>
                                <input
                                    v-model="newPackage.client_phone"
                                    type="text"
                                    class="border rounded w-full py-2 px-3"
                                    required
                                />
                            </div>
                            <div class="flex justify-end space-x-2">
                                <button
                                    type="button"
                                    @click="closeCreatePackageModal"
                                    class="bg-gray-500 text-white py-2 px-4 rounded"
                                >
                                    Return
                                </button>
                                <button
                                    type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded"
                                >
                                    Save Package
                                </button>
                            </div>
                        </form>
                    </template>

                    <!-- Default Welcome component -->
                    <Welcome v-else />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
