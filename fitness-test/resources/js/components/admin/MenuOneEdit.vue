<template>
    <div>
        <mytodolist v-for="(item, index) in list" :key="index"></mytodolist>
        <div class="form-group row edit-row">
            <div class="form-group col-md-10">
                <label class="col-form-label">Дополнительно</label>
                <div>
                    <input class="form-control" type="text" v-model="new_task.text">
                </div>
            </div>
            <div class="form-group col-md-2">
                <button class="btn btn-outline-primary" @click="add_task">Добавить</button>
            </div>
        </div>
        <div class="col-md-12 edit-chips">
            <div class="badge badge-pill badge-secondary"
                 @task_done="delete_task(index)" :key="index" v-for="(data,index) in tasks"
            >
                * {{ data.text }}.
                <span class="badge badge-light" @click="delete_task(index)">x</span>
            </div>
        </div>
    </div>
</template>

<script>
import Mytodolist from "../TodoList.vue";
export default {
    components: {
        Mytodolist
    },
    data: () => ({
        list: [
            {item: 1},
            {item: 2},
            {item: 3},
            {item: 4},
        ],
        new_task: {
            text: '',
        },
        tasks: [
            {
                text: 'Вода – 2-2,5 литра (чистая либо с лимоном)',
            },
            {
                text: 'Витамины Active Woman – после завтрака',
            },
        ]
    }),
    methods: {
        task_done() {
            this.$emit('task_done')
        },
        add_task() {
            if (this.new_task.text != '') {
                this.tasks.push({
                    text: this.new_task.text
                });
                this.new_task.text = '';
            }
        },
        delete_task(index) {
            this.tasks.splice(index, 1);
        }
    }
}
</script>
