<template>
    <div class="bg-gray-200 bg-opacity-25">
        <v-data-table
            :headers="headers"
            :items="items"
            item-key="tracking_code"
            :server-items-length="pagination.total"
            :items-per-page="pagination.per_page"
            :page.sync="pagination.current_page"
            :loading="loading"
            @update:page="fetchPackages"
        >
            <template v-slot:item.actions="{ item }">
                <v-btn
                    class="m-1 cursor-not-allowed pointer-events-none"
                    density="compact"
                    color="primary"
                    @click="editItem(item)"
                    >Edit</v-btn
                >
                <v-btn
                    class="m-1 cursor-not-allowed pointer-events-none"
                    density="compact"
                    color="red"
                    @click="deleteItem(item)"
                    >Delete</v-btn
                >
            </template>
        </v-data-table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            headers: [
                {
                    title: "Tracking Code",
                    value: "tracking_code",
                    sortable: true,
                    align: "center",
                },
                { title: "Store Name", value: "store_name", sortable: true },
                {
                    title: "Package Name",
                    value: "package_name",
                    sortable: true,
                },
                {
                    title: "Client Full Name",
                    value: "client_full_name",
                    sortable: true,
                },
                { title: "Phone", value: "phone", sortable: true },
                { title: "Wilaya", value: "wilaya", sortable: true },
                { title: "Commune", value: "commune", sortable: true },
                {
                    title: "Delivery Type",
                    value: "delivery_type",
                    sortable: true,
                },
                { title: "Status", value: "status", sortable: true },
                {
                    title: "Actions",
                    value: "actions",
                    sortable: false,
                },
            ],
            items: [],
            loading: false,
            pagination: {
                total: 0,
                current_page: 1,
                per_page: 5,
                /*  last_page: 0, */
            },
        };
    },
    methods: {
        editItem(item) {
            console.log("Edit:", item);
        },
        deleteItem(item) {
            console.log("Delete:", item);
        },
        async fetchPackages(url = "/packages") {
            this.loading = true;
            try {
                const response = await axios.get(url);

                this.items = response.data.data;
                this.pagination = {
                    total: 100, //response.data.meta.total,
                    current_page: response.data.meta.current_page,
                    per_page: response.data.meta.per_page,
                    /*  last_page: response.data.meta.last_page,
                    prev_page_url: response.data.meta.prev,
                    next_page_url: response.data.meta.next, */
                };
            } catch (error) {
                console.error("Error fetching packages:", error);
            } finally {
                this.loading = false;
            }
        },
    },

    async created() {
        await this.fetchPackages();
    },
};
</script>
