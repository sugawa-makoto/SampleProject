const WorkboxWebpackPlugin = require('workbox-webpack-plugin');
const dist = __dirname + '/dist'

// webpack config
{
  plugins: [
    // Other webpack plugins...
    new WorkboxWebpackPlugin.GenerateSW({
      globDirectory: dist,
      globPatterns: ['*.{html,js,css}', 'images/**/*.{jpg,jpeg,png,gif,webp,svg}'],
      swDest: dist + '/sw.js',
      clientsClaim: true,
      skipWaiting: true,
    }),
    new WorkboxWebpackPlugin.GenerateSW({
      globDirectory: dist,
      globPatterns: ['*.{html,js,css}', 'images/**/*.{jpg,jpeg,png,gif,webp,svg}'],
      swDest: dist + '/sw.js',
      clientsClaim: true,
      skipWaiting: true,
      runtimeCaching: [
        {
          urlPattern: new RegExp('/'),
          handler: 'staleWhileRevalidate',
        },
        {
          urlPattern: new RegExp('https://www.googleapis.com/'),
          handler: 'cacheFirst',
          options: {
            cacheName: 'api',
            expiration: {
              maxEntries: 100,
              maxAgeSeconds: 72 * 60 * 60
            },
            cacheableResponse: { statuses: [0, 200] },
          }
        },
      ],
    }),
  ]
}
