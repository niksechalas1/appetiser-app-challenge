<template>
    <section class="todos">
        <div class="container-fluid">
            <el-row>
                <el-col :span="10">
                    <div class="grid-content bg-purple">
                        <el-form ref="form" :model="form" label-width="120px" :rules="rules">
                            <el-row>
                                <el-form-item label="Event" prop="title">
                                    <el-input v-model="form.title"></el-input>
                                </el-form-item>
                            </el-row>
                            <el-row>
                                <el-form-item label="From">
                                    <el-date-picker
                                        v-model="form.range[0]"
                                        type="date"
                                        placeholder="Start date"
                                        format="yyyy-MM-dd">
                                    </el-date-picker>
                                </el-form-item>

                                <el-form-item label="To">
                                    <el-date-picker
                                        v-model="form.range[1]"
                                        type="date"
                                        placeholder="Start date"
                                        format="yyyy-MM-dd"
                                        @change="rangeChange">
                                    </el-date-picker>
                                </el-form-item>
                            </el-row>
                            <el-row>
                                <el-form-item>
                                    <el-checkbox v-model="form.mon">Mon</el-checkbox>
                                    <el-checkbox v-model="form.tue">Tue</el-checkbox>
                                    <el-checkbox v-model="form.wed">Wed</el-checkbox>
                                    <el-checkbox v-model="form.thu">Thu</el-checkbox>
                                    <el-checkbox v-model="form.fri">Fri</el-checkbox>
                                    <el-checkbox v-model="form.sat">Sat</el-checkbox>
                                    <el-checkbox v-model="form.sun">Sun</el-checkbox>
                                </el-form-item>
                            </el-row>
                            <el-row>
                                <el-form-item>
                                    <el-button type="primary" @click="save" :disabled="form.title == ''">Save</el-button>
                                    <el-button type="warning" @click="deleteAll">Delete All Events</el-button>
                                </el-form-item>
                            </el-row>
                        </el-form>
                    </div>
                </el-col>
                <el-col :span="14">
                    <div class="grid-content bg-purple-light">
                        <FullCalendar :options="calendarOptions" v-loading="calendarLoading"/>
                    </div>
                </el-col>
            </el-row>
        </div>
    </section>
</template>

<script>
    import moment from "moment"
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import interactionPlugin from '@fullcalendar/interaction'
    import listPlugin from '@fullcalendar/list'
    import axios from "axios"
    import 'vuejs-noty/dist/vuejs-noty.css'
    export default {
        components: {
            FullCalendar
        },
        data: function (){
            let currentDate = moment()
            let start = new Date(moment(currentDate).startOf('month'))
            let end = new Date(moment(currentDate).endOf('month'))
            return {
                rules: {
                    title: [{required: true, message: 'Please enter title', trigger: 'blur, change'}]
                },
                calendarLoading: false,
                form: {
                    title: '',
                    range: [
                        start, end
                    ],
                    mon: 0,
                    tue: 0,
                    wed: 0,
                    thu: 0,
                    fri: 0,
                    sat: 0,
                    sun: 0
                },
                range: '',
                calendarOptions: {
                    plugins: [ dayGridPlugin, interactionPlugin, listPlugin ],
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,listWeek'
                    },
                    events: null
                },
                eventData: null
            }
        },
        methods: {
            rangeChange() {
                this.calendarLoading = true
                if (this.form.range && this.form.range[0] && this.form.range[1]) {
                    let start = moment(this.form.range[0]).format('yyyy-MM-DD')
                    let end = moment(this.form.range[1]).format('yyyy-MM-DD')
                    this.range = [start, end]

                    this.calendarLoading = false
                }
            },
            deleteAll() {
                this.calendarLoading = true
                axios.post('/event/delete-all')
                .then(result => {
                    if (result.data.success) {
                        this.$noty.success("Events record successfully cleared")
                        this.getEvents()
                    }
                    this.calendarLoading = false
                }).catch(err => {
                    console.error('Error', err)
                })
            },
            save() {
                this.calendarLoading = true
                this.form.range[0] = moment(this.form.range[0]).format('yyyy-MM-DD')
                this.form.range[1] = moment(this.form.range[1]).format('yyyy-MM-DD')
                axios.post('/event/add', 
                    {
                        formData: this.form
                    }
                ).then(result => {
                    if (result.data.success) {
                        this.$noty.success("Event successfully saved")
                        this.getEvents()
                    } else {
                        if (result.data.message) {
                            this.$noty.error(result.data.message)
                        } else {
                            this.$noty.error("Error occurred.")
                        }
                    }
                    this.calendarLoading = false
                }).catch(err => {
                    console.error('Error', err)
                })
            },
            getEvents() {
                this.calendarLoading = true
                axios.get('/event')
                .then(result => {
                    if (result.data.success) {
                        this.eventData = result.data.data
                        this.calendarOptions.events = result.data.data
                    }
                    this.calendarLoading = false
                }).catch(err => {
                    console.error('Error', err)
                })
            }
        },
        computed: {
        },
        mounted() {
            if (!this.eventData) {
                this.getEvents()
            }
        }
    }
</script>

<style scoped>
    .todos li{
        font-size: 14px;
        margin-bottom: 10px;
    }

    .todos li button{
        font-size: 12px;
    }
</style>
