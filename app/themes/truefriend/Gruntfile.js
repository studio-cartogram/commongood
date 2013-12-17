'use strict';
module.exports = function(grunt) {
	

	// load all grunt tasks
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);



	grunt.initConfig({


		// watch for changes and trigger compass, jshint, uglify and livereload
		watch: {
			compass: {
				files: ['scss/**/*.{scss,sass}'],
				tasks: ['compass']
			},
			js: {
				files: '<%= jshint.all %>',
				tasks: ['jshint', 'uglify']
			},
			livereload: {
				options: { livereload: true },
				files: ['style.css', 'scripts/*.js', '*.html', '*.php', 'images/**/*.{png,jpg,jpeg,gif,webp,svg}']
			}
		},

		// compass and scss
		compass: {
			dist: {
				options: {
					sassDir: 'scss',
					cssDir: '',
					imagesDir: 'images',
					javascriptsDir: 'scripts',
					fontsDir: 'resources/fonts',
					importPath: 'scripts/vendor',
					relativeAssets: false,
					force:true,
					outputStyle: 'compressed'
				},
			}
		},

		// javascript linting with jshint
		jshint: {
			options: {
				jshintrc: '.jshintrc',
				force: true		
			},
			all: [
				'Gruntfile.js',
				'scripts/source/*.js'
			]
		},

		// uglify to concat, minify, and make source maps
		uglify: {
			app: {
				options: {
					report: ['min', 'gzip']
				},
				files: {
					'scripts/cartogram.min.js': [
						
						// 'bower_components/jquery/jquery.js',

						'bower_components/classie/classie.js',

						'bower_components/jquery-throttle-debounce/jquery.ba-throttle-debounce.js',

						'bower_components/flexslider/jquery.flexslider.js',

						'bower_components/headroom.js/dist/headroom.js',
						
						'bower_components/headroom.js/dist/jQuery.headroom.js',

						'bower_components/magnific-popup/dist/jQuery.magnific-popup.js',

						'bower_components/jquery-fittext.js/jquery.fittext.js',

						'scripts/Cartogram.js',

						'scripts/vendor/jquery.superslides.js',

						'scripts/vendor/twitterFetcher_v10_min.js',

						'scripts/source/ecobee-menu.js',

						'scripts/source/ecobee-tabs.js',

						'scripts/source/ecobee-scroller.js',

						'scripts/source/app.js'

						
					]
				}
			}
		},

		// image optimization
		imagemin: {
			dist: {
				options: {
					optimizationLevel: 7,
					progressive: true
				},
				files: [{
					expand: true,
					cwd: 'images/',
					src: '**/*',
					dest: 'images/'
				}]
			}
		},

		dss: {
			docs: {
				files: {
					'doc/': 'scss/**/*.{css,scss,sass,less,styl}'
				},
				options: {
					parsers: {
			          	// Finds @link in comment blocks
						link: function(i, line, block){

							// Replace link with HTML wrapped version
							return line;			        		
		    			}
    				}
    			}
    		}	
    	}
	});

	// register task
	grunt.registerTask('default', ['watch']);
	grunt.registerTask('build', ['dss']);

};
