var mongoose = require('mongoose')
,     Schema = mongoose.Schema
,       uuid = require('node-uuid')

var count=0;
var ProgrammingLanguageSchema = mongoose.Schema({
  name : {type : String , unique : true, required : true, dropDups: true},
  developers : [{
      type: Schema.ObjectId,
      ref: 'Developer'
  }],
})

mongoose.model('Programming_Lang',ProgrammingLanguageSchema);
exports.getProgrammingLanguageSchema = function(){
  return ProgrammingLanguageSchema;
}
