import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import { local } from 'laravel-vite-plugin/fonts';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/passkeys.js',
            ],
            refresh: true,
            fonts: [
                local('Victor Mono', {
                    alias: 'mono',
                    variants: [
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-Bold.woff2',
                            weight: 700,
                            style: 'normal',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-BoldItalic.woff2',
                            weight: 700,
                            style: 'italic',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-BoldOblique.woff2',
                            weight: 700,
                            style: 'oblique',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-ExtraLight.woff2',
                            weight: 200,
                            style: 'normal',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-ExtraLightItalic.woff2',
                            weight: 200,
                            style: 'italic',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-ExtraLightOblique.woff2',
                            weight: 200,
                            style: 'oblique',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-Italic.woff2',
                            weight: 400,
                            style: 'italic',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-Light.woff2',
                            weight: 300,
                            style: 'normal',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-LightItalic.woff2',
                            weight: 300,
                            style: 'italic',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-LightOblique.woff2',
                            weight: 300,
                            style: 'oblique',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-Medium.woff2',
                            weight: 500,
                            style: 'normal',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-MediumItalic.woff2',
                            weight: 500,
                            style: 'italic',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-MediumOblique.woff2',
                            weight: 500,
                            style: 'oblique',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-Oblique.woff2',
                            weight: 400,
                            style: 'oblique',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-Regular.woff2',
                            weight: 400,
                            style: 'normal',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-SemiBold.woff2',
                            weight: 600,
                            style: 'normal',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-SemiBoldItalic.woff2',
                            weight: 600,
                            style: 'italic',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-SemiBoldOblique.woff2',
                            weight: 600,
                            style: 'oblique',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-Thin.woff2',
                            weight: 100,
                            style: 'normal',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-ThinItalic.woff2',
                            weight: 100,
                            style: 'italic',
                        },
                        {
                            src: 'resources/fonts/victor-mono/VictorMono-ThinOblique.woff2',
                            weight: 100,
                            style: 'oblique',
                        },
                    ],
                    preload: [{ weight: 400, style: 'normal' }],
                    fallbacks: ['monospace'],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        cors: true,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
