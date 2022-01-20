<template>
    <div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label">Дополнительно</label>
            <div class="col-md-7">
                <input class="form-control" type="text" placeholder="Ссылка на видео" v-model="new_task.text">
            </div>
            <div class="2">
                <small class="form-text text-muted">{{ "Дополнительно: " + tasks.length }}</small>
                <button class="btn btn-outline-primary" @click="add_task">Добавить</button>
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
    </div>
</template>

<script>
export default {
    data: () => ({
        new_task: {
            text: '',
        },
        new_task: {
            title: '',
            desc: '',
            measure: ''
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
