/**
 * Created by Евгений on 02.05.2017.
 */
const path                    = require('path/path');
const cssnano                 = require('cssnano');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const HtmlWebpackPlugin       = require('html-webpack-plugin');
const ScriptExtPlugin         = require('script-ext-html-webpack-plugin');
const ExtractTextPlugin       = require('extract-text-webpack-plugin');
const webpack                 = require('webpack');
const autoprefixer            = require('autoprefixer');
const BrowserSyncPlugin       = require('browser-sync-webpack-plugin');
const CopyWebpackPlugin       = require('copy-webpack-plugin');

module.exports = {
    entry:   {
        //"mask":  "./frontend/mask.js",
        "materialize":  "./frontend/materialize.js",
        "main":  "./frontend/main.js",
        "styles": "./frontend/styles/styles.scss"
        //"fonts": "https://fonts.googleapis.com/icon?family=Material+Icons"
    },
    output:  {
        path:     path.resolve('./'),
        filename: '[name].js'
    },
    module:  {
        loaders: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel-loader',
                query: {
                    presets: ['es2015']
                }
            },
            {test: /\.html$/, use: 'raw-loader'},
            {test: /\.css$/, use: ['to-string-loader', 'css-loader']},
            {test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/, loader: "url-loader?limit=10000&mimetype=application/font-woff&name=[path][name].[ext]"},
            {test: /\.(ttf|otf|eot|svg|jpg|png)(\?v=[0-9]\.[0-9]\.[0-9])?$/, loader: 'file?name=[path][name].[ext]'},
            {
                "test":    /\.scss$|\.sass$/,
                "loaders": ExtractTextPlugin.extract({
                    "use":        ['style-loader', 'css-loader', 'resolve-url-loader', 'sass-loader?sourceMap'],
                    "fallback":   "style-loader",
                    "publicPath": ""
                })
            }
        ]
    },
    plugins: [
        new CopyWebpackPlugin([
            {from: path.resolve("./frontend/assets"), to: path.resolve('./assets')}
        ]),
        new OptimizeCSSAssetsPlugin({
            cssProcessor:        cssnano,
            cssProcessorOptions: {
                discardComments: {
                    removeAll: true
                },
                safe:            true
            },
            canPrint:            false
        }),
        new HtmlWebpackPlugin({
            template: './frontend/index.html',
            output:   path.resolve('.'),
            inject:   'body'
        }),
        new ExtractTextPlugin({
            "filename": "[name].css",
            "disable":  true
        }),
        new ScriptExtPlugin({
            defaultAttribute: 'defer'
        }),
        new webpack.LoaderOptionsPlugin({options: {postcss: [autoprefixer]}}),
        new webpack.optimize.UglifyJsPlugin({
            compress: {
                warnings: false
            }
        }),
        new BrowserSyncPlugin({
            host:   'localhost',
            port:   3000,
            server: {baseDir: ['./']}
        })
    ],
    watch:   true

};