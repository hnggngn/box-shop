const esbuild = require('esbuild');

esbuild.build({
    entryPoints: ['style.css', 'uno.css'],
    outdir: 'assets/css',
    bundle: true,
    minify: true,
})

esbuild.buildSync({
    entryPoints: ['main.js'],
    outfile: 'assets/js/box.js',
    bundle: true,
    minify: true,
    sourcemap: true,
})
