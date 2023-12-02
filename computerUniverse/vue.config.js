const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,

  pluginOptions: {
    vuetify: {
			// https://github.com/vuetifyjs/vuetify-loader/tree/next/packages/vuetify-loader
		}
  },
  publicPath: '/cu-termproject',
  devServer: {
    proxy: {
      '^/api/': {
        target: "http://127.0.0.1:8000",
        changeOrigin: true
      }
    }
  }
})
