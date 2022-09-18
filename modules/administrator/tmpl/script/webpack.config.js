/**
 * Created by Anton on 16.10.2016.
 */
var path = require('path');
const webpack = require('webpack');
module.exports={
    entry:'./main',
    output:{
        filename:'build.js'
    },
    /*plugins: [
        new webpack.optimize.UglifyJsPlugin({
            mangle: {
                except: ['$super', '$', 'exports', 'require']
            },
            compress: {
                warnings: false,
                drop_console:true,
                unsafe:true
            }
        })
    ],*/


   /* module: {
        loaders: [
            { test: path.join(__dirname, 'es6'),
                loader: 'babel-loader' }
        ]
    }*/
};

/*if(NODE_ENV=='production'){
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin({
          compress:{
              warnings:false,
              drop_console:true,
              unsafe:true
          }
        })
    );

}*/