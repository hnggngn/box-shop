import {
    defineConfig,
    presetIcons,
    presetTypography,
    presetUno,
    presetWebFonts,
    transformerDirectives,
    transformerVariantGroup
} from 'unocss'
import presetAutoprefixer from 'unocss-preset-autoprefixer'

export default defineConfig({
    presets: [
        presetUno(),
        presetWebFonts({
            fonts: {
                sans: {
                    name: "Inter",
                    italic: false,
                    weights: [400, 500, 600, 700],
                    provider: "bunny"
                }
            }
        }),
        presetIcons({
            extraProperties: {
                'display': 'inline-block',
                'vertical-align': 'middle',
            },
        }),
        presetTypography(),
        presetAutoprefixer()
    ],
    transformers: [transformerDirectives(), transformerVariantGroup()],
})