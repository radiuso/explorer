const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

const extractSass = new ExtractTextPlugin({
  filename: "[name].css",
  disable: false
});

module.exports = {
  entry: {
    app: "./app/Resources/js/app.js"
  },

  output: {
    path: path.resolve(__dirname, "web", "assets"),
    filename: "app.js",
    publicPath: "/assets/"
  },

  module: {
    rules: [{
      test: /\.js$/,
      loader: "babel-loader"
    }, {
      test: /\.scss$/,
      use: extractSass.extract({
        use: [{
          loader: "css-loader"
        }, {
          loader: "sass-loader"
        }],
        fallback: "style-loader"
      })
    }]
  },
  plugins: [
    extractSass
  ]
};
