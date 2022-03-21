<template>
    <div>
        <div class="section">

            <div class="columns is-centered">
                <div class="column">
                    <div class="myDivToPrint">
                        <div style="font-weight: bold; text-align: center;">
                            TRACK LOGS
                        </div>

                        <div class="report-table">
                            <table>
                                <tr>
                                    <th>STUDENT/GUEST</th>
                                    <th>APPOINTMENT TYPE</th>
                                    <th>OFFICE</th>
                                    <th>DATE</th>
                                    <th>DONE AT</th>
                                    <th>REMARK</th>
                                </tr>
                                <tr v-for="(item, index) in data" :key="index">
                                    <td>{{ item.lname }}, {{ item.fname }} {{ item.mname }}</td>
                                    <td>{{ item.appointment_type }}</td>
                                    <td>{{ item.office_name }}</td>
                                    <td>{{ item.app_date }}</td>
                                    <td>
                                        <span v-if="item.time_out">{{ item.time_out | formatTime }}</span>
                                    </td>
                                    <td>{{ item.remark }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div><!--close column-->
            </div>
        </div><!--section div-->

    </div>
</template>

<script>
export default {
    name: "AppointmentType",
    data(){
        return{
            data: [],
            total: 0,
            loading: false,
            sortField: 'office_id',
            sortOrder: 'desc',
            page: 1,
            perPage: 5,
            defaultSortDirection: 'asc',

            global_id : 0,

            search: {
                office: '',
            },

            isModalCreate: false,

            fields: {
                office_id: 0,
                appointment_type: '',
            },

            errors: {},

            offices: [],

            btnClass: {
                'is-success': true,
                'button': true,
                'is-loading':false,
            },
        }
    },

    methods: {
        /*
        * Load async data
        */
        loadAsyncData() {
            const params = [
                `sort_by=${this.sortField}.${this.sortOrder}`,
                `office=${this.search.office}`,
                `perpage=${this.perPage}`,
                `page=${this.page}`
            ].join('&')

            this.loading = true
            axios.get(`/get-report-track?${params}`)
                .then(({ data }) => {
                    this.data = [];
                    let currentTotal = data.total
                    if (data.total / this.perPage > 1000) {
                        currentTotal = this.perPage * 1000
                    }

                    this.total = currentTotal
                    data.forEach((item) => {
                        //item.release_date = item.release_date ? item.release_date.replace(/-/g, '/') : null
                        this.data.push(item)
                    })
                    this.loading = false
                })
                .catch((error) => {
                    this.data = []
                    this.total = 0
                    this.loading = false
                    throw error
                })
        },
        /*
        * Handle page-change event
        */
        onPageChange(page) {
            this.page = page
            this.loadAsyncData()
        },

        onSort(field, order) {
            this.sortField = field
            this.sortOrder = order
            this.loadAsyncData()
        },

        setPerPage(){
            this.loadAsyncData()
        },


    },

    mounted() {

        this.loadAsyncData();
    }

}
</script>

<style scoped>

</style>
