module.exports = {
  // entry point of our application
  entry: './resources/assets/js/webpack_bootstrap.js',
  // where to place the compiled bundle
  output: {
    filename: './public/js/webpack_bootstrap.js'
  },
  module: {
    // `loaders` is an array of loaders to use.
    // here we are only configuring vue-loader
    loaders: [
      {
        test: /\.vue$/, // a regex for matching all files that end in `.vue`
        loader: 'vue'   // loader to use for matched files
      }
    ]
  },
  // vue-loader configurations
  vue: {
    // configure autoprefixer
    autoprefixer: {
      browsers: ['last 2 versions']
    }
  }
}