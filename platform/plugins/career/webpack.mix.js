let mix = require('laravel-mix')

const path = require('path')
let directory = path.basename(path.resolve(__dirname))

const source = 'platform/plugins/' + directory
const dist = 'public/vendor/core/plugins/' + directory

mix
    .sass(source + '/resources/sass/career.scss', dist + '/css')
    .js(source + '/resources/js/career.js', dist + '/js')

if (mix.inProduction()) {
    mix
        .copy(dist + '/css/career.css', source + '/public/css')
        .copy(dist + '/js/career.js', source + '/public/js')
}
