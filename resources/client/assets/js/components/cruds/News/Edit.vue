<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>News</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Title *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="title"
                                            placeholder="Enter Title *"
                                            :value="item.title"
                                            @input="updateTitle"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="description">Description *</label>
                                    <vue-ckeditor
                                            name="description"
                                            :id="'description'"
                                            :value="item.description"
                                            @input="updateDescription"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="meta_title"
                                            placeholder="Enter Meta Title"
                                            :value="item.meta_title"
                                            @input="updateMeta_title"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="meta_description"
                                            placeholder="Enter Meta Description"
                                            :value="item.meta_description"
                                            @input="updateMeta_description"
                                            >
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('NewsSingle', ['item', 'loading']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('NewsSingle', ['fetchData', 'updateData', 'resetState', 'setTitle', 'setDescription', 'setMeta_title', 'setMeta_description']),
        updateTitle(e) {
            this.setTitle(e.target.value)
        },
        updateDescription(value) {
            this.setDescription(value)
        },
        updateMeta_title(e) {
            this.setMeta_title(e.target.value)
        },
        updateMeta_description(e) {
            this.setMeta_description(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'news.index' })
                    this.$eventHub.$emit('update-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
