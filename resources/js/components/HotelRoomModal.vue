<template>
    <div class="modal fade" id="roomModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ isEdit ? "Edit Room" : "Create New Room" }}</h5>
                    <button type="button" class="close" @click="closeModal">&times;</button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="saveRoom">
                        <div class="form-group">
                            <label>Room Number</label>
                            <input type="text" v-model="room.room_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Room Name</label>
                            <input type="text" v-model="room.room_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" v-model="room.room_price" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Discount</label>
                            <input type="number" v-model="room.room_discount" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">{{ isEdit ? "Update" : "Save" }}</button>
                        <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import toastr from "toastr";

export default {
    props: ["roomData"],
    data() {
        return {
            room: {
                id: null,
                room_number: "",
                room_name: "",
                room_price: "",
                room_discount: ""
            },
            isEdit: false
        };
    },
    watch: {
        roomData(newVal) {
            if (newVal) {
                this.room = {...newVal};
                this.isEdit = true;
            } else {
                this.resetForm();
                this.isEdit = false;
            }
        }
    },
    methods: {
        saveRoom() {
            let url = this.isEdit ? `/admin/rooms/${this.room.id}` : `/admin/rooms`;
            let method = this.isEdit ? "PUT" : "POST";

            axios({
                method: method,
                url: url,
                data: this.room
            })
                .then((response) => {
                    toastr.success("Room saved successfully!");
                    this.$emit("refreshTable");
                    this.closeModal();
                })
                .catch((error) => {
                    toastr.error("An error occurred while saving data");
                });
        },
        closeModal() {
            $("#roomModal").modal("hide");
            this.resetForm();
        },
        resetForm() {
            this.room = {
                id: null,
                room_number: "",
                room_name: "",
                room_price: "",
                room_discount: ""
            };
        }
    }
};
</script>
