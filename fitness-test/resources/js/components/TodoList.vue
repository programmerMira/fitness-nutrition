<template>
    <div>
        <div class="form-group row edit-row">
            <div class="form-group col-md-5">
                <label class="col-form-label">Продукт</label>
                <div>
                    <input class="form-control" type="text" v-model="new_task.title">
                </div>
            </div>
            <div class="form-group col-md-3">
                <label class="col-form-label">Граммовки</label>
                <div>
                    <input class="form-control" type="text" v-model="new_task.desc">
                </div>
            </div>
            <div class="form-group col-md-2">
                <label class="col-form-label">Измеряется</label>
                <div>
                    <select class="form-control" v-model="new_task.measure">
                        <option disabled value="">гр/шт/литр</option>
                        <option>гр</option>
                        <option>шт</option>
                        <option>литр</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-2">
                <small class="form-text text-muted">{{ "Продуктов: " + tasks.length }}</small>
                <button class="btn btn-outline-primary" @click="add_task">Добавить</button>
            </div>
        </div>
        <div class="col-md-12 edit-chips">
            <div class="badge badge-pill badge-secondary"
                 @task_done="delete_task(index)" :key="index" v-for="(data,index) in tasks"
            >
                {{ data.title }} / {{ data.desc }}{{ data.measure }}
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
            desc: '',
            measure: ''
        },
        tasks: [
            {
                title: 'Греча',
                desc: '100',
                measure: 'гр',
            },
            {
                title: 'Яблоко',
                desc: '2',
                measure: 'шт',
            }
        ]
    }),
    methods: {
        task_done() {
            this.$emit('task_done')
        },
        add_task() {
            if (this.new_task.title != '', this.new_task.desc != '', this.new_task.measure != '') {
                this.tasks.push({
                    title: this.new_task.title,
                    desc: this.new_task.desc,
                    measure: this.new_task.measure
                });
                this.new_task.title = '';
                this.new_task.desc = '';
                this.new_task.measure = '';
            }
        },
        delete_task(index) {
            this.tasks.splice(index, 1);
        }
    },
}
</script>
