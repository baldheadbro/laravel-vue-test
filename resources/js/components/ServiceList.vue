<template>
                <div  class="app-content">
                    <div class="app-title">
                        <div class="app-title-current">List of Services</div>
                        <div class="app-title-back"></div>
                    </div>

                    <div v-if="!showList" class="app-loading">Loading data...</div>

                    <div v-else class="app-list">
                        <a v-on:click="getServicesListFromServer()" v-if="isError" class="app-error-line">Reload Service List</a>
                        <ul>
                            <li v-for="(item, index) in listItems" v-bind:key="index">
                                <div class="app-list-item-name-and-description">
                                    <div class="app-list-item-name">{{ item.name }}</div>
                                    <div class="app-list-item-description">{{ item.description }}</div>
                                </div>
                                <div class="app-list-item-type">{{ item.serviceTypeName }}</div>
                                <div class="app-list-item-type app-list-item-type-activity">{{ item.isactive == 0 ? 'Inactive' : 'Active' }}</div>
                                <router-link :to="{ name: 'viewService', params: { id: item.id }}" class="app-list-item-state" title="View Service Card">
                                    <img src="/img/eye.png">
                                </router-link>
                                <router-link :to="{ name: 'editService', params: { id: item.id }}" class="app-list-item-state" title="Edit Service Info">
                                    <img src="/img/edit.png">
                                </router-link>
                                <div v-on:click="askForDeletion( item.id, item.name )" class="app-list-item-state" title="Delete Service">
                                    <img src="/img/bin.png">
                                </div>
                            </li>
                        </ul>

                        <div v-if="!isError" class="app-list-add">
                            <router-link to="/add" class="app-list-add-button">Add New Service</router-link>
                        </div>
                    </div>

                    <!-- Overlay Confirmation -->
                    <div id="overlay-delete-confirmation-container" class="overlay-container">
                        <div class="overlay-container-box">
                            <div class="overlay-container-box-content">
                                <div class="overlay-message">
                                    Do you wanna delete service<br><span id="delete-serive-name" class="delete-serive-name"></span>?
                                </div>
                                <div class="overlay-buttons">
                                    <div class="overlay-button overlay-button-cancel" onclick="document.getElementById('overlay-delete-confirmation-container').style.display = 'none'">Cancel</div>
                                    <div v-on:click="confirmDeletion()" class="overlay-button overlay-button-ok">Confirm</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Overlay Confirmation -- END -->
                </div>

</template>

<script>
export default {
    data:() => {
        return {
            isError: false,
            showList: false,
            listItems: [],
            deleteId: 0,
        }
    },
    beforeMount() {
        this.getServicesListFromServer();
    },
    methods: {
        async getServicesListFromServer() {
            this.isError = false;
            this.showList = false;
            try {
                const res = await fetch(this.$url + 'api/serviceList');
                const data = await res.json();
                this.listItems = data;
                this.showList = true;
            } catch (error) {
                document.getElementById('overlay-error-container').style.display = 'block';
                document.getElementById('error-message').innerHTML = error;
                this.showList = true;
                this.isError = true;
            }
        },

        askForDeletion(id, name) {
            this.deleteId = id;
            document.getElementById('delete-serive-name').innerHTML = name;
            document.getElementById('overlay-delete-confirmation-container').style.display = 'block';
        },

        confirmDeletion() {
            console.log('confirmDeletion');
            document.getElementById('overlay-delete-confirmation-container').style.display = 'none';
            this.doDeletion();
        },

        async doDeletion() {
            this.canBeSent = false;
            try {
                const request = new Request(this.$url + 'api/service',
                    {
                        method: "DELETE",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: this.deleteId
                        })
                    }
                );

                const res = await fetch(request);
                const data = await res.json();
                if(data.status == 'error') {
                    this.showError(data.message);
                } else {
                    this.getServicesListFromServer();
                }
            } catch (error) {
                this.showError(error);
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