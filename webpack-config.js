import path from 'path'
import { fileURLToPath } from 'url'
import { VueLoaderPlugin } from "vue-loader"

const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)

const exports =  {
    output: {
        filename: '[name].bundle.js',
        path: path.resolve(__dirname, 'resources/js/dist'),
        chunkFilename: 'resources/js/[name].js?id=[chunkhash]',
        clean: true
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
    entry: './resources/js/app.js',
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            }
        ]
    },
    plugins: [
        new VueLoaderPlugin()
    ]
}

export default exports;
