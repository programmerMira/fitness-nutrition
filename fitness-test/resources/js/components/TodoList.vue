<template>
    <div class="panel">
        <p class="panel-heading">
            Todo list
        </p>
        <ul>
            <li class="panel-block" v-for="(item, index) in items" :key="index">
                <span class="item" v-text="item"></span>
                <div @click="removeTodo" class="icon is-pulled-right">
                    <i class="fa fa-times" id="fuzzyindex" aria-hidden="true">DELETE</i>
                </div>
            </li>
        </ul>
        <div class="panel-block">
            <input @keyup.enter="addTodo" class="input" type='text' id='input'>
        </div>
        <div class="panel-block">
            <button @click="addTodo" class="button is-primary is-outlined is-fullwidth">
                Add item
            </button>
        </div>
    </div>
</template>
<script>
export default {
    data: () => ({
        items: ['Add validation', 'Update button state']
    }),
    methods: {
        addTodo: function () {
            let value = document.querySelector('#input').value;

            if (value.length > 0) {
                this.items.push(value)
                document.querySelector('#input').value = "";
            }
        },
        removeTodo: function (item) {
            this.items.splice(this.items.indexOf(item), 1)
        }
    }
};
</script>
