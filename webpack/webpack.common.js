const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const VueLoader = require('vue-loader');

module.exports = {
	entry: {
		'frontend': path.resolve(__dirname, './src/frontend.ts'),
		'backend': path.resolve(__dirname, './src/backend.ts'),
	},
	plugins: [
		new VueLoader.VueLoaderPlugin(),
		new webpack.DefinePlugin({
			__VUE_OPTIONS_API__: false,
			__VUE_PROD_DEVTOOLS__: false,
		}),
	],
	resolve: {
		alias: {
			vue: 'vue/dist/vue.esm-bundler'
		}
	},
	module: {
		rules: [
			{
				test: /\.vue$/,
				loader: 'vue-loader',
			},
			{
				test: /\.ts$/,
				loader: 'ts-loader',
				options: {
					appendTsSuffixTo: [/\.vue$/]
				}
			},
			{
				test: /\.js$/,
				loader: 'babel-loader',
				exclude: /node_modules/
			},
			{
				test: /\.css$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							importLoaders: 1,
						},
					},
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: {
								plugins: [
									require('tailwindcss'),
									require('autoprefixer'),
								],
							},
						},
					},
				],
			},
			{
				test: /\.(jpe?g|png|gif|svg)$/,
				type: "asset/resource",
				generator: {
					filename: 'media/[name][ext]',
				},
			},
			{
				test: /\.(woff|woff2|eot|ttf)$/,
				type: "asset/resource",
				generator: {
					filename: 'webfont/[name][ext]',
				},
			}
		]
	},
};
