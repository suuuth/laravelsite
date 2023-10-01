import path from 'path'

const exports =  {
    output: {
        filename: 'resources/js/main.js',
        chunkFilename: 'resources/js/[name].js?id=[chunkhash]'
    },
    resolve: {
        alias: {
            '@': path.resolve('./resources/js'),
        },
        extensions: ['.js', '.vue', '.json'],
    },
    devServer: {
        allowedHosts: 'all',
    },
    entry: './resources/js/app.js'
}

export default exports;
