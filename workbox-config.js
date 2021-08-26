module.exports = {
	globDirectory: 'public/',
	globPatterns: [
		'**/*.{svg,css,ico,eot,ttf,woff,woff2,html,js,json,config}'
	],
	ignoreURLParametersMatching: [
		/^utm_/,
		/^fbclid$/,
		/^x/
	],
	swDest: 'public/sw.js'
};