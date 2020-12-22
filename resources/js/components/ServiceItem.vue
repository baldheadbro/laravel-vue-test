<template>
    
                <div  class="app-content">
                    <div class="app-title">
                        <div class="app-title-current">Service Card</div>
                        <router-link to="/" class="app-title-back">Back to Service List</router-link>
                    </div>

                    <div class="app-add-line">
                        <div class="app-add-line-label">Name:</div>
                        <div class="app-add-line-card-value">
                            {{ name }}
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Description:</div>
                        <div class="app-add-line-card-value">
                            {{ description }}
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Activity:</div>
                        <div class="app-add-line-card-value">
                            {{ activity }}
                        </div>
                    </div>
                    <div class="app-add-line">
                        <div class="app-add-line-label">Type:</div>
                        <div class="app-add-line-card-value">
                            {{ type }}
                        </div>
                    </div>

                    <div class="app-list-add">
                        <router-link :to="{ name: 'editService', params: { id: $route.params.id }}" class="app-list-add-button">
                            Edit Service
                        </router-link>
                    </div>
                </div>

</template>

<script>
export default {
    data: () => {
        return {
            name: '',
            description: '',
            activity: '',
            type: ''
        }
    },
    beforeMount() {
        this.getServiceInfoFromServer();
    },
    mounted() {
    },
    methods: {
        async getServiceInfoFromServer() {
            try {
                const res = await fetch(this.$url + 'api/service?id=' + this.$route.params.id);
                const data = await res.json();
                if(data.status == 'error') {
                    this.showError(data.message);
                }
                this.name = data.name;
                this.description = data.description;
                this.activity = data.isactive == 0 ? 'Inactive' : 'Active';
                this.type = data.serviceTypeName;
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