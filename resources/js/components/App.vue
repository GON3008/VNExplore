<template>
    <div>
        <button @click="openModal(false)">Create New Room</button>
        <ModalForm
            :show="showModal"
            :isEdit="isEdit"
            :roomData="currentRoom"
            @close-modal="showModal = false"
            @save-room="saveRoom"
        />
    </div>
</template>

<script>
import ModalForm from "./ModalForm.vue";

export default {
    components: { ModalForm },
    data() {
        return {
            showModal: false,
            isEdit: false,
            currentRoom: {}
        };
    },
    methods: {
        openModal(edit, room = {}) {
            this.isEdit = edit;
            this.currentRoom = room;
            this.showModal = true;
        },
        saveRoom(room) {
            console.log("Room saved:", room);
            this.showModal = false;
        }
    }
};
</script>
