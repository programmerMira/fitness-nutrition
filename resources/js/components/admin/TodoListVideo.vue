<template>
    <div>
        <div class="form-group row edit-row">
            <div class="form-group col-md-5">
                <label class="col-form-label">Название</label>
                <div>
                    <input class="form-control" type="text" v-model="new_task.title">
                </div>
            </div>
            <div class="form-group col-md-5">
                <label class="col-form-label">Ссылка</label>
                <div>
                    <input class="form-control" type="text" v-model="new_task.link">
                </div>
            </div>
            <div class="form-group col-md-2">
                <small class="form-text text-muted">{{ "Видео: " + tasks.length }}</small>
                <button class="btn btn-outline-primary" @click="add_task">Добавить</button>
            </div>
        </div>
        <div class="col-md-12 edit-chips">
            <div class="badge badge-pill badge-secondary"
                 @task_done="delete_task(index)" :key="index" v-for="(data,index) in tasks"
            >
                {{ data.title }} / {{ data.link }}
                <span class="badge badge-light" @click="delete_task(index)">x</span>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: () => ({
        new_task: {
            title: '',
            link: '',
        },
        tasks: [
            {
                title: 'Видео 1',
                link: 'https://www.youtube.com/embed/9yLxmbICrTM',
            },
            {
                title: 'Видео 2',
                link: 'https://www.youtube.com/embed/9yLxmbICrTM',
            },
        ]
    }),
    methods: {
        task_done() {
            this.$emit('task_done')
        },
        add_task() {
            if (this.new_task.title != '', this.new_task.link != '') {
                this.tasks.push({
                    title: this.new_task.title,
                    link: this.new_task.link,
                });
                this.new_task.title = '';
                this.new_task.link = '';
            }
        },
        delete_task(index) {
            this.tasks.splice(index, 1);
        }
    },
}
</script>
