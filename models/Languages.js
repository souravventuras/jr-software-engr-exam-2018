var mongoose = require('mongoose')
,     Schema = mongoose.Schema
,       uuid = require('node-uuid')

var count=0;
var LanguageSchema = mongoose.Schema({
  code : {type : String , unique : true, required : true, dropDups: true},
  developers : [{
      type: Schema.ObjectId,
      ref: 'Developer'
  }],
})

mongoose.model('Language',LanguageSchema);
exports.getLanguageSchema = function(){
  return LanguageSchema;
}
