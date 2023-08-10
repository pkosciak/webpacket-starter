import { createApp, ref, provide } from "vue";
import { createPinia } from "pinia";

import HeaderLayout1 from './layouts/HeaderLayout1/HeaderLayout1.vue';
import FaqSection1 from './blocks/FaqSection1/FaqSection1.vue';

import './css/main.css';

const components = {
    "#headerlayout1": HeaderLayout1,
    "#faqsection1": FaqSection1
}

for (const [identifier, component] of Object.entries(components)) {
    const app = createApp(component);
    app.use(createPinia());
    app.mount(identifier);
}