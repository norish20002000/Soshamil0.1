<template>
    <div>
        <div class="picbox">
            <figure>
                <img v-bind:src="data.image" width="100px" height="100px">
                <!-- <figcaption>現在のプロフィール画像</figcaption> -->
                <p>{{ imgStr }}</p>
            </figure>
        </div>
        <div>
            <label>
                <span class="filelabel" title="ファイルを選択">
                    <img src="img/camera-orange-rev.png" width="32" height="26" alt="+画像">
                    選択
                </span>
                <input type="file" ref="file" name="photo" id="filesend" @change="setImage">
            </label>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        isImage: {
            type: Number,
            default: 0,
        },
        authId: Number,
    },
    data() {
        return {
            data: {
                image: this.isImage ? "/storage/account_images/test/"  + this.authId + ".jpg" : "",
                name: "",
            },
            imgStr: this.isImage ? "":"画像",
        };
    },
    methods: {
        setImage(e) {
            const files = this.$refs.file;
            const fileImg = files.files[0];
            if (fileImg.type.startsWith("image/")) {
                this.imgStr = ""
                this.data.image = window.URL.createObjectURL(fileImg);
                this.data.name = fileImg.name;
                this.data.type = fileImg.type;
            }
        },
    },
    computed: {
        // imagecomput : function() {
        //     if (this.isImage) {
        //         this.data.image = "/storage/account_images/test/" + authId + ".jpg"
        //     } else {
        //         this.data.image = ""
        //     }
        // }
    },
    mounted() {
        console.log('Component mounted.')
    }
};
</script>
