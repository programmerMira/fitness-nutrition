<template>
    <div>
        <div :key="index" v-for="(content,index) in contents">
            <Foods v-on:name="content.name" :content="content" :foods="content.foods"></Foods>
            <Videos :key="index" :content="content" :videos="content.videos"></Videos>
        </div>
    </div>
</template>

<script>
import Foods from "../contents/Foods.vue";
import Videos from "../contents/Videos.vue";

export default {
    props: ["videos", "foods"],
    components: {
        Foods,
        Videos
    },
    data: () => ({
        contents: [
            {
                name: 'Завтрак',
                foods: [],
                videos: [],
            },
            {
                name: 'Перекус №1',
                foods: [],
                videos: [],
            },
            {
                name: 'Обед',
                foods: [],
                videos: [],
            },
            {
                name: 'Перекус №2',
                foods: [],
                videos: [],
            },
            {
                name: 'Ужин',
                foods: [],
                videos: [],
            }
        ],
    }),
}
</script>

