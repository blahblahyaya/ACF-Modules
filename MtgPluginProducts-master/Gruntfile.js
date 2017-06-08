'use strict';

module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    less: {
      dist: {
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2
        },
        files: {
         'assets/css/products.css' : 'assets/less/products.less'
        }
      },
       dev: {
        options: {
          compress: false,
          yuicompress: false,
          optimization: 2
        },
        files: {
         'assets/css/products.css' : 'assets/less/products.less'
        }
      }
    },
    watch: {
      less: {
        files: 
          'assets/less/*.less'
        ,
        tasks: ['less:dev']
      }
    },
    clean: {
      assets: [
        'assets/css/*'
      ]
    },
    cssmin: {
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1
      },
      target: {
        files: {
          'assets/css/brazil-products.css': ['assets/css/products.css']
        }
      }
    },
    postcss: {
      options: {
        diff: true,
        map: false,
        processors: [
          require('autoprefixer')({
            browsers: ['last 2 versions']
          })
        ]
      },
      dist: {
        src: 
          'assets/css/*'
      }
    }
    
      });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-autoprefixer');


  // Register tasks
  grunt.registerTask('default', [
    'clean:assets',
    'less:dev',
    'postcss:dist',
    'cssmin:target'
  ]);

  // Register tasks
  grunt.registerTask('dist', [
    'clean:assets',
    'less:dist',
    'postcss:dist',
    'cssmin:target'
  ]);

  grunt.registerTask('dev', [
    'watch'
  ]);

};
