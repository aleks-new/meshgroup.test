<template>
    <div>
        <form>
            <div class="form-group">
                <label for="excelFile">Загрузка Excel файла</label>
                <input type="file" class="form-control-file"
                       id="excelFile"
                       ref="excelFile"
                       @change="selectFile">
            </div>
            <button type="button" value="Отправить" class="btn btn-primary"
                    @click="sendFile"
                    :disabled="isLoading">Отправить</button>
            <div :class="{ 'd-none': !isLoading }">Отправка ...</div>
        </form>
    </div>
</template>

<script>
export default {
    name: "UploadComponent",
    props: [
        "uploadUrl"
    ],
    data(){
        return {
            file: null,
            isLoading: false
        }
    },
    mounted() {
        console.log(this.$props.uploadUrl);
    },
    methods: {
        selectFile: function() {
            this.file = this.$refs.excelFile.files[0];
        },
        sendFile: function() {
            if(!this.file) {
                alert('Сначала нужно выбрать файл');
                return;
            }
            this.isLoading = true;
            let formData = new FormData();
            formData.append('file', this.file);

            axios.post(this.$props.uploadUrl, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
            }).then(response => {
                if(typeof response !== 'undefined' && typeof response.data.success !== 'undefined'){
                    alert('Файл успешно загружен');
                    this.file = null;
                    this.$refs.excelFile.value = null;
                }
            }).finally(() => {
                this.isLoading = false;
            });
        }
    }


}
</script>

<style scoped>

</style>
