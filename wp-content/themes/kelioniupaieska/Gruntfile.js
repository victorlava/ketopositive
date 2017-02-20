module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['bower_components/bootstrap-sass/assets/stylesheets']    
      },
      dist: {
        options: {
          outputStyle: 'expanded'
        },
        files: {
          'style.css': 'scss/main.scss' 
        }         
      }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },
      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass']
      },
      options: { 
        livereload: true, 
        host: 'kelioniupaieska.dev',
        port: 35728
      } //Add Live Reload Chrome Extension for this to work
    },

    autoprefixer: {
      options: {
        browsers: ['last 2 versions', 'ie 8', 'ie 9']
      },
      dist:{
        files:{
          '/assets/css/style.css': '/assets/css/style.css'
        }
      }
    },

    uglify: {
      all: {
        files: [{
          expand: true,
          cwd: 'assets/js/src/',
          src: ['*.js'], 
          dest: 'assets/js/',
          ext: '.min.js',  
        }],
      },
    },
    
    cssmin: {
      options:{
        keepSpecialComments: 0
      },
      target: {
        files: [{
          expand: true,
          cwd: 'assets/css/',
          src: ['*.css'],
          dest: 'assets/css/',
          ext: '.min.css'
        }]
      }
    },

    imagemin: {                          // Task
      dynamic: {                         // Another target
        options: {
          optimizationLevel: 3,
        },
        files: [{ 
          expand: true,                  // Enable dynamic expansion
          cwd: 'img/',                   // Src matches are relative to this path
          src: ['*.{png,jpg,gif}'],   // Actual patterns to match
          dest: 'img/'                  // Destination path prefix
        }]
      }
    },

    sprite:{
      all: {
        src: 'assets/img/src/icons/*.png', 
        dest: 'assets/img/src/sprites.png',
        destCss: 'assets/css/sprites.css' 
      }
    }

});

grunt.loadNpmTasks('grunt-sass');
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-autoprefixer');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-cssmin');
grunt.loadNpmTasks('grunt-contrib-imagemin');
grunt.loadNpmTasks('grunt-spritesmith');

grunt.registerTask('build', ['sass', 'autoprefixer', 'cssmin', 'uglify']);
grunt.registerTask('minify', ['cssmin', 'uglify']);
grunt.registerTask('default', ['build','watch']);
};