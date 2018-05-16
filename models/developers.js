var mongoose = require('mongoose')
  , Schema = mongoose.Schema
  ,uuid = require('node-uuid')

var DeveloperSchema = mongoose.Schema({
  email : {type : String , unique : true, required : true, dropDups: true},
  languages : [{
      type: Schema.ObjectId,
      ref: 'Languages'
  }],
  programming_lang: [{
      type: Schema.ObjectId,
      ref: 'Programming_Lang'
  }]
})

mongoose.model('Developer',DeveloperSchema);
exports.getDeveloperSchema = function(){
  return DeveloperSchema;
}
