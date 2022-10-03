import { createApp, DefineComponent, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import "../css/app.css";
import "./bootstrap/fontawesome";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

const pages = await import.meta.glob<DefineComponent>('./pages/**/*.vue');

const resolveNameComponent = (name: string) => {
    for (const path in pages) {
        if (!path.endsWith(`${name}.vue`)) continue;

        return pages[path]();
    }

    throw new Error(`Page not found: ${name}.`);
};

createInertiaApp({
    setup({ el, props, plugin, app}) {
        createApp({ render: () => h(app, props)})
            .use(plugin)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
    resolve: resolveNameComponent,
}).catch(console.error);
