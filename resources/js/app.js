import {createApp, h} from 'vue';
import {createInertiaApp, Link} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import Layout from "./Shared/Layout.vue";

createInertiaApp({
    resolve: async (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );
        page.then((module) => {
            if (module.default.layout === undefined){
                module.default.layout = Layout;
            }
        });
        return page;
    },
    progress: {
        delay: 250,
        color: '#29d',
        showSpinner: true,
    },
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .mixin({methods: {route}})
            .use(plugin)
            .component('Link', Link)
            .mount(el)
    },
});
