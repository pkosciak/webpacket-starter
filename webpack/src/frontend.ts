import { createApp, ref, provide } from "vue";
import { createPinia } from "pinia";

import ExampleHeaderLayout from './layouts/ExampleHeaderLayout/ExampleHeaderLayout.vue';

import './css/main.css';

const components = {
    "#exampleheaderlayout": ExampleHeaderLayout,
}

for (const [identifier, component] of Object.entries(components)) {
    const app = createApp(component);
    app.use(createPinia());
    app.mount(identifier);
}