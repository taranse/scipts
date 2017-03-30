const {root} = require('./helpers');
/**
 * This is a common webpack config which is the base for all builds
 */
module.exports = {
  devtool: 'source-map',
  resolve: {
    extensions: ['.ts', '.js']
  },
  output: {
    path: root('dist')
  },
  module: {
    rules: [
      {test: /\.ts$/, loader: '@ngtools/webpack'},
      {test: /\.html$/, loader: 'raw-loader'},
      {test: /\.css$/, loaders: ['to-string-loader', 'css-loader']},
      {
        test: /\.scss$|\.sass$/,
        loaders: [
          "exports-loader?module.exports.toString()",
          "css-loader?{\"sourceMap\":false,\"importLoaders\":1}",
          "postcss-loader",
          "sass-loader"
        ]
      }
    ]
  },
  plugins: []
};
