<template>
    
                <div  class="app-content">
                    <div class="app-title">
                        <div class="app-title-current">Edit Service</div>
                        <router-link to="/" class="app-title-back">Back to Service List</router-link>
                    </div>

                    <div class="app-add-line">
                        <div class="app-add-line-label">Name:</div>
                        <div class="app-add-line-input-container">
                            <input v-on:change="checkForm" v-on:keyup="checkForm" v-model="name" type="text" placeholder="Input name here">
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Description:</div>
                        <div class="app-add-line-input-container">
                            <input v-on:change="checkForm" v-on:keyup="checkForm" v-model="description" type="text" placeholder="Input description here">
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Activity:</div>
                        <div class="app-add-line-input-container">
                            <select v-on:change="checkForm" v-model="activity">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Type:</div>
                        <div class="app-add-line-input-container">
                            <select v-on:change="checkForm" v-model="type">
                                <option v-for="(item, index) in serviceTypeList" v-bind:key="index" :value="item.id">{{ item.name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="app-list-add">
                        <div v-on:click="sendFormDataToServer()" v-bind:class="{ 'button-disabled' : !canBeSent }" class="app-list-add-button">Save</div>
                    </div>
                </div>

</template>

<script>
export default {
    data: () => {
        return {
            name: '',
            description: '',
            activity: 1,
            type: 0,
            serviceTypeList: [],
            canBeSent: false,
            isError: false,
        }
    },
    beforeMount() {
        this.getServiceTypeListFromServer();
    },
    mounted() {
        this.checkForm();
    },
    methods: {
        async getServiceDataFromServer() {
            // Step 2
            try {
                const res = await fetch(this.$url + 'api/service?id=' + this.$route.params.id);
                const data = await res.json();
                if(data.status == 'error') {
                    this.showError(data.message);
                }
                this.name = data.name;
                this.description = data.description;
                this.activity = data.isactive;
                this.type = data.type;
                this.checkForm();
            } catch (error) {
                this.showError(error);
            }
        },
        async getServiceTypeListFromServer() {
            // Step 1
            this.isError = false;
            try {
                const res = await fetch(this.$url + 'api/serviceTypeList');
                const data = await res.json();
                this.serviceTypeList = data;
                this.type = data[0].id;
                this.getServiceDataFromServer();
            } catch (error) {
                this.showError(error);
            }
        },
        async sendFormDataToServer() {
            if(!this.canBeSent) return;

            this.canBeSent = false;
            try {
                const request = new Request(this.$url + 'api/service',
                    {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: this.$route.params.id,
                            name: this.name,
                            description: this.description,
                            isactive: this.activity,
                            type: this.type,
                        })
                    }
                );

                const res = await fetch(request);
                const data = await res.json();
                if(data.status == 'error') {
                    this.showError(data.message);
                    this.canBeSent = true;
                } else {
                    this.$router.push('/');
                }
                console.log(data);
            } catch (error) {
                this.showError(error);
                this.canBeSent = true;
            }
        },
        checkForm() {
            if(this.name.length > 0 && this.description.length > 0 && this.type != 0) {
                this.canBeSent = true;
            } else {
                this.canBeSent = false;
            }
        },
        showError(message) {
            document.getElementById('overlay-error-container').style.display = 'block';
            document.getElementById('error-message').innerHTML = message;
            this.isError = true;
        }
    }
}
</script>