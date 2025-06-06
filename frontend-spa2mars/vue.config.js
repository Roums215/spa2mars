const { defineConfig } = require('@vue/cli-service')
const path = require('path')

module.exports = defineConfig({
  transpileDependencies: true,
  // Configuration pour éviter le conflit d'index.html
  // Désactiver complètement le HtmlWebpackPlugin intégré et le configurer manuellement
  chainWebpack: config => {
    // Supprimer tous les plugins HTML qui pourraient causer des conflits
    if (config.plugins.has('html')) {
      config.plugins.delete('html');
    }
    if (config.plugins.has('copy')) {
      config.plugins.delete('copy');
    }
    if (config.plugins.has('preload')) {
      config.plugins.delete('preload');
    }
    if (config.plugins.has('prefetch')) {
      config.plugins.delete('prefetch');
    }
    
    // Ajouter un nouveau plugin HTML avec une configuration minimale et définir BASE_URL
    const HtmlWebpackPlugin = require('html-webpack-plugin');
    config.plugin('html-single')
      .use(HtmlWebpackPlugin, [{
        template: 'public/index.html',
        filename: 'index.html',
        inject: true,
        minify: false,
        templateParameters: {
          // Définir explicitement BASE_URL pour éviter l'erreur
          BASE_URL: '/',
          // Définir les autres variables nécessaires pour le template
          htmlWebpackPlugin: {
            options: {
              title: 'SPA2Mars'
            }
          }
        }
      }]);
  },
  // Assurer la disponibilité du répertoire public
  publicPath: '/'
})
