const path = require('path'); // подключили библиотеку path из node_modules
const webpack = require('webpack'); // также подключаем и (модуль) webpack 
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
// const WebpackDevServer = require('webpack-dev-server');
// const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");

module.exports = (env, argv) => { // экспортировали из модуля объект с настройками webpack
    const devMode = argv.mode !== 'production';
    return {
        mode: "production", // объект для dev сервера
        // точки входа
        entry: {
            'main': './public/js/main.js',
            'cakes': './public/js/cakes.js'
        },
        // точки выхода
        output: {
            filename: 'js/[name].js',
            path: path.resolve(__dirname, 'public/build'),
            clean: true,
            assetModuleFilename: 'images/[name][ext]'
        },
        // настройка plugins (обычно обрабатывают файлы после создания бандла. Они более мощные и более сложные)
        plugins: [
            new MiniCssExtractPlugin({
                filename: "css/[name].css",
            }),
            // new ImageMinimizerPlugin({
            //     minimizerOptions: {
            //         plugins: [
            //             ["imagemin-pngquant", { strip: true, quality: [0.2, 0.7]}],
            //             ["imagemin-mozjpeg", { quality: 20 }]
            //         ]
            //     },
            // }),
        ],
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    use: ['babel-loader']
                },
                {
                    test: /\.(sa|sc|c)ss$/i,
                    exclude: /node_modules/,
                    use: [
                        devMode ? 'style-loader' : MiniCssExtractPlugin.loader,
                        'css-loader'
                    ],
                },
                // загрузка изображений
                {
                    test: /\.(png|svg|jpg|jpeg|gif)$/i,
                    exclude: /node_modules/,
                    type: 'asset/resource'
                },

            ]
        },
        optimization: {
            minimizer: [
                `...`,
                new CssMinimizerPlugin({
                    minimizerOptions: {
                        preset: [
                            'default',
                            {
                                discardComments: {removeAll: true},
                            },
                        ],
                    },
                }),
            ],
        },
        // devServer: {
        //     static: './dist',
        //     port: 9000,
        //     client: {
        //         logging: 'warn', // 'log' | 'info' | 'warn' | 'error' | 'none'
        //         overlay: false,
        //     }
        // }
    }
}